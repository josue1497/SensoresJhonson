<?php

session_start();
include("conexion.php"); ?>

<html lang="en">    
  <head>
    <title>HierroferralVyT</title>
    <!-- Required meta tags -->
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="css/bootstrap-grid.min.css"> 
      <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/font-awesome.min.css">
     
    
    
    
  
    </head>
    
    
    
    <body>
        
 <script src="js/jquery-3.2.1.min.js"></script>
 <script src="js/ajax.popper.min.js"></script>                                      
<script src="js/jquery-2.2.4.min.js"></script>                                          
<script src="js/bootstrap.min.js"></script>
        
                               
    
    <script src="js/highcharts-3d.js"></script> 
<script src="js/highcharts.js"></script>
<script src="js/modules/exporting.js"></script>
<script src="js/modules/export-data.js"></script>          
        
        

     
  <div id="container" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>



        <script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Historic World Population by Region'
    },
    subtitle: {
        text: 'Source: <a href="https://en.wikipedia.org/wiki/World_population">Wikipedia.org</a>'
    },
    xAxis: {
        
        
        categories: [ ],
        
       
        
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
        valueSuffix: ' millions'
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
            $sql = "SELECT * FROM valores";
        $query = mysqli_query($conexion,$sql);
        while ($row = mysqli_fetch_array($query)){
        ?>
                
            
        [<?php echo $row['humedad']; ?>],
        
            <?php } ?>
            
        ]
    }, {
        name: 'Temperatura',
        data: [
            
            <?php
            $sql = "SELECT * FROM valores";
        $query = mysqli_query($conexion,$sql);
        while ($row = mysqli_fetch_array($query)){
        ?>
   
            [<?php echo $row['temperatura']; ?>],
            
            <?php } ?>
            
        ]
    }]
});
        </script> 

         <form method="post" action="generadordereportesactual.php">
    
    <select name="nivel"><option>BIEN</option>
    <option>REGULAR</option>
    <option>MALO</option>
    </select>
    
  <textarea name="comentario"> </textarea>
    
    <input type="text" name="temperatura" readonly value="<?php echo $row['temperatura']; ?>">
    
    
    <input type="hidden" name="nombre" value="<?php echo $_SESSION['usuario1']; ?>"> 
    
    <input type="submit" value="Enviar">
    
</form>        

     
    
  </body>

 
        
      </html>