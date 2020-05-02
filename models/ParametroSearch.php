<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
* LugarSearch represents the model behind the search form about `app\models\Lugar`.
*/
class ParametroSearch
{
    
    public function busquedaGeneral($params)
    {
        $tables = explode(",", $params['tables']);
        
        $coleccion = $this->getListas($tables);
        $resultado['delegacion'] = $coleccion;
        
        return $resultado;
    }
    
    private function getLista($table)
    {
        $resultado = [];
        $query = \yii\db\ActiveRecord::find();
        $existeTable = $query->createCommand()->setSql("SHOW TABLES LIKE '".$table."'")->queryOne();
        
        if (!empty($existeTable)){
            $query->select([
                'id'=>'id',
                'nombre'=>'nombre',
            ]);
            $query->from([$table]);

            $command = $query->createCommand();
            
            $rows = $command->queryAll();
            
            $resultado = $rows;
        }
        
        return $resultado; 
    }
    
    private function getListas($tables)
    {
        foreach ($tables as $value) {
            $lista = $this->getLista($value);
            if(count($lista)>0){
                $resultado[$value] = $lista;
            }            
        }
        
        return $resultado;
    }
}