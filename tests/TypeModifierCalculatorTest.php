<?php

use App\Repositories\PokemonRepository;
use App\Repositories\AttackRepository;
use App\TypeModifierCalculator;
use App\DamageType;

class TypeModifierCalculatorTest extends TestCase
{
    private $pokemonRepository;
    private $randomness;

    public function setUp()
    {
        $this->pokemonRepository = new PokemonRepository();
        $this->randomness = 50;
    }

    public function testDoubleDamageAttack()
    {
        $player = $this->pokemonRepository->findByName('Pikachu');
        $against = $this->pokemonRepository->findByName('Squirtle');

        $attackRepository = new AttackRepository($player);
        $attack = $attackRepository->findByName('Thunderbolt');

        $typeModifierCalculator = new TypeModifierCalculator($attack, $against, $this->randomness);
        $typeModifier = $typeModifierCalculator->calculate();

        $this->assertEquals($typeModifier->getId(), DamageType::DOUBLE_DAMAGE);
    }

    public function testHalfDamageAttack()
    {
        $player = $this->pokemonRepository->findByName('Pikachu');
        $against = $this->pokemonRepository->findByName('Pikachu');

        $attackRepository = new AttackRepository($player);
        $attack = $attackRepository->findByName('Thunderbolt');

        $typeModifierCalculator = new TypeModifierCalculator($attack, $against, $this->randomness);
        $typeModifier = $typeModifierCalculator->calculate();

        $this->assertEquals($typeModifier->getId(), DamageType::HALF_DAMAGE);
    }

    public function testNormalDamageAttack()
    {
        $player = $this->pokemonRepository->findByName('Pikachu');
        $against = $this->pokemonRepository->findByName('Charmander');

        $attackRepository = new AttackRepository($player);
        $attack = $attackRepository->findByName('Thunderbolt');

        $typeModifierCalculator = new TypeModifierCalculator($attack, $against, $this->randomness);
        $typeModifier = $typeModifierCalculator->calculate();

        $this->assertEquals($typeModifier->getId(), DamageType::NORMAL);
    }

    public function testMissedAttack()
    {
        $player = $this->pokemonRepository->findByName('Charmander');
        $against = $this->pokemonRepository->findByName('Squirtle');

        $attackRepository = new AttackRepository($player);
        $attack = $attackRepository->findByName('Ember');

        $this->randomness = 5;
        $typeModifierCalculator = new TypeModifierCalculator($attack, $against, $this->randomness);
        $typeModifier = $typeModifierCalculator->calculate();

        $this->assertEquals($typeModifier->getId(), DamageType::MISSED);
    }

    public function testCriticalDamageAttack()
    {
        $player = $this->pokemonRepository->findByName('Pikachu');
        $against = $this->pokemonRepository->findByName('Charmander');

        $attackRepository = new AttackRepository($player);
        $attack = $attackRepository->findByName('Thunderbolt');

        $this->randomness = 95;
        $typeModifierCalculator = new TypeModifierCalculator($attack, $against, $this->randomness);
        $typeModifier = $typeModifierCalculator->calculate();

        $this->assertEquals($typeModifier->getId(), DamageType::CRITICAL);
    }
}
