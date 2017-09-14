<?php

namespace App\Damage;

class CriticalModifier extends Modifier
{
    protected $baseSpeed;

    public function setBaseSpeed($baseSpeed)
    {
        $this->baseSpeed = $baseSpeed;
    }

    public function calculate()
    {
        $threshold = $this->baseSpeed / 2;
        $probability = $threshold / 256;

        $max = (int) (1 / $probability);
        $modifier = mt_rand(0, $max) === 0 ? 2 : 1;

        return $this->damage->calculate() * $modifier;
    }

}