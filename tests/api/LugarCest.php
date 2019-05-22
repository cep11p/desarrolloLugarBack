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
    
    public function crearLugarExistente(ApiTester $I)
    {
        $I->wantTo('Se crea un Lugar Existente');
        
        $param = [
            'barrio'=>'barrio7',
            'calle'=>'calle7',
            'altura'=>'',
            'piso'=>'6º',
            'depto'=>'2',
            'localidadid'=>2544,
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
            'localidadid'=>2544,
            'latitud'=>'-1234117',
            'longitud'=>'21314130',
            'escalera'=>'escalera7',
            'entre_calle_1'=>'Entrecalle7',
            'entre_calle_2'=>'Entrecalle-97'
        ]);
    }
}
