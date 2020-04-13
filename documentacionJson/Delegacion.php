<?php

/**** Para mostrar listado ****/
/**
* @url http://lugar.local/api/delegacion
* @method GET

[
    {
        "id": 20,
        "nombre": "Delegación Zona Alto Valle Oeste"
    },
    {
    ...
    },
    {
        "id": 21,
        "nombre": "Delegación Zona Valle Inferior"
    }
  ]
*/

/*****Para crear****
* @url http://lugar.local/api/delegacion 
* @method POST
* @param arrayJson 
    {
        "id": 21,
        "nombre": "Delegación Zona Valle Inferior"
    }
**/

/**** Para modificar*****
* @url http://lugar.local/api/delegacion/{$id} 
* @method PUT
* @param arrayJson
    {
        "nombre": "Delegación Zona Valle Inferior"
    }
**/

/****** Para visualizar*****
* @url http://lugar.local/api/delegacion/{$id} 
* @method GET
* @return arrayJson
    {
        "id": 22,
        "nombre": "Delegación Zona Alto Valle Centro"
    }
*/

/****** Para borrar una localidad *****
* @url http://lugar.local/api/delegacion/{$id} 
* @method Delete
*/
