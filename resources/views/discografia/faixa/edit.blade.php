@extends('layouts.app')
@section('title', 'Editar faixa')

@section('content')
<div class="container bg-color">
    <nav>
        <a href="{{route('discografia.index')}}"
            class="btn btn-outline-secondary rounded-pill px-4 mt-3 btn-sm">Voltar</a>
    </nav>

    @include("includes.msg")
    
    <div class="col-sm-6 offset-sm-3">
        <h4 class="text-center">Editar faixa</h4>
        <form class=" mx-2" action="{{route('faixa.update', $faixa->id)}}" method="POST">
            @method('PUT')
            @include('discografia.faixa.partials.form')
        </form>
    </div>
    
</div>
@endsection