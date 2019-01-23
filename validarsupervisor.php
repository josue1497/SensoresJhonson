<?php 
include("conexion.php");

 $usuario = $_POST['superuser'];

 $pass= $_POST['superpass'];


$consulta="SELECT * FROM usuario WHERE usuario = '$usuario' AND clave= '$pass'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);
$rel=mysqli_fetch_array($resultado);

if($filas>0){
	echo 'valido';
}
else{ echo 
    '<script> alert("Usuario Invalido o contraseña invalida"); 
	</script>';
	
	exit;
}

    ?>   