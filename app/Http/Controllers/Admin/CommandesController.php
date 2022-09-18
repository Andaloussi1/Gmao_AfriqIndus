<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Commande;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
use Spatie\QueryBuilder\QueryBuilder;


class CommandesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commandes = QueryBuilder::for(Commande::class)
            ->defaultSort('titre')
            ->allowedSorts(['titre', 'description', 'adresseLivraison', 'dateCommande','dateLivraison','status'])
            ->allowedFilters(['titre', 'adresseLivraison'])
            ->paginate()
            ->withQueryString();



        return Inertia::render('Commandes/Index', [
            'commandes' => $commandes,
        ])->table(function (InertiaTable $table) {
            $table
                ->column(key: 'titre', searchable: true, sortable: true, canBeHidden: false)
                ->column(key: 'adresseLivraison', searchable: true, sortable: true)
                ->column(key: 'description', sortable: true)
                ->column(key: 'dateCommande', sortable: true)
                ->column(key: 'dateLivraison', sortable: true)
                ->column(key: 'status', sortable: true)
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

        $articles = Article::all()->sortBy('nom')
            ->map->only('id','nom');
            $fournisseurs = Fournisseur::all()->sortBy('nom')
            ->map->only(['id','nom']);
        return inertia::render('Commandes/Create',[
            'articles' => $articles,
            'fournisseurs' =>$fournisseurs,
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
            'titre' => [
                'required',
                'string',
                'alpha',
                'max:255',
            ],
            'description' => [
                'required',
                'string',
                'alpha_num',
                'max:255',
            ],
            'adresseLivraison' => [
                'required',
                'string',
                'alpha_num',
                'max:255',
            ],
            'dateCommande' => [
                'required',
                'date',
            ],
            'dateLivraison' => [
                'required',
                'date',
            ],
            'status' => [
                'required',
                'string',
                'alpha_num',
                'max:255'
            ],
        ]);

        $commande = Commande::create([
            'titre' => $request->titre,
            'description' =>$request->description,
            'adresseLivraison' => $request->adresseLivraison,
            'dateCommande' => $request->dateCommande,
            'dateLivraison' => $request->dateLivraison,
            'status' => $request->status,
        ]);
        $articles = collect($request->articles)
                    ->map(function($article) {
                        return [((object) $article)->articleId => ((object) $article)->quantite];
        });
        $articles = collect($articles)
            ->groupBy(function ($article) {
                return collect($article)->keys()->first();
            })
            ->map(function ($article) {
                return ['quantite' => collect($article)->flatten()->sum()];
            });

        $articles->each(function ($article, $id) {
            Article::find($id)->increment('niveauStock', ((object) $article)->quantite);
        });

        $commande->articles()->sync($articles);




        return Redirect::route('commandes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function show(Commande $commande)
    {
        $articles = $commande->articles;
        $ligneCommande = array();

        foreach ($articles as $article) {
            $ligneCommande[] = (object) ['nom' => $article->nom, 'tauxTVA' => $article->fournisseur->tauxTVA,
                                'quantite' => $article->pivot->quantite, 'prix' => $article->prixAchat];
        }

        return Inertia::render('Commandes/Show', [
            'commande' => $commande,
            'ligneCommande' => $ligneCommande,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function edit(Commande $commande)
    {
        $articles=Article::all()->sortBy('nom')->map->only('id','nom');
        return Inertia::render('Commandes/Edit', [
            'commande' => $commande,
            'articles'=> $articles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commande $commande)
    {
        $request->validate([
            'titre' => [
                'required',
                'string',
                'alpha',
                'max:255',
            ],
            'description' => [
                'required',
                'string',
                'alpha_num',
                'max:255',
            ],
            'adresseLivraison' => [
                'required',
                'string',
                'alpha_num',
                'max:255',
            ],
            'dateCommande' => [
                'required',
                'date',
            ],
            'dateLivraison' => [
                'required',
                'date',
            ],
            'status' => [
                'required',
                'string',
                'alpha_num',
                'max:255'
            ],

            'total' => [
                'required',
                'numeric',
            ],
            'totalHTVA' => [
                'required',
                'numeric',
            ],
        ]);
        $commande->update([
            'titre' => $request->titre,
            'description' =>$request->description,
            'adresseLivraison' => $request->adresseLivraison,
            'dateCommande' => $request->dateCommande,
            'dateLivraison' => $request->dateLivraison,
            'status' => $request->status,
            'total' => $request->total,
            'totalHTVA' => $request->totalHTVA,
            'article_id'=>$request->article_id,
            ]
        );
        return Redirect::route('commandes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commande $commande)
    {
        $commande->articles->each(function ($article) {
           $article->decrement('niveauStock', $article->pivot->quantite);
        });
        $commande->articles()->detach();
        $commande->delete();

        return Redirect::route('commandes.index');
    }
}
