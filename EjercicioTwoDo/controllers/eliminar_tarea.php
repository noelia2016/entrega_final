<?php 
    session_start();
    /* conexion a la base de datos */ 
    include ("../conexion.php");
    /* obtengo todas las consultas a mi base de datos */
    include ("../model/modelo.php");
    
    /* si no inicio session ... no le permito entrar */
    include ("../check_session.php");

    /* si esta definida la session es porque esta conectado obtengo los datos de la tarea */
    if ((isset($_GET['id'])) && ($_GET['id'] != '') ){
        /* si envio el formulario es por que deseo agregar dicho usuario a la tarea elegida */
        $id=$_GET['id'];
        //elimino todos los datos relacionados antes de eliminar definitivamente la 
        $ECM=eliminar_comentario_de_tarea($con, $id);
        $ECT=eliminar_consignas_de_tarea($con, $id);
        $EUT=eliminar_tarea_de_usuarios_asociados($con, $id);
        $ET=eliminar_tarea($con, $id);
        
        if ($ET == 'TRUE' ){
            // si se elimino correctamente lo registro en el historial de actividades  
            // obtengo el usuario
            $usr_ele=$_SESSION["user"]; 
            $usr=$_SESSION["user_id"];            
            $detalle='Se elimino la tarea por el usuario: ';
            $det= $detalle . $usr_ele;
            $act1=agregarActividad($con, $det, $usr, $idT);
            print "<script>alert(\"Se elimino correctamente la tarea elegida.\");window.location='../views/main.php';</script>";
            exit;
        }else{
            //si no se elimino por algun motivo lo notifico ... tira error
            print "<script>alert(\"Ups!! ocurrio un error vuelva a intentarlo.\");window.location='../views/registrar_tarea.php';</script>";
            exit;
        }
    }

?>