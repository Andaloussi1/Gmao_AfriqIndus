<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
use Spatie\QueryBuilder\QueryBuilder;

class FournisseursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fournisseurs = QueryBuilder::for(Fournisseur::class)
            ->defaultSort('nom')
            ->allowedSorts(['nom', 'tel', 'code', 'email', 'tauxTVA', 'code', 'adresse', 'telSec', 'numTVA'])
            ->allowedFilters(['nom', 'code'])
            ->paginate()
            ->withQueryString();


        return Inertia::render('Fournisseurs/Index', [
            'fournisseurs' => $fournisseurs,
        ])->table(function (InertiaTable $table) {
            $table

                ->column(key: 'nom', searchable: true, sortable: true, canBeHidden: false)
                ->column(key: 'tel', searchable: true, sortable: true)
                ->column(key: 'email', label: 'email', sortable: true)
                ->column(key: 'tauxTVA', label: 'tauxTVA', sortable: true)
                ->column(key: 'code', label: 'code', sortable: true)
                ->column(key: 'adresse', label: 'adresse', sortable: true)
                ->column(key: 'telSec', label: 'telSec', sortable: true)
                ->column(key: 'numTVA', label: 'numTVA', sortable: true)
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
        return inertia::render('Fournisseurs/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Fournisseur::create([
            'nom' => $request->nom,
            'tel' =>$request->tel,
            'email' => $request->email,
            'tauxTVA' => $request->tauxTVA,
            'code' => $request->code,
            'remarque' => $request->remarque,
            'adresse' => $request->adresse,
            'numTVA' => $request->numTVA,
            'active' => $request->active,
            'telSec' => $request->telSec,
        ]);

        return Redirect::route('fournisseurs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function show(Fournisseur $fournisseur)
    {
        return Inertia::render('Fournisseurs/Show', [
            'fournisseur' => $fournisseur,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function edit(Fournisseur $fournisseur)
    {
        return Inertia::render('Fournisseurs/Edit', [
            'fournisseur' => $fournisseur,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fournisseur $fournisseur)
    {
        $fournisseur->update([
            'nom' => $request->nom,
            'tel' =>$request->tel,
            'email' => $request->email,
            'tauxTVA' => $request->tauxTVA,
            'code' => $request->code,
            'remarque' => $request->remarque,
            'adresse' => $request->adresse,
            'numTVA' => $request->numTVA,
            'active' => $request->active,
            'telSec' => $request->telSec,
        ]
        );
        return Redirect::route('fournisseur.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fournisseur $fournisseur)
    {
        $fournisseur->delete();

        return Redirect::route('fournisseurs.index');
    }
}
