<?php

namespace App\Services;

use App\Models\Episodio;
use App\Models\Series;
use App\Models\Temporada;
use Illuminate\Support\Facades\DB;

class RemovedorDeSerie
{
    public function removerSerie(int $serieId): string
    {
        DB::beginTransaction();
            $serie = Series::find($serieId);
            $nomeSerie = $serie->nome;

            $this->removerTemporadas($serie);
            $serie->delete();
        DB::commit();


        return $nomeSerie;
    }

    /**
     * @param $serie
     * @return void
     */
    private function removerTemporadas(Series $serie): void
    {
        $serie->temporadas->each(function (Temporada $temporada) {
            $this->removerEpisodios($temporada);
            $temporada->delete();
        });

    }

    /**
     * @param Temporada $temporada
     * @return void
     */
    private function removerEpisodios(Temporada $temporada): void
    {
        $temporada->episodios()->each(function (Episodio $episodio) {
            $episodio->delete();
        });

    }
}
