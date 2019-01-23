<?php 
include("conexion.php");


$temperatura = $_POST['temperatura'];
$humedad = $_POST['humedad'];;
$user_id = $_POST['user_id'];
$comentario = $_POST['comentario'];
$nivel = $_POST['nivel'];


$sql= "INSERT INTO reportes (temperatura, humedad, user_id, comentario, estatus) VALUES ('$temperatura', '$humedad', '$user_id', '$comentario', '$nivel')";
$query = mysqli_query($conexion,$sql);

echo $query;

?>