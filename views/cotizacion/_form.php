<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\datecontrol\DateControl;
use kartik\money\MaskMoney;

/* @var $this yii\web\View */
/* @var $model app\models\cotizacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cotizacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'folio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_f')->widget(DateControl::classname(), [
					    'type'=>DateControl::FORMAT_DATE,							    
					]); ?>

    <?= $form->field($model, 'porcentaje')->textInput() ?>

    <?= $form->field($model, 'subtotal')->textInput() ?>

    <?= $form->field($model, 'iva')->textInput() ?>

    <?= $form->field($model, 'total')->textInput() ?>

    <?= $form->field($model, 'estatus_did')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'requisicion_did')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cliente_did')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comentarios')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fechacreacion_ft')->widget(DateControl::classname(), [
								    'type'=>DateControl::FORMAT_DATETIME,							    
								]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
