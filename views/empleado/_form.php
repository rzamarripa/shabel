<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\datecontrol\DateControl;
use kartik\money\MaskMoney;

/* @var $this yii\web\View */
/* @var $model app\models\Empleado */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empleado-form well">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="row">
    	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    		<?= $form->field($model, 'nombre')->textInput() ?>
    	</div>
    	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<?= $form->field($model, 'apellidos')->textInput() ?>
    	</div>
    	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				
    	</div>
    </div>
    <div class="row">
    	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
	    	<?= $form->field($model, 'celular')->textInput() ?>

    	</div>
    	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    		<?= $form->field($model, 'puesto')->textInput() ?>
    	</div>
    	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

    	</div>
    </div>
    <div class="row">
    	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<?= $form->field($model, 'estatus_did')->dropDownList(ArrayHelper::map(app\models\Estatus::find()->asArray()->all(), 'id', 'nombre'), ['prompt'=>'-Seleccione-']) ?>
    	</div>
    	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<?= $form->field($model, 'direccion')->textarea(['rows' => 2]) ?>
    	</div>
    	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    
    	</div>
    </div>
		<div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>

</div>
