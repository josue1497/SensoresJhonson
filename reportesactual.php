<?php

session_start();
include("conexion.php"); ?>

<html lang="en">

<head>
    <title>HierroferralVyT</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/jquery.bxslider.css">
    <link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />

    <link href="css/prettyPhoto.css" rel="stylesheet" />

    <link href="css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
        crossorigin="anonymous">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">





</head>



<body class="container">

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/ajax.popper.min.js"></script>
    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>



    <script src="js/highcharts-3d.js"></script>
    <script src="js/highcharts.js"></script>
    <script src="js/modules/exporting.js"></script>
    <script src="js/modules/export-data.js"></script>

    <script src="js/funciones.js"></script>


    <div id="container" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>



    <script type="text/javascript">
    Highcharts.chart('container', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Reporte de temperatura y humedad.'
        },
        subtitle: {
            text: 'Lecturas de Temperatura y Humedad'
        },
        xAxis: {
            categories: [],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Population (millions)',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: '°'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Humedad',
            data: [


                <?php
            $sql = "SELECT * FROM valores where date(fecha)=current_date order by fecha asc";
        $queryHumedad = mysqli_query($conexion,$sql);
        while ($row = mysqli_fetch_array($queryHumedad)){
        ?>


                [<?php echo $row['humedad']; ?>],

                <?php } ?>

            ]
        }, {
            name: 'Temperatura',
            data: [

                <?php
            $sql = "SELECT * FROM valores where date(fecha)=current_date order by fecha asc";
        $queryTemperatura = mysqli_query($conexion,$sql);
        while ($row = mysqli_fetch_array($queryTemperatura)){
        ?>

                [<?php echo $row['temperatura']; ?>],

                <?php  
                
                } ?>

            ]
        }]
    });
    </script>
    <br>

    <?php
    $rowTemperatura=$rowHumedad='';
    $sql = "SELECT * FROM valores where date(fecha)=current_date order by fecha asc";
    $queryTemperatura = mysqli_query($conexion,$sql);
     while ($row = mysqli_fetch_array($queryTemperatura)){
        $rowTemperatura.=$row['temperatura'].",";
     }
     $queryTemperatura = mysqli_query($conexion,$sql);
     while ($row = mysqli_fetch_array($queryTemperatura)){
        $rowHumedad.=$row['humedad'].",";
     }
       
    ?>

    <h1 class="text-center display-4">Mencione Sus lecturas</h1>
    <form method="post" id="formReport">
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label for="nivel">Nivel</label>
                    <select name="nivel" class="form-control">
                        <option value="BIEN">BIEN</option>
                        <option value="REGULAR">REGULAR</option>
                        <option value="MALO">MALO</option>
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="comentario">Comentario</label>
                    <textarea name="comentario" class="form-control"> </textarea>
                </div>
            </div>
            <div class="col-3">
                <div class="d-flex flex-column">
                    <div class="p-2">
                        <div class="forñm-group">
                            <label for="temperatura">Temperatura</label>
                            <input type="text" name="temperatura" class="form-control" readonly value="<?php echo $rowTemperatura?>">
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="form-group">
                            <label for="humedad">Humedad</label>
                            <input type="text" name="humedad" class="form-control" readonly value="<?php echo $rowHumedad ?>">
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-3">
                <div class="d-flex flex-column">
                    <div class="form-group">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                        <input type="submit" id="btnEnviar" value="Registrar" class="btn btn-primary " />
                    </div>
                    <div class="form-group">
                    <a href="vistatrabajador.php" class="btn btn-secondary px-4">Volver</a>
                    </div>
                </div>
            </div>
        </div>

    </form>

    <script>
    $(document).ready(function() {
        $("#formReport").bind("submit", function() {
            // Capturamnos el boton de envío
            var btnEnviar = $("#btnEnviar");
            $.ajax({
                type: "POST",
                url: "generadordereportesactual.php",
                data: $("#formReport").serialize(),
                success: function(r) {
                    if (r == 1) {
                        alert('Registrado con Exito.');
                        $('input[type=text]').val("");
                        $('textarea').val("");
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

</body>



</html>