<?php


class LugarCest
{
    public function _before(ApiTester $I)
    {
    }

    public function _after(ApiTester $I)
    {
    }
    
    public function _fixtures()
    {
        return [
            'lugars' => app\tests\fixtures\LugarFixture::className(),
        ];
    }

    // tests
    public function crearLugar(ApiTester $I)
    {
        $I->wantTo('Se crea un Lugar Nuevo');
        
        $param = [
            "calle"=> "Mata Negra",
            "altura"=> "206",
            "localidadid"=> 1,
            "latitud"=> "-1234123",
            "longitud"=> "21314124",
            "barrio"=> "barrio1",
            "piso"=> "",
            "depto"=> "",
            "escalera"=> "",
            "entre_calle_1"=> "",
            "entre_calle_2"=> ""
        ];
        
        $I->sendPOST('/api/lugars',$param);
        $I->seeResponseContainsJson([
            "message"=>"Se guarda un Lugar",
            "success"=>true,
            "data"=>["id"=>104]
        ]);
        $I->seeResponseCodeIs(200);
        
        $I->sendGET('/api/lugars/104');
        $I->seeResponseContainsJson([
            'id' => 104,
            "calle"=> "mata negra",
            "altura"=> "206",
            "localidadid"=> 1,
            "latitud"=> "-1234123",
            "longitud"=> "21314124",
            "barrio"=> "barrio1",
            "piso"=> "",
            "depto"=> "",
            "escalera"=> "",
            "entre_calle_1"=> "",
            "entre_calle_2"=> ""
        ]);
    }
    
    /**
     * Esta operacion no debe fallar...sino dar el id del lugar existente para reutilizarlo
     * @param ApiTester $I
     */
    public function crearLugarExistente(ApiTester $I)
    {
        $I->wantTo('Se crea un Lugar Existente');
        
        $param = [
            'barrio'=>'barrio7',
            'calle'=>'calle7',
            'altura'=>'',
            'piso'=>'6º',
            'depto'=>'2',
            'localidadid'=>2555,
            'latitud'=>'-1234117',
            'longitud'=>'21314130',
            'escalera'=>'escalera7',
            'entre_calle_1'=>'Entrecalle7',
            'entre_calle_2'=>'Entrecalle-97'
        ];
        
        $I->sendPOST('/api/lugars',$param);
        $I->seeResponseContainsJson([
            "message"=>"Se guarda un Lugar",
            "success"=>true,
            "data"=>["id"=>7]
        ]);
        $I->seeResponseCodeIs(200);
        
        $I->sendGET('/api/lugars/7');
        $I->seeResponseContainsJson([
            'barrio'=>'barrio7',
            'calle'=>'calle7',
            'altura'=>'',
            'piso'=>'6º',
            'depto'=>'2',
            'localidadid'=>2555,
            'latitud'=>'-1234117',
            'longitud'=>'21314130',
            'escalera'=>'escalera7',
            'entre_calle_1'=>'Entrecalle7',
            'entre_calle_2'=>'Entrecalle-97'
        ]);
    }
    
    public function verLugar(ApiTester $I)
    {
        $I->wantTo('Se visualiza un lugar');        
        
        $I->sendGET('/api/lugars/7');
        $I->seeResponseContainsJson([
            'barrio'=>'barrio7',
            'calle'=>'calle7',
            'altura'=>'',
            'piso'=>'6º',
            'depto'=>'2',
            'localidadid'=>2555,
            'latitud'=>'-1234117',
            'longitud'=>'21314130',
            'escalera'=>'escalera7',
            'entre_calle_1'=>'Entrecalle7',
            'entre_calle_2'=>'Entrecalle-97',
            'localidad'=> 'General Conesa'
        ]);
    }
    
