<?php

namespace app\modules\backend\controllers;
use yii\filters\AccessControl;

/**
* This is the class for controller "LugarController".
*/
class LugarController extends \app\modules\backend\controllers\base\LugarController
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
