<?php

namespace App;

class Pokemon 
{
	protected $name;
	protected $health;
	protected $power;

    const TYPE_NORMAL = 0;
	const TYPE_FIRE = 1;
	const TYPE_WATER = 2;
	const TYPE_GRASS = 3;
	const TYPE_BUG = 4;
	const TYPE_ELECTRIC = 5;
	const TYPE_GROUND = 6;
	const TYPE_ROCK = 7;
	const TYPE_FLYING = 8;
	const TYPE_PSYCHIC = 9;
	const TYPE_GHOST = 10;
	const TYPE_POISON = 11;
	const TYPE_FIGHTING = 12;
	const TYPE_ICE = 13;
	const TYPE_DRAGON = 14;
	const TYPE_FAIRY = 15;

	public function getName()
	{
		return $this->name;
	}

	public function setName($value)
	{
		$this->name = $value;
	}

	public function setHealth($value)
	{
		$this->health = $value;
	}

	public function setPower($value)
	{
		$this->power = $value;
	}

	public function isAlive()
	{
		return $this->health > 0;
	}

	public function hit($opponent)
	{
		$opponent->health -= $this->power;
	}

	public function info()
	{
		return "{$this->name}: Health: {$this->health}, Power: {$this->power}";
	}

	public static function getTypes() 
	{
        return array(
            self::TYPE_NORMAL => 'normal',
            self::TYPE_FIRE => 'fire',
            self::TYPE_WATER => 'water',
            self::TYPE_GRASS => 'grass',
            self::TYPE_BUG => 'bug',
            self::TYPE_ELECTRIC => 'electric',
            self::TYPE_GROUND => 'ground',
            self::TYPE_ROCK => 'rock',
            self::TYPE_FLYING => 'flying',
            self::TYPE_PSYCHIC => 'psychic',
            self::TYPE_GHOST => 'ghost',
            self::TYPE_POISON => 'poison',
            self::TYPE_FIGHTING => 'fighting',
            self::TYPE_ICE => 'ice',
            self::TYPE_DRAGON => 'dragon',
            self::TYPE_FAIRY => 'fairy'
        );
    }

    public static function getPokemons()
    {
    	return ['Bulbasaur','Pikachu','Charmander','Squirtle'];
    }

}
