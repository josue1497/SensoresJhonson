<?php

$servidor="localhost";
$database="edickson";
$usuario="root";
$password="1234";

$conexion = new mysqli($servidor,$usuario,$password,$database);

/*	if($conexion->connect_errno){
	echo " No conectado";
}

else{
echo "Conectado";
}
*/

?>