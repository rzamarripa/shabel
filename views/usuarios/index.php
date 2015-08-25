
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

    <?= $form->field($model, 'password')->textInput() ?>

    <?= $form->field($model, 'estatus')->textInput() ?>

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
            <th>contraseña</th>
            <th>estatus</th>
            <th>Correo</th>
            <th>Acciones</th>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($USUARIOS as $usuario) {?> 
        <tr>
            <td><?= $usuario->nombre ?></td>        
            <td><?= $usuario->contraseña?></td>
            <td><?= $usuario->estatus?></td>               
            <td><?= $usuario->correo?></td>
            
            <td>
                <?= Html::a('<span class="fa fa-pencil"></span>',['usuario/update','id'=>$usuario->id],['class'=>'btn btn-default']) ?>
                <?php if($usuario->estatus_did == 1){ echo Html::a('<span class="fa fa-trash-o"></span>',['usuario/cambiar','estatus'=>2,'id'=>$usuario->id],['class'=>'btn btn-danger']);
            }else{echo Html::a('<span class="fa fa-recycle"></span>',['usuario/cambiar','estatus'=>1,'id'=>$usuario->id],['class'=>'btn btn-success']);}?>
            </td>

            



           
        </tr>
        <?php }?>
    </tbody>
</table>

</div>
