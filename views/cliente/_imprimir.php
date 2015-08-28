
   <table  class="table table-striped table-bordered">
    <thead>
        <tr>
        
            <th>Nombre</th>
            <th>direccion</th>
            <th>Contacto</th>
            <th>Telefono</th>
            <th>Correo</th>
                
        </tr>
    </thead>
    <tbody>
        <?php $c=0; foreach ($Cliente as $cliente) { $c++;?> 
        <tr>
    
             <td><?= $cliente->nombre?></td>             
            <td><?= $cliente->direccion?></td>
            <td><?= $cliente->telefono?></td>
            <td><?= $cliente->contacto?></td>
            <td><?= $cliente->correo?></td>
            
           
        </tr>
        <?php }?>
    </tbody>
</table>