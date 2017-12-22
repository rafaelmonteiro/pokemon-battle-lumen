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

    public function testDoubleDamageAttack()
    {
        $player = $this->pokemonRepository->findByName('Pikachu');
        $against = $this->pokemonRepository->findByName('Squirtle');

        $attackRepository = new AttackRepository($player);
        $attack = $attackRepository->findByName('Thunderbolt');

        $typeModifierCalculator = new TypeModifierCalculator($attack, $against);
        $typeModifier = $typeModifierCalculator->calculate();

        $this->assertContains($typeModifier->getId(), [DamageType::DOUBLE_DAMAGE, DamageType::MISSED, DamageType::CRITICAL_2XDAMAGE]);
    }

    public function testHalfDamageAttack()
    {
        $player = $this->pokemonRepository->findByName('Pikachu');
        $against = $this->pokemonRepository->findByName('Pikachu');

        $attackRepository = new AttackRepository($player);
        $attack = $attackRepository->findByName('Thunderbolt');

        $typeModifierCalculator = new TypeModifierCalculator($attack, $against);
        $typeModifier = $typeModifierCalculator->calculate();

        $this->assertContains($typeModifier->getId(), [DamageType::HALF_DAMAGE, DamageType::MISSED, DamageType::CRITICAL_HALF_DAMAGE]);
    }

    public function testNormalDamageAttack()
    {
        $player = $this->pokemonRepository->findByName('Pikachu');
        $against = $this->pokemonRepository->findByName('Charmander');

        $attackRepository = new AttackRepository($player);
        $attack = $attackRepository->findByName('Thunderbolt');

        $typeModifierCalculator = new TypeModifierCalculator($attack, $against);
        $typeModifier = $typeModifierCalculator->calculate();

        $this->assertContains($typeModifier->getId(), [DamageType::NORMAL, DamageType::MISSED, DamageType::CRITICAL]);
    }
}
