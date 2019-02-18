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
	$_SESSION['user_role'] = $rel['rol'];
	$_SESSION['user_id']=$rel['id'];
	$_SESSION['usuario1'] = $rel['nombre'].' '.$rel['apellido'];

	$sql = "select * from configuracion where id=1 limit 1";
    $query_config = mysqli_query($conexion,$sql);

	$row = mysqli_fetch_array($query_config);
	
	$_SESSION['CORREO_NOTIF']=$row['correo_notificacion'];
	$_SESSION['TEMP_NOTIF']=$row['temperatura'];
	$_SESSION['HUM_NOTIF']=$row['humedad'];

	$_SESSION['HUM_A']='';
	$_SESSION['TEMP_A']='';

	 if($rel['rol']==='Supervisor'){
		header("location:vistasupervisor.php");
	}else if($rel['rol']==='Administrador'){
		header("location:vistaadministrador.php");
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
     