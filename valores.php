<?php

include("conexion.php");


echo $_GET['temperatura'];



$temperatura = $_GET["temperatura"];
$fecha = date ('Y-m-d');
$hora = date ('h:m:s');

$sql = "INSERT INTO valores (fecha, hora, temperatura, humedad) VALUES ('$fecha', '$hora', '$temperatura', 'hola')";
$query = mysqli_query($conexion,$sql);



?>