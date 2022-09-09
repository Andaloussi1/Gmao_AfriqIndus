<?php

namespace App\Http\Controllers;

use App\Models\Outil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
use Spatie\QueryBuilder\QueryBuilder;

class OutilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        $outils = QueryBuilder::for(Outil::class)
            ->defaultSort('stock')
            ->allowedSorts(['nom', 'reference', 'marque', 'type', 'stock', 'stockLoue'])
            ->allowedFilters(['nom', 'marque', 'reference', 'type', 'stock', 'stockLoue'])
            ->paginate()
            ->withQueryString();


        return Inertia::render('Outils/Index', [
            'outils' => $outils,
        ])->table(function (InertiaTable $table) {
            $table
                ->column(key: 'nom', searchable: true, sortable: true, canBeHidden: false)
                ->column(key: 'reference', searchable: true, sortable: true)
                ->column(key: 'marque', searchable: true, sortable: true)
                ->column(key: 'stock', sortable: true)
                ->column(key: 'stockLoue', label: 'Stock des outils loués', sortable: true)
                ->column(key: 'type', sortable: true)
                ->column(label: 'Actions', canBeHidden: false);
        });

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia::render('Outils/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Outil::create([
            'nom' => $request->nom,
            'reference' =>$request->reference,
            'marque' => $request->marque,
            'type' => $request->type,
            'stock' => $request->stock,
            'stockLoue' => 0,
        ]);

        return Redirect::route('outils.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Outil  $outil
     * @return \Illuminate\Http\Response
     */
    public function show(Outil $outil)
    {
        dd($outil);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Outil  $outil
     * @return \Illuminate\Http\Response
     */
    public function edit(Outil $outil)
    {
        return Inertia::render('Outils/Edit', [
            'outil' => $outil,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Outil  $outil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Outil $outil)
    {
        $outil->update([
                'nom' => $request->nom,
                'reference' =>$request->reference,
                'marque' => $request->marque,
                'type' => $request->type,
                'stock' => $request->stock
            ]
        );

        return Redirect::route('outils.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outil  $outil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outil $outil)
    {
        $outil->delete();

        return Redirect::route('outils.index');
    }
}
