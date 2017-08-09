<?php

class PokemonTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testStructureAll()
    {
        $this->json('GET', '/all')
             ->seeJsonStructure([
                '*'=>[
                    'name',
                    'type',
                    'avatar',
                    'agility',
                    'defense',
                    'health',
                    'attack',
                    'attacks'
                ]
             ]);
    }

    public function testSelectErrorMessage()
    {
        $this->json('POST', '/select')
             ->seeJson([
                'errors'=>'Please select a valid Pokemon'
             ]);
    }
}
