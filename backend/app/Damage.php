<?php namespace App;

class Damage {
    private $id;
    private $description;
    private $typeModifier;
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
    private $typeModifiers = [
        1 => 10, // Normal
        2 => 0, // Missed
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
        $this->typeModifier = $this->typeModifiers[$id];
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
    public function getTypeModifier()
    {
        return $this->typeModifier;
    }

}
