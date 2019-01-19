<?php
session_start();
include("conexion.php");

 $usuario = $_POST['usuario'];

 $pass= $_POST['pass'];


$consulta="SELECT * FROM usuario WHERE usuario = '$usuario' AND clave= '$pass'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);
$rel=mysqli_fetch_array($resultado);



if($usuario == "administrador" && $pass == "1234"){
	$_SESSION['usuario1']= $rel['nombre'];
	header("location:index.php");
	exit;
}


if($filas>0){
	 $_SESSION['usuario1'] = $rel['nombre'].' '.$rel['apellido'];
    header("location:vistatrabajador.php");
}
else{ echo 
    '<script> alert("Usuario Invalido o contraseña invalida"); 
	 window.history.go(-1);
	</script>';
	
	exit;
}

    ?>   
     