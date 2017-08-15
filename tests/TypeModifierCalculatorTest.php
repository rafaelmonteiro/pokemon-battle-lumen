<?php

use Illuminate\Filesystem\Filesystem;
use App\Repositories\PokemonRepository;
use App\Repositories\AttackRepository;
use App\TypeModifierCalculator;
use App\DamageType;

class TypeModifierCalculatorTest extends TestCase
{
    private $pokemonRepository;
    private $attackRepository;

    public function __construct()
    {
        $this->pokemonRepository = new PokemonRepository();
    }

    public function testElectricAttackAgainstWaterPokemon()
    {
        $player = $this->pokemonRepository->findByName('Squirtle');
        $player->setHealth(100);

        $against = $this->pokemonRepository->findByName('Pikachu');
        $against->setHealth(100);

        $attackRepository = new AttackRepository($player);
        $attack = $attackRepository->findByName('Water Gun');

        $typeModifierCalculator = new TypeModifierCalculator($attack, $against);
        $typeModifier = $typeModifierCalculator->calculate();

        $this->assertEquals(DamageType::DOUBLE_DAMAGE, $typeModifier->getId());
    }
}
