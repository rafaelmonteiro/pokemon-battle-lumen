<?php

namespace App\Http\Controllers;

use App\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
    public function all()
    {
        return Pokemon::getPokemons();
    }

    public function select(Request $request)
    {
        $pokemons = $this->all();
        $key = array_search($request->input('name'), array_column($pokemons, 'name'));
        if($key !== false)
        {
            return ['player'=>$pokemons[$key],'against'=>$pokemons[array_rand($pokemons)]];
        }
        return ['errors'=>'Please select a valid Pokemon'];
    }

    public function hit(Request $request)
    {
        $model = new Pokemon;
        return $model->hit($request);        
    }
}
