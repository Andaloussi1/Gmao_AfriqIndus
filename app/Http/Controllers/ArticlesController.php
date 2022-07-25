<?php

namespace App\Http\Controllers;

use App\Models\Article;
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
            ->allowedFilters(['nom', 'marque'])
            ->paginate()
            ->withQueryString();


        return Inertia::render('Articles/Index', [
            'articles' => $articles,
        ])->table(function (InertiaTable $table) {
            $table

                ->column(key: 'nom', searchable: true, sortable: true, canBeHidden: false)
                ->column(key: 'marque', searchable: true, sortable: true)
                ->column(key: 'prixAchat', label: 'Prix d\'achat', sortable: true)
                ->column(key: 'prixVente', label: 'Prix de vente', sortable: true)
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
        return inertia::render('Articles/Create');
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
        return Inertia::render('Articles/Show', [
            'article' => $article,
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
