<?php

namespace app\models;

use Yii;
use \app\models\base\Localidad as BaseLocalidad;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "localidad".
 */
class Localidad extends BaseLocalidad
{    
    const RIO_NEGRO = 16;
    public $provinciaid; #solo sirve para hacer un join

    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                # custom behaviors
            ]
        );
    }

    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                ['nombre','validarLocalidad']
            ]
        );
    }

    public function validarLocalidad(){
        if(!isset($this->departamentoid)){
            $this->addError('departamentoid','Falta asignar el departamento');
        }
        if(!isset($this->codigo_postal)){
            $this->addError('codigo_postal','Se requiere el codigo postal');
        }
    }
}
