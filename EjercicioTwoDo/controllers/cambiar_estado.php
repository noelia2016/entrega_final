<?php 
    session_start();
    
    /* si no inicio session ... no le permito entrar */
    include ('../check_session.php');
    
    /* conexion a la base de datos */ 
    include ('../conexion.php');
    /* obtengo todas las consultas a mi base de datos */
    include ('../model/modelo.php');
    
    if (isset($_GET['id'])){
        // si esta definido busco para la tarea elegida la descripcion que tiene la misma 
        $tarea=$_GET['id'];
        $ds=obtener_estado($con,$tarea);
    }
    
    if ((isset($_POST['estado'])) && ($_POST['estado']) <> ''){
        /*  si estan definidas las variables del formilario para agregarlo */
        $estado=$_POST['estado'];
        $tarea=$_POST['tarea'];
        
        $ds=cambiar_estado_tarea($con, $estado, $tarea);
        if ($ds == 'TRUE'){
            // si lo actualizo notifico
            $det="Se actualizo el estado de la tarea por : " . $estado;
            // obtengo el usuario
            $usr_ele=$_SESSION["user_id"];
            // registro la actividad reciente realizada
            $act1=agregarActividad($con, $det, $usr_ele, $tarea);
            print "<script>alert(\"Se ha actualizado correctamente.\");window.location='../views/tarea.php?id=".$tarea."';</script>";
        }else{
            // si ocurrio un error notifico
            print "<script>alert(\"Ups!!!! ... Ocurrio un error.\");window.location='../views/tarea.php?id=".$tarea."';</script>";
        }
        
    }

?>