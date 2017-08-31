<?php 
    /* hago el includo del menu del usuario*/
    include("header_user.php");   
    
    /* controlador que se encarga de gestionar al alta del responsable para dicha tarea */ 
    include ("../controllers/cambiar_estado.php");
?>
        <div id="cont_general">                 
            <!-- esto comprende a todo mi encabezado principal-->
            <div id="">
               <br/>
               <form action="../controllers/cambiar_estado.php" method="post">
                   <fieldset>
                   <?php 
                      /* obtengo los usuarios para poder ver que es lo que debo agregar*/
                      if ($ds->num_rows > 0){
                         while ($r=$ds->fetch_array()): ?>
                           <input type="hidden" name="tarea" value="<?php echo $r['id_tarea']; ?>"/>
                           <legend>Modifico el estado de la tarea elegida:</legend><br/>
                           <label><i class="fa fa-asterisk" aria-hidden="true"></i> Estado:</label><br/>
                           <input type="text" name="estado" value="<?php echo $r['estado']; ?>"/> <br/><br/>                
                           <input name="submit" type="submit" value="Modificar"/> <a href="tarea.php?id=<?php echo $r["id_tarea"];?>" ><input name="volver" type="button" value="Volver"/></a> <br/>
                   <br/>
                   <?php endwhile;
                      }else{    
                          // si ocurrio un error notifico
                          echo "<script language='JavaScript'>alert('Ocurrio un error');</script>";
                      }
                  ?>
                   </fieldset>
               </form>
            </div>
            <br/>
        </div>
    </div>
</body>
</html>