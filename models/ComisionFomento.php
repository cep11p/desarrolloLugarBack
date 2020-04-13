<?php

namespace app\models;

use Yii;
use \app\models\base\ComisionFomento as BaseComisionFomento;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "comision_fomento".
 */
class ComisionFomento extends BaseComisionFomento
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
