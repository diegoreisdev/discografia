{{----------------------------------------------------------------------------------------------
    MENSAGENS SOBRE O ÁLBUM    
-----------------------------------------------------------------------------------------------}}

{{-- MENSAGEM DE ÁLBUM ADICIONADO --}}
@if (session('albumAdd'))
<h5 class="alert alert-light text-primary text-center">{{ session('albumAdd') }}</h5>
@endif

{{-- MENSAGEM DE ÁLBUM EDITADO --}}
@if (session('albumUp'))
<h5 class="alert alert-light text-primary text-center">{{ session('albumUp') }}</h5>
@endif

{{-- MENSAGEM DE ÁLBUM EXCLUÍDO --}}
@if (session('albumDel'))
    <h5 class="alert alert-light text-danger text-center">{{ session('albumDel') }}</h5>
@endif

{{----------------------------------------------------------------------------------------------
    MENSAGENS SOBRE AS FAIXAS    
-----------------------------------------------------------------------------------------------}}

{{-- MENSAGEM DE MÚSICA ADICIONADA --}}
@if (session('faixaAdd'))
    <h5 class="alert alert-light text-primary text-center">{{ session('faixaAdd') }}</h5>
@endif

{{-- MENSAGEM DE MÚSICA EDITADA --}}
@if (session('faixaEdit'))
    <h5 class="alert alert-light text-primary text-center">{{ session('faixaEdit') }}</h5>
@endif

{{-- MENSAGEM DE MÚSICA EXCLUÍDA --}}
@if (session('faixaDel'))
    <h5 class="alert alert-light text-danger text-center">{{ session('faixaDel') }}</h5>
@endif

{{----------------------------------------------------------------------------------------------
    MENSAGENS DE VALIDAÇÕES DOS CAMPOS  
-----------------------------------------------------------------------------------------------}}
@if ($errors->any())
        @foreach ($errors->all() as $erro )
                <p class="text-center text-danger ">{{$erro}}</p>
        @endforeach
@endif
