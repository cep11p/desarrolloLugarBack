<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LocalidadExtra;

/**
* LocalidadExtraSearch represents the model behind the search form about `app\models\LocalidadExtra`.
*/
class LocalidadExtraSearch extends LocalidadExtra
{
    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
            [['localidadid'], 'integer'],
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
        $query = LocalidadExtra::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        $this->load($params,'');

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'localidadid' => $this->localidadid,
        ]);

        /******* Se obtiene la coleccion******/
        $coleccion = array();
        $localidad_ids = '';
        foreach ($dataProvider->getModels() as $value) {
            $localidad_ids .= (empty($localidad_ids))?$value->localidadid:','.$value->localidadid;
        }
        
        $resultado = LocalidadSearch::busquedadGeneral(['ids'=>$localidad_ids]);
        foreach ($resultado->models as $value) {
            $coleccion[] = $value->toArray();
        }
        
        return $coleccion;

    }
}