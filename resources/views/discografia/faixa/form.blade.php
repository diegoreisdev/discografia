@extends('layouts.app')
@section('title', "$title faixa")

@section('content')
<div class="container bg-color">
    <nav>
        <a href="{{route('discografia.index')}}" class="btn btn-outline-secondary rounded-pill px-4 mt-3 btn-sm">Voltar</a>
    </nav>

    @include("includes.msg")

    <div class="col-sm-6 offset-sm-3">
        <h2>{{ $albuns->nome ?? '' }}</h2>
        <h4 class="text-center">{{$title}} faixa</h4>
        <form class=" mx-2" action="{{$action}}" method="POST">
            @isset($faixa)
                @method('PUT')
            @endisset
            @csrf
            {{-- NÚMERO DA FAIXA --}}
            <label for="numero">Número da faixa</label>
            <input class="col-sm-4 rounded-pill shadow-none form-control my-1"
                value="{{ old('numero', $faixa->numero ?? '')}}" name="numero" id="numero" type="text" placeholder="00">

                {{-- NOME DA FAIXA --}}
            <label for="nome_faixa">Nome da faixa</label>
            <input class="col-sm-4 rounded-pill shadow-none form-control my-1"
                value="{{old('nome_faixa', $faixa->nome_faixa ?? '')}}" name="nome_faixa" id="nome_faixa" type="text"
                placeholder="Música">

                {{-- DURAÇÃO DA FAIXA --}}
            <label for="duracao">Duração da faixa</label>
            <input class="col-sm-4 rounded-pill shadow-none form-control my-1"
                value="{{ old('duracao', $faixa->duracao ?? '')}}" name="duracao" id="duracao" type="time"
                placeholder="00:00">

            <button class="btn btn-primary form-control rounded-pill my-3">Salvar</button>
        </form>
    </div>

</div>
@endsection