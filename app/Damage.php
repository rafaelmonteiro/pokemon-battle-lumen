<?php namespace App;

class Damage {
    private $causedDamage;
    private $typeModifier;

    public function __construct($damage, TypeModifier $typeModifier)
    {
        $this->damage = $damage;
        $this->typeModifier = $typeModifier;
    }

    /**
     * Get the value of Caused Damage
     *
     * @return mixed
     */
    public function getDamage()
    {
        return $this->damage;
    }

    /**
     * Get the value of Type Modifier
     *
     * @return mixed
     */
    public function getTypeModifier()
    {
        return $this->typeModifier;
    }
}
