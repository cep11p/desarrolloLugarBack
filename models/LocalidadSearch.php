<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Localidad;

/**
* LocalidadSearch represents the model behind the search form about `app\models\Localidad`.
*/
class LocalidadSearch extends Localidad
{
    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
            [['id', 'regionid', 'departamentoid', 'municipioid','provinciaid'], 'integer'],
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
        $query = Localidad::find();

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
            'regionid' => $this->regionid,
            'departamentoid' => $this->departamentoid,
            'municipioid' => $this->municipioid,
        ]);
        
        $query->andFilterWhere(['like', 'nombre', $this->nombre]);
        
        return $dataProvider;
    }
    
    public function busquedadGeneral($params)
    {
        $query = Localidad::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false
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
        }else if(isset($this->provinciaid)){
            $query->leftJoin("departamento as d", "departamentoid=d.id");
            
            $query->andFilterWhere([
                'id' => $this->id,
                'regionid' => $this->regionid,
                'departamentoid' => $this->departamentoid,
                'municipioid' => $this->municipioid,
                'd.provinciaid' => $this->provinciaid,
            ]);

            $query->andFilterWhere(['like', 'localidad.nombre', $this->nombre]);
        }else{
            $query->andFilterWhere([
                'id' => $this->id,
                'regionid' => $this->regionid,
                'departamentoid' => $this->departamentoid,
                'municipioid' => $this->municipioid,
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