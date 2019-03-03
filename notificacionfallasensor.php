<?php

require_once('smtp.php');
require 'class.pop3.php';
require_once('phpmailer.php'); 
include("conexion.php");


$sql = "SELECT fecha FROM valores order by fecha desc limit 1";
$query = mysqli_query($conexion, $sql);

$sql_params = "SELECT correo_notificacion, password_mail, minutos FROM configuracion WHERE id=1 LIMIT 1";
$query_params = mysqli_query($conexion, $sql_params);
$row_params = mysqli_fetch_array($query_params);


$email_to = $row_params["correo_notificacion"];
$pass = $row_params["password_mail"];

while ($row = mysqli_fetch_array($query)) {

    date_default_timezone_set("America/Caracas");
    $datetime1 = (new DateTime($row["fecha"]))->format('Y-m-d H:i:s');
    $datetime2 = date('Y-m-d H:i:s');
    $minutos = ceil((strtotime($datetime2)-strtotime($datetime1))/60);

    if ($minutos>$row_params["minutos"]) {

        $mail = new PHPMailer();

        $mail->IsSMTP();
        $mail->SMTPDebug = 3;
        $mail->SMTPAuth = true;
        $mail->Port = 587;
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $email_to;
        $mail->Password = $pass;
        $mail->From = $email_to;
        $mail->FromName = 'Jhonson&Jhonson';
        $mail->addAddress($email_to);
        $mail->isHTML(true);
		$mail->Subject = 'Inconveniente con el sensor de Temperatura y Humedad';
		
		$body = "<h1>¡¡Alerta!!</h1><br>
					El sensor ha sufrido un percance, se requiere una revision inmediata del estado del mismo";

        $mail->Body = $body;
        if($mail->Send()){
            echo 'enviado';
        }else{
            echo 'no enviado';
        }

		@mysqli_close($conexion);
        break;
    }
    }

 