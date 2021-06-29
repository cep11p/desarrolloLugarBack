<?php

/**** Para mostrar listado ****/
/**
* @url http://lugar.local/api/localidads
* @method GET
* @arrayReturn
*/

/*****Para crear****
* @url http://lugar.local/api/localidads 
* @method POST
* @param arrayJson
    {
        "nombre":"Milocali",
        "departamentoid":1,
        "codigo_postal":"8200"
    }
**/

/**** Para modificar*****
* @url http://lugar.local/api/localidads/{$id} 
* @method PUT
* @param arrayJson
**/

/****** Para visualizar*****
* @url http://lugar.local/api/localidads/{$id} 
* @method GET
* @return arrayJson
*/

/****** Para borrar una localidad *****
* @url http://lugar.local/api/localidads/{$id} 
* @method Delete
* @return arrayJson
*/
