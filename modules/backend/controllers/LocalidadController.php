<?php

namespace app\modules\backend\controllers;
use yii\filters\AccessControl;

/**
* This is the class for controller "LocalidadController".
*/
class LocalidadController extends \app\modules\backend\controllers\base\LocalidadController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

}
