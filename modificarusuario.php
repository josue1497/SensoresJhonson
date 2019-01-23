<?php

include("conexion.php"); 
$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {   
    $update_field='';
    if(isset($input['nombre'])) {
        $update_field.= "nombre='".$input['nombre']."'";
    } else if(isset($input['ci'])) {
        $update_field.= "ci='".$input['ci']."'";
    } else if(isset($input['apellido'])) {
        $update_field.= "apellido='".$input['apellido']."'";
    } else if(isset($input['correo'])) {
        $update_field.= "correo='".$input['correo']."'";
    } else if(isset($input['usuario'])) {
        $update_field.= "usuario='".$input['usuario']."'";
    }  else if(isset($input['clave'])) {
        $update_field.= "clave='".$input['clave']."'";
    }  
    if($update_field && $input['id']) {
        $sql_query = "UPDATE libro SET $update_field WHERE id='" . $input['id'] . "'";  
        mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));     
    }
}
?>

<!-- 
<!DOCTYPE HTML>
<html>
<head>
    <title >ModificarProductos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
    
        .bt{
            border-radius: 4px;
            background: green;
            border: 0px;
            width: 100%;
            height: 40px;
            font-family: Arial;
            font-weight: 1em;
            
        }
        
        .bt:hover{
            background: rgba(0, 128, 0, 0.62);
        }
        .bt:active{
            font-size: 20px;
        }
        
        bt:focus{
        background: red;
        }
    
    </style>
    </head>
    
    <body>
        
        <form method="POST" action="actualizarusuario.php">
        <fieldset>
       
            <legend>Modificar Productos</legend>
    
        
        <table class="table">
           
            <tr> 
 
			 <th>Nombre</th>
              <th>Correo</th>
              <th>CI</th>
              <th>WWid</th>
              <th>Contraseña</th>
 
 </tr>
            
             <?php
            
// $id = $_POST['id'];   
         
//             echo $id;
            
//  $sql = "SELECT * FROM usuario WHERE id = '$id'";
//  $query = mysqli_query($conexion,$sql);
//  $row = mysqli_fetch_array($query);
  
	 
	?>
            
        <tr>
          <input type="hidden" value="<?php echo $row['id']; ?>" id="id" name="id"> 
           <td><input type="text" value="<?php echo $row['nombre']; ?>" name="nombre"> </td>
           <td><input type="text" value="<?php echo $row['apellido']; ?>" name="apellido"> </td>
            <td><input type="text" value="<?php echo $row['correo'];?>" name="correo"> </td>
              <td><input type="text" value="<?php echo $row['ci'];?>" name="ci"> </td>
<td><input type="text" value="<?php echo $row['usuario'];?>" name="usuario"> </td>
            <td><input type="text" value="<?php echo $row['clave'];?>" name="clave"> </td>
        
           
            </tr>
 
             </table>
        </fieldset>
        
           <input type="submit" value="Aceptar" class="bt">
            
        </form>
        
        
        <form action="eliminarusuario.php" method="post">
          <input type="hidden" value="<?php echo $row['id']; ?>" id="id" name="id"> 
            
     <button type="submit" > <span class="fa fa-times"></span>  </button>
            
        </form>
        
     jQuery (necessary for Bootstrap's JavaScript plugins) 	
    <script src="js/jquery-2.1.1.min.js"></script>	
    <!-- Include all compiled plugins (below), or include individual files as needed 
    <script src="js/bootstrap.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/fancybox/jquery.fancybox.pack.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.bxslider.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/jquery.isotope.min.js"></script> 
	<script src="js/functions.js"></script>
	<script src="js/ajax.popper.min.js"></script>
	 <script src="js/all.js"></script>
	
    </body>


</html>





 -->
