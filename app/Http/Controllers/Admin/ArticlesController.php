<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Fournisseur;
use Barryvdh\DomPDF\PDF as PDF1;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\QueryBuilder\QueryBuilder;


class ArticlesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        $articles = QueryBuilder::for(Article::class)
            ->defaultSort('niveauStock')
            ->allowedSorts(['nom', 'reference','marque', 'prixAchat', 'prixVente', 'niveauStock', 'fournisseur'])
            ->allowedFilters(['nom', 'marque', 'reference', 'fournisseur'])
            ->paginate()
            ->withQueryString()
            ->through(fn ($article)=>[
                'id'=>$article->id,
                'nom'=>$article->nom,
                'reference'=>$article->reference,
                'marque'=>$article->marque,
                'prixAchat'=>$article->prixAchat,
                'prixVente'=>$article->prixVente,
                'type'=>$article->type,
                'unite'=>$article->unite,
                'designation'=>$article->designation,
                'stockMin'=>$article->stockMin,
                'niveauStock'=>$article->niveauStock,
                'location'=>$article->location,
                'fournisseur'=>$article->fournisseur ? $article->fournisseur->nom:null,
                'url'=>$article->getFirstMediaUrl(),
            ]);


        $role= Auth::user()->role_id;


        return Inertia::render('Articles/Index', [
            'articles' => $articles,'roles'=>$role,
        ])->table(function (InertiaTable $table) {
            $table
                ->column(key: 'url', label: 'Image')
                ->column(key: 'nom', searchable: true, sortable: true, canBeHidden: false)
                ->column(key: 'reference', searchable: true, sortable: true)
                ->column(key: 'marque', searchable: true, sortable: true)
                ->column(key: 'prixAchat', label: 'Prix d\'achat', sortable: true)
                ->column(key: 'prixVente', label: 'Prix de vente', sortable: true)
                ->column(key: 'niveauStock', label: 'niveauStock', sortable: true)
                ->column(key: 'fournisseur', sortable: true, searchable: true)
                ->column(label: 'Actions', canBeHidden: false);
        });


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function pdf(){

        $articles = Article::all();

        $pdf = PDF1::loadView('',$articles);
        return $pdf->stream();
    }

    public function report(Request $request, $id){
        $nom = $request->input('nom');
        $articles = Article::all()->where('id',$id);


        $pdf=app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php",true);
        $pdf->loadView('report',compact('articles','nom'));

        return $pdf->download('articles.pdf');

    }




    public function create()
    {
        $fournisseurs = Fournisseur::all()->sortBy('nom')
            ->map->only(['id','nom']);
        return inertia::render('Articles/Create', [
        'fournisseurs' => $fournisseurs,
        ]);
    }





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'reference' => [
                'required',
                'string',
                'alpha_num',
                'max:255',
            ],
            'nom' => [
                'required',
                'string',
                'alpha_num',
                'max:255',
            ],
            'marque' => [
                'required',
                'string',
                'alpha_num',
                'max:255',
            ],
            'prixAchat' => [
                'required',
                'numeric',
            ],
            'prixVente' => [
                'required',
                'numeric',
            ],
            'emplacement' => [
                'required',
                'string',
                'alpha_num',
                'max:255'
            ],
            'type' => [
                'required',
                'string',
                'alpha_num',
                'max:255',
            ],
            'unite' => [
                'required',
                'string',
                'alpha_num',
                'max:255',
            ],
            'designation' => [
                'required',
                'string',
                'alpha_num',
                'max:255',
            ],
            'stockMin' => [
                'required',
                'numeric',
            ],
            'niveauStock' => [
                'required',
                'numeric',
            ],
            'fournisseur_id' => [
                'required',
                'numeric',
            ],
        ]);

        $article = Article::create([
            'nom' => $request->nom,
            'reference' =>$request->reference,
            'marque' => $request->marque,
            'prixAchat' => $request->prixAchat,
            'prixVente' => $request->prixVente,
            'emplacement' => $request->emplacement,
            'type' => $request->type,
            'unite' => $request->unite,
            'designation' => $request->designation,
            'stockMin' => $request->stockMin,
            'niveauStock' => $request->niveauStock,
            'fournisseur_id'=>$request->fournisseur_id,
        ]);

        $article->addAllMediaFromRequest('images')->each(function ($fileAdder) {
            $fileAdder->toMediaCollection();
        });


        return Redirect::route('articles.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $image_urls = $article->getMedia()->map(function ($image) {
            return $image->getUrl();
        });

        return Inertia::render('Articles/Show', [
            'article' => $article,
            'fournisseur'=> $article->fournisseur,
            'urls' => $image_urls,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $fournisseurs = Fournisseur::all()->sortBy('name')
            ->map->only(['id','nom']);
        $media = $article->getMedia()->map(function ($image) {
        return ["url" => $image->getUrl(), "id" => $image->getAttribute('id')];
        });

        return Inertia::render('Articles/Edit', [
            'article' => $article,
            'fournisseurs' => $fournisseurs,
            'media' => $media
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $deletedImages = Media::findMany($request->deleted_media);
        $deletedImages->each(function ($image) {
            $image->delete();
        });
        $article->addAllMediaFromRequest('images')->each(function ($fileAdder) {
            $fileAdder->toMediaCollection();
        });

        $article->update([
            'nom' => $request->nom,
            'reference' =>$request->reference,
            'marque' => $request->marque,
            'prixAchat' => $request->prixAchat,
            'prixVente' => $request->prixVente,
            'emplacement' => $request->emplacement,
            'type' => $request->type,
            'unite' => $request->unite,
            'designation' => $request->designation,
            'stockMin' => $request->stockMin,
            'niveauStock' => $request->niveauStock,
            'fournisseur_id' => $request->fournisseur_id,
        ]
        );

        return Redirect::route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return Redirect::route('articles.index');
    }
}
