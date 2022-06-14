<?php

namespace App\Http\Controllers;

use App\Http\Requests\FaixaRequest;
use App\Models\Album;
use App\Models\Faixa;
use Illuminate\Support\Facades\Redirect;

class FaixaController extends Controller
{
    /* METÓDO RESPONSÁVEL POR CARREGAR A VIEW DA CRIAÇÃO DA FAIXA 
    *****************************************************************************************/
    public function create($albumId)
    {
        if (!$albuns = Album::find($albumId)) {
            return Redirect::back();
        }
        $title  = 'Criar';
        $action = route('faixa.store', $albuns);
        return view('discografia.faixa.form', compact('albuns', 'title', 'action'));
    }

    /* METÓDO RESPONSÁVEL EM ADICIONAR A FAIXA 
    *****************************************************************************************/
    public function store(FaixaRequest $request, $albumId)
    {
        if (!$albuns = Album::find($albumId)) {
            return Redirect::back();
        }

        $albuns->faixas()->create($request->all());
        return Redirect::route('faixa.create', $albuns->id)->with('faixaAdd', "A faixa {$request->nome_faixa} foi adicionada com sucesso");
    }

    /* METÓDO RESPONSÁVEL POR CARREGAR A VIEW DA EDIÇÃO DA FAIXA 
    *****************************************************************************************/
    public function edit($faixaId)
    {
        if (!$faixa = Faixa::find($faixaId)) {
            return Redirect::back();
        }

        $cd     = $faixa->albuns();
        $title  = 'Editar';
        $action = route('faixa.update', $faixa);
        return view('discografia.faixa.form', compact('cd', 'faixa', 'title', 'action'));
    }

    /* METÓDO RESPONSÁVEL EM ATUALIZAR A FAIXA 
    *****************************************************************************************/
    public function update(FaixaRequest $request, $faixaId)
    {
        if (!$faixa = Faixa::find($faixaId)) {
            return Redirect::back();
        }

        $faixa->update($request->all());

        return Redirect::route('discografia.index', $faixa->album_id)->with('faixaEdit', "A faixa {$request->nome_faixa} foi alterada com sucesso");
    }

    /* METÓDO RESPONSÁVEL EM EXCLUIR A FAIXA 
    *****************************************************************************************/
    public function destroy($faixa)
    {
        Faixa::destroy($faixa);
        return Redirect::route('discografia.index')->with('faixaDel','Faixa excluída com sucesso');
    }
}
