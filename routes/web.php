<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/all', 'PokemonController@all');
$app->options('/select', 'PokemonController@select');
$app->post('/select', 'PokemonController@select');
$app->options('/hit', 'PokemonController@hit');
$app->post('/hit', 'PokemonController@hit');