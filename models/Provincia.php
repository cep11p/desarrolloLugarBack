<?php

namespace app\models;

use Yii;
use \app\models\base\Provincia as BaseProvincia;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "provincia".
 */
class Provincia extends BaseProvincia
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
