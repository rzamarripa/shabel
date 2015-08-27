<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
<<<<<<< HEAD
/* @var $model app\models\EmpleadoSearch */
=======
/* @var $model app\models\ArticuloSearch */
>>>>>>> ba0c7fe5502aa0c8c8a73453aee2ddce335482ec
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articulo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'unidad') ?>

<<<<<<< HEAD
    

    <?php // echo $form->field($model, 'direccion') ?>

    <?php // echo $form->field($model, 'estatus_did') ?>

    <?php // echo $form->field($model, 'estatus_aid') ?>
=======
    <?= $form->field($model, 'estatus_did') ?>

    <?= $form->field($model, 'fechacreacion_ft') ?>
>>>>>>> ba0c7fe5502aa0c8c8a73453aee2ddce335482ec

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
