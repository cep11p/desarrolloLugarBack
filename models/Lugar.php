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
    public $globalSearch;

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
//                [['localidadid'],'existeLugar']
            ]
        );
    }
    
    /**
     * Esta funcion notifica si el lugar es identico
     * @author Carlos Perez <cep11p@gmail.com>
     */
    public function existeLugar(){
        $modelSearch = new LugarSearch();
        $resultado = $modelSearch->busquedadGeneral($this->attributes);
        if($resultado->getTotalCount()){            
            foreach ($resultado->models as $modeloEncontrado){
                $modeloEncontrado = $modeloEncontrado->toArray();
                $lugar["id"]=$modeloEncontrado['id'];                
                #borramos el id, ya que el modelo a registrar aun no tiene id
                $modeloEncontrado['id']="";
                
                //si $this viene con id cargado, nunca va a encontrar el parecido
                if($this->attributes==$modeloEncontrado){
                    $this->addError("notificacion", "El lugar a registrar ya existe!");
                    $this->addError("lugarEncontrado", $lugar);
                }
            }
        }
    }
}
