<?php

/**** Para mostrar listado ****/
/**
 * Se obtiene un listado. En la url podremos agregar atributos dsp de ? por ejemplo 
 * ?pagesize=3 dimensiona
 * ?nombre=aguada se filtra por nombre
* @url http://lugar.local/api/comision-fomentos
* @method GET
* @arrayReturn
    [
        {
            "id": 1,
            "nombre": "Aguada Cecilio"
        },
        {
            "id": 2,
            "nombre": "Aguada de Guerra"
        },
        {
            "id": 3,
            "nombre": "Aguada Guzmán"
        }
    ]
*/

/*****Para crear****
* @url http://lugar.local/api/comision-fomentos 
* @method POST
* @param arrayJson
    [
        {
            "id": 1,
            "nombre": "Aguada Cecilio"
        }
    ]
**/

/**** Para modificar*****
* @url http://lugar.local/api/comision-fomentos/{$id} 
* @method PUT
* @param arrayJson
    [
        {
            "nombre": "Aguada Cecilio"
        }
    ]
**/

/****** Para visualizar*****
* @url http://lugar.local/api/comision-fomentos/{$id} 
* @method GET
* @return arrayJson
    [
        {
            "nombre": "Aguada Cecilio"
        }
    ]
*/

/****** Para borrar una localidad *****
* @url http://lugar.local/api/comision-fomentos/{$id} 
* @method Delete
* @return arrayJson
*/
