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
						{{item.articulo.unidad}}
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
		<a ng-click="agregar()" href="" class="btn"><i class="icon-plus">&nbsp;</i></a>
	
		<div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
			'type'=>'info',
			'buttonType'=> 'submit',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
                    )); ?>

    	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'type'=>'info',
			'label'=>"Cancelar",
			'htmlOptions'=>array(
				'data-toggle'=>'modal',
                'data-target'=>'#myModalCanc',
				'style'=>'float:right;margin-right:15px;',
			),
		)); ?>
        
        <?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'myModal')); ?>
 
            <div class="modal-header">
                <a class="close" data-dismiss="modal">&times;</a>
                <h4>Confirmación</h4>
            </div>
 
            <div class="modal-body">
                <p>¿Está seguro de que desea crear esta requisición ?</p>
            </div>
 
            <div class="modal-footer">
                <?php $this->widget('bootstrap.widgets.TbButton', array(
                    'buttonType'=>'submit',
                    'type'=>'info',
                    'label'=>'Guardar',
                    'url'=>'#',
                    'htmlOptions'=>array('onclick'=>'$("#requisicion-form").submit()'),
                )); ?>
                <?php $this->widget('bootstrap.widgets.TbButton', array(
                    'label'=>'Cancelar',
                    'url'=>'#',
                    'htmlOptions'=>array('data-dismiss'=>'modal'),
                )); ?>
            </div>
 
        <?php $this->endWidget(); ?>

        <?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'myModalCanc')); ?>
 
            <div class="modal-header">
                <a class="close" data-dismiss="modal">&times;</a>
                <h4>Confirmación</h4>
            </div>
 
            <div class="modal-body">
                <p>¿Está seguro de que desea cancelar ?</p>
            </div>
 
            <div class="modal-footer">
                <?php $this->widget('bootstrap.widgets.TbButton', array(
                    'label'=>'No',
                    'url'=>'#',
                    'htmlOptions'=>array('data-dismiss'=>'modal'),
                )); ?>
                <?php $this->widget('bootstrap.widgets.TbButton', array(
                    'type'=>'info',
                    'label'=>'Si',
                    'url'=>'#',
                    'htmlOptions'=>array('data-dismiss'=>'modal','onclick'=>'window.location.href="index"'),
                )); ?>
            </div>
 
        <?php $this->endWidget(); ?>
		</div>

    <?php ActiveForm::end(); ?>

</div>
