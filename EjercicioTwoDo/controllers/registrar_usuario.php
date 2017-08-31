<?php 

    /* conexion a la base de datos */ 
    include ('../conexion.php');
    /* obtengo todas las consultas a mi base de datos */
    include ('../model/modelo.php');
    
    if ((isset($_POST['name'])) && (isset($_POST['ape'])) && (isset($_POST['nick'])) && (isset($_POST['contra'])) && (isset($_POST['email']))) {
    /* si estan definidas las variables las tomo y las chequeo con la base de datos para permitirle conecetarse */
        $name=$_POST['name'];
        $ape=$_POST['ape'];
        $nick=$_POST['nick'];
        $pass=$_POST['contra'];
        $correo=$_POST['email'];
        $querys=insertarUsuario($con, $name, $ape, $nick, $pass, $correo);

        if ($querys == TRUE){
            /* si se inserto correctamente el usuario muestro la pantalla de login*/
            print "<script>alert(\"Se registro correctamente.\");window.location='../login.php';</script>";
        }else{
             print "<script>alert(\"Ups!! ocurrio un error vuelva a intentarlo.\");window.location='../views/registrar_user.php';</script>";
        }   
    }else{
        /* si no estan definidas lo redirijo a la pantalla de login */
        header("Location: http://localhost/EjercicioTwoDo/views/registrar_user.html");
    }

?>