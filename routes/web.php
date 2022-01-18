<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/series', 'App\Http\Controllers\SeriesController@index')->name('listar_series');
Route::get('/series/criar', 'App\Http\Controllers\SeriesController@create')->name('criar_serie')->middleware('auth');
Route::post('/series/criar', 'App\Http\Controllers\SeriesController@store')->middleware('auth');
Route::delete('/series/{id}', 'App\Http\Controllers\SeriesController@destroy')->middleware('auth');

Route::post('/series/{id}/editaNome', 'App\Http\Controllers\SeriesController@editaNome')->middleware('auth');



Route::get('/series/{serieId}/temporadas', 'App\Http\Controllers\TemporadasController@index');
Route::get('/temporadas/{temporada}/episodios', 'App\Http\Controllers\EpisodiosController@index');
Route::post('/temporadas/{temporada}/episodios/assistir', 'App\Http\Controllers\EpisodiosController@assistir')->middleware('auth');


Route::get('/entrar', 'App\Http\Controllers\EntrarController@index');
Route::post('/entrar', 'App\Http\Controllers\EntrarController@entrar');

Route::get('/registrar', 'App\Http\Controllers\RegistroController@create');
Route::post('/registrar', 'App\Http\Controllers\RegistroController@store');

Route::get('/sair', function (){

    Auth::logout();
    return redirect('/entrar');

});
