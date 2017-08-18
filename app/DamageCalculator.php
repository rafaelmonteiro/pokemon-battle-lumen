<?php namespace App;

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

        $typeModifierCalculator = new TypeModifierCalculator($this->playerAttack, $this->againstPokemon);
        $playerTypeModifier = $typeModifierCalculator->calculate();

        $strength = 10 * $playerPokemon->getAttack() * $this->playerAttack->getPower();
        $causedDamage = ceil((((((($strength / $this->againstPokemon->getDefense()) / 50) + 2) * 1) * $playerTypeModifier->getMultiplier() / 10) * rand(217, 255)) / 255);

        return new Damage($causedDamage, $playerTypeModifier);
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
