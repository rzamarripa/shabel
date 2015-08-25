<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\datecontrol\DateControl;
use kartik\money\MaskMoney;
//use kartik\money\DateControl;

/* @var $this yii\web\View */
/* @var $model app\models\Requisicion */
/* @var $form yii\widgets\ActiveForm */
?>
<div ng-controller="RequisicionFormCtrl">
	<script type="text/javascript">
		window.first = window.first || {};
		window.first.data = window.first.data || {};
		<?php if (isset($detalle)) { ?>
			window.first.data.detalle = <?php echo json_encode($detalle); ?>;
		<?php } else { ?>
			window.first.data.detalle = null;
		<?php } ?>
	</script>
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
    
    <table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Cantidad</th>
					<th>Descripción</th>
					<th>Unidad</th>
					<th>Observaciones</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="(key,item) in items">
					<td>
						<span class="control-group" ng-class="{true: 'error', false: ''}[item.error.cantidad]">
							<input id="item_{{key}}" name="detalle[{{key}}][cantidad]" ng-keypress="enter(item, $event)" type="text" ng-model="item.cantidad" class="input-mini" />
						</span>
					</td>
					<td>
						<span class="control-group" ng-class="{true: 'error', false: ''}[item.error.articulo]">
							<input class="articulo" type="hidden" ui-select2="articulosOptions" name="detalle[{{key}}][articulo]" ng-model="item.articulo" />
						</span>
					</td>
					<td>
						{{5 + 5}}
					</td>
					<td>
						<input name="detalle[{{key}}][observaciones]" ng-keypress="enter(item, $event)" type="text" ng-model="item.observaciones" />
					</td>
					<td>
						<button ng-click="cancelar(item, $event)" class="btn btn-mini btn-danger">Cancelar</button>
					</td>
				</tr>
			</tbody>
		</table>
		<a ng-click="agregar()" href="" class="btn btn-primary pull-right"><i class="fa fa-plus">&nbsp;</i></a>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
	</div>
</div>
