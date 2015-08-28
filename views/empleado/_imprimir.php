 <table  class="table table-striped table-bordered">
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Celular</th>
            <th>Puesto</th>
            <th>Dirección</th>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($Empleado as $empleado) {?> 
        <tr>
            <td><?= $empleado->nombre ?></td>        
            <td><?= $empleado->apellidos?></td>
            <td><?= $empleado->celular?></td>               
            <td><?= $empleado->puesto?></td>
            <td><?= $empleado->direccion?></td>
           
        </tr>
        <?php }?>
    </tbody>
</table>