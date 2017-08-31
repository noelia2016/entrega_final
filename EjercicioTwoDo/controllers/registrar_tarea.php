<?php 
    session_start();
    /* conexion a la base de datos */ 
    include ("../conexion.php");
    /* obtengo todas las consultas a mi base de datos */
    include ("../model/modelo.php");
    
    /* si no inicio session ... no le permito entrar */
    include ("../check_session.php");

    /* si esta definida la session es porque esta conectado obtengo los datos de la tarea */
    if ((isset($_POST['namet'])) && ($_POST['namet'] != '') && (isset($_POST['descripcion'])) && ($_POST['descripcion'] != '') && (isset($_POST['fecha_inicio'])) && ($_POST['fecha_inicio'] != '')  && (isset($_POST['fch_fin'])) && ($_POST['fch_fin'] != '') && (isset($_POST['estimacion'])) && ($_POST['estimacion'] != '') && (isset($_POST['estado'])) && ($_POST['estado'] != '')){
        /* si envio el formulario es por que deseo agregar dicho usuario a la tarea elegida */
        $namet=$_POST['namet'];
        $ds=$_POST['descripcion'];
        $fch_ini=$_POST['fecha_inicio'];
        $fch_fin=$_POST['fch_fin'];
        $esti=$_POST['estimacion'];
        $cn=$_POST['consumido'];
        $est=$_POST['estado'];
        
        $addt=agregar_tarea($con, $namet, $fch_ini, $esti, $cn, $fch_fin, $est, $ds);
        
        if ($addt == 'TRUE' ){
            // si es cierto es por se agrego correctamente
            // debo asociarla al usuario registrado y despues guardar el historico de la actividad reciente
            $id=ultima_tarea_ingresada($con);
            if ($id->num_rows > 0 ){
                 while ($r1=$id->fetch_row()):
                    $idT=$r1[0];
                 endwhile;   
                // obtengo el usuario
                $usr_ele=$_SESSION["user_id"];
                // agrego la relacion del usuario
                $add=agregarResponsable_a_tarea($con, $usr_ele, $idT);
                           
                $detalle='Se agrego una nueva tarea que debe realizar antes de la fecha de finalizacion. Revizarla!!! Dicha tarea es: ';
                $det= $detalle . $namet;
                $act1=agregarActividad($con, $det, $usr_ele, $idT);
                print "<script>alert(\"Se registro correctamente la tarea.\");window.location='../views/main.php';</script>";
                exit;
            }
        }else{
            //si no se inserto correctamente ... tira error
            print "<script>alert(\"Ups!! ocurrio un error vuelva a intentarlo.\");window.location='../views/registrar_tarea.php';</script>";
            exit;
        }
    }

?>