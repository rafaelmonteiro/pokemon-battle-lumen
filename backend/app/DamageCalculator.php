<?php namespace App;

class DamageCalculator {
    public function calculate(Attack $playerAttack, Pokemon $against)
    {
        $playerPokemon = $playerAttack->getPokemon();
        $strength = 10 * $playerPokemon->getAttack() * $playerAttack->getPower();

        $typeModifierCalculator = new TypeModifierCalculator();
        $playerTypeCalculator = $typeModifierCalculator->calculate($playerAttack, $against);

        $causedDamage = ceil((((((($strength / $agaist->getDefense()) / 50) + 2) * 1) * $playerTypeModifier->getMultiplier() / 10) * rand(217, 255)) / 255);
        return new Damage($causedDamage, $playerTypeModifier);
    }
}
