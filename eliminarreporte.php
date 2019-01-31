<?php
include("conexion.php"); 


$eliminar = $_POST['id'];


$sql= "UPDATE reportes set activo='N' WHERE id = '$eliminar'";
$query= mysqli_query($conexion,$sql);

echo $query;

?>
 

	