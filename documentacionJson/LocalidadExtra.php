<?php

/**** Para mostrar listado ****/
/**
* @url http://lugar.local/api/localidad-extras
* @method GET
* @arrayReturn
[
    {
        "id": 382,
        "nombre": "Bahia Blanca",
        "regionid": null,
        "departamentoid": 9,
        "municipioid": null,
        "codigo_postal": 8000
    },
    {
        "id": 613,
        "nombre": "Carmen De Patagones",
        "regionid": null,
        "departamentoid": 78,
        "municipioid": null,
        "codigo_postal": 8504
    },
    {
        "id": 2504,
        "nombre": "Neuquen",
        "regionid": null,
        "departamentoid": 381,
        "municipioid": null,
        "codigo_postal": 8300
    }
]
*/

/*****Para crear****
* @url http://lugar.local/api/localidad-extras 
* @method POST
* @param arrayJson
    {
        "localidadid":4010,
    }
**/

/****** Para borrar una localidad *****
* @url http://lugar.local/api/localidad-extras/{$id} 
* @method Delete
* @return arrayJson
*/
