<?php

namespace App\Damage;

class RandomModifier extends Modifier
{
    public function calculate()
    {
        $random = mt_rand(217, 255);
        $multiplier = $random / 255;

        return $this->damage->calculate() * $multiplier;
    }
}