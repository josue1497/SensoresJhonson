<?php
include('conexion.php');

$consulta="SELECT * FROM valores where date(fecha)=current_date order by fecha desc limit 1";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);
$rel=mysqli_fetch_array($resultado);

if($filas>0){
	echo $rel['temperatura'];
}
?>