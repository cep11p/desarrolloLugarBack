<?php

namespace app\models;

use Yii;
use \app\models\base\Delegacion as BaseDelegacion;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "delegacion".
 */
class Delegacion extends BaseDelegacion
{

    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                # custom behaviors
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
