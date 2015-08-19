<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RequisicionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="requisicion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'folio') ?>

    <?= $form->field($model, 'fecha_f') ?>

    <?= $form->field($model, 'cliente_did') ?>

    <?= $form->field($model, 'departamento') ?>

    <?php // echo $form->field($model, 'comentarios') ?>

    <?php // echo $form->field($model, 'estatus_did') ?>

    <?php // echo $form->field($model, 'usuario_aid') ?>

    <?php // echo $form->field($model, 'fechacreacion_ft') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
