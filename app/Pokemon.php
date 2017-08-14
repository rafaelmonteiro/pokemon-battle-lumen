<?php

namespace App;

use App\Exceptions\AttackNotFoundException;
use App\Repositories\AttackRepository;

class Pokemon implements \JsonSerializable
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

        $damageCalculator = new DamageCalculator();

        $againstDamage = $damageCalculator->calculate($playerAttack, $against);
        $playerDamage = $damageCalculator->calculate($againstAttack, $this);


        return [
            "player"=> [
                "name" => $request->input('player.name'),
                "currentHealth" => $request->input('player.currentHealth')-$cpuDamage,
                "damage" => $playerDamage,
                "desc" => $playerTypeModifier['desc'],
                "desc_id" => $playerTypeModifier['desc_id'],
            ],
            "against"=>[
                "name" => $request->input('against.name'),
                "currentHealth" => $request->input('against.currentHealth')-$playerDamage,
                "attack" => $cpuAttackInfo['name'],
                "damage" => $cpuDamage,
                "desc" => $cpuTypeModifier['desc'],
                "desc_id" => $cpuTypeModifier['desc_id'],
            ]
        ];
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
