<?php 
include("conexion.php");


$fecha = date("Y-m-d");
$temperatura = $_POST['temperatura'];
$humedad = 15;
$nombre = $_POST['nombre'];
$comentario = $_POST['comentario'];
$nivel = $_POST['nivel'];


$sql= "INSERT INTO reportes (fecha, temperatura, humedad, nombre, comentario, estatus) VALUES ('$fecha', '$temperatura', '$humedad', '$nombre', '$comentario', '$nivel')";
$query = mysqli_query($conexion,$sql);



?>