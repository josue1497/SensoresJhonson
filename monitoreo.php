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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
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
        function getValueTemperaturaMax() {
            var value = $.ajax({
                url: "obtenerTemperaturaMax.php",
                dataType: 'text', //indicamos que es de tipo texto plano
                async: false //ponemos el parámetro asyn a falso
            }).responseText;

            return parseInt(value);
        }

        function getLastValueTemperatura() {
            var value = $.ajax({
                url: "obtenerTemperatura.php",
                dataType: 'text', //indicamos que es de tipo texto plano
                async: false //ponemos el parámetro asyn a falso
            }).responseText;

            return JSON.parse(value);
        }

        function getValueHumedadMax() {
            var value = $.ajax({
                url: "obtenerHumedad.php",
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

            return JSON.parse(value);
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
                        <div class="p-2">
                            <h2>Humedad</h2>
                        </div>
                        <div class="d-flex flex-row">
                            <div class="p-2">
                                <h1 id="h1Humedad" class="">1</h1>
                            </div>
                            <div class="p-2">
                                <h3>°</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-inline-flex d-flex flex-column">
                <div class="p-2">
                    <div class="d-flex flex-column">
                        <div class="p-2">
                            <h2>Temperatura</h2>
                        </div>
                        <div class="d-flex flex-row">
                            <div class="p-2">
                                <h1 id="h1Temperatura" class="">1</h1>
                            </div>
                            <div class="p-2">
                                <h3>°</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script type="text/javascript">
            Highcharts.chart('container', {
                chart: {
                    type: 'spline',
                    animation: Highcharts.svg, // don't animate in old IE
                    marginRight: 10,
                    events: {
                        load: function() {

                            var t = 11;
                            var humedad = this.series[0];
                            console.log(humedad);
                            setInterval(function() {
                                var data = getLastValueHumedad()
                                var x = (new Date()).getTime()+t*1000, // current time
                                    y = parseInt(data.humedad);
                                var elem = document.getElementById("h1Humedad");
                                elem.innerHTML = y;
                                elem.className = y > getValueHumedadMax() ? 'text-danger' : '';
                                humedad.addPoint([x, y], true, true);
                                t++;
                            }, 2000);
                            var w = 11;
                            var temperatura = this.series[1];
                            setInterval(function() {
                                var data = getLastValueTemperatura()
                                var x = (new Date()).getTime()+w*1000, // current time
                                    y = parseInt(data.temperatura);
                                var elem = document.getElementById("h1Temperatura");
                                elem.innerHTML = y;
                                elem.className = y > getValueTemperaturaMax() ? 'text-danger' : '';
                                temperatura.addPoint([x, y], true, true);
                                w++;
                            }, 2000);
                        }
                    }
                },
                time: {
                    useUTC: false
                },
                rangeSelector: {
                    buttons: [{
                        count: 1,
                        type: 'minute',
                        text: '1M'
                    }, {
                        count: 5,
                        type: 'minute',
                        text: '5M'
                    }, {
                        type: 'all',
                        text: 'All'
                    }],
                    inputEnabled: false,
                    selected: 0
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
                        data: (function() {
                            <?php
                            $temp_array = array();
                            $sql = "SELECT humedad, fecha FROM valores where date(fecha)=current_date order by fecha desc limit 11";
                            $queryHumedad = mysqli_query($conexion, $sql);
                            $row = mysqli_fetch_array($queryHumedad);

                            while ($row = mysqli_fetch_array($queryHumedad)) {
                                $temp_array[] = $row;
                            }
                            ?>
                            var result = [];
                            var data = JSON.stringify(<?php echo json_encode($temp_array) ?>);
                            var datos = JSON.parse(data);
                            var time = (new Date()).getTime();
                            for (var i = 0; i < datos.length; i++) {
                                result.push({
                                    x: time + i * 1000,
                                    y: parseInt(datos[i].humedad)
                                });
                            }
                            return result;
                        }())

                    },
                    {
                        name: 'Temperatura',
                        data: (function() {
                            <?php
                            $temp_array = array();
                            $sql = "SELECT temperatura, fecha FROM valores where date(fecha)=current_date order by fecha desc limit 11";
                            $queryHumedad = mysqli_query($conexion, $sql);
                            $row = mysqli_fetch_array($queryHumedad);

                            while ($row = mysqli_fetch_array($queryHumedad)) {
                                $temp_array[] = $row;
                            }
                            ?>
                            var result = [];
                            var data = JSON.stringify(<?php echo json_encode($temp_array) ?>);
                            var datos = JSON.parse(data);
                            var time = (new Date()).getTime();

                            for (var i = 0; i < datos.length; i++) {
                                result.push({
                                    x: time + i * 1000,
                                    y: parseInt(datos[i].temperatura)
                                });
                            }
                            return result;
                        }())

                    }
                ]
            });
        </script>
        <br>

        <?php
        $rowTemperatura = $rowHumedad = '';
        $sql = "SELECT * FROM valores where date(fecha)=current_date order by fecha desc limit 11";
        $queryTemperatura = mysqli_query($conexion, $sql);
        while ($row = mysqli_fetch_array($queryTemperatura)) {
            $rowTemperatura .= '[' . $row['temperatura'] . "],";
        }
        $queryTemperatura = mysqli_query($conexion, $sql);
        while ($row = mysqli_fetch_array($queryTemperatura)) {
            $rowHumedad .= '[' . $row['humedad'] . "],";
        }

        ?>

</body>



</html> 