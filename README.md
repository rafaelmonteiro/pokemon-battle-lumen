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
    "avatar" : "avatarurl.extension",
    "attacks" : [
        "thunderbolt": {
            "power": 50,
            "type" : "electric",
            "accuracy": 70
        },
        "tackle": {
            "power": 30,
            "type" : "normal",
            "accuracy": 85
        }
    ],
    "health" : 75,
    "agility": 95,
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
            "thunderbolt": {
                "power": 50,
                "type" : "electric",
                "accuracy": 70
            },
            "tackle": {
                "power": 30,
                "type" : "normal",
                "accuracy": 85
            }
        ],
        "health" : 75,
        "agility": 95,
        "defense": 55
    },
    "against" : {
        "name" : "Charmander",
        "type" : "fire",
        "avatar" : "avatarurl.extension",
        "attacks" : [
            "flame": {
                "power": 50,
                "type" : "fire",
                "accuracy": 85
            }
        ],
        "health" : 75,
        "agility": 95,
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
        "desc" : ""
	},
	"against" : {
		"name" : "Charmander",
		"currentHealth" : 45,
		"attack" : "flame",
        "damage" : 7,
        "desc" : "Critical"
	}
}
```
