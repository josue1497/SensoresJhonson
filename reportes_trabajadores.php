
 <?php

include("conexion.php");


?>

 
 <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Warehouse control</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/jquery.bxslider.css">
	<link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />	
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
	<link href="css/prettyPhoto.css" rel="stylesheet" />
	<link href="css/style.css" rel="stylesheet" />	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->  
	 
	
<style>
      
 table th{
        
      color: black;
        
    }
    
    
     table td{
        
      color: black;
        
    }
    
    a{
        margin-left: 45%;
        font-size: 17px;
        color: black;
    }
    
      </style>


  </head>
  <body>
	<header>		
		<nav class="navbar navbar-default navbar-static-top" role="navigation">
			<div class="navigation">
				<div class="container">					
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="navbar-brand">
							<a href="index.html"><h1><span>Johnson &</span> Johnson</h1></a>
						</div>
					</div>					
				</div>
			</div>	
		</nav>		
	</header>
   
	
	<div class="container">
		<div class="text-center">
			<div class="wow bounceInDown" data-wow-offset="0" data-wow-delay="0.3s">
				<h3>Johnson & Johnson Venezuela</h3>
			</div>
			<div class="wow bounceInDown" data-wow-offset="0" data-wow-delay="0.6s">
				<h2>Hacemos Productos de Calidad</h2>
			</div>
		</div>
	</div>
	
	

<table class="table">
  <tr>  
<th>Temperatura</th>
<th>Humedad</th>
<th>Nombre</th>
<th>Comentario</th>    
<th>Estatus</th>  
<th> <button id="proba" type="submit" class="<?php echo $row['id']; ?>"> <span class="fas fa-pencil-alt"> </span> </button></th>  
</tr>


	<?php 
      
      	$fecha = $_POST['fecha'];
 
      
      $sql = "SELECT * FROM reportes WHERE fecha = '$fecha'" ;
          $query = mysqli_query($conexion,$sql);
      
    while($row = mysqli_fetch_array($query)){
        
      ?>
       
        <tr>   
    <td> <?php  echo $row['temperatura']; ?> </td>
       
       <td> Huemedad </td>
       
       <td> <?php echo $row['nombre']; ?> </td>
        
     <td> <?php echo $row['comentario']; ?> </td> 
       
       
       <td> <?php echo $row['estatus']; ?> </td> 
        
      <td> <?php echo $row['fecha']; ?> </td>
        
      
        
        </tr>
        
        <?php
        
    }
          
      ?>
	
	
</table>

	
		<a href='javascript:window.print(); void 0;'>Imprimir</a> 
				
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->	
    <script src="js/jquery-2.1.1.min.js"></script>	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/fancybox/jquery.fancybox.pack.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.bxslider.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/jquery.isotope.min.js"></script> 
	<script src="js/functions.js"></script>
	<script> 
	</script>
         
  </body>
</html>