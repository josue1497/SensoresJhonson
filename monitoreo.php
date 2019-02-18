<?php

session_start();
include("conexion.php"); 
?>

<html lang="en">

<head>
    <title>Reportes</title>
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
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

    <script>
    function getLastValueTemperatura() {
        var value = $.ajax({
            url: "obtenerTemperatura.php",
            dataType: 'text', //indicamos que es de tipo texto plano
            async: false //ponemos el parámetro asyn a falso
        }).responseText;

        return parseInt(value);
    }

    function getLastValueHumedad() {
        var value = $.ajax({
            url: "obtenerHumedad.php",
            dataType: 'text', //indicamos que es de tipo texto plano
            async: false //ponemos el parámetro asyn a falso
        }).responseText;

        return parseInt(value);
    }
    </script>
    <div class="row p-3">
        <div class="col-9">
            <div id="container" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
        </div>
        <div class="col-3">
            <div class="d-inline-flex d-flex flex-column">
                <div class="p-2">
                    <div class="d-flex flex-column">
                        <div class="p-2"><h2>Temperatura</h2></div>
                        <div class="d-flex flex-row">
                            <div class="p-2">
                                <h1 id="h1Temperatura">1</h1>
                            </div>
                            <div class="p-2">
                                <h3>°</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-inline-flex d-flex flex-column">
                <div class="p-2">
                    <div class="d-flex flex-column">
                        <div class="p-2"><h2>Humedad</h2></div>
                        <div class="d-flex flex-row">
                            <div class="p-2">
                                <h1 id="h1Humedad" >1</h1>
                            </div>
                            <div class="p-2">
                                <h3>°</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
    Highcharts.chart('container', {
        chart: {
            type: 'line',
            animation: Highcharts.svg, // don't animate in old IE
            marginRight: 10,
            events: {
                load: function() {

                    // set up the updating of the chart each second
                    var humedad = this.series[0];
                    setInterval(function() {
                        var x = (new Date()).getTime(), // current time
                            y = getLastValueHumedad();
                            document.getElementById("h1Humedad").innerHTML=y;
                        humedad.addPoint([x, y], true, true);
                    }, 1000);

                    var temperatura = this.series[1];
                    setInterval(function() {
                        var x = (new Date()).getTime(), // current time
                            y = getLastValueTemperatura();
                            document.getElementById("h1Temperatura").innerHTML=y;
                        temperatura.addPoint([x, y], true, true);
                    }, 1000);
                }
            }
        },

        time: {
            useUTC: false
        },

        title: {
            text: 'Reporte de temperatura y humedad.'
        },
        subtitle: {
            text: 'Lecturas de Temperatura y Humedad'
        },
        xAxis: {
            type: 'datetime',
            tickPixelInterval: 150
        },
        yAxis: {
            title: {
                text: 'Temperatura y Humedad'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            headerFormat: '<b>{series.name}</b><br/>',
            pointFormat: '{point.x:%Y-%m-%d %H:%M:%S}<br/>{point.y:.2f}'
        },
        legend: {
            enabled: true
        },
        exporting: {
            enabled: false
        },
        series: [{
                name: 'Humedad',
                data: [<?php
            $sql = "SELECT * FROM valores where date(fecha)=current_date order by fecha desc limit 10";
        $queryHumedad = mysqli_query($conexion,$sql);
        while ($row = mysqli_fetch_array($queryHumedad)){
        ?>


                    [<?php echo $row['humedad']; ?>],

                    <?php } ?>
                ]

            },
            {
                name: 'Temperatura',
                data: [<?php
            $sql = "SELECT * FROM valores where date(fecha)=current_date order by fecha desc limit 10";
        $queryHumedad = mysqli_query($conexion,$sql);
        while ($row = mysqli_fetch_array($queryHumedad)){
        ?>


                    [<?php echo $row['temperatura']; ?>],

                    <?php } ?>
                ]

            }
        ]
    });
    </script>
    <br>

    <?php
    $rowTemperatura=$rowHumedad='';
    $sql = "SELECT * FROM valores where date(fecha)=current_date order by fecha desc limit 10";
    $queryTemperatura = mysqli_query($conexion,$sql);
     while ($row = mysqli_fetch_array($queryTemperatura)){
        $rowTemperatura.='['.$row['temperatura']."],";
     }
     $queryTemperatura = mysqli_query($conexion,$sql);
     while ($row = mysqli_fetch_array($queryTemperatura)){
        $rowHumedad.='['.$row['humedad']."],";
     }
       
    ?>
    
</body>



</html>