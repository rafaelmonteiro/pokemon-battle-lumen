<?php

use Illuminate\Filesystem\Filesystem;
use App\Repository\PokemonRepository;

class PokemonRepositoryTest extends TestCase
{
    private $filesystem;
    private $pokemonRepository;

    public function __construct()
    {
        $this->filesystem = new Filesystem();
        $this->pokemonRepository = new PokemonRepository();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetAll()
    {
        $pokemons = json_decode($this->filesystem->get(storage_path('app/pokemons.json')));

        $this->assertEquals($pokemons, $this->pokemonRepository->getAll());
    }

    public function testFindByName()
    {
        $this->assertEquals('Charmander', $this->pokemonRepository->findByName('Charmander')->name);
    }

    public function testGetRandom()
    {
        $this->assertNotNull($this->pokemonRepository->getRandom());
    }
}
