<?php

require_once('smtp.php');
require 'class.pop3.php';
require_once('phpmailer.php'); 
include("conexion.php");

$sql = "SELECT humedad,temperatura, fecha FROM valores where date(fecha)=current_date order by fecha desc limit 120";
$query = mysqli_query($conexion, $sql);

$sql_params = "SELECT correo_notificacion, password_mail, temperatura, humedad, minutos, correo_to FROM configuracion WHERE id=1 LIMIT 1";
$query_params = mysqli_query($conexion, $sql_params);
$row_params = mysqli_fetch_array($query_params);
$correo_to = explode(',',$row_params["correo_to"]);


$email_to = $row_params["correo_notificacion"];
$pass = $row_params["password_mail"];

while ($row = mysqli_fetch_array($query)) {
    $temp_max = $row["temperatura"] >= $row_params["temperatura"];
    $hum_max = $row["humedad"] >= $row_params["humedad"];


    if ($temp_max || $hum_max) {

        $mail = new PHPMailer();

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
        foreach($correo_to as $mail_add){
            $mail->addAddress($mail_add);
        }
        $mail->isHTML(true);
		$mail->Subject = 'Temperatura y/o Humedad Excedieron sus valores.';
		
		$body = "<h1>¡¡Alerta!!</h1><br>
					Los valores del Sensor ha superado los valores maximos establecidos<br>
					Se solicita revisar el estado del mismo a la brevedad posible<br>
					Temperatura: ".$row["temperatura"].", Temperatura Permitida:".$row_params["temperatura"]." <br>
					Humedad: ".$row["humedad"].", Humedad Permitida:".$row_params["humedad"]."";

        $mail->Body = $body;
        $mail->Send();


		@mysqli_close($conexion);
		break;
    }
}
 