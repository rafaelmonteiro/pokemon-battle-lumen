<?php

use Illuminate\Filesystem\Filesystem;
use App\Repositories\PokemonRepository;

class PokemonRepositoryTest extends TestCase
{
    private $filesystem;
    private $pokemonRepository;

    public function setUp()
    {
        $this->filesystem = new Filesystem();
        $this->pokemonRepository = new PokemonRepository();
    }

    public function testGetAll()
    {
        $pokemons = json_decode($this->filesystem->get(storage_path('app/pokemons.json')));

        $this->assertEquals($pokemons, $this->pokemonRepository->getAll());
    }

    public function testFindByNameExists()
    {
        $this->assertEquals('Charmander', $this->pokemonRepository->findByName('Charmander')->getName());
    }

    /**
     * @expectedException \App\Exceptions\PokemonNotFoundException
     */
    public function testFindByNameDoesNotExists()
    {
        $this->pokemonRepository->findByName('Agumon');
    }

    public function testGetRandom()
    {
        $this->assertNotNull($this->pokemonRepository->getRandom());
    }

    /**
     * @expectedException Exception
     */
    public function testExceptionIfNotReceivedDamage()
    {
        $this->pokemonRepository->findByName('Charmander')->getReceivedDamage();
    }

    /**
     * @expectedException Exception
     */
    public function testExceptionIfNotReceivedAttack()
    {
        $this->pokemonRepository->findByName('Charmander')->getReceivedAttack();
    }

    public function testAvatarExists()
    {
        $this->assertFileExists('public'.$this->pokemonRepository->findByName('Charmander')->getAvatar());
        $this->assertFileExists('public'.$this->pokemonRepository->findByName('Squirtle')->getAvatar());
        $this->assertFileExists('public'.$this->pokemonRepository->findByName('Bulbasaur')->getAvatar());
        $this->assertFileExists('public'.$this->pokemonRepository->findByName('Pikachu')->getAvatar());
    }
}
