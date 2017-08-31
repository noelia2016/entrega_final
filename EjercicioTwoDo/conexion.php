<?php 

    /* conexion a la base de datos */ 
    
    /* datos para conectarme a la base de datos*/
    $host="localhost";
    $db='proyecto_noelia';
    $user='admin';
    $pass='prog2';
    

    /* me conecto efectivamente a la base de datos */
    $con = new mysqli($host,$user,$pass,$db);

?>