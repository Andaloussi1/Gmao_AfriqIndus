<?php

namespace App\Http\Controllers;

use App\Models\Outil;
use App\Models\OutilStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\QueryBuilder\QueryBuilder;


class OutilsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $outil = OutilStock::where('reference' , '=' , $request->reference);

        if(isset($outil)){
            $outil->increment('stock', $request->quantite);
        }
        else{
            OutilStock::create([
                'reference' => $request->reference,
                'nom' => $request->nom,
                'marque' => $request->marque,
                'type' => $request->type,
                'stock' => $request->quantite,
        ]);}

        
        Outil::create([
            'reference' => $request->reference,
            'prix' =>$request->prix,
            'louer' => $request->louer,
            'periode' => $request->periode,
            'periodicite' => $request->periodicite,
            'date' => $request->date,
            'quantite' => $request->quantite,
            'fournisseur_id' => $request->fournisseur_id,
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Outil  $outil
     * @return \Illuminate\Http\Response
     */
    public function edit(Outil $outil)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outil  $outil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outil $outil)
    {
        //
    }
}
