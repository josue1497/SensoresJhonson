<?php
include("conexion.php"); 
?>

<!doctype html>


<head>
    <title>HierroferralVyT</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
        .table input{              
              border: none;
          }         
    </style>
</head>

<body>
    <div>
        <script>
            // id=ci=nombre=apellido=correo=usuario=password=rol='';
        </script>
        <div class="text-center display-4">
            <h1>Administracion de Usuarios</h1>
        </div>
        <a id="agregar" data-toggle="modal" data-target="#modalRecord" class="btn btn-success text-light">Agregar</a><br><br>
        <table id="usersTable" class="table p-3">
            <thead>
                <tr class="thead-dark mw-50">
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php  

    $sql = "SELECT * FROM usuario";

    $query = mysqli_query($conexion,$sql);       

    while($row= mysqli_fetch_array($query)){
             ?>
                <tr id="<?php echo $row['id']; ?>">


                    <form action="modificarusuario.php" method="POST">
                        <input type="hidden" value="<?php echo $row['id']; ?>" readonly name="id">
                        <td class="ci">
                            <?php echo $row['ci']; ?>
                        </td>
                        <td class="nombre">
                            <?php echo $row['nombre'];?>
                        </td>
                        <td class="apellido">
                            <?php echo $row['apellido']; ?>
                        </td>
                        <td class="correo">
                            <?php echo $row['correo']; ?>
                        </td>
                        <td class="usuario">
                            <?php echo $row['usuario']; ?>
                        </td>
                        <td class="clave">
                            <?php echo $row['clave']; ?>
                        </td>
                        <td class="rol">
                            <?php echo $row['rol']?>
                        </td>
                        <td><a class="btn btn-warning" data-toggle="modal" data-target="#modalEdit" onclick="getDataTr(this)"><i
                                    class="far fa-edit text-light"></i></a>
                        <a class="btn btn-danger" onclick="deleteRecord(this)"><i class="far fa-trash-alt text-light"></i></a></td>
                    </form>

                </tr>

                <?php
    }
        
        
        ?>
            </tbody>
        </table>



        <!-- Modal -->
        <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel panel-danger">
                                        <div class="panel panel-body">
                                            <form id="editForm" method="POST" action="modificarusuario.php">
                                                <input type="hidden" id="id" readonly name="id">
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
                                                <label>Contraseña</label>
                                                <input type="text" class="form-control input-sm" name="pass" id="password">
                                                <label>Rol</label>
                                                <select type="text" required="required" class="form-control input-sm"
                                                    name="rol" id="rol">
                                                    <option value="">Seleccione un rol</option>
                                                    <option value="Supervisor">Supervisor</option>
                                                    <option value="Trabajador">Trabajador</option>
                                                </select>
                                                <p></p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" id="registro" class="btn btn-warning text-light" name="Actualizar"
                                    value="Actualizar" onclick="editRecord()">

                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalRecord" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Registrar Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel panel-danger">
                                        <div class="panel panel-body">
                                            <form id="insertForm" method="POST" action="registro.php">
                                                <label>Nombre</label>
                                                <input type="text" class="form-control input-sm" name="nombre" id="insertnombre"
                                                    required>
                                                <label>Apellido</label>
                                                <input type="text" class="form-control input-sm" name="apellido" id="insertapellido"
                                                    required>

                                                <label>Correo</label>
                                                <input type="email" class="form-control input-sm" name="correo" id="insertcorreo"
                                                    required>

                                                <label>Cedula</label>
                                                <input type="text" class="form-control input-sm" name="ci" id="insertcedula"
                                                    required>

                                                <label>Usuario</label>
                                                <input type="text" class="form-control input-sm" name="usuario" id="insertusuario"
                                                    required>
                                                <label>Contraseña</label>
                                                <input type="text" class="form-control input-sm" name="pass" id="insertpassword"
                                                    required>
                                                <label>Rol</label>
                                                <select type="text" required="required" class="form-control input-sm"
                                                    name="rol" id="insertrol">
                                                    <option value="">Seleccione un rol</option>
                                                    <option value="Supervisor">Supervisor</option>
                                                    <option value="Trabajador">Trabajador</option>
                                                </select>
                                                <p></p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" id="registro" class="btn btn-success text-light" name="Registrar"
                                    value="Registrar" onclick="insertRecord();">

                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <script src="js/funciones.js"></script>
</body>



</html>
<script>
$(document).ready(function() {
    $('#usersTable').dataTable();
});
</script>
