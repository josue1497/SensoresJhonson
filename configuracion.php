<?php
session_start();
include("conexion.php"); 


 $correo=$_SESSION['CORREO_NOTIF'];
 $pass=$_SESSION['PASS_CORREO'];
 $correo_to=$_SESSION['CORREO_TO'];
 $temp=(int)$_SESSION['TEMP_NOTIF'];
 $hum=(int)$_SESSION['HUM_NOTIF'];
 $time=(int)$_SESSION['TIME_NOTIF'];


?>
<div class="container">
    <h1 class="text-center display-4">Configuracion</h1>
    <form method="post" id="config">
        <div class="form-group">
            <label for="correo_notificacion">Correo de Notificacion</label>
            <input type="email" class="form-control" id="correo_notificacion" name="correo_notificacion" aria-describedby="emailHelp"
                placeholder="Escriba su Correo Electronico" value="<?php echo $correo; ?>" >
            <small id="emailHelp" class="form-text text-muted">Usted debera colocar el Correo electronico al que
                llegaran las notificaciones.</small>
        </div>
        <div class="form-group">
            <label for="pass_correo">Contraseña del Correo</label>
            <input type="password" class="form-control" id="pass_correo" name="pass_correo" aria-describedby="emailHelp"
                placeholder="Contraseña de su Correo" value="<?php echo $pass; ?>" >
            <small id="emailHelp" class="form-text text-muted">Usted debera colocar el Correo electronico al que
                llegaran las notificaciones.</small>
        </div>
        <div class="form-group">
            <label for="correo_to">Correos Receptores</label>
            <input type="text" class="form-control" id="correo_to" name="correo_to"
                placeholder="Ingrese los correos necesarios separados por una coma (,)" value="<?php echo $correo_to; ?>" >
            <small id="emailHelp" class="form-text text-muted">Usted debera colocar el Correo electronico al que
                llegaran las notificaciones.</small>
        </div>
        <div class="form-group">
            <label for="temperatura">Temperatura</label>
            <input type="number" class="form-control" id="temperatura" name="temperatura" value="<?php echo $temp; ?>" placeholder="Temperatura">
        </div>
        <div class="form-group">
            <label for="humedad">Humedad</label>
            <input type="number" class="form-control" id="humedad" name="humedad" placeholder="Humedad" value="<?php echo $hum; ?>">
        </div>
        <div class="form-group">
            <label for="temperatura">Tiempo de Evaluación</label>
            <input type="number" class="form-control" id="tiempo" name="tiempo" value="<?php echo $time; ?>" placeholder="Tiempo de Evaluación">
        </div>
        <button type="submit" class="btn btn-primary" id="btnEnviar">Guardar</button>
    </form>
</div>

<script>
$(document).ready(function() {
    $("#config").bind("submit", function() {
        // Capturamnos el boton de envío
        var btnEnviar = $("#btnEnviar");
        $.ajax({
            type: "POST",
            url: "guardarconfiguracion.php",
            data: $("#config").serialize(),
            success: function(r) {
                if (r == 1) {
                    alert('Registrado con Exito.\nDebe inicar sesion nuevamente para visualizar los cambios.');
                } else {
                    alert('Ha ocurrido un error.');
                }
            }
        });
        // Nos permite cancelar el envio del formulario
        return false;
    });
});
</script>