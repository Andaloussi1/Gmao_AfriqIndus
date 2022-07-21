<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::all();
        return Inertia::render('Articles/index',compact('article'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Articles/create');
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
            'reference' =>$request->ref,
            'nom' => $request->nom,
            'marque' => $request->marque,
            'prixAchat' => $request->prixAchat,
            'prixVente' => $request->prixVente,
            'type' => $request->type,
            'emplacement' => $request->emplacement,
            'stockInit' => $request->stockInit,


        ]);
        return Redirect::route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Inertia::render('Articles/Edit', [
            'article' => Post::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $post)
    {
        $data = Request::validate([
            'Nom' => ['required'],
            'Reference' => ['required'],
            'Marque' => ['required'],
            'PrixAchat' => ['required'],
            'PrixVente' => ['required'],
            'Type' => ['required'],
        ]);
        $post->update($data);


        return Redirect::route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $post)
    {
        $post->delete();

        return Redirect::route('articles.index');
    }
}
