<?php

namespace app\models;

use Yii;
use \app\models\base\Lugar as BaseLugar;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "lugar".
 */
class Lugar extends BaseLugar
{

    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                'bedezign\yii2\audit\AuditTrailBehavior'
            ]
        );
    }

    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                # custom validation rules
            ]
        );
    }
}
