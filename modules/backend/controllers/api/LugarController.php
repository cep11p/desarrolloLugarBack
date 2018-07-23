<?php

namespace app\modules\backend\controllers\api;

/**
* This is the class for REST controller "LugarController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class LugarController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\Lugar';
}
