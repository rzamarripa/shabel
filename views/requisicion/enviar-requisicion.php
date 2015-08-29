<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
?>


<?php $form = ActiveForm::begin(); ?>
<div class="col-sm-4">
	<?php echo Select2::widget([
    'name' => 'proveedor',
    'value' => '',
    'data' => $data,
    'options' => ['multiple' => true, 'placeholder' => 'Selecciona proveedor ...']
]); ?>
</div>

<?= $form->field($model, 'requisicion_did')->hiddenInput(['value'=>$id])->label(false) ?>

<div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Enviar' : 'Actualizar', ['onClick'=>"return confirm('Estas seguro?')",'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end(); ?>