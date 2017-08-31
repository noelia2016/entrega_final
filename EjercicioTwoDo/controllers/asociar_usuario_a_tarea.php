<?php
    /* si no inicio session ... no le permito entrar */
    session_start();
    include ('../check_session.php');
    
    /* conexion a la base de datos */ 
    include ('../conexion.php');
    
    /* obtengo todas las consultas a mi base de datos */
    include ('../model/modelo.php');
    
    // busco todos los usuarios y todas las tareas que no tienen asociados usuarios
    $users=buscar_usuarios($con);
    $tareas=buscar_tareas_sin_asociar($con);
    if ((isset($_POST['usuario'])) && ($_POST['usuario'] != '') && (isset($_POST['tarea'])) && ($_POST['tarea'] != '')){
        /* si envio el formulario es por que deseo agregar dicho usuario a la tarea elegida */
        $usr_ele=$_POST['usuario'];
        $idT=$_POST['tarea'];
        $add=agregarResponsable_a_tarea($con, $usr_ele, $idT);
        
        if ($add == 'TRUE' ){
            // si es cierto es por se agrego correctamente entonces puedo guardar en el historico de actividades lo que hizo
            $det="Se agrego un nuevo responsable en la tarea";
            $act1==agregarActividad($con, $det, $usr_ele, $idT);
            print "<script>alert(\"Se ha actualizado correctamente.\");window.location='../views/main.php';</script>";
        }else{
            // si no se inserto correctamente ... tira error
            print "<script>alert(\"Ups!!... ocurrio un error intente mas tarde.\");window.location='../views/asociar_usuario_a_tarea.php';</script>";
        }
    }

?>
