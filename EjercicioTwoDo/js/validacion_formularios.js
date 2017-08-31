    /* se validara con javascript que no se envien
    datos vacios en el formulario .. se ejecuta del lada del cliente */
    
    function validarConsigna(this){
        // en esta funcion se validan los datos en el formulario de ingreso de checklist a una tarea
    var             
       detalle=document.forms['new_checklist'].detalle.value;
       fecha=document.forms['new_checklist'].fecha.value;
       estado=document.forms['new_checklist'].estado.value;

       if (detalle != '' && fecha != '' && estado != ''){
           //alert('Se ingresaron usuario y password');
           
           // valido que la fecha ingresada de realizada la tarea no se menor a la actual
           
           return true;
           document.new_checklist.submit();
       }else{
           alert('Debe ingresar los datos solicitados por favor');
           return false;                   
       }
    }
    
    function validarLogin(this) {
        // valida los datos ingresados por el usuario al inicio de sesion
    var             
       patron =/[A-Za-z\s]/;
       usuario=document.getElementById("name").value;
       password=document.getElementById("contra").value;

       //si ingreso vacio 
       if (usuario === '' || password === ''){
           alert('Debe ingresar los datos solicitados por favor');
           return false;           
       }else if (!patron.test(usuario) || !patron.test(password)  ){
           alert('Debe ingresar los datos solicitados por favor');
           return false;     
       }else if (usuario.length > 35 || password.length > 35 ){
           alert('Los campos usuario y password solo permiten hastan 35 caracteres');
           return false; 
       }
       // si los datos ingresados son correctos envio el formulario
       return true;
       document.new_checklist.submit();
       
    }
    
    function restarFechas(fechaInicial, fechaFinal) {
        var fech1 = document.getElementById(fechaInicial).value;
        var fech2 = document.getElementById(fechaFinal).value;

        if((Date.parse(fech1)) > (Date.parse(fech2))){
            alert('La fecha inicial no puede ser mayor que la fecha final');
            return false;
        }
    }

    function validar_AddUsuario(){
        // cheque el ingreso de datos para registrar un nuevo usuario
    var             
       nombre=document.forms['new_user'].name.value;
       apellido=document.forms['new_user'].ape.value;
       usuario=document.forms['new_user'].nick.value;
       password=document.forms['new_user'].contra.value;
       email=document.forms['new_user'].email.value;
       
       // expresion para validar el formato del email que tiene que ser como por ejemplo asi ehnas2323@hdds.jss
       expresion = /\w+@\w+\.+[a-z]/;
       expre = /([A-Z0-9\s\\]+)/i;
       texto = /[A-Za-z]/
       if (nombre === '' || apellido === '' || usuario === '' || password === '' || email === ''){
           // si alguno de lo campos estan vacios notifico
           alert('Todos los campos son obligatorios. Debe completarlos!!! ');
           return false;
       }else if ((nombre.length > 50 ) || (apellido.length > 50)){
               alert('El campo nombre y apellido solo pueden contener hasta 50 caracteres.');
               return false;
       }else if ((usuario.length > 35) || (password.length > 35)){
               alert('El campo usuario y password solo permiten hasta 35 caracteres.');
               return false;
       }else if (email.length > 80){
               alert('El campo correo electronico acepta hasta 80 caracteres como maximo');
               return false;
       }else if(!expresion.test(email)){
               // si el formato del email no es valido notifico
               alert('El correo ingresado no es valido');
               return false;
       }else if (!expre.test(usuario) || !expre.test(password)) {
            alert("Solo permite texto y numeros para usuario y contraseña.");
            return false;
       }else if (!texto.test(nombre) || !texto.test(apellido)) {
            alert("Solo se permite texto para los campos nombre y apellido.");
            return false;
       }
       // si esta todo ok envio el formulario para que se procese
       return true;
       document.new_user.submit();
    }