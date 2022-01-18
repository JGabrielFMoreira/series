<?php

namespace App\Http\Controllers;


use App\Http\Requests\SeriesFormRequest;
use App\Models\Episodio;
use App\Models\Series;
use App\Models\Temporada;
use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSerie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeriesController extends Controller
{

    public function index(Request $request){

        $series =Series::query()->orderBy('nome')->get();

        $mensagem = $request->session()->get('mensagem');

         return view('series.index',compact('series', 'mensagem'));

    }

    public function create()
    {
        return view('series.create') ;
    }

    public function store(SeriesFormRequest $request, CriadorDeSerie $criadorDeSerie)
    {

        $serie = $criadorDeSerie->criarSerie($request->nome,$request->qtdTemporadas, $request->qtdEpisodios);



        $request->session()->flash('mensagem',"Série {$serie->id} e suas temporadas e episodios - {$serie->nome} inserida com sucesso!!");

        return  redirect()->route('listar_series');


    }

    public function destroy(Request $request, RemovedorDeSerie $removedorDeSerie)
    {

        $nomeSerie = $removedorDeSerie->removerSerie($request->id);
        $request->session()->flash('mensagem',"Série $nomeSerie removida com sucesso");

        return  redirect()->route('listar_series');
    }

    public function editaNome(int $id, Request $request)
    {
        $novoNome = $request->nome;
        $serie = Series::find($request->id);
        $serie->nome = $novoNome;
        $serie->update();

    }

}
