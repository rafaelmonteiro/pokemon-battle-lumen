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

    /**
        Damage Calculation
        ((2A/5+2)*B*C)/D)/50)+2)*X)*Y/10)*Z)/255

        A = attacker's Level (here we'll consider all Pokemon lvl 30)
        B = attacker's Attack or Special
        C = attack Power
        D = defender's Defense or Special
        X = same-Type attack bonus (1 or 1.5)
        Y = Type modifiers (40, 20, 10, 5, 2.5, or 0)
        Z = a random number between 217 and 255
    */
    public function hit2($request)
    {
        $playerAttackList = self::getAttacks()[$request->input('player.name')];
        $playerAttackInfo = $playerAttackList[array_search($request->input('player.attack'), array_column($playerAttackList, 'name'))];

        $cpuAttackList = self::getAttacks()[$request->input('against.name')];
        $cpuAttackInfo = $cpuAttackList[array_rand($cpuAttackList)];

        $pokemons = self::getPokemons();
        $playerInfo = $pokemons[array_search($request->input('player.name'), array_column($pokemons, 'name'))];
        $cpuInfo = $pokemons[array_search($request->input('against.name'), array_column($pokemons, 'name'))];

        $typeModifier = 2.5;
        $playerDamage = ceil((((((((14*$playerInfo['attack']*$playerAttackInfo['power'])/$cpuInfo['defense'])/50)+2)*1)*$typeModifier/10)*rand(217,255))/255);
        $cpuDamage = ceil((((((((14*$cpuInfo['attack']*$cpuAttackInfo['power'])/$playerInfo['defense'])/50)+2)*1)*$typeModifier/10)*rand(217,255))/255);

        $playerAttackDescription = '';
        $cpuAttackDescription = '';

        return [
            "player"=>[
                "name" => $request->input('player.name'),
                "currentHealth" => $request->input('player.currentHealth')-$cpuDamage,
                "damage" => $playerDamage,
                "desc" => $playerAttackDescription
            ],
            "against"=>[
                "name" => $request->input('against.name'),
                "currentHealth" => $request->input('against.currentHealth')-$playerDamage,
                "attack" => $cpuAttackInfo['name'],
                "damage" => $cpuDamage,
                "desc" => $cpuAttackDescription
            ]
        ];
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
                'avatar'=>'/images/bulbasaur.png',
                'health'=>45,
                'agility'=>45,
                'attack'=>49,
                'defense'=>49,
                'attacks'=>self::getAttacks()['Bulbasaur']
            ],
            [
                'name'=>'Pikachu',
                'avatar'=>'/images/pikachu.png',
                'health'=>35,
                'agility'=>90,
                'attack'=>55,
                'defense'=>40,                
                'attacks'=>self::getAttacks()['Pikachu']
            ],
            [   
                'name'=>'Charmander',
                'avatar'=>'/images/charmander.png',
                'health'=>39,
                'agility'=>65,
                'attack'=>52,
                'defense'=>43,
                'attacks'=>self::getAttacks()['Charmander']
            ],
            [   
                'name'=>'Squirtle',
                'avatar'=>'/images/squirtle.png',
                'health'=>44,
                'agility'=>43,
                'attack'=>48,
                'defense'=>65,
                'attacks'=>self::getAttacks()['Squirtle']
            ]
        ];
    }

    public static function getAttacks()
    {
        return [
            'Bulbasaur' => [
                [
                    "name"=>"Tackle",
                    "power"=> 30,
                    "type" => self::getTypes()[self::TYPE_NORMAL],
                    "accuracy"=> 95
                ],
                [
                    "name"=>"Vine Whip",
                    "power"=> 45,
                    "type" => self::getTypes()[self::TYPE_GRASS],
                    "accuracy"=> 95
                ],
                [
                    "name"=>"Razor Leaf",
                    "power"=> 55,
                    "type" => self::getTypes()[self::TYPE_GRASS],
                    "accuracy"=> 90
                ]                                
            ],
            'Pikachu' => [
                [
                    "name"=>"Quick Attack",
                    "power"=> 35,
                    "type" => self::getTypes()[self::TYPE_NORMAL],
                    "accuracy"=> 95
                ],
                [
                    "name"=>"Thunder Shock",
                    "power"=> 40,
                    "type" => self::getTypes()[self::TYPE_ELECTRIC],
                    "accuracy"=> 95
                ],
                [
                    "name"=>"Thunderbolt",
                    "power"=> 60,
                    "type" => self::getTypes()[self::TYPE_ELECTRIC],
                    "accuracy"=> 90
                ]                
            ],
            'Charmander' => [
                [
                    "name"=>"Scratch",
                    "power"=> 35,
                    "type" => self::getTypes()[self::TYPE_NORMAL],
                    "accuracy"=> 95
                ],
                [
                    "name"=>"Ember",
                    "power"=> 40,
                    "type" => self::getTypes()[self::TYPE_FIRE],
                    "accuracy"=> 95
                ],
                [
                    "name"=>"Flame Burst",
                    "power"=> 65,
                    "type" => self::getTypes()[self::TYPE_FIRE],
                    "accuracy"=> 90
                ]                
            ],
            'Squirtle' => [
                [
                    "name"=>"Tackle",
                    "power"=> 35,
                    "type" => self::getTypes()[self::TYPE_NORMAL],
                    "accuracy"=> 95
                ],
                [
                    "name"=>"Water Gun",
                    "power"=> 40,
                    "type" => self::getTypes()[self::TYPE_WATER],
                    "accuracy"=> 95
                ],
                [
                    "name"=>"Water Pulse",
                    "power"=> 60,
                    "type" => self::getTypes()[self::TYPE_WATER],
                    "accuracy"=> 90
                ]
            ]
        ];
    }

}
