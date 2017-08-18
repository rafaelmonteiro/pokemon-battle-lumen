<?php

use App\Repositories\PokemonRepository;
use App\Repositories\AttackRepository;
use App\TypeModifierCalculator;
use App\DamageType;

class TypeModifierCalculatorTest extends TestCase
{
    private $pokemonRepository;

    public function __construct()
    {
        $this->pokemonRepository = new PokemonRepository();
    }

    public function testElectricAttackAgainstWaterPokemon()
    {
        $player = $this->pokemonRepository->findByName('Pikachu');
        $player->setHealth(100);

        $against = $this->pokemonRepository->findByName('Squirtle');
        $against->setHealth(100);

        $attackRepository = new AttackRepository($player);
        $attack = $attackRepository->findByName('Thunderbolt');

        $typeModifierCalculator = new TypeModifierCalculator($attack, $against);
        $typeModifier = $typeModifierCalculator->calculate();
        
        $this->assertEquals(DamageType::DOUBLE_DAMAGE, $typeModifier->getId());
    }
}
