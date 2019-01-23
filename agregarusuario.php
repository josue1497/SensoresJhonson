<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
    crossorigin="anonymous">

<body>
    <br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="panel panel-danger">
                    <div class="panel panel-heading text-center display-4">Registrar Usuario</div>
                    <div class="panel panel-body">
                        <form id="insertForm" method="post" action="registro.php">
                            <label>Nombre</label>
                            <input type="text" class="form-control input-sm" name="nombre" id="nombre">
                            <label>Apellido</label>
                            <input type="text" class="form-control input-sm" name="apellido" id="apellido">

                            <label>Correo</label>
                            <input type="email" class="form-control input-sm" name="correo" id="correo">

                            <label>Cedula</label>
                            <input type="text" class="form-control input-sm" name="ci" id="cedula">

                            <label>Usuario</label>
                            <input type="text" class="form-control input-sm" name="usuario" id="usuario">
                            <label>Password</label>
                            <input type="text" class="form-control input-sm" name="pass" id="password">
                            <label>Rol</label>
                            <select type="text" required="required" class="form-control input-sm" name="rol" id="rol">
                                <option value="">Seleccione un rol</option>
                                <option value="Supervisor">Supervisor</option>
                                <option value="Trabajador">Trabajador</option>
							</select>
							<br>
                            <input type="submit" id="registro" class="btn btn-primary" value="Registrar" />
                            <a class="btn btn-secondary" id="volver">Volver</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
</body>
<script>
$(document).ready(function() {
    $('#volver').click(function(e) {
        e.preventDefault();
        $('#mostrar').load("mostrarusuario.php");
    });
});
</script>

<script>
    $(document).ready(function() {


        $('#registro').click(function(e) {



            e.preventDefault();


            var n = $('#nombre').val();
            if ($('#nombre').val() == '' || $('#apellido').val() == '' || $('#correo').val() == '' ||
                $('#cedula').val() == '' || $('#usuario').val() == '' || $('#password').val() == '' ||
                $('#rol option:selected').val() == '')
            {
				alert("Debes llenar todos los campos!!");
                break;
            }
           
    });
</script>