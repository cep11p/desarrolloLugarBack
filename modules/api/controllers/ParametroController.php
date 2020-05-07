<?php
namespace app\modules\api\controllers;

use yii\rest\ActiveController;
use yii\web\Response;

use Yii;
use yii\base\Exception;

class ParametroController extends ActiveController{
    
    public $modelClass = 'app\models\Lugar';
    
    public function behaviors()
    {

        $behaviors = parent::behaviors();     

        $auth = $behaviors['authenticator'];
        unset($behaviors['authenticator']);

        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::className()
        ];

        $behaviors['contentNegotiator']['formats']['application/json'] = Response::FORMAT_JSON;

        $behaviors['authenticator'] = $auth;

//        $behaviors['authenticator'] = [
//            'class' => \yii\filters\auth\HttpBearerAuth::className(),
//        ];

        // avoid authentication on CORS-pre-flight requests (HTTP OPTIONS method)
        $behaviors['authenticator']['except'] = ['options'];     

//        $behaviors['access'] = [
//            'class' => \yii\filters\AccessControl::className(),
//            'only' => ['*'],
//            'rules' => [
//                [
//                    'allow' => true,
//                    'roles' => ['@'],
//                ]
//            ]
//        ];



        return $behaviors;
    }
    
    public function actions()
    {
        $actions = parent::actions();
        unset($actions['create']);
        unset($actions['update']);
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        return $actions;
    
    }
    
    public function prepareDataProvider() 
    {
        $searchModel = new \app\models\ParametroSearch();
        $params = \Yii::$app->request->queryParams;
        $resultado = $searchModel->getColeccionLista($params);          
        
        return $resultado;
    }   
    
    /**
     * Se obtiene una coleccion de parametros lugar, localidad, delegacion, comision_fomento, municipio
     * @param arrayJson
        {
            "delegacion": [{"id":1},{"id":2},{"id":3}],
            "localidad": [{"id":1},{"id":2},{"id":3}],
            "municipio": [],
            "comision_fomento": [{"id":1},{"id":2},{"id":3}],
            "lugar": [{"id":1},{"id":2},{"id":3}]
        }
     * @return array
     */
    public function actionLista() 
    {
        $searchModel = new \app\models\ParametroSearch();
        $params = \Yii::$app->request->post();
        $resultado = $searchModel->getColeccionPorListaIds($params);          
        
        return $resultado;
    }   
    
   
}