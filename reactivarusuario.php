<?php
include("conexion.php"); 


$eliminar = $_POST['user_id'];


$sql= "UPDATE usuario set activo='S' WHERE id = '$eliminar'";
$query= mysqli_query($conexion,$sql);

echo $query;

?>
 

	