<?php
include("conexion.php"); 


$eliminar = $_POST['id'];


$sql= "DELETE FROM usuario WHERE id = '$eliminar'";
$query= mysqli_query($conexion,$sql);

echo 
    '<script> alert("Usuario Eliminado"); 
	 location.href("index.php");
	</script>';


?>
 

	