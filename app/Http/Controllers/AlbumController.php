<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumRequest;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AlbumController extends Controller
{
    /* METÓDO RESPONSÁVEL POR CARREGAR A VIEW PRINCIPAL  
    *****************************************************************************************/
    public function index(Request $request)
    {
        $cds = Album::with('faixas')->get();
        if ($request->input('procurar')) {

            $cds = Album::procurar($request->input('procurar'));
        }
        return view('discografia.album.index', compact('cds'));
    }

    /* METÓDO RESPONSÁVEL POR CARREGAR A VIEW DA CRIAÇÃO DO ÁLBUM 
    *****************************************************************************************/
    public function create()
    {
        $title  = 'Criar';
        $action = route('discografia.store');
        return view('discografia.album.form', compact('title', 'action'));
    }

    /* METÓDO RESPONSÁVEL EM ADICIONAR O ÁLBUM 
    *****************************************************************************************/
    public function store(AlbumRequest $request)
    {
        Album::create($request->all());
        return Redirect::route('discografia.index')->with('albumAdd', "Álbum {$request->nome} adicionado com sucesso");
    }

    /* METÓDO RESPONSÁVEL POR CARREGAR A VIEW DE EDIÇÃO DO ÁLBUM 
    *****************************************************************************************/
    public function edit($album)
    {
        $title  = 'Editar';
        $action = route('discografia.update', $album);
        $album  = Album::find($album);
        return view('discografia.album.form', compact('album', 'title', 'action'));
    }

    /* METÓDO RESPONSÁVEL EM ATUALIZAR O ÁLBUM
    *****************************************************************************************/
    public function update(AlbumRequest $request, $album)
    {
        $cd = Album::find($album);
        $cd->update($request->all());
        return Redirect::route('discografia.index')->with('albumUp', "Nome do álbum {$request->nome} atualizado");
    }

    /* METÓDO RESPONSÁVEL EM EXCLUIR O ÁLBUM
    *****************************************************************************************/
    public function destroy(Album $album)
    {
        Album::destroy($album->id);
        return Redirect::route('discografia.index')->with('albumDel', "Álbum {$album->nome} excluido com sucesso");
    }
}
