<?php

namespace app\models;

use Yii;
use \app\models\base\LocalidadExtra as BaseLocalidadExtra;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "localidad_extra".
 */
class LocalidadExtra extends BaseLocalidadExtra
{

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
                ['localidadid','validarLocalidad']
            ]
        );
    }

    public function validarLocalidad(){
        $localidad = Localidad::findOne(['id' => $this->localidadid]);


        if($localidad == NULL){
            $this->addError('localidadid','La localidad con el id '.$this->localidadid.' no exite.');
        }

        if(!isset($localidad->codigo_postal)){
            $this->addError('localidad','Se requiere el codigo postal de la localidad a vincular');
        }

        if(!isset($localidad->departamentoid)){
            $this->addError('localidad','Se requiere el departamento de la localidad a vincular');
        }

        if(isset($localidad->departamento->provinciaid) && $localidad->departamento->provinciaid == Localidad::RIO_NEGRO){
            $this->addError('localidad','Las localidades a vincular no deben ser de la pronvica de Río Negro');
        }
    }
}
