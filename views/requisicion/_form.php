<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\datecontrol\DateControl;
use kartik\money\MaskMoney;

/* @var $this yii\web\View */
/* @var $model app\models\Requisicion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="requisicion-form">

    <?php $form = ActiveForm::begin(['action' => ['requisicion/create']]); ?>

    <?= $form->field($model, 'folio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_f')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cliente_did')->dropDownList(ArrayHelper::map(app\models\Cliente::find()->asArray()->all(), 'id', 'nombre')) ?>

    <?= $form->field($model, 'departamento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comentarios')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'estatus_did')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usuario_aid')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'fechacreacion_ft')->widget(DateControl::classname(), ['type'=>DateControl::FORMAT_DATETIME,]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