    public function listarLugar(ApiTester $I)
    {
        $I->wantTo('Lista de lugares');
        
        $I->sendGET('/api/lugars');
        $I->seeResponseContainsJson([
            "success"=> "true",
            "pagesize"=> 20,
            "pages"=> 6,
            "total_filtrado"=> 103,
            "resultado"=> [
                [
                    "id"=> 1,
                    "nombre"=> "",
                    "calle"=> "calle1",
                    "altura"=> "100",
                    "localidadid"=> 2538,
                    "latitud"=> "-1234123",
                    "longitud"=> "21314124",
                    "barrio"=> "barrio1",
                    "piso"=> "0º",
                    "depto"=> "A",
                    "escalera"=> "escalera1",
                    "entre_calle_1"=> "Entrecalle1",
                    "entre_calle_2"=> "Entrecalle-103",
                    "localidad"=> "El Bolson"
                ],
                [
                    "id"=> 2,
                    "nombre"=> "",
                    "calle"=> "calle2",
                    "altura"=> "",
                    "localidadid"=> 2539,
                    "latitud"=> "-1234122",
                    "longitud"=> "21314125",
                    "barrio"=> "barrio2",
                    "piso"=> "1º",
                    "depto"=> "B",
                    "escalera"=> "escalera2",
                    "entre_calle_1"=> "Entrecalle2",
                    "entre_calle_2"=> "Entrecalle-102",
                    "localidad"=> "San Carlos De Bariloche"
                ],
                [
                    "id"=> 3,
                    "nombre"=> "",
                    "calle"=> "calle3",
                    "altura"=> "",
                    "localidadid"=> 2540,
                    "latitud"=> "-1234121",
                    "longitud"=> "21314126",
                    "barrio"=> "barrio3",
                    "piso"=> "2º",
                    "depto"=> "C",
                    "escalera"=> "escalera3",
                    "entre_calle_1"=> "Entrecalle3",
                    "entre_calle_2"=> "Entrecalle-101",
                    "localidad"=> "Mallin Ahogado"
                ],
                [
                    "id"=> 4,
                    "nombre"=> "",
                    "calle"=> "calle4",
                    "altura"=> "",
                    "localidadid"=> 2541,
                    "latitud"=> "-1234120",
                    "longitud"=> "21314127",
                    "barrio"=> "barrio4",
                    "piso"=> "3º",
                    "depto"=> "D",
                    "escalera"=> "escalera4",
                    "entre_calle_1"=> "Entrecalle4",
                    "entre_calle_2"=> "Entrecalle-100",
                    "localidad"=> "Rio Villegas"
                ],
                [
                    "id"=> 5,
                    "nombre"=> "",
                    "calle"=> "calle5",
                    "altura"=> "",
                    "localidadid"=> 2542,
                    "latitud"=> "-1234119",
                    "longitud"=> "21314128",
                    "barrio"=> "barrio5",
                    "piso"=> "4º",
                    "depto"=> "F",
                    "escalera"=> "escalera5",
                    "entre_calle_1"=> "Entrecalle5",
                    "entre_calle_2"=> "Entrecalle-99",
                    "localidad"=> "Villa Mascardi"
                ],
                [
                    "id"=> 6,
                    "nombre"=> "",
                    "calle"=> "calle6",
                    "altura"=> "",
                    "localidadid"=> 2543,
                    "latitud"=> "-1234118",
                    "longitud"=> "21314129",
                    "barrio"=> "barrio6",
                    "piso"=> "5º",
                    "depto"=> "1",
                    "escalera"=> "escalera6",
                    "entre_calle_1"=> "Entrecalle6",
                    "entre_calle_2"=> "Entrecalle-98",
                    "localidad"=> "El Foyel"
                ],
                [
                    "id"=> 7,
                    "nombre"=> "",
                    "calle"=> "calle7",
                    "altura"=> "",
                    "localidadid"=> 2555,
                    "latitud"=> "-1234117",
                    "longitud"=> "21314130",
                    "barrio"=> "barrio7",
                    "piso"=> "6º",
                    "depto"=> "2",
                    "escalera"=> "escalera7",
                    "entre_calle_1"=> "Entrecalle7",
                    "entre_calle_2"=> "Entrecalle-97",
                    "localidad"=> "General Conesa"
                ],
                [
                    "id"=> 8,
                    "nombre"=> "",
                    "calle"=> "calle8",
                    "altura"=> "",
                    "localidadid"=> 2545,
                    "latitud"=> "-1234116",
                    "longitud"=> "21314131",
                    "barrio"=> "barrio8",
                    "piso"=> "7º",
                    "depto"=> "3",
                    "escalera"=> "escalera8",
                    "entre_calle_1"=> "Entrecalle8",
                    "entre_calle_2"=> "Entrecalle-96",
                    "localidad"=> "Comi C"
                ],
                [
                    "id"=> 9,
                    "nombre"=> "",
                    "calle"=> "calle9",
                    "altura"=> "",
                    "localidadid"=> 2546,
                    "latitud"=> "-1234115",
                    "longitud"=> "21314132",
                    "barrio"=> "barrio9",
                    "piso"=> "8º",
                    "depto"=> "4",
                    "escalera"=> "escalera9",
                    "entre_calle_1"=> "Entrecalle9",
                    "entre_calle_2"=> "Entrecalle-95",
                    "localidad"=> "Cona Niyeu"
                ],
                [
                    "id"=> 10,
                    "nombre"=> "",
                    "calle"=> "calle10",
                    "altura"=> "",
                    "localidadid"=> 2547,
                    "latitud"=> "-1234114",
                    "longitud"=> "21314133",
                    "barrio"=> "barrio1",
                    "piso"=> "9º",
                    "depto"=> "5",
                    "escalera"=> "escalera10",
                    "entre_calle_1"=> "Entrecalle10",
                    "entre_calle_2"=> "Entrecalle-94",
                    "localidad"=> "Falckner"
                ],
                [
                    "id"=> 11,
                    "nombre"=> "",
                    "calle"=> "calle11",
                    "altura"=> "",
                    "localidadid"=> 2548,
                    "latitud"=> "-1234113",
                    "longitud"=> "21314134",
                    "barrio"=> "barrio2",
                    "piso"=> "10º",
                    "depto"=> "6",
                    "escalera"=> "escalera11",
                    "entre_calle_1"=> "Entrecalle11",
                    "entre_calle_2"=> "Entrecalle-93",
                    "localidad"=> "Ganzu Lauquen"
                ],
                [
                    "id"=> 12,
                    "nombre"=> "",
                    "calle"=> "calle12",
                    "altura"=> "",
                    "localidadid"=> 2549,
                    "latitud"=> "-1234112",
                    "longitud"=> "21314135",
                    "barrio"=> "barrio3",
                    "piso"=> "11º",
                    "depto"=> "7",
                    "escalera"=> "escalera12",
                    "entre_calle_1"=> "Entrecalle12",
                    "entre_calle_2"=> "Entrecalle-92",
                    "localidad"=> "Janinue"
                ],
                [
                    "id"=> 13,
                    "nombre"=> "",
                    "calle"=> "calle13",
                    "altura"=> "",
                    "localidadid"=> 2550,
                    "latitud"=> "-1234111",
                    "longitud"=> "21314136",
                    "barrio"=> "barrio4",
                    "piso"=> "12º",
                    "depto"=> "8",
                    "escalera"=> "escalera13",
                    "entre_calle_1"=> "Entrecalle13",
                    "entre_calle_2"=> "Entrecalle-91",
                    "localidad"=> "Ministro Ramos Mexia"
                ],
                [
                    "id"=> 14,
                    "nombre"=> "",
                    "calle"=> "calle14",
                    "altura"=> "",
                    "localidadid"=> 2551,
                    "latitud"=> "-1234110",
                    "longitud"=> "21314137",
                    "barrio"=> "barrio5",
                    "piso"=> "13º",
                    "depto"=> "A",
                    "escalera"=> "escalera14",
                    "entre_calle_1"=> "Entrecalle14",
                    "entre_calle_2"=> "Entrecalle-90",
                    "localidad"=> "Sierra Colorada"
                ],
                [
                    "id"=> 15,
                    "nombre"=> "",
                    "calle"=> "calle15",
                    "altura"=> "",
                    "localidadid"=> 2552,
                    "latitud"=> "-1234109",
                    "longitud"=> "21314138",
                    "barrio"=> "barrio6",
                    "piso"=> "14º",
                    "depto"=> "B",
                    "escalera"=> "escalera15",
                    "entre_calle_1"=> "Entrecalle15",
                    "entre_calle_2"=> "Entrecalle-89",
                    "localidad"=> "Treneta"
                ],
                [
                    "id"=> 16,
                    "nombre"=> "",
                    "calle"=> "calle16",
                    "altura"=> "",
                    "localidadid"=> 2553,
                    "latitud"=> "-1234108",
                    "longitud"=> "21314139",
                    "barrio"=> "barrio7",
                    "piso"=> "15º",
                    "depto"=> "C",
                    "escalera"=> "escalera16",
                    "entre_calle_1"=> "Entrecalle16",
                    "entre_calle_2"=> "Entrecalle-88",
                    "localidad"=> "Chocori"
                ],
                [
                    "id"=> 17,
                    "nombre"=> "",
                    "calle"=> "calle17",
                    "altura"=> "",
                    "localidadid"=> 2554,
                    "latitud"=> "-1234107",
                    "longitud"=> "21314140",
                    "barrio"=> "barrio8",
                    "piso"=> "16º",
                    "depto"=> "D",
                    "escalera"=> "escalera17",
                    "entre_calle_1"=> "Entrecalle17",
                    "entre_calle_2"=> "Entrecalle-87",
                    "localidad"=> "El Porvenir"
                ],
                [
                    "id"=> 18,
                    "nombre"=> "",
                    "calle"=> "calle18",
                    "altura"=> "",
                    "localidadid"=> 2538,
                    "latitud"=> "-1234106",
                    "longitud"=> "21314141",
                    "barrio"=> "barrio9",
                    "piso"=> "17º",
                    "depto"=> "F",
                    "escalera"=> "escalera18",
                    "entre_calle_1"=> "Entrecalle18",
                    "entre_calle_2"=> "Entrecalle-86",
                    "localidad"=> "El Bolson"
                ],
                [
                    "id"=> 19,
                    "nombre"=> "",
                    "calle"=> "calle19",
                    "altura"=> "",
                    "localidadid"=> 2539,
                    "latitud"=> "-1234105",
                    "longitud"=> "21314142",
                    "barrio"=> "barrio1",
                    "piso"=> "18º",
                    "depto"=> "2",
                    "escalera"=> "escalera19",
                    "entre_calle_1"=> "Entrecalle19",
                    "entre_calle_2"=> "Entrecalle-85",
                    "localidad"=> "San Carlos De Bariloche"
                ],
                [
                    "id"=> 20,
                    "nombre"=> "",
                    "calle"=> "calle20",
                    "altura"=> "",
                    "localidadid"=> 2540,
                    "latitud"=> "-1234104",
                    "longitud"=> "21314143",
                    "barrio"=> "barrio2",
                    "piso"=> "19º",
                    "depto"=> "3",
                    "escalera"=> "escalera20",
                    "entre_calle_1"=> "Entrecalle20",
                    "entre_calle_2"=> "Entrecalle-84",
                    "localidad"=> "Mallin Ahogado"
                ]
            ]
        ]);
    }
    
