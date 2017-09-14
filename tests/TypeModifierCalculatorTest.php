<?php

use App\Repositories\PokemonRepository;
use App\Repositories\AttackRepository;
use App\TypeModifierCalculator;
use App\DamageType;

class TypeModifierCalculatorTest extends TestCase
{
    private $pokemonRepository;

    public function setUp()
    {
        $this->pokemonRepository = new PokemonRepository();
    }

    public function testDoubleDamagePokemon()
    {
        $player = $this->pokemonRepository->findByName('Pikachu');
        $against = $this->pokemonRepository->findByName('Squirtle');

        $attackRepository = new AttackRepository($player);
        $attack = $attackRepository->findByName('Thunderbolt');

        $typeModifierCalculator = new TypeModifierCalculator($attack, $against);
        $typeModifier = $typeModifierCalculator->calculate();

        $this->assertEquals(DamageType::DOUBLE_DAMAGE, $typeModifier->getId());
    }

    public function testHalfDamagePokemon()
    {
        $player = $this->pokemonRepository->findByName('Pikachu');
        $against = $this->pokemonRepository->findByName('Pikachu');

        $attackRepository = new AttackRepository($player);
        $attack = $attackRepository->findByName('Thunderbolt');

        $typeModifierCalculator = new TypeModifierCalculator($attack, $against);
        $typeModifier = $typeModifierCalculator->calculate();

        $this->assertEquals(DamageType::HALF_DAMAGE, $typeModifier->getId());
    }

    public function testNormalDamagePokemon()
    {
        $player = $this->pokemonRepository->findByName('Pikachu');
        $against = $this->pokemonRepository->findByName('Charmander');

        $attackRepository = new AttackRepository($player);
        $attack = $attackRepository->findByName('Thunderbolt');

        $typeModifierCalculator = new TypeModifierCalculator($attack, $against);
        $typeModifier = $typeModifierCalculator->calculate();

        $this->assertEquals(DamageType::NORMAL, $typeModifier->getId());
    }
}
