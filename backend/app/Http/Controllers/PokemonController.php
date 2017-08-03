<?php

namespace App\Http\Controllers;

use App\Pokemon;

class PokemonController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
    public function all()
    {
        return Pokemon::getPokemons();
    }

    public function fight()
    {
        $msg[] = "PLAYERS INFO";
        $pokemons = $this->all();
        $rand_keys = array_rand($pokemons, 2);

        $p1 = new Pokemon;
        $p1->setName($pokemons[$rand_keys[0]]);
        $p1->setHealth(rand(1,100));
        $p1->setPower(rand(1,20));

        $p2 = new Pokemon;
        $p2->setName($pokemons[$rand_keys[1]]);
        $p2->setHealth(rand(1,100));
        $p2->setPower(rand(1,20));        

        $msg[] = $p1->info();
        $msg[] = $p2->info(); 

        $msg[] = "FIGHT!";
        echo json_encode($msg);
        return $this->battle($p1, $p2);
    }

    public function battle($p1,$p2)
    {
        while ($p1->isAlive() && $p2->isAlive())
        {
            $p1->hit($p2);
            $p2->hit($p1);
            
            $msg[] = $p1->info();
            $msg[] = $p2->info();            
        }

        if ($p1->isAlive()) 
            $msg[] = "{$p1->getName()} WON!"; 
        else if ($p2->isAlive())
            $msg[] = "{$p2->getName()} WON!"; 
        else
            $msg[] = "TIE!";

        echo json_encode($msg);
    }
}
