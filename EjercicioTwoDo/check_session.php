<?php 
    if (!isset($_SESSION['user']) and (!isset($_SESSION['user_id'])) ){
        /* si no estan definidas lo redirijo a la pantalla de login */
        header("Location: http://localhost/EjercicioTwoDo/login.php");
        exit;
    }
    
?>