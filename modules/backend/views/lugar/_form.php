<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
* @var yii\web\View $this
* @var app\models\Lugar $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="lugar-form">

    <?php $form = ActiveForm::begin([
    'id' => 'Lugar',
    'layout' => 'horizontal',
    'enableClientValidation' => true,
    'errorSummaryCssClass' => 'error-summary alert alert-danger',
    'fieldConfig' => [
             'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
             'horizontalCssClasses' => [
                 'label' => 'col-sm-2',
                 #'offset' => 'col-sm-offset-4',
                 'wrapper' => 'col-sm-8',
                 'error' => '',
                 'hint' => '',
             ],
         ],
    ]
    );
    ?>

    <div class="">
        <?php $this->beginBlock('main'); ?>

        <p>
            

<!-- attribute localidadid -->
			<?= // generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::activeField
$form->field($model, 'localidadid')->dropDownList(
    \yii\helpers\ArrayHelper::map(app\models\Localidad::find()->all(), 'id', 'id'),
    [
        'prompt' => 'Select',
        'disabled' => (isset($relAttributes) && isset($relAttributes['localidadid'])),
    ]
); ?>

<!-- attribute nombre -->
			<?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

<!-- attribute calle -->
			<?= $form->field($model, 'calle')->textInput(['maxlength' => true]) ?>

<!-- attribute altura -->
			<?= $form->field($model, 'altura')->textInput(['maxlength' => true]) ?>

<!-- attribute latitud -->
			<?= $form->field($model, 'latitud')->textInput(['maxlength' => true]) ?>

<!-- attribute longitud -->
			<?= $form->field($model, 'longitud')->textInput(['maxlength' => true]) ?>

<!-- attribute barrio -->
			<?= $form->field($model, 'barrio')->textInput(['maxlength' => true]) ?>

<!-- attribute piso -->
			<?= $form->field($model, 'piso')->textInput(['maxlength' => true]) ?>

<!-- attribute depto -->
			<?= $form->field($model, 'depto')->textInput(['maxlength' => true]) ?>

<!-- attribute escalera -->
			<?= $form->field($model, 'escalera')->textInput(['maxlength' => true]) ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    Tabs::widget(
                 [
                    'encodeLabels' => false,
                    'items' => [ 
                        [
    'label'   => Yii::t('models', 'Lugar'),
    'content' => $this->blocks['main'],
    'active'  => true,
],
                    ]
                 ]
    );
    ?>
        <hr/>

        <?php echo $form->errorSummary($model); ?>

        <?= Html::submitButton(
        '<span class="glyphicon glyphicon-check"></span> ' .
        ($model->isNewRecord ? 'Create' : 'Save'),
        [
        'id' => 'save-' . $model->formName(),
        'class' => 'btn btn-success'
        ]
        );
        ?>

        <?php ActiveForm::end(); ?>

    </div>

</div>

