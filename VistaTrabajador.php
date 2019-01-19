<?php 
session_start();
include("conexion.php");
?>
 

 <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Warehouse control</title>

    <!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/jquery.bxslider.css">
	<link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />	
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
	<link href="css/prettyPhoto.css" rel="stylesheet" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->  
	 
	 

  </head>
  <body>
	<header>	
	<div class="mb-5">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand text-uppercase" href="#" id="usuario"><h4> <?php echo $_SESSION['usuario1'];  ?> </h4>   </a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
     
    </ul>
    <div class="form-inline my-2 my-lg-0">
		<div class="navbar-collapse collapse">							
			<div class="menu">
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation"><a href="vistatrabajador.php" class="active">Inicio</a></li>
					<li role="presentation"><a href="vistatraajador2.html">Indicadores de Temperatura</a></li>
					<li role="Presentation"><a href="reportesactual.php">Reportes</a>
					<li class="li"> <a href="cerrarsesion.php">Cerrar Sesión </a>  </li> 
				</ul>
			</div>
		</div>		
	</div>
  </div>
</nav>
</div>
		<!-- <nav class="navbar navbar-default navbar-static-top" role="navigation">
			<div class="navigation">
				<div class="container">					
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="navbar-brand text-uppercase">
						<a id="usuario"><h4> <?php echo $_SESSION['usuario1'];  ?> </h4>   </a>
						</div>
					</div>
					
					<div class="navbar-collapse collapse">							
						<div class="menu">
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation"><a href="vistatrabajador.php" class="active">Inicio</a></li>
								<li role="presentation"><a href="vistatraajador2.html">Indicadores de Temperatura</a></li>
								<li role="Presentation"><a href="reportesactual.php">Reportes</a>
								<li class="li"> <a href="cerrarsesion.php">Cerrar Sesión </a>  </li> 
							</ul>
						</div>
					</div>						
				</div>
			</div>	
		</nav>		 -->
	</header>
   
	<div class="slider">
		<div class="img-fluid">
			<ul class="bxslider">				
				<li><img src="images/4.jpg" alt="" style="width: 100%; max-height: 60vh;"/></li>								
				<li><img src="images/1.jpg" alt="" style="width: 100%;max-height:60vh;"/></li>				
			</ul>
		</div>	
    </div>
	
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
	

	wow = new WOW(
         {

         })
            .init();
	
            
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