<?php namespace App;

class Attack {
    private $pokemon;
    private $name;
    private $power;
    private $type;
    private $accuracy;

    public function __construct($name, $power, $type, $accuracy, Pokemon $pokemon)
    {
        $this->pokemon = $pokemon;
        $this->name = $name;
        $this->power = $power;
        $this->type = $type;
        $this->accuracy = $accuracy;
    }

    /**
     * Get the value of Pokemon
     *
     * @return mixed
     */
    public function getPokemon()
    {
        return $this->pokemon;
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
     * Get the value of Power
     *
     * @return mixed
     */
    public function getPower()
    {
        return $this->power;
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
     * Get the value of Accuracy
     *
     * @return mixed
     */
    public function getAccuracy()
    {
        return $this->accuracy;
    }

}
