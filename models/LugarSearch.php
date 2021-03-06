<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Lugar;

/**
* LugarSearch represents the model behind the search form about `app\models\Lugar`.
*/
class LugarSearch extends Lugar
{
    /**
    * @inheritdoc
    */
    public function rules()
    {
    return [
        [['id', 'localidadid'], 'integer'],
        [['nombre', 'calle', 'altura', 'latitud', 'longitud', 'barrio', 'piso', 'depto','escalera','direccion'], 'safe'],
    ];
    }

    /**
    * @inheritdoc
    */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
    * Creates data provider instance with search query applied
    *
    * @param array $params
    *
    * @return ActiveDataProvider
    */
    public function search($params)
    {
        $query = Lugar::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'localidadid' => $this->localidadid,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'calle', $this->calle])
            ->andFilterWhere(['like', 'altura', $this->altura])
            ->andFilterWhere(['like', 'latitud', $this->latitud])
            ->andFilterWhere(['like', 'longitud', $this->longitud])
            ->andFilterWhere(['like', 'barrio', $this->barrio])
            ->andFilterWhere(['like', 'piso', $this->piso])
            ->andFilterWhere(['like', 'depto', $this->depto])
            ->andFilterWhere(['like', 'escalera', $this->escalera]);

        return $dataProvider;
    }
    
    /**
     * Este filtrado filtra por todos los atributos
     * @url api.lugar.local/api/lugar?id=1&nombre=algo
     * @param array $params
     * @return ActiveDataProvider
     */
    public function busquedadGeneral($params)
    {
        $query = Lugar::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $params['pagesize'],
                'page' => (isset($params['page']) && is_numeric($params['page']))?$params['page']:0
            ],
        ]);

        $this->load($params,'');

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            $query->where('0=1');
            return $dataProvider;
        }

        if(isset ($params['ids']) && !empty ($params['ids'])){
            $lista_id = explode(",", $params['ids']);
            $query->andWhere(array('in', 'id', $lista_id));
        }else{
            $query->andFilterWhere(['localidadid' => $this->localidadid]);

            $query->andFilterWhere(['like', "concat(calle,' ',altura)", $this->direccion]);
            $query->andFilterWhere(['like', 'barrio', $this->barrio]);
        }
        
//        die($query->createCommand()->sql);

        return $dataProvider;
    }
}