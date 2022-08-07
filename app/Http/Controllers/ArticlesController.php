<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Fournisseur;
use App\Models\Media;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Reference;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
use Spatie\QueryBuilder\QueryBuilder;
use Barryvdh\DomPDF\PDF as PDF1;



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
            ->allowedSorts(['nom', 'marque', 'prixAchat', 'prixVente'])
            ->allowedFilters(['nom', 'marque', 'reference'])
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
            'stockInit'=>$article->stockInit,
            'location'=>$article->location,
            'fournisseur'=>$article->fournisseur ? $article->fournisseur->nom:null,
        ]);

        return Inertia::render('Articles/Index', [
            'articles' => $articles,
        ])->table(function (InertiaTable $table) {
            $table
                ->column(key: 'nom', searchable: true, sortable: true, canBeHidden: false)
                ->column(key: 'reference', searchable: true, sortable: true)
                ->column(key: 'marque', searchable: true, sortable: true)
                ->column(key: 'prixAchat', label: 'Prix d\'achat', sortable: true)
                ->column(key: 'prixVente', label: 'Prix de vente', sortable: true)
                ->column(key: 'type', label: 'type', sortable: true)
                ->column(key: 'unite', label: 'unite', sortable: true)
                ->column(key: 'designation', label: 'designation', sortable: true)
                ->column(key: 'stockMin', label: 'stockMin', sortable: true)
                ->column(key: 'stockInit', label: 'stockInit', sortable: true)
                ->column(key: 'niveauStock', label: 'niveauStock', sortable: true)
                ->column(key: 'location', label: 'location', sortable: true)
                ->column(key: 'fournisseur', searchable: true, sortable: true, canBeHidden: false)
                ->column(label: 'Actions');
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
        $fournisseurs = Fournisseur::all()->sortBy('name')
            ->map->only('id','nom');
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

        $article = Article::create([
            'nom' => $request->nom,
            'reference' =>$request->reference,
            'marque' => $request->marque,
            'prixAchat' => $request->prixAchat,
            'prixVente' => $request->prixVente,
            'total' => $request->total,
            'totalHTVA' => $request->totalHTVA,
            'emplacement' => $request->emplacement,
            'type' => $request->type,
            'unite' => $request->unite,
            'designation' => $request->designation,
            'stockMin' => $request->stockMin,
            'stockInit' => $request->stockInit,
            'niveauStock' => $request->niveauStock,
            'fournisseur_id'=>$request->fournisseur_id,
        ]);

        $article->addMediaFromRequest('image')->toMediaCollection();


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
        $image_url = $article->getFirstMediaUrl();
        return Inertia::render('Articles/Show', [
            'article' => $article,
            'fournisseur'=> $article->fournisseur,
            'url' => $image_url,
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
            ->map->only('id','nom');

        return Inertia::render('Articles/Edit', [
            'article' => $article,
            'fournisseurs' => $fournisseurs,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->update([
            'nom' => $request->nom,
            'reference' =>$request->reference,
            'marque' => $request->marque,
            'prixAchat' => $request->prixAchat,
            'prixVente' => $request->prixVente,
            'total' => $request->total,
            'totalHTVA' => $request->totalHTVA,
            'emplacement' => $request->emplacement,
            'type' => $request->type,
            'unite' => $request->unite,
            'designation' => $request->designation,
            'stockMin' => $request->stockMin,
            'stockInit' => $request->stockInit,
            'niveauStock' => $request->niveauStock,
            'fournisseur_id'=>$request->fournisseur_id,
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
