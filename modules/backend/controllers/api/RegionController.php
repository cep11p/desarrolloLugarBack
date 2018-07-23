<?php

namespace app\modules\backend\controllers\api;

/**
* This is the class for REST controller "RegionController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class RegionController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\Region';
}
