<?php

namespace App\Http\Controllers;

use App\Models\AcquisitionOutil;
use App\Models\Fournisseur;
use App\Models\Outil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
use Spatie\QueryBuilder\QueryBuilder;

class AcquisitionOutilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acquisitions_outils = QueryBuilder::for(AcquisitionOutil::class)
            ->defaultSort('date')
            ->allowedSorts(['date', 'outil', 'prix', 'louer', 'quantite', 'periode', 'periodicite', 'fournisseur'])
            ->allowedFilters(['date', 'outil', 'fournisseur'])
            ->paginate()
            ->withQueryString()
            ->through(fn ($acquisition_outils)=>[
                'id'=>$acquisition_outils->id,
                'outil'=>$acquisition_outils->outil? $acquisition_outils->outil->reference:null,
                'prix'=>$acquisition_outils->prix,
                'date'=>$acquisition_outils->date,
                'periode'=>$acquisition_outils->periode,
                'periodicite'=>$acquisition_outils->periodicite,
                'quantite'=>$acquisition_outils->quantite,
                'louer'=>$acquisition_outils->louer,
                'fournisseur'=>$acquisition_outils->fournisseur ? $acquisition_outils->fournisseur->nom: null,
            ]);

        $role= Auth::user()->role_id;

        return Inertia::render('AcquisitionsOutils/Index', [
            'acquisitions_outils' => $acquisitions_outils,'roles'=>$role,
        ])->table(function (InertiaTable $table) {
            $table
                ->column(key: 'outil', label: 'reference', searchable: true, sortable: true)
                ->column(key: 'louer', label: 'Est loué', sortable: true)
                ->column(key: 'date', searchable: true, sortable: true)
                ->column(key: 'prix', sortable: true)
                ->column(key: 'fournisseur', searchable: true, sortable: true)
                ->column(key: 'quantite', sortable: true)
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
        $fournisseurs = Fournisseur::all()->sortBy('nom');
        $outils = Outil::all()->sortBy('nom');

        return inertia::render('AcquisitionsOutils/Create', [
            'outils' => $outils,
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
        AcquisitionOutil::create([
            'outil_id' => $request->outil_id,
            'fournisseur_id' => $request->fournisseur_id,
            'prix' => $request->prix,
            'louer' => $request->louer,
            'periode' => $request->periode,
            'periodicite' => $request->periodicite,
            'date' => $request->date,
            'quantite' => $request->quantite,
            ]);

        $outil = Outil::find($request->outil_id);

        if($request->louer === true) {
            $outil->increment('stockLoue', $request->quantite);
        } else {
            $outil->increment('stock', $request->quantite);
        }

        return Redirect::route('acquisitionsoutils.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AcquisitionOutil  $acquisitionOutil
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $acquisitionOutil = AcquisitionOutil::find($id);

        return Inertia::render('AcquisitionsOutils/Show', [
            'acquisitionOutil' => $acquisitionOutil,
            'fournisseur' => $acquisitionOutil->fournisseur,
            'outil' => $acquisitionOutil->outil,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AcquisitionOutil  $acquisitionOutil
     * @return \Illuminate\Http\Response
     */
    public function edit(AcquisitionOutil $acquisitionOutil)
    {
        return Inertia::render('AcquisitionsOutils/Edit', [
            'acquisitionOutil' => $acquisitionOutil,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AcquisitionOutil  $acquisitionOutil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AcquisitionOutil $acquisitionOutil)
    {
        $acquisitionOutil->update([
                'date' => $request->date,
                'prix' => $request->prix,
                'periode' => $request->periode,
                'periodicite' => $request->periodicite,
                'fournisseur_id' => $request->fournisseur_id,
            ]
        );

        return Redirect::route('acquisitionsoutils.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AcquisitionOutil  $acquisitionOutil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $acquisitionOutil = AcquisitionOutil::find($id);
        $outil = $acquisitionOutil->outil();
        if($acquisitionOutil->louer === true) {
            $outil->decrement('stockLoue', $acquisitionOutil->quantite);
        } else {
            $outil->decrement('stock', $acquisitionOutil->quantite);
        }
        $acquisitionOutil->delete();

        return Redirect::route('acquisitionsoutils.index');
    }
}
