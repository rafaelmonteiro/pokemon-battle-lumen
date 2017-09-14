<?php

namespace App\Damage;

abstract class Modifier implements Damage
{
    protected $damage;

    public function __construct(Damage $damage)
    {
        $this->damage = $damage;
    }

    public function getModifier()
    {
        return $this->damage->getModifier();
    }

    public function calculate()
    {
        return $this->damage->calculate();
    }
}