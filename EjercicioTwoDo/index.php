<?php 
    if ((isset($_POST['name'])) && (isset($_POST['contra']))) {
        /* si estan definidas las variables las tomo y las chequeo con la base de datos para permitirle conecetarse */
        $user=$_POST['name'];
        $pass=$_POST['contra'];
     
        $quer=chequearUser($con, $user,$pass);
     
        if ($quer->num_rows > 0){
            /* si estan definidas las variables las tomo y indentifico las tareas del usuario especifico */
            
            while ($r1=$quer->fetch_array()):
                $_SESSION['user_id'] = $r1['id_usuario'];
                $_SESSION['user'] = $user;
            endwhile;
            header("Location: http://localhost/EjercicioTwoDo/views/main.php"); 
            exit;
        }else{
            /* si el usuario ingresado no existe le muestro login nuevamente*/
            header("Location: http://localhost/EjercicioTwoDo/login.php"); 
            exit;
        }
    }
    // si inicio session debe
    if (isset($_SESSION['user']) and ($_SESSION['user'] != ' ') ){
       /* si estan definidas las variables las tomo y indentifico las tareas del usuario especifico */
       header("Location: http://localhost/EjercicioTwoDo/views/main.php");
       exit;
    }else{
        /* si no estan definidas lo redirijo a la pantalla de login */
        header("Location: http://localhost/EjercicioTwoDo/login.php");
        exit;
    }
?>