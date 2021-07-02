<?php
namespace app\modules\api\controllers;

use app\components\Help;
use app\models\Localidad;
use Exception;
use Yii;
use yii\rest\ActiveController;
use yii\web\Response;

class LocalidadController extends ActiveController{
    
    public $modelClass = 'app\models\Localidad';
    
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
        $searchModel = new \app\models\LocalidadSearch();
        $resultado = $searchModel->busquedadGeneral(\Yii::$app->request->queryParams);

        return $resultado;
    }  

    public function actionCreate()
    {
        $resultado['message']='Se registra una localidad';
        $param = Yii::$app->request->post();
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $model = new Localidad();
            $model->setAttributes($param);
            
            if(!$model->save()){             
                throw new Exception(Help::ArrayErrorsToString($model->getErrors()));
            }            
            
            $transaction->commit();
            
            $resultado['success']=true;
            $resultado['data']['id']=$model->id;
            
            return  $resultado;
           
        }catch (Exception $exc) {
            $transaction->rollBack();
            $mensaje =$exc->getMessage();
            throw new \yii\web\HttpException(500, $mensaje);
        }

    }

    public function actionUpdate($id){

        $resultado['message']='Se modifica una localidad';
        $param = Yii::$app->request->post();
        $transaction = Yii::$app->db->beginTransaction();
        try {
            #Buscamos la cuenta
            $model = Localidad::findOne(['id'=>$id]);            
            if($model==NULL){
                throw new \yii\web\HttpException(400, 'La localidad con el id '.$id.' no existe!');
            }
            $model->setAttributes($param);
            
            if(!$model->save()){             
                throw new Exception(Help::ArrayErrorsToString($model->getErrors()));
            }            
            
            $transaction->commit();
            
            $resultado['success']=true;
            $resultado['data']['id']=$model->id;
            
            return  $resultado;
           
        }catch (Exception $exc) {
            $transaction->rollBack();
            $mensaje =$exc->getMessage();
            throw new \yii\web\HttpException(500, $mensaje);
        }

    }
}