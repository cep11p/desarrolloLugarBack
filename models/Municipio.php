<?php

namespace app\models;

use Yii;
use \app\models\base\Municipio as BaseMunicipio;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "municipio".
 */
class Municipio extends BaseMunicipio
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
