
<?php 
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\ArrayHelper;
    use yii\web\Controller;
    use app\models\Cliente;
?>

<div class="cliente-index">
<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#form" aria-expanded="false" aria-controls="form" style="margin-bottom:10px;">
  Nuevo
</button>
<div class="collapse" id="form">
  <div class="well">
    <div class="Cliente-form">

     <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput() ?>

    <?= $form->field($model, 'direccion')->textInput() ?>

    <?= $form->field($model, 'contacto')->textInput() ?>

    <?= $form->field($model, 'telefono')->textInput() ?>

    <?= $form->field($model, 'correo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
  </div>
</div>

   <table id="datatable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>direccion</th>
            <th>Contacto</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Acciones</th>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($Cliente as $cliente) {?> 
        <tr>
            <td><?= $cliente->nombre ?></td>        
            <td><?= $cliente->direccion?></td>
            <td><?= $cliente->telefono?></td>
            <td><?= $cliente->contacto?></td>
            <td><?= $cliente->correo?></td>
            
            <td>
                <?= Html::a('<span class="fa fa-pencil"></span>',['cliente/update','id'=>$cliente->id],['class'=>'btn btn-default']) ?>
                <?php if($cliente->estatus_did == 1){ echo Html::a('<span class="fa fa-trash-o"></span>',['cliente/cambiar','estatus'=>2,'id'=>$cliente->id],['class'=>'btn btn-danger']);
            }else{echo Html::a('<span class="fa fa-recycle"></span>',['cliente/cambiar','estatus'=>1,'id'=>$cliente->id],['class'=>'btn btn-success']);}?>
            </td>
        </tr>
        <?php }?>
    </tbody>
</table>

</div>
