<?php namespace App;

class DamageCalculator
{
    private $playerAttack;
    private $againstPokemon;
    private $randomness;

    public function __construct(Attack $playerAttack, Pokemon $against, $randomness)
    {
        $this->playerAttack = $playerAttack;
        $this->againstPokemon = $against;
        $this->randomness = $randomness;
    }

    public function calculate()
    {
        $playerPokemon = $this->playerAttack->getPokemon();

        $typeModifierCalc = new TypeModifierCalculator($this->playerAttack, $this->againstPokemon, $this->randomness);
        $playerTypeModifier = $typeModifierCalc->calculate();

        $strength = 10 * $playerPokemon->getAttack() * $this->playerAttack->getPower();
        $attackRatio = (((($strength / $this->againstPokemon->getDefense()) / 50) + 2) * 1);
        $attackRatioWithMultiplier = ($attackRatio * $playerTypeModifier->getMultiplier() / 10);
        $causedDamage = ceil(($attackRatioWithMultiplier * rand(217, 255)) / 255);

        return new Damage($causedDamage, $playerTypeModifier);
    }
}
