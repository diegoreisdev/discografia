@extends('layouts.app')
@section('title', "$title álbum")

@section('content')
<div class="container bg-color">

    <nav>
        <a href="{{route('discografia.index')}}"
            class="btn btn-outline-secondary rounded-pill px-4 mt-3 btn-sm">Voltar</a>
    </nav>

    <div class="col-sm-6 offset-sm-3">
        <h4 class="text-center">{{$title}} Álbum</h4>
        <form class="form mx-2" action="{{$action}}" method="POST">
            @isset($album)
                @method('PUT')                
            @endisset
            @csrf
            <div class="row form-floating ">
                {{-- NOME DO ÁLBUM --}}
                <input class="form-control text-center my-2 rounded-pill shadow-none" name="nome" id="nome" type="text"
                    value="{{ old('nome', $album->nome ?? '')}}" placeholder="Nome do álbum" autofocus required>
                <label class="mx-3" for="nome">Nome do álbum:</label>
                @error('nome')
                    <span class="text-danger ">{{$message}}</span>
                @enderror
            </div>
            <button class="btn btn-primary form-control rounded-pill my-3">Salvar</button>
        </form>
    </div>
</div>
@endsection