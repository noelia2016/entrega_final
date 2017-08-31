<?php 
    session_start();
    /* conexion a la base de datos */ 
    include ('../conexion.php');
    /* obtengo todas las consultas a mi base de datos */
    include ('../model/modelo.php');
    
    /* si no inicio session ... no le permito entrar */
    include ('../check_session.php');

    /* si esta definida la session es porque esta conectado obtengo los datos de la tarea */
    if (isset($_GET["id"])){
        /*obtengo el id tarea */
        $id=$_GET["id"];
        $user_id= $_SESSION['user_id'];
        /*obtengo todas las tareas para el usuario que inicio sesion */
        $sql1=obtenerDetalleTarea($con, $id);
        /*obtengo todos los usuarios responsables para la tarea elegida */
        $sql2=obtengoResponsablesDeTarea($con, $id);
        /*obtengo todas los comentarios para la tarea elegida */
        $sql3=obtenerComentarios($con, $id);
        /*obtengo todas los checklist para la tarea */
        $sql4=obtenerChecklist($con,$id, $user_id);
        
       // }   
    }else{
        /* si no estan definidas lo redirijo a la pantalla de login */
        header("Location: http://localhost/EjercicioTwoDo/main.php");
    }

?>