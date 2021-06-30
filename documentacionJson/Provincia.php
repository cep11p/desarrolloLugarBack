<?php

/**** Para mostrar listado ****/
/**
* @url http://lugar.local/api/provincias
* @method GET
* @arrayReturn
    [
        {
            "id": 1,
            "nombre": "Capital Federal"
        },
        {
            "id": 2,
            "nombre": "Buenos Aires"
        },
        {
            "id": 3,
            "nombre": "Catamarca"
        },
        {
            "id": 8,
            "nombre": "Entre Rios"
        },
        {
            "id": 24,
            "nombre": "Tucuman"
        }
    ]
*/

/*****Para crear****
* @url http://lugar.local/api/provincias 
* @method POST
* @param arrayJson
**/

/**** Para modificar*****
* @url http://lugar.local/api/provincias/{$id} 
* @method PUT
* @param arrayJson
**/

/****** Para visualizar*****
* @url http://lugar.local/api/provincias/{$id} 
* @method GET
* @return arrayJson
*/

/****** Para borrar una localidad *****
* @url http://lugar.local/api/provincias/{$id} 
* @method Delete
* @return arrayJson
*/
