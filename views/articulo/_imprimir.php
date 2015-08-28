<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nombre</th>
            <th>Unidad</th>  
        </tr>
    </thead>
    <tbody>
        <?php $c=0; foreach ($articulos as $articulo){ $c++; ?>
        <tr>
            <td class='col-sm-1'><?= $c?></td>    
            <td><?= $articulo->nombre ?></td>        
            <td><?= $articulo->unidad?></td>
        </tr>
        <?php }?>
    </tbody>
</table>