<?php
session_start();
include("conexion.php");

?>


<html lang="en">
<table class="table " id="reporttable">
    <thead class="thead-dark">
        <tr>
            <th>Nombre y Apellido</th>
            <th>Comentario</th>
            <th>Fecha</th>
            <th>Estatus</th>
            <th></th>
        </tr>
    </thead>
<tbody>
    <?php 
      
      
 
      $id=$_SESSION['user_id'];
      $rol=trim((string)$_SESSION['user_role']);
      $sql = "select R.id ,concat(u.nombre,' ' ,u.apellido) as nombre, r.temperatura,
							r.humedad,r.comentario, r.fecha ,r.estatus 
                            from reportes R inner join usuario U on (u.id=R.user_id) where R.activo='S' " ;
        $where = strcmp($rol,'Trabajador')==0?" and u.id='$id'":" ";
          $query = mysqli_query($conexion,$sql.$where);
      
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
                <button class="btn btn-primary" name="<?php  echo $row['id']; ?>" onclick="goToVerLecturas(this)"><i class="far fa-eye"></i></button>
                <button class="btn btn-warning" name="<?php  echo $row['id']; ?>" onclick="goToModificarReportes(this)"><i class="far fa-edit text-light"></i></button>
                <button class="btn btn-danger <?php  echo $_SESSION['user_role']=='Trabajador'?'d-none':''; ?>" name="<?php  echo $row['id']; ?>" onclick="deleteReport(this)"><i class="far fa-trash-alt"></i></button>
            </td>
    </tr>

    <?php
        
    }
          
      ?>

</tbody>
</table>


<a href='javascript:window.print(); void 0;'>Imprimir</a>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins)
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/fancybox/jquery.fancybox.pack.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.bxslider.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    
    <script>
    </script> -->

<!-- </body> -->
<script src="js/funciones.js"></script>
<script>
$(document).ready(function() {
    $('#reporttable').dataTable();
});
</script>
</html>