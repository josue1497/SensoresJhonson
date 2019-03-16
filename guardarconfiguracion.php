<?php
session_start();
include("conexion.php");


$temperatura = $_POST['temperatura'];
$humedad = $_POST['humedad'];;
$correo = $_POST['correo_notificacion'];
$pass = $_POST['pass_correo'];
$minutos = $_POST['tiempo'];
$correo_to = $_POST['correo_to'];

$_SESSION['CORREO_NOTIF']=$correo;
$_SESSION['TEMP_NOTIF']=$temperatura;
$_SESSION['HUM_NOTIF']=$humedad;


$sql= "UPDATE configuracion SET correo_notificacion='$correo',password_mail='$pass', temperatura='$temperatura',  humedad='$humedad', minutos='$minutos',correo_to='$correo_to' WHERE id=1";
$query = mysqli_query($conexion,$sql);


echo $query;