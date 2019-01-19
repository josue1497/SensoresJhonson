<!DOCTYPE html>
<html>
<head>
	<title>Login de usuario</title>
	<!-- <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css"> -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<script src="librerias/jquery-3.2.1.min.js"></script>
	<script src="js/funciones.js"></script>
</head>
<body>
    <br><br><br> 
    
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="panel panel-primary">
					<div class="panel panel-heading text-center display-4">Wharehouse Control</div>
					<div class="panel panel-body"> 

						<p class="text-center p-2 ">
							<img src="images/login.jpg" class="rounded mx-auto d-block" width="255" height="191">
						</p>
						<form id="frmLogin" method="post" action="usuario.php">
							<label>Usuario</label>
							<input type="text" class="form-control input-sm" name ="usuario" id="usuario">
							<label>Password</label>
							<input type="password" name="pass" id="password" class="form-control input-sm">
							<p></p>
						<input type="submit" id="entrarSistema" class="btn btn-primary" value="Entrar"></input>
						<a href="registro.html" class="btn btn-danger ">Registrar</a>
					
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>
</html>

 




 


<script type="text/javascript">
	$(document).ready(function(){
		$('#entrarSistema').click(function(){

		vacios=validarFormVacio('frmLogin');

			if(vacios > 0){
				alert("Debes llenar todos los campos!!");
				return false;
			}

		datos=$('#frmLogin').serialize();
		$.ajax({
			type:"POST",
			data:datos,
			url:"procesos/regLogin/login.php",
			success:function(r){

				if(r==1){
					window.location="vistas/inicios.php";
				}else{
					alert("No se pudo acceder :(");
				}
			}
		});
	});
	});
</script>


<!--  
 <?php 

//session_start();
//include("conexion.php");

?>

 <html lang="en"> 
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Warehouse control</title>

   
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/jquery.bxslider.css">
	<link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />	
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
	<link href="css/prettyPhoto.css" rel="stylesheet" />
	<link href="css/style.css" rel="stylesheet" />	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]
	 
	<style>

		.li {
			opacity: 0;
		}
		
		.li a:hover{
			
			cursor: pointer;
				list-style: none;
			font-size: 8px;
			color: black;
		}
		
		
   
		
	  </style>
	
	

  </head>
  
  
  	<header>
	
			<nav>
		<nav>
			<ul>
				
				<li class="submenu">
						<a href="reportes.php" target = "_blank"><span class="fa fa-tags"></span>Indicadores de temparatura</a>
				</li>
				
				<li class="submenu">
						<a href="#"><span class="fa fa-tags"></span>Reportes</a>
						<ul class="children">
				<li><a href="reportes_trabajadores.php"><p class="p1">Ver Reportes</p></a></li>
				<li><a href="reportesactual.php"><p class="p1">Agregar Reportes</p></a></li>
				<li><a href="#"><p class="p1">Modificar Reportes</p></a></li>
				</ul>
						
						
				</li>
				
				
				<li class="submenu">
						<a id="usuario1"><span class="fa fa-tags"></span>Usuario</a>
						
						
				</li>
				 
				
				
				<li class="submenu"> 
				<a href=" "><span class="fa fa-key"></span> <?php //echo ($_SESSION['usuario1'])? 'Hola'.' '. $_SESSION['usuario1']:'' ?> </a>
				<ul class="children">
				<li><a href="cerrarsesion.php"><p class="p1">CERRAR SESIÓN</p></a></li>
				</ul>
				</li>
			</ul>
		</nav>
	
		</nav>
					
									
</header>	
	
  
  
  <body>

	
	     <center><img src="images/4.jpg" alt="" width="80%"/> </center>
	
	
		<div id="mostrar">
		    
		    
		    
		</div>

	
    <script src="js/jquery-2.1.1.min.js"></script>	
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




<script>

$(document).ready(function(){
	
$('#usuario').hover(function(){

$('.li').removeClass('li');
	
	});	
	
$('#usuario').fadeIn(function(){
	
	$('.li').addClass('li');
	
});	
	
});	
	
</script>


<script>


    
    $(document).ready(function(){
        
  
    
$('#usuario1').click(function(e){
    

    
    e.preventDefault();
       $('#mostrar').load("mostrarusuario.php");
 
    
    

    
}) ;   
    
     }); 
    
</script>
 -->
