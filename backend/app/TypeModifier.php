<?php namespace App;

class TypeModifier {
    private $id;
    private $description;
    private $multiplier;
    private $descriptions = [
        1 => '',
        2 => '(Missed!)',
        3 => '(CRITICAL Hit!)',
        4 => "It's super effective!",
        5 => "It's not very effective... ",
        6 => "It's not effective ",
        12 => 'Not implemented',
        15 => 'Not implemented',
    ];
    private $multipliers = [
        1 => 10, // Normal
        2 => 0, // Missed
        3 => 1.8, // Critical
        4 => 20, // Double
        5 => 2.5, // Half
        6 => 0, // No damage
        12 => 0, // Critical double
        15 => 0, // Critical half damage
    ];

    public function __construct($id)
    {
        $this->id = $id;
        $this->description = $this->descriptions[$id];
        $this->multiplier = $this->multipliers[$id];
    }

    public function increaseMultiplier($multiplier)
    {
        $this->multiplier *= $multiplier;
    }

    public function defineCritical()
    {
        $this->id = 3;
        $this->description = $this->descriptions[$this->id];
        $this->multiplier = $this->multipliers[$this->id];
    }

    public function defineMissed()
    {
        $this->id = 2;
        $this->description = $this->descriptions[$this->id];
        $this->multiplier = $this->multipliers[$this->id];
    }

    /**
     * Get the value of Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of Description
     *
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the value of Type Modifier
     *
     * @return mixed
     */
    public function getMultiplier()
    {
        return $this->multiplier;
    }

}
