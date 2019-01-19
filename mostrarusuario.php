
<?php
include("conexion.php"); ?>

<html lang="en">
  <head>
    <title>HierroferralVyT</title>
    <!-- Required meta tags -->
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="css/bootstrap-grid.min.css"> 
      <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/font-awesome.min.css">
      
    
      <style>
    
          .table input{
              
              border: none;
          }
          
          
    </style>
    
    
      
    </head>
  
    
    
    <body>

          <tr>
 <th>Nombre y Apellido</th>
       <th>Correo</th>
       <th>WWid</th>
       <th>Contraseña</th>  
       <th><button id="agregar" class="btn-primary">Agregar</button></th>       
</tr>
       
 <?php  
        
    
  $sql = "SELECT * FROM usuario";
 $query = mysqli_query($conexion,$sql);       

    while($row= mysqli_fetch_array($query)){
             ?>
           <tr>
           <form action="modificarusuario.php" method="post">
          <td><input type="text" value="<?php echo $row['nombre'].' '.$row['apellido']; ?>" readonly name="nombre"></td>   
     <td><input type="text" value="<?php echo $row['correo']; ?>" readonly name="correo"></td>  
         <td><input type="text" value="<?php echo $row['usuario']; ?>" readonly name="usuario"></td>  
        <td><input type="text" value="<?php echo $row['clave']; ?>" readonly name="clave"></td>
        <td><input type="hidden" value="<?php echo $row['ci']; ?>" readonly name="cedula"></td> 
        <td><input type="hidden" value="<?php echo $row['id']; ?>" readonly name="id"></td>    
        <td> <button id="proba" type="submit" class="<?php echo $row['id']; ?>"> <span class="fas fa-pencil-alt"> </span> </button></td>
        </form>
        </tr>  
        <?php
    }
        
        
        ?>
    
    <br>
       <br>
        <div id="mostrar3">
        
         
           </div>
      
  </body>
   <script src="js/all.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
       <script src="js/bootstrap.min.js"></script> 
     
      </html>
      
      
      <script>
$('#agregar').click(function(e){
   
    $('#mostrar3').load("agregarusuario.php");
    
    
});
          

</script>     




<script>
$('#proba').click(function(){
   
    var a = $(this).attr('class');
    alert(a);
                  
                  
                  });

</script>