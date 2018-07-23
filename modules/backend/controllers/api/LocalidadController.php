<?php

namespace app\modules\backend\controllers\api;

/**
* This is the class for REST controller "LocalidadController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class LocalidadController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\Localidad';
}
