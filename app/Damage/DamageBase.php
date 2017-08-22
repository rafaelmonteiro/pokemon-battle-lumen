<?php

namespace App\Damage;

class DamageBase implements Damage
{
    private $level;
    private $power;
    private $attack;
    private $defense;

    /**
     * DamageBase constructor.
     * @param $level
     * @param $power
     * @param $attack
     * @param $defense
     * @param $modifier
     */
    public function __construct($level, $power, $attack, $defense)
    {
        $this->level = $level;
        $this->power = $power;
        $this->attack = $attack;
        $this->defense = $defense;
    }

    public function calculate()
    {
        $a = (2 * $this->level / 5) + 2;
        $b = $a * $this->power * ($this->attack / $this->defense);
        return $b / 50 + 2;
    }
}