    public function filtrarLugaresPorIds(ApiTester $I)
    {
        $I->wantTo('Filtrar lugares por Ids');
        
        $I->sendGET('/api/lugars?ids=10,11,3,6,9,45,16');
        $I->seeResponseContainsJson([            
            "success"=> "true",
            "pagesize"=> 20,
            "pages"=> 1,
            "total_filtrado"=> 7,
            "resultado"=> [
                [
                    "id"=> 3,
                    "nombre"=> "",
                    "calle"=> "calle3",
                    "altura"=> "",
                    "localidadid"=> 2540,
                    "latitud"=> "-1234121",
                    "longitud"=> "21314126",
                    "barrio"=> "barrio3",
                    "piso"=> "2º",
                    "depto"=> "C",
                    "escalera"=> "escalera3",
                    "entre_calle_1"=> "Entrecalle3",
                    "entre_calle_2"=> "Entrecalle-101",
                    "localidad"=> "Mallin Ahogado"
                ],
                [
                    "id"=> 6,
                    "nombre"=> "",
                    "calle"=> "calle6",
                    "altura"=> "",
                    "localidadid"=> 2543,
                    "latitud"=> "-1234118",
                    "longitud"=> "21314129",
                    "barrio"=> "barrio6",
                    "piso"=> "5º",
                    "depto"=> "1",
                    "escalera"=> "escalera6",
                    "entre_calle_1"=> "Entrecalle6",
                    "entre_calle_2"=> "Entrecalle-98",
                    "localidad"=> "El Foyel"
                ],
                [
                    "id"=> 9,
                    "nombre"=> "",
                    "calle"=> "calle9",
                    "altura"=> "",
                    "localidadid"=> 2546,
                    "latitud"=> "-1234115",
                    "longitud"=> "21314132",
                    "barrio"=> "barrio9",
                    "piso"=> "8º",
                    "depto"=> "4",
                    "escalera"=> "escalera9",
                    "entre_calle_1"=> "Entrecalle9",
                    "entre_calle_2"=> "Entrecalle-95",
                    "localidad"=> "Cona Niyeu"
                ],
                [
                    "id"=> 10,
                    "nombre"=> "",
                    "calle"=> "calle10",
                    "altura"=> "",
                    "localidadid"=> 2547,
                    "latitud"=> "-1234114",
                    "longitud"=> "21314133",
                    "barrio"=> "barrio1",
                    "piso"=> "9º",
                    "depto"=> "5",
                    "escalera"=> "escalera10",
                    "entre_calle_1"=> "Entrecalle10",
                    "entre_calle_2"=> "Entrecalle-94",
                    "localidad"=> "Falckner"
                ],
                [
                    "id"=> 11,
                    "nombre"=> "",
                    "calle"=> "calle11",
                    "altura"=> "",
                    "localidadid"=> 2548,
                    "latitud"=> "-1234113",
                    "longitud"=> "21314134",
                    "barrio"=> "barrio2",
                    "piso"=> "10º",
                    "depto"=> "6",
                    "escalera"=> "escalera11",
                    "entre_calle_1"=> "Entrecalle11",
                    "entre_calle_2"=> "Entrecalle-93",
                    "localidad"=> "Ganzu Lauquen"
                ],
                [
                    "id"=> 16,
                    "nombre"=> "",
                    "calle"=> "calle16",
                    "altura"=> "",
                    "localidadid"=> 2553,
                    "latitud"=> "-1234108",
                    "longitud"=> "21314139",
                    "barrio"=> "barrio7",
                    "piso"=> "15º",
                    "depto"=> "C",
                    "escalera"=> "escalera16",
                    "entre_calle_1"=> "Entrecalle16",
                    "entre_calle_2"=> "Entrecalle-88",
                    "localidad"=> "Chocori"
                ],
                [
                    "id"=> 45,
                    "nombre"=> "",
                    "calle"=> "calle5",
                    "altura"=> "",
                    "localidadid"=> 3976,
                    "latitud"=> "-2999997",
                    "longitud"=> "12345263",
                    "barrio"=> "barrio9",
                    "piso"=> "0º",
                    "depto"=> "4",
                    "escalera"=> "escalera45",
                    "entre_calle_1"=> "Entrecalle45",
                    "entre_calle_2"=> "Entrecalle-59",
                    "localidad"=> "Aguada de Guerra"
                ]
            ]
        ]);
    }
    
