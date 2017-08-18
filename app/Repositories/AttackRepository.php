<?php namespace App\Repositories;

use App\Exceptions\AttackNotFoundException;
use App\Pokemon;
use App\Attack;

class AttackRepository {
    private $attacks;
    private $pokemon;

    public function __construct(Pokemon $pokemon)
    {
        $this->pokemon = $pokemon;
        $this->attacks = $pokemon->getAttacks();
    }

    public function getAttacks()
    {
        return $this->attacks;
    }

    public function findByName($name)
    {
        $attack = array_filter($this->getAttacks(), function($attack) use ($name) {
            return $attack->name === $name;
        });

        if (empty($attack)) {
            throw new AttackNotFoundException("'$name' does not exist");
        }

        $attackFound = reset($attack);
        return new Attack($attackFound->name, $attackFound->power,
            $attackFound->type, $attackFound->accuracy, $this->pokemon
        );

        return reset($attack);
    }

    public function getRandom()
    {
        $attacks = $this->getAttacks();
        $randomAttack = $attacks[array_rand($attacks)];

        return new Attack($randomAttack->name, $randomAttack->power,
            $randomAttack->type, $randomAttack->accuracy, $this->pokemon
        );
    }
}
