<?php 
    /* hago el includo del menu del usuario*/
    include("header_user.php");
    
    /* controlador que se encarga de gestionar al alta del responsable para dicha tarea */ 
    include ('../controllers/asociar_usuario_a_tarea.php');
    
?>
        <div id="cont_general">                 
            <!-- esto comprende a todo mi encabezado principal-->
            <div id="">
               <br/><a href="main.php"><input name="onclick" type="submit" value="Volver"/></a>
               <br/><form action="../controllers/asociar_usuario_a_tarea.php" method="post">
                   <fieldset>
                       <legend>Agrego un nuevo responsable a la tarea elegida:</legend><br/>
                       <br/>
                       <label> <i class="fa fa-user-circle-o" aria-hidden="true"></i> Elija el usuario:</label>
                          <?php 
                            /* obtengo los usuarios para poder ver que es lo que debo agregar*/
                                if ($tareas->num_rows > 0){ ?>
                                  <select name="tarea">
                                  <?php while ($t1=$tareas->fetch_array()): ?>                                     
                                        <option value="<?php echo $t1['id_tarea']; ?>"> <?php echo $t1['nombre']; ?></option> 
                                  <?php endwhile; ?>                                 
                                      </select>
                                      <br/><br/>
                         <?php }else{ ?>
                                    <p class="alert alert-warning">No hay resultados</p>
                         <?php } ?> 
                       <label> <i class="fa fa-user-circle-o" aria-hidden="true"></i> Elija el usuario:</label>
                          <?php 
                            /* obtengo los usuarios para poder ver que es lo que debo agregar*/
                                if ($users->num_rows > 0){ ?>
                                  <select name="usuario">
                                  <?php while ($r=$users->fetch_array()): ?>                                     
                                        <option value="<?php echo $r['id_usuario']; ?>"> <?php echo $r['apellido']; ?>, <?php echo $r['nombre']; ?> </option> 
                                  <?php endwhile; ?>                                 
                                      </select>
                                      <br/><br/>
                                      <input name="submit" type="submit" value="Agregar"/> <br/>
                         <?php }else{ ?>
                                    <p class="alert alert-warning">No hay resultados</p>
                         <?php } ?>                     
                   <br/></fieldset>
               </form><br/>
            </div>
            <br/>
        </div>
    </div>
</body>
</html>