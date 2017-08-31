<?php 
    /* aca voy a contener todas las consultas que se realiaran a la base de datos */
    
    /**************************************CONSULTAS A LOS DATOS****************************************************/
    function chequearUser($con, $user, $pass){
        // chequeo que los datos ingresados por el formulario de login sean correctos
        $sql="select * from usuario where nick ='".$user."' and password = '".$pass."'";
        $querys = $con->query($sql); 
        return $querys;
    }
        
    function chequearTareasParaUsuario($con, $user_id, $estado){
        // obtiene las tareas que el usuario que inicio seccion posee
        $sql="SELECT * FROM tarea as t 
              inner join tarea_users as tu on t.id_tarea = tu.id_tarea 
              where tu.id_usuario = '".$user_id."' and estado = '".$estado."'";
        $querys = $con->query($sql);
        return $querys;
    }
    
    function obtenerDetalleTarea($con, $id){
        // obtengo los detalles de la tarea elegida
        $sql="select * from tarea where id_tarea ='".$id."'";
        $q = $con->query($sql); 
        return $q;
    }
    
    function buscar_usuarios($con){
        // obtengo los usuarios asociados
        $sql="select * from usuario";
        $q = $con->query($sql); 
        return $q;
    }
    
    function buscar_tareas_sin_asociar($con){
        // busco todas las tareas que no posean usuarios asociados
        $sql="SELECT * FROM tarea as t WHERE id_tarea not in (SELECT tu.id_tarea FROM tarea_users as tu)";
        $q = $con->query($sql); 
        return $q;
    }
    
    function obtener_descripcion_tarea($con,$tarea){
        // obtengo la descripcion de la tarea elegida
        $sql="select id_tarea, descripcion, estado from tarea where id_tarea ='".$tarea."'";
        $d = $con->query($sql); 
        return $d;
    }
    
    function obtenerComentarios($con, $id){
        // obtengo los resonsables de realizar dicha tarea
        $sql="select * from comentario as c inner join usuario as u on u.id_usuario = c.id_usuario where id_tarea ='".$id."' order by fecha_realizado";
        $qe = $con->query($sql); 
        return $qe;
    }
    
    function obtenerChecklist($con, $id, $user_id){
        // obtengo los checklist de la tarea
        $sql="SELECT * FROM consignas 
              where id_tarea ='".$id."'and id_usuario = '".$user_id."'" ;
        $q = $con->query($sql); 
        return $q;
    }
    
    function obtener_estado($con,$tarea){
        // obtengo los datos de los usuarios que no esten asociados a la tarea elegida 
        $sql1="select estado, id_tarea from tarea where id_tarea = '".$tarea."'";
        $q1 = $con->query($sql1); 
        return $q1;
    }
    
    function obtengoResponsablesDeTarea($con, $tarea){
        // obtengo los datos de los usuarios que no esten asociados a la tarea elegida 
        $sql1="select * from tarea_users as tu inner join usuario as u on u.id_usuario = tu.id_usuario where id_tarea = '".$tarea."'";
        $q1 = $con->query($sql1); 
        return $q1;
    }
    
    function checklistAsociados($con, $user_id){
        // obtengo los datos de los usuarios que no esten asociados a la tarea elegida 
        $sql1="select * from consignas where id_usuario = '".$user_id."'";
        $q1 = $con->query($sql1); 
        return $q1;
    }
    
    function buscar_usuarios_tarea($con, $tarea){
     // obtengo los datos de los usuarios que no esten asociados a la tarea elegida 
        $sql2="select * from usuario as us where us.id_usuario not in (select u.id_usuario from tarea_users as tu inner join usuario as u on u.id_usuario = tu.id_usuario where id_tarea = '".$tarea."')";
        $qry = $con->query($sql2); 
        return $qry;
    }
   
    function obtenerHistorialDeActividades($con, $user_id){
       // obtengo las actividades recientes que realizo el usuario
       $sql6="select * from actividades where id_usuario = '".$user_id."' order by fecha_realizado asc LIMIT 0, 5";
       $q6 = $con->query($sql6); 
       return $q6;
    }
    
    function ultima_tarea_ingresada($con){
        // obtengo el id de la ultima tarea registrada
       $sql8="select max(id_tarea) as id from tarea";
       $q8 = $con->query($sql8); 
       return $q8;
    }
    
    /**************************************FIN DE CONSULTAS A LOS DATOS********************************************/
    
    /**************************************INSERT DE DATOS*********************************************************/
    
    function insertarUsuario($con, $name, $ape, $nick, $pass, $email){
        // despues pasar pass a md5 para ser mas seguro
        $sql="INSERT INTO usuario (nombre, apellido, nick, password, correo) VALUES ('".$name."','".$ape."', '".$nick."', '".$pass."', '".$email."')";
        return $querys = $con->query($sql);
    }
    
    function agregarComentario($con, $comen, $tarea, $user){
        // inserto el nuevo comentario
        $fecha_actual=date("y-m-d");
        $sql="INSERT INTO comentario (detalle, fecha_realizado, id_usuario, id_tarea) VALUES ('".$comen."','".$fecha_actual."', '".$user."', '".$tarea."')";
        return $querys = $con->query($sql);      
    }
    
    function agregarResponsable_a_tarea($con, $usr_ele, $id_tarea){
        // agrego un nuevo resonsable en la tarea seleccionada
        $sql20="INSERT INTO tarea_users (id_usuario, id_tarea) VALUES ('".$usr_ele."','".$id_tarea."')";
        $que2 = $con->query($sql20); 
        return $que2; 
    }
    
    function agregar_tarea ($con, $nt_ele, $fch_ini, $esti, $cn, $fch_fin, $est, $ds){
        // agrego una nueva tarea        
        $sql5="INSERT INTO tarea (nombre, fecha_inicio, estimacion, consumo, fecha_fin, estado, descripcion) VALUES ('".$nt_ele."','".$fch_ini."','".$esti."','".$cn."','".$fch_fin."','".$est."','".$ds."')";
        
        //INSERT INTO `tarea` (`nombre`, `fecha_inicio`, `estimacion`, `consumo`, `fecha_fin`, `estado`, `descripcion`) VALUES ('Abm productos', '2017-07-11', '40.00', '20.00', '2017-07-14', 'pendiente', 'hacelo con doumentacion');
        //echo $sql5;
        $querys5 = $con->query($sql5); 
        return $querys5;
    }
    
    function agregarConsigna_a_Tarea($con, $det, $fecha_r, $est, $idT, $user_id){
        // agrego una nueva consigna a la tarea elegida al usuario que inicio session_cache_expire
        //$fecha=date("d-m-Y", strtotime($fecha_r));
        $sql1="INSERT INTO consignas (detalle, fecha_realizado, estado, id_tarea, id_usuario) VALUES ('".$det."', '".$fecha_r."', '".$est."', '".$idT."','".$user_id."')";
        //echo $sql1;
        $qs = $con->query($sql1);
        return $qs;
    }
    
    function agregarActividad($con, $det, $usr_ele, $idT) {
        // agrega una nueva actividad realizada por el usuario ... guarda el historico de la misma
        $fecha_act=date("y-m-d");
        $sql10="INSERT INTO actividades (detalle, fecha_realizado, id_usuario, id_tarea) VALUES ('".$det."', '".$fecha_act."','".$usr_ele."', '".$idT."')";
        $act = $con->query($sql10);
        return $act;
    }
    
    /**************************************FIN DE INSERT DE DATOS**************************************************/
    
    
    /**************************************INICIO DE UPDATE DE DATOS***********************************************/
    
    
    function cambiar_estado_tarea($con, $estado, $id_tarea){
        // agrego un nuevo resonsable en la tarea seleccionada
        $sql="UPDATE tarea SET estado = '".$estado."' WHERE id_tarea = '".$id_tarea."'";
        return $querys = $con->query($sql); 
    }
    
    function actualizarDescripcion($con, $desc, $tarea){
        // actualizo el campo descripcion para la tarea elegida
        $sql="UPDATE tarea SET descripcion = '".$desc."' WHERE id_tarea = '".$tarea."'";
        return $querys = $con->query($sql);
    }
    
    
    /***************************************FIN DE UPDATE DE DATOS************************************************/
    
    
    /***************************************INICIO DE ELIMINACION DE DATOS***************************************/
    
    function eliminarResponsable_de_tarea($con, $usr_ele, $id_tarea){
        // eliminar resonsable de la tarea seleccionada
        $sql201="DELETE from tarea_users where id_usuario = '".$usr_ele."' and id_tarea = '".$id_tarea."'";
        $que21 = $con->query($sql201); 
        return $que21; 
    }
    
    function eliminar_comentario_de_tarea($con,$id){
        // elimino los comentarios de la tarea relacionada
        $sql201="DELETE from comentario where id_tarea = '".$id."'";
        $que21 = $con->query($sql201); 
        return $que21; 
    }
    
    function eliminar_consignas_de_tarea($con,$id){
        // elimino las consignas de la tarea relacionada
        $sqlC="DELETE from comentario where id_tarea = '".$id."'";
        $queC = $con->query($sqlC); 
        return $queC; 
    }
    
    function eliminar_tarea_de_usuarios_asociados($con,$id){
        // elimino los usuarios asociados de la tarea elegido
        $sqlUT="DELETE from tarea_users where id_tarea = '".$id."'";
        $queUT = $con->query($sqlUT); 
        return $queUT; 
    }
    
    function eliminar_tarea($con,$id){
        // elimina la tarea definitivamente
        $sqlT="DELETE from tarea where id_tarea = '".$id."'";
        $queT = $con->query($sqlT); 
        return $queT; 
    }
    
    /***************************************FIN DE ELIMINACION DE DATOS*****************************************/
    
?>