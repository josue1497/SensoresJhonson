<?php 
include("conexion.php");


$comentario = $_POST['comentario'];
$nivel = $_POST['nivel'];
$id= $_POST['report_id'];


$sql= "UPDATE reportes set comentario='$comentario', estatus='$nivel' where id=$id";
$query = mysqli_query($conexion,$sql);

echo $query;

?>