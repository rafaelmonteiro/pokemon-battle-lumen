<?php namespace App;

class TypeModifierCalculator {
    private function calculateWaterTypeModifier(Attack $playerAttack, Pokemon $against)
    {
        if ($playerAttack->getType() == AttackType::ELECTRIC || $playerAttack->getType() == AttackType::GRASS){
            return new TypeModifier(DamageType::DOUBLE_DAMAGE);
        }

        if ($playerAttack->getType() == AttackType::WATER || $playerAttack->getType() == AttackType::TYPE_FIRE) {
            return new TypeModifier(DamageType::HALF_DAMAGE);
        }
    }

    private function calculateGrassTypeModifier(Attack $playerAttack, Pokemon $against)
    {
        if ($playerAttack->getType() == AttackType::FIRE) {
            $descriptionId = self::DOUBLE_DAMAGE;
            return new TypeModifier(DamageType::DOUBLE_DAMAGE);
        }

        if ($playerAttack->getType() == AttackType::GRASS
            || $playerAttack->getType() == AttackType::WATER
            || $playerAttack->getType() == AttackType::ELECTRIC) {
            return new TypeModifier(DamageType::HALF_DAMAGE);
        }
    }

    private function calculateFireTypeModifier(Attack $playerAttack, Pokemon $against)
    {
        if ($playerAttack->getType() == AttackType::WATER) {
            return new TypeModifier(DamageType::DOUBLE_DAMAGE);
        }

        if ($playerAttack->getType() == AttackType::FIRE || $playerAttack->getType() == AttackType::GRASS) {
            return new TypeModifier(DamageType::HALF_DAMAGE);
        }
    }

    private function calculateElectricTypeModifier(Attack $playerAttack, Pokemon $against)
    {
        if ($playerAttack->getType() == AttackType::ELECTRIC) {
            return new TypeModifier(DamageType::HALF_DAMAGE);
        }
    }

    public function calculate(Attack $playerAttack, Pokemon $against)
    {
        $accuracy = rand(1,100);
        $typeModifier = new TypeModifier(DamageType::NORMAL);

        switch ($against->getType()) {
            case AttackType::WATER:
                $typeModifier = $this->calculateWaterTypeModifier($playerAttack, $against);
                break;

            case AttackType::GRASS:
                $typeModifier = $this->calculateGrassTypeModifier($playerAttack, $against);
                break;

            case AttackType::FIRE:
                $typeModifier = $this->calculateFireTypeModifier($playerAttack, $against);
                break;

            case AttackType::ELECTRIC:
                $typeModifier = $this->calculateElectricTypeModifier($playerAttack, $against);
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
