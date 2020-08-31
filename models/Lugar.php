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
    public $direccion;

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
    
    /**
     * Se realiza un un registro de lugar con atributos de string en minuscula
     * @param type $values
     * @param type $safeOnly
     */
    public function setAttributes($values, $safeOnly = true){
        $params = $this->limpiarParametrosConEspacios($values);
        parent::setAttributes($params, $safeOnly);
        $this->barrio = strtolower($this->barrio);
        $this->calle = strtolower($this->calle);
    }
    
    /**
     * Limpia los espacios que hay en un string en un array asociativo
     * @param array $values
     */
    private function limpiarParametrosConEspacios($values){
        $resultado = array();
        foreach ($values as $key => $value) {
            $porciones = explode(" ", $value);
            
            $cadena = '';
            foreach ($porciones as $val) {
                $cadena .= ($cadena=='' || empty($val))?'':' ';
                $cadena .= (!empty($val))?$val:'';
            }
            $resultado[$key] = $cadena;
        }
            
        return $resultado;
    }

    public function fields() {
        $resultado = ArrayHelper::merge(parent::fields(), [
            'localidad'=> function($model){
                return $model->localidad->nombre;
            },
            'codigo_postal'=> function($model){
                return $model->localidad->codigo_postal;
            },
        ]);
            
        return $resultado;
    }
    
    /**
     * Se busca un lugar identico
     * @param array $param
     * @return Lugar()
     */
    public static function buscarIdentico($param = array()) {
        $condition = array();
        $model = new Lugar();
        $model->setAttributes($param);
        
        foreach ($model->attributes as $key=>$value) {
            if(isset($value) && !empty($value)){
                $condition = ArrayHelper::merge($condition, [$key=>$value]);
            }else{
                $condition = ArrayHelper::merge($condition, [$key=>'']);
            }
        }
        
        unset($condition['id']);
        
        $resultado = Lugar::findByCondition($condition)->one();
        return $resultado;
    }
}
