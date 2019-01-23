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
					window.location="vistas/inicios.sphp";
				}else{
					alert("No se pudo acceder :(");
				}
			}
		});
	});
	});
</script>