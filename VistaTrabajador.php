<?php 
session_start();
include("conexion.php");
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trabajador <?php echo $_SESSION['usuario1']?></title>

    <!-- Bootstrap -->

    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/jquery.bxslider.css">
    <link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
    <link href="css/prettyPhoto.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">


</head>

<body>
    <header>
        <div class="mb-5">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
                    aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <div class="logo" id="usuario"></div>
                    <!-- <a class="navbar-brand text-uppercase" href="#" id="usuario">
                        <h4>
                            <?php echo $_SESSION['usuario1'];  ?>
                        </h4>
                    </a> -->

                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                    </ul>
                    <div class="form-inline my-2 my-lg-0">
                        <div class="navbar-collapse collapse">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation"><a href="vistatrabajador.php" class="active">Inicio</a></li>
                                <!-- <li role="presentation"><a href="reportes.html">Indicadores de Temperatura</a></li> -->
                                <!-- <li role="Presentation"><a href="reportesactual.php">Reportes</a> -->
                                <li class="nav-item dropdown">
                                    <a href="#" class="dropdown-toggle" id="navbarDropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Reportes
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="reportesactual.php">Crear Reportes</a>
                                        <a class="dropdown-item" href="#mostrar" id="reporteTrabajadores">Mis
                                            Reportes</a>
                                    </div>
                                </li>
                                <li class="li"> <a href="cerrarsesion.php">Cerrar Sesión </a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <div class="slider">
        <div class="img-fluid">
            <ul class="bxslider">
                <li><img src="images/4.jpg" alt="" style="width: 100%; max-height: 60vh;" /></li>
                <li><img src="images/1.jpg" alt="" style="width: 100%;max-height:60vh;" /></li>
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
        <div id="mostrar">
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
    <script src="js/jquery.dataTables.min.js"></script>
    <script>
    wow = new WOW({

        })
        .init();
    </script>

    <script>
    $('.dropdown-toggle').dropdown();
    </script>
    <script>
    $(document).ready(function() {

        $('#reporteTrabajadores').click(function(e) {
            e.preventDefault();
            $('#mostrar').empty();
            $('#mostrar').load("reportes_trabajadores.php");
        });
    });
    </script>

</body>

</html>






<script>
$(document).ready(function() {

    $('#usuario').hover(function() {

        $('.li').removeClass('li');

    });

    $('#usuario').fadeIn(function() {

        $('.li').addClass('li');

    });
});
</script>