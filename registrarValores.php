<?php
include('conexion.php');

$temperatura = $_GET['temperatura'];
$humedad = $_GET['humedad'];

$sql= "INSERT INTO valores (temperatura, humedad) VALUES ('$temperatura', '$humedad')";
$query = mysqli_query($conexion,$sql);

echo $query;

?>