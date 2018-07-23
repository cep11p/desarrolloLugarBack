<?php

namespace app\modules\backend\controllers\api;

/**
* This is the class for REST controller "MunicipioController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class MunicipioController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\Municipio';
}
