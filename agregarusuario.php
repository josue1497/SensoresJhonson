<body>
	<br><br><br>
	<div class="container"> 
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="panel panel-danger">
					<div class="panel panel-heading">Registrar Administrador</div>
					<div class="panel panel-body">
						<form id="frmRegistro" method="post" action="registro.php">
							<label>Nombre</label>
							<input type="text" class="form-control input-sm" name="nombre" id="nombre">
							<label>Apellido</label>
							<input type="text" class="form-control input-sm" name="apellido" id="apellido">
							
							<label>Correo</label>
							<input type="text" class="form-control input-sm" name="correo" id="correo">
							
							<label>Cedula</label>
							<input type="text" class="form-control input-sm" name="ci" id="cedula">
							
							<label>Usuario</label>
							<input type="text" class="form-control input-sm" name="usuario" id="usuario">
							<label>Password</label>
							<input type="text" class="form-control input-sm" name="pass" id="password">
							<p></p>
							<button type="submit" id="registro"><span class="btn btn-primary" >Registrar</span></button>
						
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>