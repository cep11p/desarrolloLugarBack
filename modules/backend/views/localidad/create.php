<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\Localidad $model
*/

$this->title = Yii::t('models', 'Localidad');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Localidads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud localidad-create">

    <h1>
        <?= Yii::t('models', 'Localidad') ?>
        <small>
                        <?= Html::encode($model->id) ?>
        </small>
    </h1>

    <div class="clearfix crud-navigation">
        <div class="pull-left">
            <?=             Html::a(
            'Cancel',
            \yii\helpers\Url::previous(),
            ['class' => 'btn btn-default']) ?>
        </div>
    </div>

    <hr />

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
