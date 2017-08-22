<?php namespace App;

use App\Damage\CriticalModifier;
use App\Damage\DamageBase;
use App\Damage\RandomModifier;
use App\Damage\TypeModifier;

class DamageCalculator {
    private $playerAttack;
    private $againstPokemon;

    public function __construct(Attack $playerAttack, Pokemon $against)
    {
        $this->playerAttack = $playerAttack;
        $this->againstPokemon = $against;
    }

    public function calculate()
    {
        $playerPokemon = $this->playerAttack->getPokemon();

        $causedDamage = new DamageBase(15, $this->playerAttack->getPower(), $playerPokemon->getAttack(), $this->againstPokemon->getDefense());

        $causedDamage = new TypeModifier($causedDamage);
        $defenseType = AttackType::getValue($this->againstPokemon->getType());
        $attackType = AttackType::getValue($this->playerAttack->getType());
        $causedDamage->setTypes($attackType, $defenseType);

        $causedDamage = new CriticalModifier($causedDamage);
        $causedDamage->setBaseSpeed($playerPokemon->getAgility());

        $causedDamage = new RandomModifier($causedDamage);

        /*
         * FIXME: Using old TypeModifier... Decouple in-battle accuracy logic and damage messages to remove this class!
         */
        $typeModifierCalculator = new TypeModifierCalculator($this->playerAttack, $this->againstPokemon);
        $playerTypeModifier = $typeModifierCalculator->calculate();

        return new Damage($causedDamage->calculate(), $playerTypeModifier);
    }

    /**
     * Get the value of Player Attack
     *
     * @return mixed
     */
    public function getPlayerAttack()
    {
        return $this->playerAttack;
    }

    /**
     * Get the value of Against Pokemon
     *
     * @return mixed
     */
    public function getAgainstPokemon()
    {
        return $this->againstPokemon;
    }

}
