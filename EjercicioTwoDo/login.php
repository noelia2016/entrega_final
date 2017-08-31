<!DOCTYPE html>
<head>
    <title>TwoDo - Login </title>
     <!-- PARA DARLE ESTILO A MI WEB -->
    <link rel="stylesheet" href="css/estilo.css">
     <!-- PARA LOS ICONOS -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    
    <!-- PARA LA VALIDACION DE LOS FORMULARIOS -->
    <script type="text/javascript" src="js/validacion_formularios.js"></script>
</head>
<body>
    <div id="contenedor">
        <!-- esto comprende a todo mi contenedor principal-->
        <div id="encabezado">            
            <!-- esto comprende a todo mi encabezado principal-->
            <h1>Two-Do</h1>
        </div>
        <div id="cont_general">          
            <!-- esto comprende a todo mi encabezado principal-->
            <div id="login">
               <br/>
               <form onSubmit="return validarLogin(this)" action="controllers/chequear.php" id="login" method="POST">
                   <fieldset>
                       <legend>Iniciar sesi&oacute;n:</legend><br/>
                       <label> <i class="fa fa-user-circle-o" aria-hidden="true"></i> Usuario:</label>
                       <input id="name" name="name" type="text" value=""  /><br/><br/>
                       <label><i class="fa fa-key fa-fw" aria-hidden="true"></i> Password:</label>
                       <input id="contra" name="contra" type="password" value=""  /><br/><br/>
                       <input name="submit" type="submit" value="Ingresar"/><br/>
                   <br/></fieldset>
                   <a href="views/registrar_user.html" >Registrar nuevo usuario </a>
               </form><br/>             
            </div>
            <br/>
        </div>
    </div>
</body>
</html>