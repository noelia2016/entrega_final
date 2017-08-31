<?php 
    include("../controllers/tarea.php");
    
    /* hago el includo del menu del usuario*/
    include("header_user.php");
?>
        <div id="cont_general"> 
             <?php if ($sql1->num_rows > 0 ){
                      while ($r1=$sql1->fetch_array()):
            ?>
            <!-- esto comprende a todo mi encabezado principal-->
            <h1><i class="fa fa-clipboard" aria-hidden="true"></i> <b><?php echo $r1['nombre']; ?></b></h1>
            <div class="cuerpo-tarea">
                <div class="acciones">
                    <p><i class="fa fa-th-large" aria-hidden="true"></i> <u>Acciones:</u> </p>
                    <ol>
                        <li>Fecha de inicio: <?php echo $r1['fecha_inicio']; ?></li>
                        <li>Duracion estimada: <?php echo $r1['estimacion']; ?> hrs.</li>
                        <li>Consumo real: <?php echo $r1['consumo']; ?> hrs.</li>
                        <li>Estado: <?php echo $r1['estado']; ?> </li>
                    </ol><br/>
                    <a href="editar_estado.php?id=<?php echo $id;?>"> <i class="fa fa-pencil fa-fw"></i> Cambiar estado </a> 
                    <a href="../eliminar_tarea.php?id=<?php echo $id;?>"> <i class="fa fa-pencil fa-fw"></i> Eliminar tarea </a><br/><p></p>
                </div>
                <div class="responsables">
                    <p><i class="fa fa-user-circle-o" aria-hidden="true"></i> <u>Responsables:</u> </p>
                    <ul>
                        <?php if ($sql2->num_rows > 0 ){
                            while ($r2=$sql2->fetch_array()):
                        ?>
                                <li><?php echo $r2['apellido']; ?>, <?php echo $r2['nombre']; ?></li>
                        <?php 
                            endwhile;
                        }else{
                            echo 'No se registraron responsables para la tarea elegida';
                        }
                        ?>
                    </ul>
                    <a href="agregar_responsable.php?id=<?php echo $id; ?>"><i class="fa fa-user-plus" aria-hidden="true"></i> Agregar responsable </a>
                </div>
            </div>
            <!-- fin del cuerpo de la tarea -->
                        <h4><u><b> Descripcion:</b></u></h4>
                        <p><?php echo $r1['descripcion']; ?></p>           
                        <p><a href="editar_tarea.php?id=<?php echo $id;?>"> <i class="fa fa-pencil fa-fw"></i> Editar</a><br/></p>
                            <?php   endwhile;
                 }else{
                    echo 'No se registro ninguna descripcion para la tarea elegida';
                 }
            ?>           
           <!-- Aca van las diferentes tareas que pertenecen al checklist de la tarea elegida -->
            <div class="checklist" ><h3><b><u>CHECKLIST</u></b></h3>
            <p><b><u>Instalaci&oacute;n:</u></b></p>
                <ul>
                    <?php if ($sql4->num_rows > 0 ){
                            while ($r4=$sql4->fetch_array()):
                    ?>
                                <li><input type="checkbox" id="subscribeNews" name="subscribe" value="newsletter"> <?php echo $r4['detalle']; ?></li>
                    <?php 
                            endwhile;
                        }else{
                            echo 'No se registraron responsables para la tarea elegida';
                        }
                    ?>
                
                </ul>
                <a href="agregar_consigna.php?idT=<?php echo $id;?>" > <i class="fa fa-tasks" aria-hidden="true"></i> Nuevo checklist</a>
                <!--p><b><u>Subtareas:</u></b></p>
                <ul>
                    <li><input type="checkbox" id="subscribeNews" name="subscribe" value="newsletter"> Descargar el ejecutable de la siguiente pagina www.upso.edu.ar</li>
                    <li><input type="checkbox" id="subscribeNews" name="subscribe" value="newsletter" checked> Descomprimir el archivo en C:/ fuera de archivos programa.</li>
                    <li><input type="checkbox" id="subscribeNews" name="subscribe" value="newsletter"> Instalar haciendo doble click </li>
                    <li><input type="checkbox" id="subscribeNews" name="subscribe" value="newsletter"> Y arreglate como puedas!!!!!! Exitos</li>
                </ul>
                <a href=""><i class="fa fa-tasks" aria-hidden="true"></i> Nueva tarea</a-->
            </div>
            <!-- Fin de diferentes tareas que pertenecen al checklist -->
            
            <!-- inicion de div de comentarios-->
            <div class="comentarios">
                <p><b><u>Comentarios</u></b></p>
                <form action="../controllers/agregar_comentario.php" method="post">
                    <input type="hidden" name="tarea" value="<?php echo $id;?>"/>
                    <input type="hidden" name="user" value="<?php echo $_SESSION["user_id"]; ?>"/>
                    <textarea name="comen" rows="5" cols="90">Escriba su comentario...</textarea><br/>
                    <input type="submit" value="Comentar"/>
                </form>
                <div class="comentarios">
                <?php if ($sql3->num_rows > 0 ){
                            while ($r3=$sql3->fetch_array()):
                ?>
                    <h5><i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo $r3["nombre"];?> | <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $c=date("d-m-Y", strtotime($r3["fecha_realizado"])); ?> </h5>
                    <p id="text_coment"><i class="fa fa-comments" aria-hidden="true"></i> <?php echo $r3["detalle"];?></p>
                    <?php 
                        endwhile;
                        }else{
                            echo 'No se realizaron comentarios para la tarea elegida';
                        }
                    ?>
                </div>
           </div>
            <!-- fin de div de comentarios-->
        </div>
    </div>
</body>
</html>