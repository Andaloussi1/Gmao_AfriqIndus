<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
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
            ->defaultSort('nom')
            ->allowedSorts(['nom', 'marque', 'prixAchat', 'prixVente'])
            ->allowedFilters(['nom', 'marque','reference'])
            ->paginate()
            ->withQueryString();


        return Inertia::render('Articles/Index', [
            'articles' => $articles,
        ])->table(function (InertiaTable $table) {
            $table
                ->column(key: 'nom', searchable: true, sortable: true, canBeHidden: false)
                ->column(key: 'reference', searchable: true, sortable: true)
                ->column(key: 'marque', searchable: true, sortable: true)
                ->column(key: 'prixAchat', label: 'Prix d\'achat', sortable: true)
                ->column(key: 'prixVente', label: 'Prix de vente', sortable: true)
                ->column(key: 'total', label: 'total', sortable: true)
                ->column(key: 'totalHTVA', label: 'totalHTVA', sortable: true)
                ->column(key: 'type', label: 'type', sortable: true)
                ->column(key: 'unite', label: 'unite', sortable: true)
                ->column(key: 'designation', label: 'designation', sortable: true)
                ->column(key: 'stockMin', label: 'stockMin', sortable: true)
                ->column(key: 'stockInit', label: 'stockInit', sortable: true)
                ->column(key: 'location', label: 'location', sortable: true)
                ->column(label: 'Actions');
        });
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        Article::create([
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
        $fournisseur = Fournisseur::find($article->fournisseur_id);
        return Inertia::render('Articles/Show', [
            'article' => $article,
            'fournisseur' => $fournisseur,
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
        return Inertia::render('Articles/Edit', [
            'article' => $article,
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
