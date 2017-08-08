# pokemon-battle-vue-php
A simple Pokémon battle game made with VueJS and PHP (Lumen)

## API structure

| Route        | Method           | Description  |
| ------------- |:-------------:| -----:| 
| /all      | GET | List all available characters | 
| /select      | POST      |  The user selected character |
| /hit | POST | The user selected attack |

### API data structure
#### /all 
##### Param Out
```javascript
{[
    "name" : "Pikachu",
    "type" : "electric",
    "avatar" : "avatarurl.extension",
    "attacks" : [
        {
            "name": "thunderbolt",
            "power": 50,
            "type" : "electric",
            "accuracy": 70
        },
        {
            "name" : "tackle",
            "power": 30,
            "type" : "normal",
            "accuracy": 85
        }
    ],
    "health" : 75,
    "agility": 95,
    "attack": 65,
    "defense": 55
]}
```
#### /select 
##### Param In
```javascript
{
    "name" : "Pikachu"
}
```
##### Param Out
```javascript
{
    "player" : {
        "name" : "Pikachu",
        "type" : "electric",
        "avatar" : "avatarurl.extension",
        "attacks" : [
            {
                "name": "thunderbolt",
                "power": 50,
                "type" : "electric",
                "accuracy": 70
            },
            {
                "name" : "tackle",
                "power": 30,
                "type" : "normal",
                "accuracy": 85
            }
        ],
        "health" : 75,
        "agility": 95,
        "attack": 65,
        "defense": 55
    },
    "against" : {
        "name" : "Charmander",
        "type" : "fire",
        "avatar" : "avatarurl.extension",
        "attacks" : [
            {
                "name": "flame",
                "power": 50,
                "type" : "fire",
                "accuracy": 85
            }
        ],
        "health" : 75,
        "agility": 95,
        "attack": 55,
        "defense": 55
    }
}
```
#### /hit 
##### Param In
```javascript
{
    "player" : {
        "name" : "Pikachu",
        "currentHealth" : 60,
        "attack" : "tackle"
    },
    "against" : {
        "name" : "Charmander",
        "currentHealth" : 50
    }
}
```

##### Param Out
```javascript
{
    "player" : {
        "name" : "Pikachu",
        "currentHealth" : 53,
        "damage" : 5,
        "desc" : "",
        "desc_id" : 1
    },
    "against" : {
        "name" : "Charmander",
        "currentHealth" : 45,
        "attack" : "flame",
        "damage" : 7,
        "desc" : "Critical Hit",
        "desc_id" : 3
    }
}
```

##### Hit description IDs (desc_id)

| Id | Description  |
| --:|--------------|
| 1  | Normal | 
| 2  | Missed | 
| 3  | Critical Hit | 
| 4  | Super effective attack | 
| 5  | Not very effective attack | 
| 6  | Not effective attack | 
| 12 | Super effective and critical attack | 
| 15 | Not very effective but critical attack | 

### References
[PokeApi](http://pokeapi.co) and [Bulbapedia](https://bulbapedia.bulbagarden.net)

### Local Configuration

#### Frontend 

```
npm install
npm run dev
```

#### Backend

```
composer install
php -S localhost:8000 -t public
```

#### Notes
It should only be used in a testing environment, because CORS is allowed for
`http://localhost:8080` (where frontend will run)