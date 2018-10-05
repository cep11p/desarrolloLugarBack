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
        unset($actions['update']);
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
    
    /**
     * Se crea un nuevo lugar. 
     * Antes de registrar el lugar, se buscara si el lugar existe y se notificará
     * Para reutilzar el Existe un atributo flag para reutilizar el lugar
     * @return array este array contiene el id y si fue exitoso
     * @throws \yii\web\HttpException
     * @throws Exception
     */
    public function actionCreate()
    {
        $resultado['message']='Se guarda un Lugar';
        $param = Yii::$app->request->post();
        $transaction = Yii::$app->db->beginTransaction();
        $arrayErrors = array();
        try {
       
            $model = new Lugar;
            $model->setAttributes($param);
            $model->id = '';
//            if(isset($param['usarLugarEncontrado']) && $param['usarLugarEncontrado']==true){
                
            $model = Lugar::findOne(array_filter($model->attributes));

            if($model==null){
                $model = new Lugar;
                $model->setAttributes($param);
            }
//            }
            
            
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
    
    public function actionUpdate($id)
    {
        $resultado['message']='Se guarda un Lugar';
        $param = Yii::$app->request->post();
        $transaction = Yii::$app->db->beginTransaction();
        $arrayErrors = array();
        try {
       
            $model = new Lugar;
            $model = $model->findOne(['id'=>$id]);
            if($model==null){
                $msj="El Lugar con el id $id no existe";
                throw new Exception($msj);
            }
            
            $modeloAnterior = $model->toArray();
            
            #renovamos los atributos
            $model->setAttributes($param);
            
            ###### Regla de negocio #######
            #Regla N1: Se debe modificar el lugar si solo tienen la misma cantidad de atributo, caso contrario, si tienen menos atributos o mas 
            #atributos nuevos se debe crear un atributo completamente nuevo, ya que existen lugares
            # Si se agregan mas o menos atributos quiere decir que es otro Lugar distinto
            if(count(array_filter($modeloAnterior)) < count(array_filter($model->toArray()))){
                $notificacion = "Se agrega un nuevo lugar con datos mas especificos";
                $model = new Lugar();
                $model->setAttributes($param);
            }elseif(count(array_filter($modeloAnterior)) > count(array_filter($model->toArray()))){
                $notificacion = "Se agrega un nuevo lugar con datos mas especificos";
                $model = new Lugar();
                $model->setAttributes($param);
            }
            ###### Fin de regla de negocio #######
            
            
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