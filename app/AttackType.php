<?php namespace App;

class AttackType {
    const TYPE_NORMAL = 0;
    const TYPE_FIRE = 1;
    const TYPE_WATER = 2;
    const TYPE_ELECTRIC = 3;
    const TYPE_GRASS = 4;
    const TYPE_ICE = 5;
    const TYPE_FIGHTING = 6;
    const TYPE_POISON = 7;
    const TYPE_GROUND = 8;
    const TYPE_FLYING = 9;
    const TYPE_PSYCHIC = 10;
    const TYPE_BUG = 11;
    const TYPE_ROCK = 12;
    const TYPE_GHOST = 13;
    const TYPE_DRAGON = 14;
    const TYPE_DARK = 15;
    const TYPE_STEEL = 16;
    const TYPE_FAIRY = 17;

    private static $slugs = [
        self::TYPE_NORMAL => 'normal',
        self::TYPE_FIRE => 'fire',
        self::TYPE_WATER => 'water',
        self::TYPE_ELECTRIC => 'electric',
        self::TYPE_GRASS => 'grass',
        self::TYPE_ICE => 'ice',
        self::TYPE_FIGHTING => 'fighting',
        self::TYPE_POISON => 'poison',
        self::TYPE_GROUND => 'ground',
        self::TYPE_FLYING => 'flying',
        self::TYPE_PSYCHIC => 'psychic',
        self::TYPE_BUG => 'bug',
        self::TYPE_ROCK => 'rock',
        self::TYPE_GHOST => 'ghost',
        self::TYPE_DRAGON => 'dragon',
        self::TYPE_DARK => 'dark',
        self::TYPE_STEEL => 'steel',
        self::TYPE_FAIRY => 'fairy'
    ];

    public static function getValue($slug)
    {
        return array_search($slug, self::$slugs);
    }
}
