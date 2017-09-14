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

$app->get('/', function(){
    return 'Pokemon API';
});
$app->get('/all', 'PokemonController@all');
$app->options('/select', function(){
    return '';
});
$app->post('/select', 'PokemonController@select');
$app->options('/hit', function(){
    return '';
});
$app->post('/hit', 'PokemonController@hit');