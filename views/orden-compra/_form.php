<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\datecontrol\DateControl;
use kartik\money\MaskMoney;

/* @var $this yii\web\View */
/* @var $model app\models\OrdenCompra */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orden-compra-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'folio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'requisicion_did')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codicionpago')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estatus_did')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fechaCreacion_ft')->widget(DateControl::classname(), [
								    'type'=>DateControl::FORMAT_DATETIME,							    
								]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
