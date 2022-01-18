@extends('layout')


@section('cabecalho')
    Adicionar Séries
@endsection

@section('conteudo')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error )
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <form method="post">
            @csrf
            <div class="row">
                <div class="col col-8">
                    <label for="nome" class="">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome">
                </div>
                <div class="col col-2">
                    <label for="qtdTemporadas">Temporadas</label>
                    <input type="number" class="form-control" name="qtdTemporadas" id="qtdTemporadas">
                </div>
                <div class="col col-2">
                    <label for="qtdEpisodios">Episodios</label>
                    <input type="number" class="form-control" name="qtdEpisodios" id="qtdEpisodios">
                </div>
            </div>
            <button class="btn btn-primary mt-2">Adicionar</button>
        </form>
@endsection
