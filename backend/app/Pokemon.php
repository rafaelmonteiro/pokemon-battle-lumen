<?php

namespace App;

class Pokemon implements \JsonSerializable
{
    private $name;
    private $type;
    private $avatar;
    private $health;
    private $agility;
    private $attack;
    private $defense;

    public function __construct($name, $type, $avatar, $health, $agility, $attack, $defense)
    {
        $this->name = $name;
        $this->type = $type;
        $this->avatar = $avatar;
        $this->health = $health;
        $this->agility = $agility;
        $this->attack = $attack;
        $this->defense = $defense;
    }

    public function hit(Pokemon $opponent)
    {
        
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
    public function getAttack()
    {
        return $this->attack;
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
