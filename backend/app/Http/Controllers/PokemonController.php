<?php

namespace App\Http\Controllers;

use App\Pokemon;
use Illuminate\Http\Request;
use App\Repositories\PokemonRepository;

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
        $this->validate($request, [
            'name' => 'required'
        ]);

        try {
            $player = $this->pokemonRepository->findByName($request->input('name'));

            return ['player' => $player, 'against' => $this->pokemonRepository->getRandom()];
        } catch (\App\Exceptions\PokemonNotFoundException $e) {
            return response()->json($e->getMessage(), 404);
        }
    }

    public function hit(Request $request)
    {
        $this->validate($request, [
            'player.name' => 'required',
            'player.attack' => 'required',
            'player.currentHealth' => 'required',
            'against.name' => 'required',
            'against.currentHealth' => 'required',
        ]);

        try {
            $player = $this->pokemonRepository->findByName($request->input('player.name'));
            $player->setHealth($request->input('player.currentHealth'));

            $against = $this->pokemonRepository->findByName($request->input('against.name'));
            $against->setHealth($request->input('against.currentHealth'));
        } catch (\App\Exceptions\PokemonNotFoundException $e) {
            return response()->json($e->getMessage(), 404);
        }
        
        return $player->hit($request->input('player.attack'), $against);
    }
}
