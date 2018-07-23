<?php

namespace app\modules\backend\controllers;
use yii\filters\AccessControl;

/**
* This is the class for controller "RegionController".
*/
class RegionController extends \app\modules\backend\controllers\base\RegionController
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
