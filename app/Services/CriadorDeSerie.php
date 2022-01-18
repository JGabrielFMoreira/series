<?php

namespace App\Services;

use App\Models\Series;
use Illuminate\Support\Facades\DB;

class CriadorDeSerie
{
    public function criarSerie(string $nomeSerie, int $qtdTemporadas, int $qtdEpisodios): Series
    {
        DB::beginTransaction();
            $serie = Series::create(['nome' => $nomeSerie]);
            $this->criaTemporadas($qtdTemporadas, $qtdEpisodios, $serie);
        DB::commit();

        return $serie;
    }

    private function criaTemporadas(int $qtdTemporadas, int $qtdEpisodios, Series $serie){

        for($i = 1; $i <= $qtdTemporadas; $i++) {

            $temporada = $serie->temporadas()->create(['numero' => $i]);
            $this->criaEpisodios($qtdEpisodios, $temporada);
        }

    }

    private function criaEpisodios(int $qtdEpisodios, \Illuminate\Database\Eloquent\Model $temporada): void{

        for ($j = 1 ; $j <=$qtdEpisodios; $j++) {

            $temporada->episodios()->create(['numero' => $j]);
        }

    }

}
