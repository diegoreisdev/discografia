@csrf
<div class="row form-floating ">
    <input class="form-control text-center my-2 rounded-pill shadow-none" name="nome" id="nome" type="text"
        value="{{$album->nome ?? old('nome')}}" placeholder="Nome do álbum" autofocus required>
    <label class="mx-3" for="nome">Nome do álbum:</label>
    @error('nome')
        <span class="text-danger ">{{$message}}</span>
    @enderror
</div>
<button class="btn btn-primary form-control rounded-pill my-3">Salvar</button>