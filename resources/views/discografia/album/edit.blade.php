@extends('layouts.app')
@section('title', 'Editar álbum')

@section('content')
<div class="container bg-color">

    <nav>
        <a href="{{route('discografia.index')}}" class="btn btn-outline-secondary rounded-pill px-4 mt-3 btn-sm">Voltar</a>
    </nav>
    
    <div class="col-sm-6 offset-sm-3">
        <h4 class="text-center">Editar Álbum</h4>
        <form class="form mx-2" action="{{route('discografia.update', $album->id)}}" method="POST">
            @method('PUT')
            @include("discografia.album.partials.form")
        </form>
    </div>
</div>
@endsection