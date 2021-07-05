<?php

/**** Para mostrar listado ****/
/**
* @url http://lugar.local/api/localidad-extras?
* nombre=nombrelocalidad
* codigo_postal=codigo
* departamentoid=id
* @method GET
* @arrayReturn
{
    "pagesize": 0,
    "pages": 0,
    "total_filtrado": 4,
    "resultado": [
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
            "id": 4073,
            "nombre": "milocali",
            "regionid": null,
            "departamentoid": 1,
            "municipioid": null,
            "codigo_postal": 9999
        }
    ]
}
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
