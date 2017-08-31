<?php 
    /* si no inicio session ... no le permito entrar */
    session_start();
    include ('../check_session.php');
    
    /* conexion a la base de datos */ 
    include ('../conexion.php');
    /* obtengo todas las consultas a mi base de datos */
    include ('../model/modelo.php');
    
    if ((isset($_POST['comen']))){
        /*  si estan definidas las variables del formilario para agregarlo */
        $comen=$_POST['comen'];
        $user=$_POST['user_id'];
        $tarea=$_POST['tarea'];
        
        $cm=agregarComentario($con, $comen, $tarea, $user);
        if ($cm == 'TRUE' ){
            // si es cierto es por se agrego correctamente
            // lo agrego en el historico a la accion reciente realizada
            $det="Realizo el siguiente comentario: ".$comen;
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