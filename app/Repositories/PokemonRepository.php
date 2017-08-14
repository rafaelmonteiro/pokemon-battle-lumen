<?php namespace App\Repositories;

use Illuminate\Filesystem\Filesystem;
use App\Exceptions\PokemonNotFoundException;
use App\Pokemon;

class PokemonRepository {
    private $filesystem;

    public function __construct()
    {
        $this->filesystem = new Filesystem();
    }

    public function getAll()
    {
        return json_decode($this->filesystem->get(storage_path('app/pokemons.json')));
    }

    public function findByName($name)
    {
        $pokemons = array_filter($this->getAll(), function($pokemon) use ($name) {
            return $pokemon->name === $name;
        });

        if (empty($pokemons)) {
            throw new PokemonNotFoundException("The pokémon '$name' does not exist!");
        }

        $pokemonFound = reset($pokemons);
        $pokemon = new Pokemon($pokemonFound->name, $pokemonFound->type,
            $pokemonFound->avatar, $pokemonFound->health, $pokemonFound->agility,
            $pokemonFound->attack, $pokemonFound->defense, $pokemonFound->attacks
        );

        return $pokemon;
    }

    public function getRandom()
    {
        $pokemons = $this->getAll();
        $pokemonFound = $pokemons[array_rand($pokemons)];

        return new Pokemon($pokemonFound->name, $pokemonFound->type,
            $pokemonFound->avatar, $pokemonFound->health, $pokemonFound->agility,
            $pokemonFound->attack, $pokemonFound->defense, $pokemonFound->attacks
        );
    }
}
