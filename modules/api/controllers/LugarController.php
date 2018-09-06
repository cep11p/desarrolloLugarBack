<?php
namespace app\modules\api\controllers;

use yii\rest\ActiveController;
use yii\web\Response;

use Yii;
use yii\base\Exception;

use app\models\Lugar;

class LugarController extends ActiveController{
    
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
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        return $actions;
    
    }
    
    public function prepareDataProvider() 
    {
        $searchModel = new \app\models\LugarSearch();
//        return $searchModel->busquedadGeneral(\Yii::$app->request->queryParams);
        $resultado = $searchModel->busquedadGeneral(\Yii::$app->request->queryParams);
        
        $data = array('success'=>false);
        if($resultado->getTotalCount()){
            $data['success']='true';            
            $data['resultado']=$resultado->models;
        }

        return $data;
    }   
    
    public function actionCreate()
    {
        $resultado['message']='Se guarda un Lugar';
        $param = Yii::$app->request->post();
        $transaction = Yii::$app->db->beginTransaction();
        $arrayErrors = array();
        try {
       
            $model = new Lugar;
            $model->setAttributes($param);
            
            if(!$model->save()){
                $arrayErrors['lugar']=$model->getErrors();
                $arrayErrors['tab']='lugar';                
                throw new Exception(json_encode($arrayErrors));
            }            
            
            $transaction->commit();
            
            $resultado['success']=true;
            $resultado['data']['id']=$model->id;
            
            return  $resultado;
           
        }catch (Exception $exc) {
            //echo $exc->getTraceAsString();
            $transaction->rollBack();
            $mensaje =$exc->getMessage();
            throw new \yii\web\HttpException(500, $mensaje);
        }

    }
}