@extends('layouts.app')
@section('title', 'Discografia')

@section('content')
<div class="container bg-color p-3">
    <nav>
        <a href="{{ route('discografia.create') }}"
            class="btn btn-outline-secondary rounded-pill px-4 mt-3 btn-sm">Adicionar álbum</a>
        @include("includes.msg")

        <div class="text-secondary pt-3 mx-2">Digite uma palavra chave</div>

        <form action="{{ route('discografia.index') }}" method="GET" class="d-flex justify-content-between my-2 ">
            <input class="form-control shadow-none rounded-pill p-2 mx-1" name="procurar" type="text">
            <button class="btn col-lg-2 btn-primary rounded-pill">Procurar</button>
        </form>

    </nav>
    <main>
        <section class="mt-2 mx-2">
            <div class="row mx-2">
                @forelse ($cds as $cd)
                {{-- INÍCIO DA TABELA --}}
                <table class="">
                        <div>
                            {{-- NOME DO ÁLBUM --}}
                            <span class="nav-link text-dark col-sm-4 "><strong>Álbum:&nbsp{{ $cd->nome }}</strong></span>

                            {{-- ADICIONAR MÚSICA --}}
                            <a class="btn btn-outline-secondary rounded-pill btn-sm" href="{{ route('faixa.create', $cd->id) }}">+ Música</a>

                            {{-- EDITAR O ÁLBUM --}}
                            <a class="btn btn-outline-secondary rounded-pill btn-sm" href="{{route('discografia.edit', $cd->id)}}">Editar álbum</a>

                            {{-- EXCLUIR O ÁLBUM --}}
                            <a class="btn btn-outline-secondary rounded-pill btn-sm" href="{{route('discografia.destroy', $cd->id)}}"
                                onclick="return confirm('Tem certeza que deseja excluir o álbum {{$cd->nome}}?')">Excluir álbum
                            </a>
                        </div>
                    </tr>
                        <thead>
                            <th class="col-sm-1">N°</th>
                            <th class="col-sm-8">Faixa</th>
                            <th class="col-sm-1">Duração</th>
                            <th class="col-sm-2 text-center">Ações</th>
                        </thead>
                    </tr>
                    <tr>
                        @foreach ($cd->faixas as $faixa)
                        <tbody>
                            <td>{{$faixa->numero}}</td>
                            <td>{{$faixa->nome_faixa}}</td>
                            <td class="text-center">{{$faixa->duracao}}</td>
                            <td class="text-center">
                                <a class="btn btn-outline-secondary btn-sm rounded-pill"
                                    href="{{route('faixa.edit', $faixa->id )}}">Editar
                                </a>
                                <a class="btn btn-outline-secondary btn-sm mb-1 rounded-pill"
                                    href="{{route('faixa.destroy', $faixa->id )}}"
                                    onclick="return confirm('Tem certeza que deseja excluir a faixa {{$faixa->nome_faixa}}?')">Excluir
                                </a>
                            </td>
                        </tbody>
                        @endforeach
                    </tr>
                    @empty
                    <span class="text-center text-secondary fs-5 fst-italic">Nenhum álbum encontrado</span>
                    @endforelse
                </table>
                {{-- FIM DA TABELA --}}
            </div>
        </section>
    </main>
</div>
@endsection