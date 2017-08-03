<?php

namespace App;

class Pokemon 
{
	protected $name;
	protected $health;
    protected $power;
    protected $damage;
	protected $isCritical;

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
        $this->isCritical = '';
        $this->damage = 0;
        if(!$this->isAlive())
            return;

        $this->damage = $this->power;
        $accuracy = rand(1,100);
        if ($accuracy >= 80){
            $this->damage = 2*$this->power;
            $this->isCritical = '(CRITICAL Hit!)';
        }
        else if ($accuracy < 20){
            $this->damage = 0;
            $this->isCritical = '(Missed!)';
        }

		$opponent->health -= $this->damage;
	}

	public function info()
	{
		return "{$this->name}: Health: {$this->health}, Power: {$this->power}";
	}

    public function fight_info()
    {
        return "{$this->name}: Health: {$this->health}, Damage: {$this->damage} {$this->isCritical}";
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
    	return [
            [
                'name'=>'Bulbasaur',
                'avatar'=>'/img/bulbasaur.png',
                'health'=>65,
                'agility'=>40,
                'defense'=>67,
                'attacks'=>self::getAttacks()['Bulbasaur']
            ],
            [
                'name'=>'Pikachu',
                'avatar'=>'/img/pikachu.png',
                'health'=>62,
                'agility'=>64,
                'defense'=>58,                
                'attacks'=>self::getAttacks()['Pikachu']
            ],
            [   
                'name'=>'Charmander',
                'avatar'=>'/img/charmander.png',
                'health'=>64,
                'agility'=>58,
                'defense'=>60,
                'attacks'=>self::getAttacks()['Charmander']
            ],
            [   
                'name'=>'Squirtle',
                'avatar'=>'/img/squirtle.png',
                'health'=>60,
                'agility'=>50,
                'defense'=>70,
                'attacks'=>self::getAttacks()['Squirtle']
            ]
        ];
    }

    public static function getAttacks()
    {
        return [
            'Bulbasaur' => [
                "Tackle" => [
                    "power"=> 30,
                    "type" => self::getTypes()[self::TYPE_NORMAL],
                    "accuracy"=> 95
                ],
                "Vine Whip" => [
                    "power"=> 45,
                    "type" => self::getTypes()[self::TYPE_GRASS],
                    "accuracy"=> 95
                ],
                "Razor Leaf" => [
                    "power"=> 55,
                    "type" => self::getTypes()[self::TYPE_GRASS],
                    "accuracy"=> 90
                ]                                
            ],
            'Pikachu' => [
                "Quick Attack" => [
                    "power"=> 35,
                    "type" => self::getTypes()[self::TYPE_NORMAL],
                    "accuracy"=> 95
                ],
                "Thunder Shock" => [
                    "power"=> 40,
                    "type" => self::getTypes()[self::TYPE_ELECTRIC],
                    "accuracy"=> 95
                ],
                "Thunderbolt" => [
                    "power"=> 60,
                    "type" => self::getTypes()[self::TYPE_ELECTRIC],
                    "accuracy"=> 90
                ]                
            ],
            'Charmander' => [
                "Scratch" => [
                    "power"=> 35,
                    "type" => self::getTypes()[self::TYPE_NORMAL],
                    "accuracy"=> 95
                ],
                "Ember" => [
                    "power"=> 40,
                    "type" => self::getTypes()[self::TYPE_FIRE],
                    "accuracy"=> 95
                ],
                "Flame Burst" => [
                    "power"=> 65,
                    "type" => self::getTypes()[self::TYPE_FIRE],
                    "accuracy"=> 90
                ]                
            ],
            'Squirtle' => [
                "Tackle" => [
                    "power"=> 35,
                    "type" => self::getTypes()[self::TYPE_NORMAL],
                    "accuracy"=> 95
                ],
                "Water Gun" => [
                    "power"=> 40,
                    "type" => self::getTypes()[self::TYPE_WATER],
                    "accuracy"=> 95
                ],
                "Water Pulse" => [
                    "power"=> 60,
                    "type" => self::getTypes()[self::TYPE_WATER],
                    "accuracy"=> 90
                ]                
            ]
        ];
    }

}
