<?php 
    session_start ();
    
    /* conexion a la base de datos */ 
    include ('../conexion.php');
    /* obtengo todas las consultas a mi base de datos */
    include ('../model/modelo.php');
    
    
    /* si esta definida la session es porque esta conectado entonces me quedo con el id_usuario */
    
    $user_id= $_SESSION['user_id'];
    
    $fch_act=date("y-m-d");
    /*obtengo todas las tareas para el usuario que inicio sesion */
    $query1=chequearTareasParaUsuario($con, $user_id, 'pendiente');
    
    $query2=chequearTareasParaUsuario($con, $user_id, 'en curso');
    
    $query3=chequearTareasParaUsuario($con, $user_id, 'completo');
    
    // obtengo las actividades recientes del usuario
    $actividades=obtenerHistorialDeActividades($con, $user_id);
    
    /* y los checklist que tiene asociados */
    
    $query4=checklistAsociados($con, $user_id);
  

?>