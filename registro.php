<?php 
include("conexion.php");

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$ci = $_POST['ci'];
$usuario = $_POST['usuario'];
$clave = $_POST['pass'];
$rol = $_POST['rol'];


$sql = "INSERT INTO usuario (nombre, apellido, correo, ci, usuario, clave, rol, activo) VALUES ('$nombre', '$apellido', '$correo', '$ci', '$usuario', '$clave','$rol','S')";
$query= mysqli_query($conexion,$sql);

echo $query;


?>