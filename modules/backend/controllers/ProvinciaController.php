<?php

namespace app\modules\backend\controllers;
use yii\filters\AccessControl;

/**
* This is the class for controller "ProvinciaController".
*/
class ProvinciaController extends \app\modules\backend\controllers\base\ProvinciaController
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
