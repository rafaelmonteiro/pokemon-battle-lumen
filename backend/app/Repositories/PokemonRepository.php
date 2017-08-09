<?php namespace App\Repositories;

use Illuminate\Filesystem\Filesystem;

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

        return reset($pokemons);
    }

    public function getRandom()
    {
        $pokemons = $this->getAll();
        return $pokemons[array_rand($pokemons)];
    }
}
