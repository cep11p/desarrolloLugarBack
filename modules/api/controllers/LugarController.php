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
        $params = \Yii::$app->request->queryParams;
        $resultado = $searchModel->busquedadGeneral($params);
        $default_pagesize=20;
        $pagesize=(isset($params['pagesize']))?$params['pagesize']:$default_pagesize;
        $data = array('success'=>false);
        if($resultado->getTotalCount()){
            $paginas = ceil($resultado->totalCount/$pagesize);
                    
            $data['success']='true';            
            $data['pagesize']=$pagesize;            
            $data['pages']=$paginas;            
            $data['total_filtrado']=$resultado->totalCount;
            $data['resultado']=$resultado->models;
        }

        return $data;
    }   
    
    /**
     * Se crea un nuevo lugar. 
     * Antes de registrar el lugar, se buscara si el lugar existe y para ser reutilizada
     * @return array este array contiene el id y si fue exitoso
     * @throws \yii\web\HttpException
     * @throws Exception
     */
    public function actionCreate()
    {
        $resultado['message']='Se guarda un Lugar';
        $param = Yii::$app->request->post();
        $transaction = Yii::$app->db->beginTransaction();
        try {
            set_time_limit(0);
            $model = Lugar::buscarIdentico($param);
            if($model==null){
                $model = new Lugar;
                $model->setAttributes($param);
            }
            
            if(!$model->save()){             
                throw new Exception(json_encode($model->getErrors()));
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
    
    /**
     * Vamos a buscar a un lugar identico a los criterios
     * @return array
     */
    public function actionBuscarIdentico()
    {        
        $model = Lugar::buscarIdentico(\Yii::$app->request->queryParams);
        
        $data = array();
        if(isset($model)){            
            $data = $model->toArray();
        }

        return $data;      

    }
}