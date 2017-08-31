<?php 
    /* hago el includo del menu del usuario*/
    include("header_user.php");   
    
    /* controlador que se encarga de gestionar al alta del responsable para dicha tarea */ 
    include ("../controllers/modificar_tarea.php");
?>
        <div id="cont_general">                 
            <!-- esto comprende a todo mi encabezado principal-->
            <div id="">
               <br/>
               <form action="../controllers/modificar_tarea.php" method="post">
                   <fieldset>
                   <?php 
                      /* obtengo los usuarios para poder ver que es lo que debo agregar*/
                      if ($ds->num_rows > 0){
                         while ($r=$ds->fetch_array()): ?>
                           <input type="hidden" name="tarea" value="<?php echo $r['id_tarea']; ?>"/>
                           <legend>Modifico la descripcion de la tarea elegida:</legend><br/>
                           <label><i class="fa fa-asterisk" aria-hidden="true"></i> Descripci&oacute;n:</label><br/>
                           <textarea name="descripcion" rows="6" cols="50" ><?php echo $r['descripcion']; ?></textarea><br/><br/>
                  
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