<?php
include("conexion.php"); 
?>
<div class="py-3">
    <table id="usersTable" class="table p-3">
        <thead>
            <tr class="thead-dark mw-50">
                <th>Cedula</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Usuario</th>
                <th>Contraseña</th>
                <th>Rol</th>
                <th>Estado del Registro</th>
            </tr>
        </thead>
        <tbody>
            <?php  

    $sql = "select id,ci, concat(nombre,' ',apellido) as nombre, correo, usuario, clave, rol, case when activo='N' then 'Inactivo' else 'Activo' end as act  from usuario;";

    $query = mysqli_query($conexion,$sql);       

    while($row= mysqli_fetch_array($query)){
             ?>
            <tr id="<?php echo $row['id']; ?>">


                <form action="modificarusuario.php" method="POST">
                    <input type="hidden" value="<?php echo $row['id']; ?>" readonly name="id">
                    <td class="ci">
                        <?php echo $row['ci']; ?>
                    </td>
                    <td class="nombre">
                        <?php echo $row['nombre'];?>
                    </td>
                    <td class="correo">
                        <?php echo $row['correo']; ?>
                    </td>
                    <td class="usuario">
                        <?php echo $row['usuario']; ?>
                    </td>
                    <td class="clave">
                        <?php echo $row['clave']; ?>
                    </td>
                    <td class="rol">
                        <?php echo $row['rol']?>
                    </td>
                    <td class="act">
                        <?php echo $row['act']?>
                    </td>
                </form>

            </tr>

            <?php
    }
        
        
        ?>
        </tbody>
    </table>
</div>
<script>
$(document).ready(function() {
    $('#usersTable').dataTable();
});
</script>