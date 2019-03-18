<?php 

session_start();
include("conexion.php");

?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrador</title>

    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/jquery.bxslider.css">
    <link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />

    <link href="css/prettyPhoto.css" rel="stylesheet" />

    <link href="css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">

</head>


<body>
    <header>

        <div class="mb-5">
            <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
                    aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse">
                    <div class="logo" id="usuario"></div>
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                    </ul>
                    <div class="form-inline my-2 my-lg-0">
                        <div class="navbar-collapse collapse">
                            <div class="navbar-nav">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-link"><a href="vistasupervisor.php"
                                            class="active  text-danger">Inicio</a></li>
                                    <li class="nav-item dropdown text-danger">
                                        <a href="#" class="nav-link dropdown-toggle text-danger"
                                            id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Reportes
                                        </a>
                                        <div class="dropdown-menu text-danger" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item text-danger" href="#mostrar"
                                                id="reporteTrabajadores">Ver
                                                Reportes</a>
                                            <a class="dropdown-item text-danger" href="reportesactual.php">Agregar
                                                Reportes</a>
                                        </div>
                                    </li>
                                    <li class="nav-link text-danger"><a class="text-danger" id="usuario1"
                                            href="#mostrar">Usuario</a></li>
                                    <li class="nav-link text-danger"><a class="text-danger" id="auditoria"
                                            href="#mostrar">Historial</a></li>
                                            <li class="nav-link text-danger"><a class="text-danger" id="configuracion"
                                            href="#mostrar">Configuracion</a></li>
                                    <li class="nav-link text-danger"> <a class="text-danger"
                                            href="cerrarsesion.php">Cerrar Sesión </a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <div class="slider">
        <div class="img-fluid">
            <ul class="bxslider">
                <li><img src="images/4.jpg" alt="" style="width: 100%; max-height: 50vh;" /></li>
                <li><img src="images/1.jpg" alt="" style="width: 100%;max-height:50vh;" /></li>
            </ul>
        </div>
    </div>

    <div class="container">

        <div>
            <div class="text-center">
                <div class="wow bounceInDown" data-wow-offset="0" data-wow-delay="0.3s">
                    <h3>Johnson & Johnson Venezuela</h3>
                </div>
                <div class="wow bounceInDown" data-wow-offset="0" data-wow-delay="0.6s">
                    <h2>Hacemos Productos de Calidad</h2>
                </div>
            </div>
        </div>
        <div id="mostrar">
        </div>
    </div>

    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>

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
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/funciones.js"></script>
    <script>
    wow = new WOW({

        })
        .init();
    </script>


    <script>
    $('.dropdown-toggle').dropdown();
    </script>
</body>



<script>
$(document).ready(function() {
    $('#usuario1').click(function(e) {
        e.preventDefault();
        $('#mostrar').empty();
        $('#mostrar').load("mostrarusuario.php");
    });
    $('#reporteTrabajadores').click(function(e) {
        e.preventDefault();
        $('#mostrar').empty();
        $('#mostrar').load("reportes_trabajadores.php");
    });
    $('#auditoria').click(function(e) {
        e.preventDefault();
        $('#mostrar').empty();
        $('#mostrar').load("auditoria.html");
    });
    $('#configuracion').click(function(e) {
        e.preventDefault();
        $('#mostrar').empty();
        $('#mostrar').load("configuracion.php");
    });
});

$(document).ready(function() {
    $('a[href^="#"]').click(function() {
        var destino = $(this.hash);
        if (destino.length == 0) {
            destino = $('a[name="' + this.hash.substr(1) + '"]');
        }
        if (destino.length == 0) {
            destino = $('html');
        }
        $('html, body').animate({
            scrollTop: destino.offset().top
        }, 2500);
        return false;
    });
});

wow = new WOW().init();
</script>


</html>