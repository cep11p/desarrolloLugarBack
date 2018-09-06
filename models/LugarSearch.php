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
        [['nombre', 'calle', 'altura', 'latitud', 'longitud', 'barrio', 'piso', 'depto','escalera'], 'safe'],
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
    
    public function busquedadGeneral($params)
    {
        $query = Lugar::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params,'');

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
}