<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Delegacion;

/**
* DelegacionSearch represents the model behind the search form about `app\models\Delegacion`.
*/
class DelegacionSearch extends Delegacion
{
    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nombre'], 'safe'],
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
        $query = Delegacion::find();

        $dataProvider = new ActiveDataProvider([
        '   query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
        // uncomment the following line if you do not want to any records when validation fails
        // $query->where('0=1');
        return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre]);

        return $dataProvider;
    }
    
    public function busquedaGeneral($params)
    {
        $query = Delegacion::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $params['pagesize'],
                'pageSize' => (isset($params['pagesize']) && is_numeric($params['pagesize']))?$params['pagesize']:20,
                'page' => (isset($params['page']) && is_numeric($params['page']))?$params['page']:0
            ],
        ]);

        $this->load($params,'');

        if (!$this->validate()) {
        // uncomment the following line if you do not want to any records when validation fails
        // $query->where('0=1');
        return $dataProvider;
        }
        

        if(isset ($params['ids']) && !empty ($params['ids'])){
            $lista_id = explode(",", $params['ids']);
            $query->andWhere(array('in', 'id', $lista_id));
        }else{
            $query->andFilterWhere([
                'id' => $this->id
            ]);

            $query->andFilterWhere(['like', 'nombre', $this->nombre]);
        }
        
        #predeterminadamente vamos a ordenar el nombre alfabeticamente
        if(!isset($params['sort']) || empty($params['sort'])){
            $query->orderBy(['nombre' => SORT_ASC]);
        }
        
        return $dataProvider;
    }
}