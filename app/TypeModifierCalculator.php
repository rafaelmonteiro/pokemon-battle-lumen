<?php namespace App;

class TypeModifierCalculator {
    private $playerAttack;
    private $againstPokemon;

    public function __construct(Attack $playerAttack, Pokemon $against)
    {
        $this->playerAttack = $playerAttack;
        $this->againstPokemon = $against;
    }

    private function calculateWaterTypeModifier(Attack $playerAttack)
    {
        if ($playerAttack->getType() == AttackType::ELECTRIC || $playerAttack->getType() == AttackType::GRASS){
            return new TypeModifier(DamageType::DOUBLE_DAMAGE);
        }

        if ($playerAttack->getType() == AttackType::WATER || $playerAttack->getType() == AttackType::TYPE_FIRE) {
            return new TypeModifier(DamageType::HALF_DAMAGE);
        }
    }

    private function calculateGrassTypeModifier(Attack $playerAttack)
    {
        if ($playerAttack->getType() == AttackType::FIRE) {
            return new TypeModifier(DamageType::DOUBLE_DAMAGE);
        }

        if ($playerAttack->getType() == AttackType::GRASS
            || $playerAttack->getType() == AttackType::WATER
            || $playerAttack->getType() == AttackType::ELECTRIC) {
            return new TypeModifier(DamageType::HALF_DAMAGE);
        }
    }

    private function calculateFireTypeModifier(Attack $playerAttack)
    {
        if ($playerAttack->getType() == AttackType::WATER) {
            return new TypeModifier(DamageType::DOUBLE_DAMAGE);
        }

        if ($playerAttack->getType() == AttackType::FIRE || $playerAttack->getType() == AttackType::GRASS) {
            return new TypeModifier(DamageType::HALF_DAMAGE);
        }
    }

    private function calculateElectricTypeModifier(Attack $playerAttack)
    {
        if ($playerAttack->getType() == AttackType::ELECTRIC) {
            return new TypeModifier(DamageType::HALF_DAMAGE);
        }
    }

    public function calculate()
    {
        $accuracy = rand(1,100);
        $typeModifier = new TypeModifier(DamageType::NORMAL);

        switch ($this->againstPokemon->getType()) {
            case AttackType::WATER:
                $typeModifier = $this->calculateWaterTypeModifier($this->playerAttack);
                break;

            case AttackType::GRASS:
                $typeModifier = $this->calculateGrassTypeModifier($this->playerAttack);
                break;

            case AttackType::FIRE:
                $typeModifier = $this->calculateFireTypeModifier($this->playerAttack);
                break;

            case AttackType::ELECTRIC:
                $typeModifier = $this->calculateElectricTypeModifier($this->playerAttack);
                break;
        }

        if ($accuracy >= 90){
            $typeModifier->defineCritical();
        }
        else if ($accuracy <= 10){
            $typeModifier->defineMissed();
        }

        return $typeModifier;
    }
}
