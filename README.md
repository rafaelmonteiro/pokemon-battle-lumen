# pokemon-battle-vue-php
A simple pokémon battle game made with vue and php

## API structure

| Adress        | Method           | Description  |
| ------------- |:-------------:| -----:| 
| /list      | GET | List all available caracteres | 
| /select      | POST      |  The user selected caracter |
| /hit | POST | The user selected atack |

### API data structure
#### /list 
##### Param Out
```javascript
{[
    "name" : "pikachu",
    "type" : "electricity",
    "avatar" : "avataurl.extension",
    "atacks" : [
        "atack1": {
            "power": 50,
            "acuracy": 85,
            "quantity": 3
        }
    ],
    "life" : 75,
    "agility": 95,
    "defense": 55
]}
```
#### /select 
##### Param In
```javascript
{
    "name" : "pikachu"
}
```
##### Param Out
```javascript
{
    "player" : {
        "name" : "pikachu",
        "type" : "electricity",
        "avatar" : "avataurl.extension",
        "atacks" : [
            "atack1": {
                "power": 50,
                "acuracy": 85,
                "quantity": 3
            }
        ],
        "life" : 75,
        "agility": 95,
        "defense": 55
    },
    "against" : {
        "name" : "charmander",
        "type" : "fire",
        "avatar" : "avataurl.extension",
        "atacks" : [
            "atack1": {
                "power": 50,
                "acuracy": 85,
                "quantity": 3
            }
        ],
        "life" : 75,
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
		"name" : "pikachu",
		"currentLife" : 60,
		"atack" : ["atack1"]
	},
	"against" : {
		"name" : "charmander",
		"currentLife" : 50
	}
}
```

##### Param Out
```javascript
{
	"player" : {
		"name" : "pikachu",
		"currentLife" : 60		
	},
	"against" : {
		"name" : "charmander",
		"currentLife" : 50,
		"atack" : ["atack1"]
	}
}
```
