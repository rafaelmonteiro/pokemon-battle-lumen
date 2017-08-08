<?php

namespace App\Http\Controllers;

use App\Pokemon;
use Illuminate\Http\Request;
use App\Repository\PokemonRepository;

class PokemonController extends Controller
{
    private $pokemonRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PokemonRepository $pokemonRepository)
    {
        $this->pokemonRepository = $pokemonRepository;
    }

    public function all()
    {
        return $this->pokemonRepository->getAll();
    }

    public function select(Request $request)
    {
        $pokemon = $this->pokemonRepository->findByName($request->input('name'));

        $pokemons = $this->all();

        if (!empty($pokemon))
        {
            return ['player'=>$pokemon, 'against' => $this->pokemonRepository->getRandom()];
        }
        return ['errors'=>'Please select a valid Pokemon'];
    }

    public function hit(Request $request)
    {
        $model = new Pokemon;
        return $model->hit($request);
    }
}
