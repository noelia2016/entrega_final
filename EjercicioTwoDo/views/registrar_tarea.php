<?php 
    include("../controllers/registrar_tarea.php");
    
    /* hago el includo del menu del usuario*/
    include("header_user.php");
?>
        <div id="cont_general">                 
            <!-- esto comprende a todo mi encabezado principal-->
            <div id="">
               <br/>
               <form action="../controllers/registrar_tarea.php" method="post">
                   <fieldset>
                       <legend>Registrar nueva tarea:</legend><br/>
                       
                       <label> <i class="fa fa-user-circle-o" aria-hidden="true"></i> Nombre de la tarea:</label>
                       <input name="namet" type="text" value="" required/><br/><br/>
                       
                       <label> <i class="fa fa-user-circle-o" aria-hidden="true"></i> Fecha inicio:</label>
                       <input name="fecha_inicio" type="date" value="" required/><br/><br/>
                       
                       <label><i class="fa fa-asterisk" aria-hidden="true"></i> Estimaci&oacute;n del tiempo necesario:</label>
                       <input name="estimacion" type="text" value="" required /><br/><br/>
                       
                       <label><i class="fa fa-asterisk" aria-hidden="true"></i> Tiempo consumido:</label>
                       <input name="consumido" type="text" value="" required /><br/><br/>
                       
                       <label> <i class="fa fa-user-circle-o" aria-hidden="true"></i> Fecha de finalizaci&oacute;n:</label>
                       <input name="fch_fin" type="date" value="" required/><br/><br/>                       
                       
                       
                       <label><i class="fa fa-asterisk" aria-hidden="true"></i> Estado:</label>
                       <select name="estado">
                            <option value="pendiente">Pendiente</option>
                            <option value="en curso">En curso</option>
                            <option value="completo">Completa</option>
                       </select><br/><br/>
                       
                       <label><i class="fa fa-asterisk" aria-hidden="true"></i> Descripci&oacute;n:</label><br/>
                       <textarea name="descripcion" rows="6" cols="50" >Indique una breve descripci&oacute;n de la funcionalidad de la tarea.</textarea><br/><br/>
                       
                       <input name="submit"type="submit" value="Ingresar"/><br/>
                   <br/></fieldset>
               </form>
            </div>
            <br/>
        </div>
    </div>
</body>
</html>