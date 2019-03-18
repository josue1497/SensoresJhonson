<?php
session_start();
include("conexion.php");

?>
<div class="py-3 w-100">
    <table class="table " id="reporttable">
        <thead class="thead-dark">
            <tr>
                <th>Nombre y Apellido</th>
                <th>Comentario</th>
                <th>Fecha</th>
                <th>Estatus</th>
                <th>Estado del Registro</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
      $sql = "select R.id ,concat(u.nombre,' ' ,u.apellido) as nombre, r.comentario, r.fecha,r.temperatura,
      r.humedad ,r.estatus, case when r.activo='N' then 'Inactivo' else 'Activo' end as act 
      from reportes R inner join usuario U on (u.id=R.user_id) ; ";
          $query = mysqli_query($conexion,$sql);
      
    while($row = mysqli_fetch_array($query)){
        
      ?>

            <tr id="<?php  echo $row['id']; ?>">
                <td>
                    <?php echo $row['nombre']; ?>
                </td>
                <input type="hidden" name="temperatura" value="<?php  echo $row['temperatura']; ?>">
                <input type="hidden" name="humedad" value=" <?php echo $row['humedad']; ?>">
            <td>
                    <?php echo $row['comentario']; ?>
                </td>
                <td>
                    <?php echo $row['fecha']; ?>
                </td>
                <td>
                    <?php echo $row['estatus']; ?>
                </td>
                <td>
                <?php echo $row['act']; ?>
                </td>
                 <td>
                <button class="btn btn-primary" name="<?php  echo $row['id']; ?>" onclick="goToVerLecturas(this)"><i class="far fa-eye"></i></button>
                </td>
            </tr>

            <?php
        
    }
          
      ?>

        </tbody>
    </table>
</div>
<script>
$(document).ready(function() {
    $('#reporttable').dataTable();
});
</script>