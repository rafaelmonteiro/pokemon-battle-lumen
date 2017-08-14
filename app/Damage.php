<?php namespace App;

class Damage {
    private $causedDamage;
    private $typeModifier;

    public function __construct($causedDamage, TypeModifier $typeModifier)
    {
        $this->causedDamage = $causedDamage;
        $this->typeModifier = $typeModifier;
    }

    /**
     * Get the value of Caused Damage
     *
     * @return mixed
     */
    public function getCausedDamage()
    {
        return $this->causedDamage;
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
