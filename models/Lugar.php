<?php

namespace app\models;

use Yii;
use \app\models\base\Lugar as BaseLugar;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "lugar".
 */
class Lugar extends BaseLugar
{

    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                'bedezign\yii2\audit\AuditTrailBehavior'
            ]
        );
    }

    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                # custom validation rules
                [['localidadid'],'existeLugar']
            ]
        );
    }
    
    public function existeLugar(){
        $modelSearch = new LugarSearch();
        $resultado = $modelSearch->busquedadGeneral($this->attributes);
        
        if($resultado->getTotalCount()){
            $lugar["id"]= $resultado->models[0]->id;
            $this->addError("notificacion", "El lugar a registrar ya existe!");
            $this->addError("lugarEncontrado", $lugar);
        }
    }
    
    public function buscarLugar(){
        $modelSearch = new LugarSearch();
        $resultado = $modelSearch->busquedadGeneral($this->attributes);
        
        if($resultado->getTotalCount()){
            $lugarEntontrado= $resultado->models[0];
            
            $respuesta['lugarEncontrado'] = $lugarEntontrado;
            $respuesta['notificacion'] = "El lugar a registrar ya existe";
            
            print_r($respuesta);
            die();
            return $respuesta;
        }
        
        return false;
    }
}
