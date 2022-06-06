<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumRequest;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cds = Album::with('faixas')->get();

        if($request->input('procurar')){

            $cds = Album::procurar($request->input('procurar'));
        }
        return view('discografia.album.index', compact('cds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discografia.album.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlbumRequest $request)
    {
        Album::create($request->all());
        return Redirect::route('discografia.index')->with('albumAdd', "Álbum {$request->nome} adicionado com sucesso");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit($album)
    {
        $album = Album::find($album);
        return view('discografia.album.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(AlbumRequest $request, $album)
    {
        $cd = Album::find($album);
        $cd->update($request->all());
        return Redirect::route('discografia.index')->with('albumUp', "Nome do álbum {$request->nome} atualizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        Album::destroy($album->id);
        return Redirect::route('discografia.index')->with('albumDel', "Álbum {$album->nome} excluido com sucesso");
    }
}
