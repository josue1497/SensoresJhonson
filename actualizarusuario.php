 <?php
include("conexion.php");
$id= $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$ci = $_POST['ci'];
$usuario = $_POST['usuario']; 
$clave = $_POST['pass'];
$rol = $_POST['rol'];

$sql= " UPDATE usuario SET nombre = '$nombre', apellido = '$apellido', correo ='$correo',  CI ='$ci',  usuario ='$usuario',  clave ='$clave', rol = '$rol' WHERE id ='$id' ";
$query= mysqli_query($conexion,$sql); 
        
    echo $query; 
	
	?>