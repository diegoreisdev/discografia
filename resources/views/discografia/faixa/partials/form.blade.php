@csrf            
<label for="numero">Número da faixa</label>
<input class="col-sm-4 rounded-pill shadow-none form-control my-1" value="{{$faixa->numero ?? old('numero')}}" name="numero"
    id="numero" type="text" placeholder="00">

<label for="nome_faixa">Nome da faixa</label>
<input class="col-sm-4 rounded-pill shadow-none form-control my-1" value="{{$faixa->nome_faixa ?? old('nome_faixa')}}"
    name="nome_faixa" id="nome_faixa" type="text" placeholder="Música">

<label for="duracao">Duração da faixa</label>
<input class="col-sm-4 rounded-pill shadow-none form-control my-1" value="{{$faixa->duracao ?? old('duracao')}}"
    name="duracao" id="duracao" type="time" placeholder="00:00">

<button class="btn btn-primary form-control rounded-pill my-3">Salvar</button>