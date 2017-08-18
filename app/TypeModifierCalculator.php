<?php namespace App;

class TypeModifierCalculator {
    private $playerAttack;
    private $againstPokemon;

    private $multipliers = [
        [1,1,1,1,1,1,1,1,1,1,1,1,0.5,0,1,1,0.5,0],
        [1,0.5,0.5,1,2,2,1,1,1,1,1,2,0.5,1,0.5,1,2,1],
        [1,2,0.5,1,0.5,1,1,1,2,1,1,1,2,1,0.5,1,1,1],
        [1,1,2,0.5,0.5,1,1,1,0,2,1,1,1,1,0.5,1,1,1],
        [1,0.5,2,1,0.5,1,1,0.5,2,0.5,1,0.5,2,1,0.5,1,0.5,1],
        [1,0.5,0.5,1,2,0.5,1,1,2,2,1,1,1,1,2,1,0.5,1],
        [2,1,1,1,1,2,1,0.5,1,0.5,0.5,0.5,2,0,1,2,2,0.5],
        [1,1,1,1,2,1,1,0.5,0.5,1,1,1,0.5,0.5,1,1,0,2],
        [1,2,1,2,0.5,1,1,2,1,0,1,0.5,2,1,1,1,2,1],
        [1,1,1,0.5,2,1,2,1,1,1,1,2,0.5,1,1,1,0.5,1],
        [1,1,1,1,1,1,2,2,1,1,0.5,1,1,1,1,0,0.5,1],
        [1,0.5,1,1,2,1,0.5,0.5,1,0.5,2,1,1,0.5,1,2,0.5,0.5],
        [1,2,1,1,1,2,0.5,1,0.5,2,1,2,1,1,1,1,0.5,1],
        [0,1,1,1,1,1,1,1,1,1,2,1,1,2,1,0.5,1,1],
        [1,1,1,1,1,1,1,1,1,1,1,1,1,1,2,1,0.5,0],
        [1,1,1,1,1,1,0.5,1,1,1,2,1,1,2,1,0.5,1,0.5],
        [1,0.5,0.5,0.5,1,2,1,1,1,1,1,1,2,1,1,1,0.5,2],
        [1,0.5,1,1,1,1,2,0.5,1,1,1,1,1,1,2,2,0.5,1]
    ];

    public function __construct(Attack $playerAttack, Pokemon $against)
    {
        $this->playerAttack = $playerAttack;
        $this->againstPokemon = $against;
    }

    public function calculateTypeModifier(Attack $playerAttack)
    {
        $defense = AttackType::getValue($this->againstPokemon->getType());
        $attack = AttackType::getValue($playerAttack->getType());

        $typeModifier = new TypeModifier(DamageType::NORMAL);
        $multiplier = $this->multipliers[$attack][$defense];

        if ($multiplier > 0) {
            if ($multiplier > 1)
                $typeModifier = new TypeModifier(DamageType::DOUBLE_DAMAGE);
            else if ($multiplier < 1)
                $typeModifier = new TypeModifier(DamageType::HALF_DAMAGE);
        } else {
            $typeModifier = new TypeModifier(DamageType::NO_DAMAGE);
        }

        return $typeModifier;
    }


    public function calculate()
    {
        $accuracy = rand(1,100);
        $typeModifier = $this->calculateTypeModifier($this->playerAttack);

        if ($accuracy >= 90){
            $typeModifier->defineCritical();
        }
        else if ($accuracy <= 10){
            $typeModifier->defineMissed();
        }

        return $typeModifier;
    }
}
