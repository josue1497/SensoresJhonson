<?php
session_start();
include("conexion.php");


$temperatura = $_POST['temperatura'];
$humedad = $_POST['humedad'];;
$correo = $_POST['correo_notificacion'];

$_SESSION['CORREO_NOTIF']=$correo;
$_SESSION['TEMP_NOTIF']=$temperatura;
$_SESSION['HUM_NOTIF']=$humedad;


$sql= "UPDATE configuracion SET correo_notificacion='$correo', temperatura='$temperatura',  humedad='$humedad' WHERE id=1";
$query = mysqli_query($conexion,$sql);


echo $query;