<?php

namespace app\models;

use Yii;
use \app\models\base\Departamento as BaseDepartamento;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "departamento".
 */
class Departamento extends BaseDepartamento
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
