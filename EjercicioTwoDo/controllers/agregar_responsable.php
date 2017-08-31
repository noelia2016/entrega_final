<?php
    /* si no inicio session ... no le permito entrar */
    session_start();
    include ('../check_session.php');
    
    /* conexion a la base de datos */ 
    include ('../conexion.php');
    
    /* obtengo todas las consultas a mi base de datos */
    include ('../model/modelo.php');
    
    if ((isset($_GET['id'])) && ($_GET['id'] != '')) {
        /* obtengo todos los usuarios que no esten asociado a dicha tarea */
        $tarea=$_GET['id'];
        $users=buscar_usuarios_tarea($con, $tarea);
    }
    if ((isset($_POST['usuario'])) && ($_POST['usuario'] != '') && (isset($_POST['tarea'])) && ($_POST['tarea'] != '')){
        /* si envio el formulario es por que deseo agregar dicho usuario a la tarea elegida */
        $usr_ele=$_POST['usuario'];
        $idT=$_POST['tarea'];
        $add=agregarResponsable_a_tarea($con, $usr_ele, $idT);
        
        if ($add == 'TRUE' ){
            // si es cierto es por se agrego correctamente
            // si lo actualizo notifico
            $det="Se agrego un nuevo responsable a la tarea, l usuario es: " . $usr_ele;
            // obtengo el usuario
            $usr_ele=$_SESSION["user_id"];
            // registro la actividad reciente realizada
            $act1=agregarActividad($con, $det, $usr_ele, $tarea);
            print "<script>alert(\"Se ha actualizado correctamente.\");window.location='../views/tarea.php?id=".$idT."';</script>";
        }else{
            // si no se inserto correctamente ... tira error
            print "<script>alert(\"Ups!!... ocurrio un error intente mas tarde.\");window.location='../views/tarea.php?id=".$idT."';</script>";
        }
    }

?>
