<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = 'Registro';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
		<div class="site-signup well">
		    <h1><?= Html::encode($this->title) ?></h1>		
		    <hr>
		    <div class="row">
		        <div class="col-lg-12">
		            <?php $form = ActiveForm::begin(); ?>
	                <?= $form->field($model, 'username') ?>
	                <?= $form->field($model, 'email') ?>
	                <?= $form->field($model, 'password')->passwordInput() ?>
	                
		            
		        </div>
		    </div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
		<div class="empleado-form well">		

			<h1><?= "Empleado"?></h1>
			<hr>
		    <div class="row">
		    	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
		    		<?= $form->field($empleado, 'nombre')->textInput() ?>
		    	</div>
		    	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<?= $form->field($empleado, 'apellidos')->textInput() ?>
		    	</div>
		    	
		    </div>
		    <div class="row">
		    	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			    	<?= $form->field($empleado, 'celular')->textInput() ?>
		
		    	</div>
		    	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
		    		<?= $form->field($empleado, 'puesto')->textInput() ?>
		    	</div>
		    	
		    </div>
		    <div class="row">
		    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<?= $form->field($empleado, 'direccion')->textarea(['rows' => 1]) ?>
		    	</div>		    	
		    </div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="form-group pull-right">
	      <?= Html::submitButton('Registrarme', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
	  </div>
	</div>	
  <?php ActiveForm::end(); ?>
</div>


