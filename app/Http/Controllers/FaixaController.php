<?php

namespace App\Http\Controllers;

use App\Http\Requests\FaixaRequest;
use App\Models\Album;
use App\Models\Faixa;
use Illuminate\Support\Facades\Redirect;

class FaixaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($albumId)
    {
        if (!$albuns = Album::find($albumId)) {
            return Redirect::back();
        }
        $faixas = $albuns->faixas()->get();
        return view('discografia.faixa.index', compact('albuns', 'faixas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($albumId)
    {
        if (!$albuns = Album::find($albumId)) {
            return Redirect::back();
        }
        return view("discografia.faixa.create", compact('albuns'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaixaRequest $request, $albumId)
    {
        if (!$albuns = Album::find($albumId)) {
            return Redirect::back();
        }

        $albuns->faixas()->create($request->all());
        return Redirect::route('faixa.create', $albuns->id)->with('faixaAdd', "A faixa {$request->nome_faixa} foi adicionada com sucesso");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faixa  $faixa
     * @return \Illuminate\Http\Response
     */
    public function edit($faixaId)
    {
        if (!$faixa = Faixa::find($faixaId)) {
            return Redirect::back();
        }

        $cd = $faixa->albuns();
        return view('discografia.faixa.edit', compact('cd', 'faixa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faixa  $faixa
     * @return \Illuminate\Http\Response
     */
    public function update(FaixaRequest $request, $faixaId)
    {
        if (!$faixa = Faixa::find($faixaId)) {
            return Redirect::back();
        }

        $faixa->update($request->all());

        return Redirect::route('discografia.index', $faixa->album_id)->with('faixaEdit', "A faixa {$request->nome_faixa} foi alterada com sucesso");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $faixa
     * @return \Illuminate\Http\Response
     */
    public function destroy($faixa)
    {
        Faixa::destroy($faixa);
        return Redirect::route('discografia.index')->with('faixaDel','Faixa excluída com sucesso');
    }
}
