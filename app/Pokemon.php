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
    private $attacks;
    private $attackRepository;
    private $receivedDamage;
    private $receivedAttack;

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

    public function hit(Attack $attack, Pokemon &$against)
    {
        $against->receivedAttack = $attack;

        $damageCalculator = new DamageCalculator($against->receivedAttack, $against);
        $against->receivedDamage = $damageCalculator->calculate();
        $against->health -= $against->receivedDamage->getDamage();
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function getReceivedAttack()
    {
        if (!isset($this->receivedAttack)) {
            throw new Exception("Pokémon was not attacked yet");
        }

        return $this->receivedAttack;
    }

    public function getReceivedDamage()
    {
        if (!isset($this->receivedDamage)) {
            throw new Exception("Pokémon was not attacked yet");
        }

        return $this->receivedDamage;
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
     * Get the value of Attacks
     *
     * @return mixed
     */
    public function getAttacks()
    {
        return $this->attacks;
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
