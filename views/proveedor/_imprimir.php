<table  class="table table-striped table-bordered">
        <tr>
          <tr>
            <th>No.</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Contacto</th>
            <th>Telefono</th>
            <th>Correo</th>
                    
        </tr>
    </thead>
    <tbody>
        <?php $c=0; foreach ($Proveedor as $Proveedor) {$c++;?> 
        <tr>
            <td class='col-sm-1'><?= $c?></td> 
            <td><?= $Proveedor->nombre ?></td>        
            <td><?= $Proveedor->direccion?></td>
            <td><?= $Proveedor->contacto?></td>               
            <td><?= $Proveedor->telefono?></td>
            <td><?= $Proveedor->correo?></td>
           
        </tr>
        <?php }?>
    </tbody>
</table>