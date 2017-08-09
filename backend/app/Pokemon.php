<?php

namespace App;

use App\Exceptions\AttackNotFoundException;

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
        $playerAttack = $this->getAttack($attack);
        $againstAttack = $against->getRandomAttack();
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function getAttack($name)
    {
        $attack = array_filter($this->getAttacks(), function($attack) use ($name) {
            return $attack->name === $name;
        });

        if (empty($attack)) {
            throw new AttackNotFoundException("'$name' does not exist");
        }

        return reset($attack);
    }

    public function getRandomAttack()
    {
        $attacks = $this->getAttacks();
        return $attacks[array_rand($attacks)];
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
