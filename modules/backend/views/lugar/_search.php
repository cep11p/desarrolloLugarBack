<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var app\models\LugarSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="lugar-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'nombre') ?>

		<?= $form->field($model, 'calle') ?>

		<?= $form->field($model, 'altura') ?>

		<?= $form->field($model, 'localidadid') ?>

		<?php // echo $form->field($model, 'latitud') ?>

		<?php // echo $form->field($model, 'longitud') ?>

		<?php // echo $form->field($model, 'barrio') ?>

		<?php // echo $form->field($model, 'piso') ?>

		<?php // echo $form->field($model, 'depto') ?>

		<?php // echo $form->field($model, 'escalera') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
