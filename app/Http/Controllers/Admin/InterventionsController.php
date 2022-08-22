<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\inertia;
use App\Http\Controllers\InertiaTable;
use App\Http\Controllers\Intervention;
use App\Http\Controllers\interventions;
use App\Http\Controllers\QueryBuilder;
use App\Http\Controllers\Redirect;
use Illuminate\Http\Request;

class InterventionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interventions = QueryBuilder::for(Intervention::class)
        ->defaultSort('dateFin')
        ->allowedSorts(['titre', 'dateFin', 'desc', 'status'])
        ->allowedFilters(['dateDb','dateFin'])
        ->paginate()
        ->withQueryString()
        ->through(fn ($intervention)=>[
        'id'=>$intervention->id,
        'titre'=>$intervention->titre,
        'dateFin'=>$intervention->dateFin,
        'desc'=>$intervention->desc,
        'status'=>$intervention->status,
        'dateDb'=>$intervention->dateDb,
        'dateFin'=>$intervention->dateFin,
        'datFinHTVA'=>$intervention->datFinHTVA,
        'emplacement'=>$intervention->emplacement,
        'type'=>$intervention->type,
        'unite'=>$intervention->unite,
        'unite'=>$intervention->unite,
        'location'=>$intervention->location,
        'interventions'=>$intervention->interventions ? $intervention->interventions->titre:null,
    ]);

    return Inertia::render('Interventions/Index', [
        'interventions' => $interventions,
    ])->table(function (InertiaTable $table) {
        $table
            ->column(key: 'titre', searchable: true, sortable: true, canBeHidden: false)
            ->column(key: 'dateFin', searchable: true, sortable: true)
            ->column(key: 'desc', searchable: true, sortable: true)
            ->column(key: 'status', label: 'status', sortable: true)
            ->column(key: 'dateDb', label: 'dateDb', sortable: true)
            ->column(key: 'dateFin', label: 'dateFin', sortable: true)
            ->column(key: 'datFinHTVA', label: 'datFinHTVA', sortable: true)
            ->column(key: 'emplacement', label: 'emplacement', sortable: true)
            ->column(key: 'type', label: 'type', sortable: true)
            ->column(key: 'unite', label: 'unite', sortable: true)
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
        return inertia::render('Interventions/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        interventions::create([
            'titre' => $request->titre,
            'type' =>$request->type,
            'desc' => $request->desc,
            'status' => $request->status,
            'dateDb' => $request->dateDb,
            'datFin' => $request->datFin,
            'totalHTVA' => $request->totalHTVA,
            'emplacement' => $request->emplacement,
            'type' => $request->type,
            'unite' => $request->unite,
        ]);


        return Redirect::route('interventions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Inertia::render('Interventions/Show', [
            'interventions' => $interventions,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return Inertia::render('Interventions/Edit', [
            'interventions' => $interventions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $intervention->update([
            'titre' => $request->titre,
            'type' =>$request->type,
            'desc' => $request->desc,
            'status' => $request->status,
            'dateDb' => $request->dateDb,
            'datFin' => $request->datFin,
            'totalHTVA' => $request->totalHTVA,
            'emplacement' => $request->emplacement,
            'type' => $request->type,
            'unite' => $request->unite,
        ]
        );
        return Redirect::route('interventions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $intervention->delete();

        return Redirect::route('interventions.index');
    }
}
