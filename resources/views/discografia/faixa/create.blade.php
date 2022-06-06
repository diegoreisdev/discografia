@extends('layouts.app')
@section('title', 'Nova faixa')

@section('content')
<div class="container bg-color">

    <nav>
        <a href="{{route('discografia.index')}}" class="btn btn-outline-secondary rounded-pill px-4 mt-3 btn-sm">Voltar</a>
    </nav>

    @include("includes.msg")
    
    <div class="col-sm-6 offset-sm-3">
        <h2>Álbum: {{$albuns->nome}}</h2>
        <h4 class="text-center">Nova faixa</h4>
        <form class="form mx-2" action="{{route('faixa.store', $albuns->id)}}" method="POST">
            @csrf  
            @include('discografia.faixa.partials.form')
        </form>
    </div>

</div>
@endsection