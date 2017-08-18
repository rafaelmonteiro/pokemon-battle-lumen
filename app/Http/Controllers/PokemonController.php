<?php

namespace App\Http\Controllers;

use App\Exceptions\AttackNotFoundException;
use App\Exceptions\PokemonNotFoundException;
use App\Repositories\AttackRepository;
use App\Repositories\PokemonRepository;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    private $pokemonRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PokemonRepository $pokemonRepository)
    {
        $this->pokemonRepository = $pokemonRepository;
    }

    public function all()
    {
        return $this->pokemonRepository->getAll();
    }

    public function select(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        try {
            $player = $this->pokemonRepository->findByName($request->input('name'));

            return ['player' => $player, 'against' => $this->pokemonRepository->getRandom()];
        } catch (PokemonNotFoundException $e) {
            return response()->json($e->getMessage(), 404);
        }
    }

    public function hit(Request $request)
    {
        $this->validate($request, [
            'player.name' => 'required',
            'player.attack' => 'required',
            'player.currentHealth' => 'required',
            'against.name' => 'required',
            'against.currentHealth' => 'required',
        ]);

        try {
            $player = $this->pokemonRepository->findByName($request->input('player.name'));
            $player->setHealth($request->input('player.currentHealth'));

            $against = $this->pokemonRepository->findByName($request->input('against.name'));
            $against->setHealth($request->input('against.currentHealth'));

            $againstAttackRepository = new AttackRepository($against);
            $randomAgainstAttack = $againstAttackRepository->getRandom();

            $playerAttackRepository = new AttackRepository($player);
            $playerAttack = $playerAttackRepository->findByName($request->input('player.attack'));

        } catch (PokemonNotFoundException $e) {
            return response()->json($e->getMessage(), 404);
        } catch (AttackNotFoundException $e) {
            return response()->json($e->getMessage(), 404);
        }

        $player->hit($playerAttack, $against);
        $against->hit($randomAgainstAttack, $player);

        return [
            "player"=> [
                "name" => $player->getName(),
                "currentHealth" => $player->getHealth(),
                "damage" => $against->getReceivedDamage()->getDamage(),
                "desc" => $against->getReceivedDamage()->getTypeModifier()->getDescription(),
                "desc_id" => $against->getReceivedDamage()->getTypeModifier()->getId(),
            ],
            "against"=>[
                "name" => $against->getName(),
                "currentHealth" => $against->getHealth(),
                "attack" => $player->getReceivedAttack()->getName(),
                "damage" => $player->getReceivedDamage()->getDamage(),
                "desc" => $player->getReceivedDamage()->getTypeModifier()->getDescription(),
                "desc_id" => $player->getReceivedDamage()->getTypeModifier()->getId(),
            ]
        ];
    }
}