    public function filtrarLugaresPorLocalidad(ApiTester $I)
    {
        $I->wantTo('Filtrar lugares por localidad');
        
        $I->sendGET('/api/lugars?localidadid=2538');
        $I->seeResponseContainsJson([            
            "success"=> "true",
            "pagesize"=> 20,
            "pages"=> 1,
            "total_filtrado"=> 7,
            "resultado"=> [
                [
                    "id"=> 1,
                    "nombre"=> "",
                    "calle"=> "calle1",
                    "altura"=> "100",
                    "localidadid"=> 2538,
                    "latitud"=> "-1234123",
                    "longitud"=> "21314124",
                    "barrio"=> "barrio1",
                    "piso"=> "0º",
                    "depto"=> "A",
                    "escalera"=> "escalera1",
                    "entre_calle_1"=> "Entrecalle1",
                    "entre_calle_2"=> "Entrecalle-103",
                    "localidad"=> "El Bolson"
                ],
                [
                    "id"=> 18,
                    "nombre"=> "",
                    "calle"=> "calle18",
                    "altura"=> "",
                    "localidadid"=> 2538,
                    "latitud"=> "-1234106",
                    "longitud"=> "21314141",
                    "barrio"=> "barrio9",
                    "piso"=> "17º",
                    "depto"=> "F",
                    "escalera"=> "escalera18",
                    "entre_calle_1"=> "Entrecalle18",
                    "entre_calle_2"=> "Entrecalle-86",
                    "localidad"=> "El Bolson"
                ],
                [
                    "id"=> 35,
                    "nombre"=> "",
                    "calle"=> "calle15",
                    "altura"=> "",
                    "localidadid"=> 2538,
                    "latitud"=> "-1234089",
                    "longitud"=> "12345253",
                    "barrio"=> "barrio8",
                    "piso"=> "",
                    "depto"=> "6",
                    "escalera"=> "escalera35",
                    "entre_calle_1"=> "Entrecalle35",
                    "entre_calle_2"=> "Entrecalle-69",
                    "localidad"=> "El Bolson"
                ],
                [
                    "id"=> 52,
                    "nombre"=> "",
                    "calle"=> "calle12",
                    "altura"=> "",
                    "localidadid"=> 2538,
                    "latitud"=> "-2999990",
                    "longitud"=> "12345270",
                    "barrio"=> "barrio7",
                    "piso"=> "5º",
                    "depto"=> "11",
                    "escalera"=> "escalera52",
                    "entre_calle_1"=> "Entrecalle52",
                    "entre_calle_2"=> "Entrecalle-52",
                    "localidad"=> "El Bolson"
                ],
                [
                    "id"=> 69,
                    "nombre"=> "",
                    "calle"=> "calle9",
                    "altura"=> "",
                    "localidadid"=> 2538,
                    "latitud"=> "-2999973",
                    "longitud"=> "12423522",
                    "barrio"=> "barrio6",
                    "piso"=> "",
                    "depto"=> "D",
                    "escalera"=> "escalera69",
                    "entre_calle_1"=> "Entrecalle69",
                    "entre_calle_2"=> "Entrecalle-35",
                    "localidad"=> "El Bolson"
                ],
                [
                    "id"=> 86,
                    "nombre"=> "",
                    "calle"=> "calle6",
                    "altura"=> "",
                    "localidadid"=> 2538,
                    "latitud"=> "-2999956",
                    "longitud"=> "12423539",
                    "barrio"=> "barrio5",
                    "piso"=> "0º",
                    "depto"=> "9",
                    "escalera"=> "escalera86",
                    "entre_calle_1"=> "Entrecalle86",
                    "entre_calle_2"=> "Entrecalle-18",
                    "localidad"=> "El Bolson"
                ],
                [
                    "id"=> 103,
                    "nombre"=> "",
                    "calle"=> "calle3",
                    "altura"=> "",
                    "localidadid"=> 2538,
                    "latitud"=> "-2999939",
                    "longitud"=> "12423556",
                    "barrio"=> "barrio4",
                    "piso"=> "10º",
                    "depto"=> "14",
                    "escalera"=> "escalera103",
                    "entre_calle_1"=> "Entrecalle103",
                    "entre_calle_2"=> "Entrecalle-1",
                    "localidad"=> "El Bolson"
                ]
            ]
        ]);
    }
}
