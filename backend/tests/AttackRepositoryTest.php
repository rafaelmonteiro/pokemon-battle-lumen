<?php

use Illuminate\Filesystem\Filesystem;
use App\Repositories\PokemonRepository;
use App\Repositories\AttackRepository;

class AttackRepositoryTest extends TestCase
{
    private $filesystem;
    private $attackRepository;
    private $pokemonRepository;

    public function __construct()
    {
        $this->filesystem = new Filesystem();
        $this->pokemonRepository = new PokemonRepository();
        $this->attackRepository = new AttackRepository($this->pokemonRepository->findByName('Pikachu'));
    }

    public function testFindByNameExists()
    {
        $this->assertEquals('Quick Attack', $this->attackRepository->findByName('Quick Attack')->getName());
    }

    /**
     * @expectedException \App\Exceptions\AttackNotFoundException
     */
    public function testFindByNameDoesNotExists()
    {
        $this->attackRepository->findByName('Mawashi geri');
    }
    //
    public function testGetRandom()
    {
        $this->assertNotNull($this->attackRepository->getRandom());
    }
}
