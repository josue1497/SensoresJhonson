<?php
session_start();
include("conexion.php");

 $usuario = $_POST['usuario'];

 $pass= $_POST['pass'];


$consulta="SELECT * FROM usuario WHERE usuario = '$usuario' AND clave= '$pass'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);
$rel=mysqli_fetch_array($resultado);

if($filas>0){
	$_SESSION['user_id']=$rel['id'];
	 $_SESSION['usuario1'] = $rel['nombre'].' '.$rel['apellido'];

	 if($rel['rol']==='Supervisor'){
		header("location:vistasupervisor.php");
	}else{ 
		 header("location:vistatrabajador.php");
		}
  
}
else{ echo 
    '<script> alert("Usuario Invalido o contraseña invalida"); 
	 window.history.go(-1);
	</script>';
	
	exit;
}

    ?>   
     