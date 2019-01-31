<?php

session_start();
include("conexion.php"); ?>

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

    <?php
    $rowTemperatura=$rowHumedad='';
    $sql = "SELECT * FROM valores where date(fecha)=current_date order by fecha asc";
    $queryTemperatura = mysqli_query($conexion,$sql);
     while ($row = mysqli_fetch_array($queryTemperatura)){
        $rowTemperatura.='['.$row['temperatura']."],";
     }
     $queryTemperatura = mysqli_query($conexion,$sql);
     while ($row = mysqli_fetch_array($queryTemperatura)){
        $rowHumedad.='['.$row['humedad']."],";
     }
       
    ?>

    <h1 class="text-center display-4">Mencione Sus lecturas</h1>
    <form method="post" id="formReport">
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="nivel">Nivel</label>
                    <select name="nivel" class="form-control" id="nivel">
                        <option value="BIEN">BIEN</option>
                        <option value="REGULAR">REGULAR</option>
                        <option value="MALO">MALO</option>
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="comentario">Comentario</label>
                    <textarea name="comentario" class="form-control" required="required" id="comentario"> </textarea>
                </div>
            </div>
            <div class="col-4">
                <div class="d-flex flex-column">
                    <div class="form-group">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                        <input type="hidden" name="report_id" id="report_id">
                        <input type="submit" id="btnEnviar" value="Modificar Reporte" class="btn btn-primary " />
                    </div>
                    <div class="form-group">
                    <a href="<?php 
                    if(strcmp(trim($_SESSION['user_role']), 'Trabajador')==0){
                        echo 'vistatrabajador.php';}
                         else if(strcmp(trim($_SESSION['user_role']), 'Supervisor')==0){
                             echo 'vistasupervisor.php';}else{
                                echo 'vistaadministrador.php';
                             }   ?>" class="btn btn-secondary">Volver</a>
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
                url: "updatereport.php",
                data: $("#formReport").serialize(),
                success: function(r) {
                    if (r == 1) {
                        alert('Actualizado con Exito.');
                        $('#nivel').attr('disabled', 'disabled');
                        $('#comentario').attr('disabled', 'disabled');
                    } else {
                        alert('Ha ocurrido un error.');
                    }
                }
            });
            // Nos permite cancelar el envio del formulario
            return false;
        });
        $('#nivel').val(estatus);
        $('#comentario').val(comentario);
        $('#report_id').val(id);
    });
    </script>

</body>



</html>