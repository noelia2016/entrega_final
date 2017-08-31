<!DOCTYPE html>
<head>
    <title>TwoDo</title>
     <!-- PARA DARLE ESTILO A MI WEB -->
    <link rel="stylesheet" href="../css/estilo.css">
     <!-- PARA LOS ICONOS -->
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    
    <!-- PARA LA VALIDACION DE LOS FORMULARIOS -->
    <script type="text/javascript" src="../js/validacion_formularios.js"></script>
    
    <!-- PARA MOSTRAR LOS GRAFICOS -->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script> 
    <script>
       google.load("visualization", "1", {packages:["corechart"]});
       google.setOnLoadCallback(dibujarGrafico);
       function dibujarGrafico() {
         // Tabla de datos: valores y etiquetas de la gráfica
         var data = google.visualization.arrayToDataTable([
           ['Tareas', 'Valor numérico'],
           ['Completas', 20.21],
           ['Completas', 20.21],
           ['En curso', 59.58]    
         ]);
         var options = {
           title: 'Estado por tareas'
         }
         // Dibujar el gráfico
         new google.visualization.ColumnChart( 
         //ColumnChart sería el tipo de gráfico a dibujar
           document.getElementById('GraficoGoogleChart-ejemplo-1')
         ).draw(data, options);
       }
     </script> 
     <!-- FIN DE MOSTRAR LOS GRAFICOS -->
     
</head>
<body>
    <div id="contenedor">
        <!-- esto comprende a todo mi contenedor principal-->
        <div id="encabezado">            
            <!-- esto comprende a todo mi encabezado principal-->
            <!--div id="logo"><i class="fa fa-home fa-fw" aria-hidden="true"></i>TwoDo</div-->
            <div id="logo"><a href="main.php" ><img src="../images/twodo.png" alt="Logo del sitio" height="80%" width="35%" /></a></div>
            <div id="menu">
                <ul class="rss">
                    <li><a href="asociar_usuario_a_tarea.php"><i class="fa fa-plus" aria-hidden="true"></i> Asociar tareas</a></li>
                    <li><a href="registrar_tarea.php"> <i class="fa fa-plus" aria-hidden="true"></i> Tarea </a></li>                   
                    <li><a href="estadistica_tarea.php" ><i class="fa fa-line-chart" aria-hidden="true"></i> Estadistica</a></li>
                    <li><i class="fa fa-unlock" aria-hidden="true"></i><a href="../controllers/desconectar.php">Salir</a></li>
                </ul>
            </div>
            <!-- fin del encabezado-->
        </div>