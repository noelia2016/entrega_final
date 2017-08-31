<?php 
    /* si no inicio session ... no le permito entrar */    
    include("../controllers/agregar_consignas.php");
    
    /* hago el includo del menu del usuario*/
    include("header_user.php");
?>
 <div id="cont_general">                 
            <!-- esto comprende a todo mi encabezado principal-->
            <div id="">
               <br/>
               <form name="new_checklist" onsubmit="return validarConsigna(this);" action="../controllers/agregar_consignas.php" method="post">                  
                   <!-- ESTE SERIA UN NUEVO CHECKLIST -->
                   <fieldset>
                       <legend>Registrar nueva consigna para la tarea elegida:</legend><br/>
                       <input type="hidden" name="tarea" value="<?php echo $id; ?>"/>
                       <input type="hidden" name="user" value="<?php echo $user; ?>"/>
                       <label> <i class="fa fa-user-circle-o" aria-hidden="true"></i> Detalle:</label><br/>
                       <textarea name="detalle" rows="5" cols="90">Escriba aqui su detalle</textarea><br/>
                       <label> <i class="fa fa-user-circle-o" aria-hidden="true"></i> Fecha realizado:</label>
                       <input name="fecha" type="date" value="" required/><br/><br/>
                       <label> <i class="fa fa-user-circle-o" aria-hidden="true"></i> Estado:</label>
                       <input name="estado" type="text" value="" required/><br/><br/>
                       <input name="submit"type="submit" value="Registrar checklist"/><br/>
                   <br/></fieldset>
               </form>
            </div>
            <br/>
        </div>
    </div>
</body>
</html>