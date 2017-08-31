<?php 
    session_start();
    /* conexion a la base de datos */ 
    include ('../conexion.php');
    /* obtengo todas las consultas a mi base de datos */
    include ('../model/modelo.php');
    
    if ((isset($_POST['name'])) && (isset($_POST['contra'])) && $_POST['name'] != '' && $_POST['contra'] != '') {
    /* si estan definidas las variables y no estan vacias
     las tomo y las chequeo con la base de datos para permitirle conecetarse */
        $user=$_POST['name'];
        $pass=$_POST['contra'];
        
        // chequeo que el usuario ingresado sea el correcto
        $quer=chequearUser($con, $user,$pass);
        // si devuelve algo es porque es correcto entonces lo dejo iniciar seccion
        if ($quer->num_rows > 0){
            // me guardo los datos de seccion nombre de usuario y el id usuario
            $_SESSION['user'] = $user;
            while ($r1=$quer->fetch_array()):
                $_SESSION['user_id'] = $r1['id_usuario'];
            endwhile;
            // y lo direcciono a la pantalla principal
            header("Location: http://localhost/EjercicioTwoDo/views/main.php");
        }else{
            // si la contraseña o usuario es incorrecto notifico y redirecciono al login
            print "<script>alert(\"El password y/o usuario son incorrectos.\");window.location='../login.php';</script>";
            //header("Location: http://localhost/EjercicioTwoDo/");
        }   
    }else{
        /* si no estan definidas lo redirijo a la pantalla de login */
        header("Location: http://localhost/EjercicioTwoDo/");
    }

?>