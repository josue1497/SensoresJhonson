<?php

include ("conexion.php");


$sql = "SELECT * FROM valores ORDER BY id DESC";
$query = mysqli_query ($conexion, $sql);
$row= mysqli_fetch_array($query);



if($row["temperatura"] >= 25){
    
   echo '<script>
   
   alert("Se sobre paso la temperatura '.($row["temperatura"]).'");
   
   </script>';
    
    


require 'class.smtp.php';
require 'class.pop3.php';
require 'class.phpmailer.php';

$mail = new PHPMailer();


    $email = "stebanxd1993@gmail.com"; // al que se lo vas a enviar
    

	
	$mail->IsSMTP();
	$mail->SMTPDebug = 0;
	$mail->Mailer = 'smtp';
	$mail->SMTPAuth = true;
	$mail->Port = 587;
	$mail->Host= 'smtp.gmail.com';
	$mail->SMTPAuth= true;
	$mail->Username = 'edkpsm3@gmail.com';
	$mail->Password = 'edickson412';
	$mail->SMTPSecure = 'tls';
	$mail->setFrom= 'edkpsm@gmail.com';
	$mail->FromName= 'Jhonson&Jhonson';
	$mail->addAddress($email);
	$mail->isHTML(true);
	$mail->Subject = 'Temperatura';
	$mail->Body= 'Alerta la temperatura excedio el limite';
	$mail->Send();
			

@mysqli_close($conexion);

    

    
    
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login de usuario</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<script src="librerias/jquery-3.2.1.min.js"></script>
	<script src="js/funciones.js"></script>
</head>
<body style="background-color: rgb(250, 246, 246)">
    <br><br><br> 
    
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="panel panel-primary">
					<div class="panel panel-heading">Wharehouse Control</div>
					<div class="panel panel-body"> 

						<p>
							<img src="images/login.jpg" width="255" height="191">
						</p>
						<form id="frmLogin" method="post" action="usuario.php">
							<label>Usuario</label>
							<input type="text" class="form-control input-sm" name ="usuario" id="usuario">
							<label>Password</label>
							<input type="password" name="pass" id="password" class="form-control input-sm">
							<p></p>
						<button type="submit"><span class="btn btn-primary btn-sm" id="entrarSistema">Entrar</span> </button>	
							<a href="registro.html" class="btn btn-danger btn-sm">Registrar</a>
					
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>
</html>

 




 


<script type="text/javascript">
	$(document).ready(function(){
		$('#entrarSistema').click(function(){

		vacios=validarFormVacio('frmLogin');

			if(vacios > 0){
				alert("Debes llenar todos los campos!!");
				return false;
			}

		datos=$('#frmLogin').serialize();
		$.ajax({
			type:"POST",
			data:datos,
			url:"procesos/regLogin/login.php",
			success:function(r){

				if(r==1){
					window.location="vistas/inicio.php";
				}else{
					alert("No se pudo acceder :(");
				}
			}
		});
	});
	});
</script>