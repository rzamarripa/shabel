<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

//$this->title = 'Bienvenido a Passa';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
						<div class="well no-padding">
							<?php $form = ActiveForm::begin(["id"=>"login-form", "options"=>["class"=>"smart-form client-form"]]); ?>
								<header>
									Iniciar Sesión
								</header>

								<fieldset>									
									<section>
										<label class="label">Usuario</label>
										<label class="input"> <i class="icon-append fa fa-user"></i>
											<input type="text" name="LoginForm[username]">
											<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Escribe tu Usuario</b></label>
									</section>

									<section>
										<label class="label">Contraseña</label>
										<label class="input"> <i class="icon-append fa fa-lock"></i>
											<input type="password" name="LoginForm[password]">
											<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Escribe tu Contraseña</b> </label>
										<div class="note">
											<a href="forgotpassword.html">Olvidaste la Contraseña?</a>
										</div>
									</section>

									<section>
										<label class="checkbox">
											<input id="rememberMe" type="checkbox" name="LoginForm[rememberMe]">		
											<i></i>Recordarme</label>
									</section>
								</fieldset>
								<footer>
									<button type="submit" class="btn btn-primary">
										Entrar
									</button>
								</footer>
							<?php $form = ActiveForm::end(); ?>

						</div>
					</div>
    </div>
</div>
<script type="text/javascript">
	$(function() {
	  $('#rememberMe').on('change', function(e) {
	    e.stopPropagation();
	    this.value = this.checked ? 1 : 0;
	  });
	})
</script>