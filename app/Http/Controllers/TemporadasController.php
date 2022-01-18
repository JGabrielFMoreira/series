<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

class TemporadasController extends Controller
{
    public function index(int $serieId)
    {
        $serie = Series::find($serieId);
        $temporadas = $serie->temporadas;
       return view('temporadas.index', compact('serie','temporadas'));
    }
}

