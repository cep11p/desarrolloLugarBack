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
    /**
     * Se realiza un pedido de parametros teniendo seteado el nombre de la tabla y sus id requeridos
     * @param array $params
     * @return array
     */
    public function getColeccionPorListaIds($params)
    {
        $resultado = [];
        $coleccion = $this->getListasPorColeccionIds($params);
        if(count($coleccion)>0){        
            $resultado = $coleccion;
        }
        return $resultado;
    }
    
    /**
     * Se piden un listado total de delegacion, municipio, comision de fomento, localidad y lugar
     * @return array
     */
    public function getColeccionLista()
    {
        $query = \yii\db\ActiveRecord::find();
        $query->select([
            'id'=>'id',
            'nombre'=>'nombre',
        ]);
        $query->from(['localidad']);

        $command = $query->createCommand();

        $rows = $command->queryAll();

        $resultado['localidad'] = $rows;
        
        $query->select([
            'id'=>'id',
            'nombre'=>'nombre',
        ]);
        $query->from(['delegacion']);

        $command = $query->createCommand();

        $rows = $command->queryAll();

        $resultado['delegacion'] = $rows;
        
        $query->select([
            'id'=>'id',
            'nombre'=>'nombre',
        ]);
        $query->from(['municipio']);

        $command = $query->createCommand();

        $rows = $command->queryAll();

        $resultado['municipio'] = $rows;
        
        $query->select([
            'id'=>'id',
            'nombre'=>'nombre',
        ]);
        $query->from(['comision_fomento']);

        $command = $query->createCommand();

        $rows = $command->queryAll();

        $resultado['comision_fomento'] = $rows;
        
        $query->select([]);
        $query->from(['lugar']);

        $command = $query->createCommand();

        $rows = $command->queryAll();

        $resultado['lugar'] = $rows;
        
        
        return $resultado;
    }
    
    /**
     * Se pide una coleccion de parametros 
     * @param array $tables lista de tablas con sus ids requeridos
     * @return array
     */
    private function getListasPorColeccionIds($tables)
    {
        $resultado = [];
        foreach ($tables as $key => $value) {
            $query = \yii\db\ActiveRecord::find();
            $existeTable = $query->createCommand()->setSql("SHOW TABLES LIKE '".$key."'")->queryOne();

            if (!empty($existeTable)){
                $query->select([
                    'id'=>'id',
                    'nombre'=>'nombre',
                ]);
                $query->from([$key]);
                $query->andWhere(array('in', 'id', $value));
                $command = $query->createCommand();

                $rows = $command->queryAll();
                
                if(count($rows)>0){
                    $resultado[$key] = $rows;
                } 
            }        
        }
        return $resultado;
    }
}