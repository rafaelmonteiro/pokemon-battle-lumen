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

    public function testHitInvalidAgainst()
    {
        $this->json('POST', '/hit', [
            'player' => [
                'name' => 'Pikachu',
                'attack' => 'Quick Attack',
                'currentHealth' => 100
            ],
            'against' => [
                'name' => 'Agumon',
                'currentHealth' => 100
            ]
        ])->seeStatusCode(404);
    }

    public function testHitInvalidPlayer()
    {
        $this->json('POST', '/hit', [
            'player' => [
                'name' => 'Agumon',
                'attack' => 'Mawashi geri',
                'currentHealth' => 100
            ],
            'against' => [
                'name' => 'Pikachu',
                'currentHealth' => 42
            ]
        ])->seeStatusCode(404);
    }

    public function testHitNoRequestData()
    {
        $this->json('POST', '/hit')->seeStatusCode(422);
    }

    public function testHitValidPlayers()
    {
        $this->json('POST', '/hit', [
            'player' => [
                'name' => 'Charmander',
                'attack' => 'Ember',
                'currentHealth' => 100
            ],
            'against' => [
                'name' => 'Pikachu',
                'currentHealth' => 100
            ],
        ])->seeStatusCode(200);
    }
}
