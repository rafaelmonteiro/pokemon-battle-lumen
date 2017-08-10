<?php

namespace App;

use App\Exceptions\AttackNotFoundException;
use App\Repositories\AttackRepository;

abstract class Pokemon implements \JsonSerializable
{
    private $name;
    private $type;
    private $avatar;
    private $health;
    private $agility;
    private $attack;
    private $defense;
    private $attacks;
    private $attackRepository;

    public function __construct($name, $type, $avatar, $health, $agility, $attack, $defense, $attacks)
    {
        $this->name = $name;
        $this->type = $type;
        $this->avatar = $avatar;
        $this->health = $health;
        $this->agility = $agility;
        $this->attack = $attack;
        $this->defense = $defense;
        $this->attacks = $attacks;
    }

    public function hit($attack, Pokemon $against)
    {
        $playerAttackRepository = new AttackRepository($this);
        $playerAttack = $playerAttackRepository->findByName($attack);

        $againstAttackRepository = new AttackRepository($against);
        $againstAttack = $againstAttackRepository->getRandom();
    }

    public function calculateWaterTypeModifier(Attack $playerAttack, Pokemon $against)
    {
        if ($playerAttack->getType() == AttackType::ELECTRIC || $playerAttack->getType() == AttackType::GRASS){
            return new Damage(DamageType::DOUBLE_DAMAGE);
        }

        if ($playerAttack->getType() == AttackType::WATER || $playerAttack->getType() == AttackType::TYPE_FIRE) {
            return new Damage(DamageType::HALF_DAMAGE);
        }
    }

    public function calculateGrassTypeModifier(Attack $playerAttack, Pokemon $against)
    {
        if ($playerAttack->getType() == AttackType::FIRE) {
            $descriptionId = self::DOUBLE_DAMAGE;
            return new Damage(DamageType::DOUBLE_DAMAGE);
        }

        if ($playerAttack->getType() == AttackType::GRASS
            || $playerAttack->getType() == AttackType::WATER
            || $playerAttack->getType() == AttackType::ELECTRIC) {
            return new Damage(DamageType::HALF_DAMAGE);
        }
    }

    public function calculateFireTypeModifier(Attack $playerAttack, Pokemon $against)
    {
        if ($playerAttack->getType() == AttackType::WATER) {
            return new Damage(DamageType::DOUBLE_DAMAGE);
        }

        if ($playerAttack->getType() == AttackType::FIRE] || $playerAttack->getType() == AttackType::GRASS) {
            return new Damage(DamageType::HALF_DAMAGE);
        }
    }

    public function calculateElectricTypeModifier(Attack $playerAttack, Pokemon $against)
    {
        if ($playerAttack->getType() == AttackType::ELECTRIC]) {
            return new Damage(DamageType::HALF_DAMAGE);
        }
    }

    private function calculateTypeModifier(Attack $playerAttack, Pokemon $against)
    {
        $accuracy = rand(1,100);
        $damage = new Damage(DamageType::NORMAL);

        switch ($against->getType()) {
            case AttackType::WATER:
                $damage = $this->calculateWaterTypeModifier($playerAttack, $against);
                break;

            case AttackType::GRASS:
                $damage = $this->calculateGrassTypeModifier($playerAttack, $against);
                break;

            case AttackType::FIRE:
                $damage = $this->calculateFireTypeModifier($playerAttack, $against);
                break;

            case AttackType::ELECTRIC:
                $damage = $this->calculateElectricTypeModifier($playerAttack, $against);
                break;
        }

        if ($accuracy >= 90){
            $descriptionId *= self::DESCRIPTION_ID_CRITICAL;
            $attackDescription .= self::MSG_CRITICAL;
            $typeModifier *= 1.8;
        }
        else if ($accuracy <= 10){
            $descriptionId = self::DESCRIPTION_ID_MISSED;
            $attackDescription = self::MSG_MISSED;
            $typeModifier = 0;
        }

        return ['desc'=>$attackDescription,'desc_id'=>$descriptionId,'type_modifier'=>$typeModifier];
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * Get the value of Name
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of Type
     *
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get the value of Avatar
     *
     * @return mixed
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Get the value of Health
     *
     * @return mixed
     */
    public function getHealth()
    {
        return $this->health;
    }

    /**
     * Get the value of Health
     *
     * @return this
     */
    public function setHealth($value)
    {
        $this->health = $value;
        return $this;
    }

    /**
     * Get the value of Agility
     *
     * @return mixed
     */
    public function getAgility()
    {
        return $this->agility;
    }

    /**
     * Get the value of Attack
     *
     * @return mixed
     */
    public function getAttacks()
    {
        return $this->attacks;
    }

    /**
     * Get the value of Defense
     *
     * @return mixed
     */
    public function getDefense()
    {
        return $this->defense;
    }

}
