<?php

namespace App;

use App\DamageType;

class TypeModifier
{
    private $id;
    private $description;
    private $multiplier;

    private $descriptions = [
        DamageType::NORMAL                  => 'NORMAL',
        DamageType::MISSED                  => '(Missed!)',
        DamageType::CRITICAL                => '(CRITICAL Hit!)',
        DamageType::DOUBLE_DAMAGE           => "It's super effective!",
        DamageType::HALF_DAMAGE             => "It's not very effective... ",
        DamageType::NO_DAMAGE               => "It's not effective ",
        DamageType::CRITICAL_2XDAMAGE       => 'Not implemented',
        DamageType::CRITICAL_HALF_DAMAGE    => 'Not implemented'
    ];

    private $multipliers = [
        DamageType::NORMAL                  => 10,
        DamageType::MISSED                  => 0,
        DamageType::CRITICAL                => 1.8,
        DamageType::DOUBLE_DAMAGE           => 20,
        DamageType::HALF_DAMAGE             => 2.5,
        DamageType::NO_DAMAGE               => 0,
        DamageType::CRITICAL_2XDAMAGE       => 0,
        DamageType::CRITICAL_HALF_DAMAGE    => 0
    ];

    public function __construct($id)
    {
        $this->id = $id;
        $this->description = $this->descriptions[$id];
        $this->multiplier = $this->multipliers[$id];
    }

    public function defineCritical()
    {
        $this->id = DamageType::CRITICAL;
        $this->description = $this->descriptions[DamageType::CRITICAL];
        $this->multiplier = $this->multipliers[DamageType::CRITICAL];
    }

    public function defineMissed()
    {
        $this->id = DamageType::MISSED;
        $this->description = $this->descriptions[DamageType::MISSED];
        $this->multiplier = $this->multipliers[DamageType::MISSED];
    }

    /**
     * Get the value of Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of Description
     *
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the value of Type Modifier
     *
     * @return mixed
     */
    public function getMultiplier()
    {
        return $this->multiplier;
    }
}
