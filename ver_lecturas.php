<?php

session_start();
include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/jquery.bxslider.css">
    <link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />

    <link href="css/prettyPhoto.css" rel="stylesheet" />

    <link href="css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <title>Reportes</title>
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

    <script>
    var url = location.href;
    var array_url = url.split('?');
    var data_url = array_url[1].split('&');
    nombre = data_url[0].split('=')[1].replace('%20', ' ');
    comentario = data_url[1].split('=')[1].replace('%20', ' ');
    fecha = data_url[2].split('=')[1].replace('%20', ' ');
    estatus = data_url[3].split('=')[1].replace('%20', ' ');
    id = data_url[4].split('=')[1].replace('%20', ' ');
    </script>

    <h1 class="text-center display-4">Reporte : <?php echo $_GET['fecha']?></h1>
    <br>
    <h3 class="text-center text-muted">Trabajador: <?php echo $_GET['nombre']?></h3>
    <br>
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
            data: [  <?php
            $id=$_GET['recordid'];
            $sql = "select humedad from reportes where id='$id'";
            $queryTemperatura = mysqli_query($conexion,$sql);
        while ($row = mysqli_fetch_array($queryTemperatura)){
        ?>

                <?php echo $row['humedad']; ?>

                <?php } ?>
            ]}, {
            name: 'Temperatura',
            data: [<?php
            $id=$_GET['recordid'];
            $sql = "select temperatura from reportes where id='$id'";
        $queryTemperatura = mysqli_query($conexion,$sql);
        while ($row = mysqli_fetch_array($queryTemperatura)){
        ?>

                <?php echo $row['temperatura']; ?>,

                <?php  
                
                 } ?>
            ],
        }]
    });
    </script>
    <br>


    <table class="table ">
        <thead class="thead-dark">
            <tr>
                <th>Nombre y Apellido</th>
                <th>Comentario</th>
                <th>Fecha</th>
                <th>Estatus</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <script>
                    document.write(nombre);
                    </script>
                </td>
                <td>
                    <script>
                    document.write(comentario);
                    </script>
                </td>
                <td>
                    <script>
                    document.write(fecha);
                    </script>
                </td>
                <td>
                    <script>
                    document.write(estatus);
                    </script>
                </td>
            </tr>
        </tbody>
    </table>
    <a class="btn btn-primary" href='javascript:window.print(); void 0;'>Imprimir</a>

</body>

</html>