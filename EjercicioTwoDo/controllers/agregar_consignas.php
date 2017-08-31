<?php 
    session_start();
    /* si no inicio session ... no le permito entrar */
    include ('../check_session.php');
     
    /* conexion a la base de datos */ 
    include ('../conexion.php');
    /* obtengo todas las consultas a mi base de datos */
    include ('../model/modelo.php');  
    
    /* si esta definida la session es porque esta conectado obtengo los datos de la tarea */
    if (isset($_GET["idT"])){
        /*me guardo el id tarea */
        $id=$_GET["idT"];
        $user=$_SESSION["user_id"];
    }
    
    if ((isset($_POST["fecha"])) && (($_POST["fecha"]) != '') && (isset($_POST["detalle"])) && (($_POST["detalle"]) != '') && (isset($_POST["estado"])) && (($_POST["estado"]) != '')){
        $det=$_POST["detalle"];
        $fecha_r=$_POST["fecha"];
        $est=$_POST["estado"];
        $tarea=$_POST["tarea"];
        $user_id= $_POST["user"];
        /*obtengo todas las tareas para el usuario que inicio sesion */
        $sql1=agregarConsigna_a_Tarea($con, $det, $fecha_r, $est, $tarea, $user_id);
        if ($sql1 == 'TRUE' ){
            $det="Se registro una nueva consigna a la tarea elegida: ".$comen;
            $act=agregarActividad($con, $det, $user, $tarea);
            if ($act == TRUE){
                // y notifico que todo esta bien y lo dirijo a la tarea que esta viendo
                print "<script>alert(\"Se ha actualizado correctamente.\");window.location='../views/tarea.php?id=".$tarea."';</script>";
            }else{
                // si no se inserto correctamente ... tira error
                print "<script>alert(\"Ups!!... ocurrio un error intente mas tarde.\");window.location='../views/tarea.php?id=".$tarea."';</script>";
            }
        }else{
            // si no se inserto correctamente ... tira error
            print "<script>alert(\"Ups!!... ocurrio un error intente mas tarde.\");window.location='../views/tarea.php?id=".$tarea."';</script>";
        } 
    }

?>