<?php

class PokemonControllerTest extends TestCase
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

    public function testSelectInvalidPlayer()
    {
        $this->json('POST', '/select', ['name' => 'Agumon'])
            ->seeStatusCode(404);
    }

    public function testSelectPlayerNoRequestData()
    {
        $this->json('POST', '/select')->seeStatusCode(422);
    }

    public function testHitInvalidPlayer()
    {
        $this->json('POST', '/hit', [
            'player' => ['name' => 'Pikachu'],
            'against' => ['name' => 'Agumon']
        ])->seeStatusCode(404);
    }

    public function testHitInvalidAgainst()
    {
        $this->json('POST', '/hit', [
            'player' => ['name' => 'Agumon'],
            'against' => ['name' => 'Pikachu']
        ])->seeStatusCode(404);
    }

    public function testHitNoRequestData()
    {
        $this->json('POST', '/hit')->seeStatusCode(422);
    }

    public function testHitValidPlayers()
    {
        $this->json('POST', '/hit', [
            'player' => ['name' => 'Charmander'],
            'against' => ['name' => 'Pikachu']
        ])->seeStatusCode(200);
    }
}
