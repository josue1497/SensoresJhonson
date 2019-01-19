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