<?php 
include("conexion.php");

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$ci = $_POST['ci'];
$usuario = $_POST['usuario'];
$clave = $_POST['pass'];


$sql = "INSERT INTO usuario (nombre, apellido, correo, ci, usuario, clave) VALUES ('$nombre', '$apellido', '$correo', '$ci', '$usuario', '$clave')";
$query= mysqli_query($conexion,$sql);

echo '<script>

alert("Registrado Correctamente");

location.href="indexs.php";

</script>'


?>