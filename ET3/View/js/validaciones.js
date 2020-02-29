    //Archivo javaScript
    //Nombre: validaciones.js
    //Autor: Noa López Marchante
    //Fecha de creación: 28/10/2019 
    //Función: validar los campos de los formularios

    //Función comprobarVacio(campo): comprueba si el campo es vacío
    function comprobarVacio(campo) {
        //Si el campo tiene valor null o su tamaño es 0 o solo tiene espacios en blanco
        if (campo.value == null || campo.value.length == 0 || (/^\s+$/).test(campo.value)) {
            //muestra un mensaje de error
            msgError('El campo no puede estar vacio');
            
            return false;
        }//fin comprobacion null espacio o 0
        //devuelve true
        return true;
    } //fin función comprobarVacio 

    //Función comprobarTexto(campo,size): comprueba si el texto tiene algún caracter especial
    function comprobarTexto(campo, size) { 
        var i; //variable auxiliar de control
        var expregular = /[`~!ºª¿¡@#$%^&*()_¬|+\-=?;:'",.<>\{\}\[\]\\\/]/;
        /*Estructura que permite recorrer todos los caracteres del valor de campo */
        for (i = 0; i < size; i++) {
            /*Comprueba que el carácter seleccionado de campo no es un carácter especial, si es así muestra un mensaje de error y retorna false */
            if (expregular.test(campo.value.charAt(i))){
                msgError('El campo contiene algun caracter no valido');
                return false;
            }  //fin comprobacion formato
        } //fin recorrer caracteres
        return true;
    }//fin función comprobarTexto

    //Función comprobarAlfabetico: comprueba si el campo contiene letras
    function comprobarAlfabetico(campo, size) {
    var i; //variable auxiliar de control
        /*Estructura que permite recorrer todos los caracteres del valor de campo */
        for (i = 0; i < size; i++) {
            /*Comprueba que el carácter seleccionado de campo no es una letra o un espacio, si es así se muestra un mensaje de error y retorna false */
            if (/[^A-Za-zñáéíóúÑÁÉÍÓÚüÜ -]/.test(campo.value.charAt(i))) {
                msgError('Solo se permiten letras');
                return false;
            } //fin comprobacion formato
        }//fin recorrer caracteres
        return true;
    } //fin función comprobarAlfabetico

    //Función comprobarEmail(campo): comprueba que el valor del campo tenga un formato correcto de un email
    function comprobarEmail(campo) {
        //Si el valor del campo no cumple el formato de la dirección de correo determinada por la expresión regular, muetra un mensaje de error y retorna false.
        if (!/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/.test(campo.value)) {
            msgError('Formato incorrecto');
            return false;
        }//fin comprobacion formato
        return true;
    }//fin metodo

    //Función comprobarTelf(campo): comprueba que el valor del campo tenga un formato de telefono español
    function comprobarTelf(campo) {
        /*Si el valor del campo no cumple el formato de la expresión, se muestra un mensaje de error y se retorna false*/
        if (!/^(34)?[6|7|9][0-9]{8}$/.test(campo.value)) {
            msgError('Formato incorrecto');
            return false;
        } //fin comprobacion formato
        return true;
    }//fin metodo

    //Función comprobarDni(campo): comprueba si el formato del campo se corresponde con el de un dni
    function comprobarDni(campo) {
        var numero; //variable que representa la parte numérica del dni
        var letr; //variable que representa la letra del dni
        var letra; //variable que representa el array que permite averiguar la letra del dni
        var expresion_regular_dni; //variable que representa la expresión regular del dni
        letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
        expresion_regular_dni = /^\d{8}[a-zA-Z]$/;

        /*Comprueba si la expresión regular coincide con el formato del valor del campo, si no coincide se muestra un mensaje de error y retorna false*/
        if (expresion_regular_dni.test(campo.value)) {
            numero = campo.value.substr(0, 8);
            letr = campo.value.substr(8, 1);
            numero = numero % 23;
            letra = letra.substring(numero, numero + 1);
            /*Valida que la letra introducida en la variable campo sea correcta, si es así se devuelve devuelve true. Si no, muestra un mensaje de error y devuelve false*/
            if (letra != letr.toUpperCase()){
                msgError('La letra del NIF no se corresponde');
                return false;
            }else{// si no cumple con la condición del if anterior,
                return true;
            }//fin comprobacion letra
        }else{// si no cumple con la condición del if anterior,
            msgError('Formato incorrecto');
            return false;
        }//fin comprobacion Formato
    }//fin metodo

    //function comprobarReal(campo,numeroDecimales,valormenor,valormayor): realiza una comprobación de que el número introducido en este caso llamado num, tenga el mismo número de decimales que
    //el parámetro numeroDecimales y sea menor que el valormayor y mayor que el valormenor.
    function comprobarReal(campo, numeroDecimales, valormenor, valormayor) {

        var num; //variable que representa el número del valor de campo
        var i; //variable de control de bucle
        var j; //variable de control de bucle
        var control; //variable de control de bucle
        var numeroDecimalesCampo; //variable que representa el número de decimales del valor de campo
        num = campo.value;
        i = 0;
        j = 0;
        numeroDecimalesCampo = 0;
        control = true;
        caracterSep1= ',';
        caracterSep2= '.';
        /*Comprueba que el formato del valor del campo se corresponde con el formato indicado con la expresión regular */
        if (!(/^-?[0-9]+([,\.][0-9]*)?$/.test(num))) {
            msgError('El campo debe ser un numero real');
            return false;
        } else {// si no cumple con la condición del if anterior,
            /*Recorre el valor de campo hasta que control sea falso o la variable de de control i sobrepase la longitud de campo*/
            do {
                /*Comprueba si el caracter seleccionado es un punto o una coma, si es así cuenta los carácteres que le siguen*/
                if (num.charAt(i) == caracterSep1 || num.charAt(i) == caracterSep2) {
                    control = false;
                    i++;
                    /*Recorre el valor del campo hasta que se sobrepase, mientras aumenta el contador de caracteres encontrados despues del punto y a coma*/
                    for (j = i; j < num.length; j++) {
                        numeroDecimalesCampo++;
                    }//fin recorre length
                }//fin comprobacion caracter
                i++;
            } while (control && (i < num.length));
            /*Comprueba que si el numero de decimales del campo es mayor que el numeroDecimales establecido, muestra un mensaje de error y retorna false*/
            if (numeroDecimalesCampo <= numeroDecimales) {
                msgError('El numero de decimales debe ser inferior a' + numeroDecimales);
                return false;
            } else {// si no cumple con la condición del if anterior,
                /*Comprueba que el valor de campo es mayor que valormayor, si es así muestra un mensaje de error y retorna false */
                if (num > valormayor) {
                    msgError('Debe ser menor de' + valormayor);
                    return false;
                } else {// si no cumple con la condición del if anterior,
                    /*Comprueba que el valor de campo es menor que valormenor, si es así muestra un mensaje de error y retorna false */
                    if (num < valormenor) {
                        msgError('Debe ser mayor de' + valormenor);
                        return false;
                    }//fin comprobacion menor
                }//fin comprobacion mayor
            }//fin comprobacion decimales
            return true;
        }//fin comprobacion formato
    }//fin metodo

    //Función comprobarEntero(campo,valormenor, valormayor): comprueba si el campo contiene un numero entero 
    function comprobarEntero(campo, valormenor, valormayor) {
        /*Comprueba que campo es un dígito*/
        if (!/^([0-9])*$/.test(campo.value)) {
            msgError('El campo debe ser un numero entero');
            return false;
        } else { //si es un digito
            /*Comprueba que el valor de campo es mayor que valormayor, si es así muestra un mensaje de error y retorna false */
            if (campo.value > valormayor) {
                msgError('Debe ser menor de' + valormayor);
                return false;
            } else { //si cumple la restriccion anterior
                /*Comprueba que el valor de campo es menor que valormenor, si es así muestra un mensaje de error y retorna false */
                if (campo.value < valormenor) {
                    msgError('Debe ser mayor de' + valormenor);
                    return false;
                } //fin comprobacion menor que
            } //fin comprobacion mayor que
        } //fin comprobacion numero

        return true;
    } //fin función comprobarEntero

    //Función comprobarExpresionRegular(campo,expregular,size): comprueba si el formato es correcto
    function comprobarExpresionRegular(campo, expregular, size) {
            var i;
            for (i = 0; i < size; i++) {
                //si la cadena no se ajusta a la expresión regular
                if (expregular.test(campo.value.charAt(i))) {
                    //mensaje de error
                    // msgErrorA(campo.name);
                    msgError('Formato incorrecto');
                    //devolver false
                    return false;
                } //fin comprobación expresión regular
            } //fin recorrer los caracteres 
        return true;
    }

    /* ************************************************************************************************************************************************************************************************************************************* */

    //function abrirVentana(): realiza la función de abrir una ventana emergente, a través de una capa, capaFondo1, para que no se pueda interacionar con la capa base. Estas dos capas se activan y su visibility pasa a visible.
    function abrirVentana() {
        document.getElementById("capaFondo1").style.visibility = "visible"; //Se establece la capa de fondo a visible
        document.getElementById("capaVentana").style.visibility = "visible"; //Se establece la capa de ventana a visible
        document.formError.bAceptar.focus();
    }

    //function cerrarVentana(): realiza la función de cerrar una ventana emergente, a través de una capa, capaFondo1, para que no se pueda interacionar con la capa base. Estas dos capas se desactivas y su visibility pasa a hidden.
    function cerrarVentana() {
        document.getElementById("capaFondo1").style.visibility = "hidden";
        document.getElementById("capaVentana").style.visibility = "hidden"; //Se establece la capa de ventana a oculta
        document.formError.bAceptar.blur();
    }

    //msgError(msg): realiza la función de mostrar el valor del parámetro msg en el div, cuyo id es "miDiv". Además se encarga de llamar a la función abrirVentana(), la cual muestra un mensaje de error cuya información está en html
    function msgError(msg) {
         console.log(msg);
         document.getElementById("miDiv").setAttribute("data-translate",msg); // Cogemos la referencia al nuestro div.
         translatePage();
         // $("#miDiv").append(msg);
        abrirVentana();
        return true;
    }

//     function msgErrorA(msg) {
//         console.log(msg);
//         document.getElementById("miDivA").setAttribute("data-translate",msg); // Cogemos la referencia al nuestro div.
//         translatePage();
//         // $("#miDiv").append(msg);
//        abrirVentana();
//        return true;
//    }

    /* ******************************************************************************************************************************************************************************************* */
    //function comprobar_login():valida todos los campos del formulario codTitulacion antes de realizar el submit
    function comprobar_login() {
        var login; /*variable que representa el elemento login del formulario de codTitulacion */
        var password; /*variable que representa el elemento password del formulario de codTitulacion */

        login = document.forms['Form'].elements[0];
        password = document.forms['Form'].elements[1];

        /*Comprueba si el login es vacio, retorna false*/
        if (!comprobarVacio(login)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            /*Comprobamos su longitud, si es mayor que 15, retorna false*/
            if (!comprobarTexto(login, 15)) {
                    return false;
            }//fin comprobar texto
        } //fin comprobación vacío
        
        /*Comprueba si la password es vacio, retorna false*/
        if (!comprobarVacio(password)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            /*Comprueba su longitud, si es mayor que 20, retorna false*/
            if (!comprobarTexto(password, 20)) {
                return false;
            }//fin comprobar texto
        }//fin comprobar vacio
    }//fin comprobar login

/* ***************************************************************************************************************************************************************************************** */

    //function comprobarAdd:comprobar añadir
    function comprobarAddUsuario() {
        var login; /*variable que representa el elemento codTitulacion del formulario add */
        var password; /*variable que representa el elemento password del formulario add */
        var dni; /*variable que representa el elemento dni del formulario add */
        var nombre; /*variable que representa el elemento nombresuser del formulario add */
        var apellidos; /*variable que representa el elemento apellidos del formulario add */
        var telefono; /*variable que representa el elemento telefono del formulario add */
        var email; /*variable que representa el elemento email del formulario add */
        var fechaNacimiento; /*variable que representa el elemento direccion del formulario add */
        var fotoPersonal; /*variable que representa el elemento fotoPersonal del usuario del formulario add */
        var sexo; /*variable que representa el elemento sexo del usuario del formulario add */

        login = document.forms['ADD'].elements[0];
        password = document.forms['ADD'].elements[1];
        dni = document.forms['ADD'].elements[2];
        nombre = document.forms['ADD'].elements[3];
        apellidos = document.forms['ADD'].elements[4];
        telefono = document.forms['ADD'].elements[5];
        email = document.forms['ADD'].elements[6];
        fechaNacimiento = document.forms['ADD'].elements[7];
        fotoPersonal= document.forms['ADD'].elements[8];
        sexo = document.forms['ADD'].elements[9];

        /*Comprueba si el login es vacio, retorna false en ese caso */
        if (!comprobarVacio(login)) {
            return false;
        } else {// si no está vacío,
            /*Comprobamos su longitud y si es texto, si es mayor que 15 o no es un texto, retorna false*/
            if (!comprobarTexto(login, 15)) {
                    return false;
            }//fin comprobar texto
        }//fin comprobar vacio

        /*Comprueba si la password es vacio, retorna false*/
        if (!comprobarVacio(password)) {
            return false;
        }else {// si no cumple con la condición del if anterior,
            /*Comprueba su longitud y si es texto, si es mayor que 20 o no es texto, retorna false*/
            if (!comprobarTexto(password, 20)) {
                return false;
            }//fin comprobar texto
        }//fin comprobar vacio
        
        /*Comprueba si dni es vacio, retorna false*/
        if (!comprobarVacio(dni)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            /*Comprueba si tiene un formato valido de dni */
            if (!comprobarDni(dni)) {
                return false;
            } //fin comprobar dni
        } //fin comprobar vacío

        /*Comprueba si nombre es vacio, retorna false*/
        if (!comprobarVacio(nombre)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            if (!comprobarAlfabetico(nombre, 30)) {
                return false;
            }//fin comprobar alfabetico
        }//fin comprobar vacio

        /*Comprueba si apellidos es vacio, retorna false*/
        if (!comprobarVacio(apellidos)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            /*Comprueba si tiene carácteres no alfanuméricos, si es así, retorna false */
            if (!comprobarAlfabetico(apellidos, 50)) {
                return false;
            }//fin comprobar alfabetico
        }//fin comprobar vacio

        /*Comprueba si fechaNacimiento es vacio, retorna false*/
        if (!comprobarVacio(fechaNacimiento)) {
            return false;
        }

        /*Comprueba si foto es vacio, retorna false*/
        if (!comprobarVacio(fotoPersonal)) {
            return false;
        }

        /*Comprueba si email es vacio, retorna false*/
        if (!comprobarVacio(email)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            /*Comprueba si tiene su formato incorrecto, si es así, retorna false*/
            if (!comprobarEmail(email)) {
                return false;
            }//fin comprobar email
        }//fin comprobar vacio

        /*Comprueba si telelefono es vacio, retorna false*/
        if (!comprobarVacio(telefono)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            /*Comprueba si el formato no es correcto, si es así, retorna false */
            if (!comprobarTelf(telefono)) {
                return false;
            }//fin comprobar telefono
        }//fin comprobar vacio 

        /*Comprueba si sexo es vacio, retorna false*/
        if (!comprobarVacio(sexo)) {
            return false;
        }
        return true;
    }//fin add usuario

    //function comprobarAdd():valida todos los campos del formulario add antes de realizar el submit
    function comprobarAddTitulacion() {

        var codTitulacion; /*variable que representa el elemento codTitulacion del formulario add */
        var codCentro; /*variable que representa el elemento codCentro del formulario add */
        var nombreTitulacion; /*variable que representa el elemento nombreTitulacion del formulario add */
        var responsableTitulacion; /*variable que representa el elemento responsableTitulacion del formulario add */


        codTitulacion = document.forms['ADD'].elements[0];
        codCentro = document.forms['ADD'].elements[1];
        nombreTitulacion = document.forms['ADD'].elements[2];
        responsableTitulacion = document.forms['ADD'].elements[3];

        /*Comprueba si codTitulacion es vacio, retorna false*/
        if (!comprobarVacio(codTitulacion)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            //Comprobamos que no hay espacio intermedios
            if (!/[\s]/.test(codTitulacion.value)) {
                return false;
            } else {// si no cumple con la condición del if anterior,
                /*Comprobamos si tiene caracteres especiales, si es así, retorna false */
                if (!comprobarTexto(codTitulacion, 10)) {
                    return false;
                }//fin comprobartexto
            }//fin comprobar espacio
        }//fin comprobar vacio 	
        
        /*Comprueba si codCentro es vacio, retorna false*/
        if (!comprobarVacio(codCentro)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            //Comprobamos que no hay espacio s intermedios
            if (!/[\s]/.test(codCentro.value)) {
                return false;
            } else {// si no cumple con la condición del if anterior,
                /*Comprueba si tiene caracteres especiales, si es así, retorna false */
                if (!comprobarTexto(codCentro, 10)) {
                    return false;
                }//comprobar texto 			
            }//comprobar espacio
        }//comprobar vacio

        /*Comprueba si nombreTitulacion es vacio, retorna false*/
        if (!comprobarVacio(nombreTitulacion)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            /*Comprueba si tiene carácteres no alfanuméricos, si es así, retorna false */
            if (!comprobarAlfabetico(nombreTitulacion, 50)) {
                return false;
            } //fin comprobar alfabetico
        }//fin comprobar vacio

        /*Comprueba si responsableTitulacion es vacio, retorna false*/
        if (!comprobarVacio(responsableTitulacion)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            /*Comprueba si tiene carácteres no alfanuméricos, si es así, retorna false */
            if (!comprobarAlfabetico(responsableTitulacion, 60)) {
                return false;
            } //fin comprobacion alfabetico
        } //fin comprobacion vacio
        return true;
    } //fin add titulacion

    //function comprobarAdd():valida todos los campos del formulario add antes de realizar el submit
    function comprobarAddProfesor() {
        var dni; /*variable que representa el elemento dni del formulario add */
        var nombre; /*variable que representa el elemento nombre del formulario add */
        var apellidos; /*variable que representa el elemento apellidos del formulario add */
        var area; /*variable que representa el elemento area del formulario add */
        var departamento; /*variable que representa el elemento departamento del formulario add */

        dni = document.forms['ADD'].elements[0];
        nombre = document.forms['ADD'].elements[1];
        apellidos = document.forms['ADD'].elements[2];
        area = document.forms['ADD'].elements[3];
        departamento = document.forms['ADD'].elements[4];

        /*Comprueba si dni es vacio, retorna false*/
        if (!comprobarVacio(dni)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            /*Comprueba si tiene un formato valido de dni */
            if (!comprobarDni(dni)) {
                return false;
            } //fin comprobar dni
        }//fin comprobar vacio

        /*Comprueba si nombre es vacio, retorna false*/
        if (!comprobarVacio(nombre)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            /*Comprueba si tiene carácteres no alfanuméricos, si es así, retorna false */
            if (!comprobarAlfabetico(nombre, 15)) {
                return false;
            }// fin comprobar alfabetico
        }//fin comprobar vacio

        /*Comprueba si apellidos es vacio, retorna false*/
        if (!comprobarVacio(apellidos)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            /*Comprueba si tiene carácteres no alfanuméricos, si es así, retorna false */
            if (!comprobarAlfabetico(apellidos, 30)) {
                return false;
            }//fin comprobar alfabetico
        }//fin comprobar vacio

        /*Comprueba si area es vacio, retorna false*/
        if (!comprobarVacio(area)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            /*Comprueba si tiene carácteres no alfanuméricos, si es así, retorna false */
            if (!comprobarAlfabetico(area, 60)) {
                return false;
            }//fin comprobar alfabetico
        }//fin comprobar vacio

        /*Comprueba si departamento es vacio, retorna false*/
        if (!comprobarVacio(departamento)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            /*Comprueba si tiene carácteres no alfanuméricos, si es así, retorna false */
            if (!comprobarAlfabetico(departamento, 60)) {
                return false;
            }//fin comprobar alfabetico
        }//fin comprobar vacio
        return true;
    } //fin comprobar add profesor

    //function comprobarAdd():valida todos los campos del formulario add antes de realizar el submit
    function comprobarAddProf_Titulacion() {

        var dni; /*variable que representa el elemento dni del formulario add */
        var codTitulacion; /*variable que representa el elemento codTitulacion del formulario add */
        var anhoAcademico; /*variable que representa el elemento anhoAcademico del formulario add */

        dni = document.forms['ADD'].elements[0];
        codTitulacion = document.forms['ADD'].elements[1];
        anhoAcademico = document.forms['ADD'].elements[2];

        /*Comprueba si codTitulacion es vacio, retorna false*/
        if (!comprobarVacio(codTitulacion)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            //Comprobamos que no hay espacio intermedios
            if (!/[\s]/.test(codTitulacion.value)) {
                return false;
            } else {// si no cumple con la condición del if anterior,
                /*Comprobamos si tiene caracteres especiales, si es así, retorna false */
                if (!comprobarTexto(codTitulacion, 10)) {
                    return false;
                }//fin comprobartexto
            }//fin comprobar espacio
        }//fin comprobar vacio 	
        
        /*Comprueba si codCentro es vacio, retorna false*/
        if (!comprobarVacio(dni)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            /*Comprueba si tiene caracteres especiales, si es así, retorna false */
            if (!comprobarDni(dni)) {
                return false;
            }//comprobar dni 			
        }//comprobar vacio

        /*Comprueba si nombreTitulacion es vacio, retorna false*/
        if (!comprobarVacio(anhoAcademico)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            /*Comprueba si tiene caracteres especiales, si es así, retorna false */
            if (!comprobarEntero(anhoAcademico,1,999999999)) {
                return false;
            }//fin comprobar entero
        }//fin comprobar vacio
        return true;
    } //fin add prof_titulacion

    //function comprobarAdd():valida todos los campos del formulario add antes de realizar el submit
    function comprobarAddProf_Espacio() {

        var dni; /*variable que representa el elemento dni del formulario add */
        var codEspacio; /*variable que representa el elemento codTitulacion del formulario add */

        dni = document.forms['ADD'].elements[0];
        codEspacio = document.forms['ADD'].elements[1];

        /*Comprueba si codTitulacion es vacio, retorna false*/
        if (!comprobarVacio(codEspacio)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            //Comprobamos que no hay espacio intermedios
            if (!/[\s]/.test(codEspacio.value)) {
                return false;
            } else {// si no cumple con la condición del if anterior,
                /*Comprobamos si tiene caracteres especiales, si es así, retorna false */
                if (!comprobarTexto(codEspacio, 10)) {
                    return false;
                }//fin comprobartexto
            }//fin comprobar espacio
        }//fin comprobar vacio 	
        
        /*Comprueba si codCentro es vacio, retorna false*/
        if (!comprobarVacio(dni)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            /*Comprueba si tiene caracteres especiales, si es así, retorna false */
            if (!comprobarDni(dni)) {
                return false;
            }//comprobar dni 			
        }//comprobar vacio
        return true;
    } //fin add prof_Espacio

    //function comprobarAdd():valida todos los campos del formulario add antes de realizar el submit
    function comprobarAddEspacio() {
        var codEspacio; /*variable que representa el elemento dni del formulario add */
        var codEdificio; /*variable que representa el elemento nombre del formulario add */
        var codCentro; /*variable que representa el elemento apellidos del formulario add */
        var tipo; /*variable que representa el elemento area del formulario add */
        var superficieEspacio; /*variable que representa el elemento departamento del formulario add */
        var numInventarioEspacio; //variable que representa el elemento numInventarioEspacio del formulario add

        codEspacio = document.forms['ADD'].elements[0];
        codEdificio = document.forms['ADD'].elements[1];
        codCentro = document.forms['ADD'].elements[2];
        tipo = document.forms['ADD'].elements[3];
        superficieEspacio = document.forms['ADD'].elements[4];
        numInventarioEspacio = document.forms['ADD'].elements[5];

        /*Comprueba si codTitulacion es vacio, retorna false*/
        if (!comprobarVacio(codEspacio)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            //Comprobamos que no hay espacio intermedios
            if (!/[\s]/.test(codEspacio.value)) {
                return false;
            } else {// si no cumple con la condición del if anterior,
                /*Comprobamos si tiene caracteres especiales, si es así, retorna false */
                if (!comprobarTexto(codEspacio, 10)) {
                    return false;
                }//fin comprobartexto
            }//fin comprobar espacio
        }//fin comprobar vacio 	

        /*Comprueba si codEdificio es vacio, retorna false*/
        if (!comprobarVacio(codEdificio)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            //Comprobamos que no hay espacio intermedios
            if (!/[\s]/.test(codEdificio.value)) {
                return false;
            } else {// si no cumple con la condición del if anterior,
                /*Comprobamos si tiene caracteres especiales, si es así, retorna false */
                if (!comprobarTexto(codEdificio, 10)) {
                    return false;
                }//fin comprobartexto
            }//fin comprobar espacio
        }//fin comprobar vacio 	

        /*Comprueba si codCentro es vacio, retorna false*/
        if (!comprobarVacio(codCentro)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            //Comprobamos que no hay espacio intermedios
            if (!/[\s]/.test(codCentro.value)) {
                return false;
            } else {// si no cumple con la condición del if anterior,
                /*Comprobamos si tiene caracteres especiales, si es así, retorna false */
                if (!comprobarTexto(codCentro, 10)) {
                    return false;
                }//fin comprobartexto
            }//fin comprobar espacio
        }//fin comprobar vacio 	

        /*Comprueba si tipo es vacio, retorna false*/
        if (!comprobarVacio(tipo)) {
            return false;
        }//fin comprobar vacio

        /*Comprueba si area es vacio, retorna false*/
        if (!comprobarVacio(superficieEspacio)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            /*Comprueba su longitud, si es mayor que 30, retorna false*/
            if (!comprobarReal(superficieEspacio,3,1,9999)) {
                return false;
            }//fin comprobar real
        }//fin comprobar vacio

        /*Comprueba si numInventarioEspacio es vacio, retorna false*/
        if (!comprobarVacio(numInventarioEspacio)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            if (!comprobarEntero(numInventarioEspacio, 1,99999999)) {
                return false;
            }//fin comprobar entero
        }//fin comprobar vacio
        return true;
    } //fin comprobar add espacio

    //function comprobarAdd():valida todos los campos del formulario add antes de realizar el submit
    function comprobarAddProf_Espacio() {

        var dni; /*variable que representa el elemento dni del formulario add */
        var codEspacio; /*variable que representa el elemento codTitulacion del formulario add */

        dni = document.forms['ADD'].elements[0];
        codEspacio = document.forms['ADD'].elements[1];

        /*Comprueba si codTitulacion es vacio, retorna false*/
        if (!comprobarVacio(codEspacio)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            //Comprobamos que no hay espacio intermedios
            if (!/[\s]/.test(codEspacio.value)) {
                return false;
            } else {// si no cumple con la condición del if anterior,
                /*Comprobamos si tiene caracteres especiales, si es así, retorna false */
                if (!comprobarTexto(codEspacio, 10)) {
                    return false;
                }//fin comprobartexto
            }//fin comprobar espacio
        }//fin comprobar vacio 	
        
        /*Comprueba si codCentro es vacio, retorna false*/
        if (!comprobarVacio(dni)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            /*Comprueba si tiene caracteres especiales, si es así, retorna false */
            if (!comprobarDni(dni)) {
                return false;
            }//comprobar dni 			
        }//comprobar vacio
        return true;
    } //fin add prof_Espacio

    //function comprobarAdd():valida todos los campos del formulario add antes de realizar el submit
    function comprobarAddEdificio() {
        var codEdificio; /*variable que representa el elemento codEdificio del formulario add */
        var nombreEdificio; /*variable que representa el elemento nombreEdificio del formulario add */
        var direccionEdificio; /*variable que representa el elemento direccionEdificio del formulario add */
        var campusEdificio; /*variable que representa el elemento campuesEdificio del formulario add */

        codEdificio = document.forms['ADD'].elements[0];
        nombreEdificio = document.forms['ADD'].elements[1];
        direccionEdificio = document.forms['ADD'].elements[2];
        campusEdificio = document.forms['ADD'].elements[3];	

        /*Comprueba si codEdificio es vacio, retorna false*/
        if (!comprobarVacio(codEdificio)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            //Comprobamos que no hay espacio intermedios
            if (!/[\s]/.test(codEdificio.value)) {
                return false;
            } else {// si no cumple con la condición del if anterior,
                /*Comprobamos si tiene caracteres especiales, si es así, retorna false */
                if (!comprobarTexto(codEdificio, 10)) {
                    return false;
                }//fin comprobartexto
            }//fin comprobar espacio
        }//fin comprobar vacio 		

        /*Comprueba si area es vacio, retorna false*/
        if (!comprobarVacio(nombreEdificio)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            /*Comprueba su longitud, si es mayor que 30, retorna false*/
            if (!comprobarAlfabetico(nombreEdificio,50)) {
                return false;
            }//fin comprobar alfabetico
        }//fin comprobar vacio

        /*Comprueba si area es vacio, retorna false*/
        if (!comprobarVacio(direccionEdificio)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            /*Comprueba su longitud, si es mayor que 30, retorna false*/
            if (!comprobarTexto(direccionEdificio,150)) {
                return false;
            }//fin comprobar texto
        }//fin comprobar vacio

    /*Comprueba si area es vacio, retorna false*/
        if (!comprobarVacio(campusEdificio)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            if (!comprobarAlfabetico(campusEdificio,10)){
                return false;
            } //fin comprobacion alfabetico 
        }//fin comprobar vacio
        return true;
    } //fin comprobar add Edificio

    //function comprobarAdd():valida todos los campos del formulario add antes de realizar el submit
    function comprobarAddCentro() {
        var codCentro; /*variable que representa el elemento codEdificio del formulario add */
        var codEdificio; /*variable que representa el elemento nombreEdificio del formulario add */
        var nombreCentro; /*variable que representa el elemento direccionEdificio del formulario add */
        var direccionCentro; /*variable que representa el elemento campuesEdificio del formulario add */
        var responsableCentro; //variable que represneta repsonsablecentro del formulario add

        codCentro = document.forms['ADD'].elements[0];
        codEdificio = document.forms['ADD'].elements[1];
        nombreCentro = document.forms['ADD'].elements[2];
        direccionCentro = document.forms['ADD'].elements[3];
        responsableCentro = document.forms['ADD'].elements[4];	

        /*Comprueba si codEdificio es vacio, retorna false*/
        if (!comprobarVacio(codEdificio)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            //Comprobamos que no hay espacio intermedios
            if (!/[\s]/.test(codEdificio.value)) {
                return false;
            } else {// si no cumple con la condición del if anterior,
                /*Comprobamos si tiene caracteres especiales, si es así, retorna false */
                if (!comprobarTexto(codEdificio, 10)) {
                    return false;
                }//fin comprobartexto
            }//fin comprobar espacio
        }//fin comprobar vacio 	

        /*Comprueba si codEdificio es vacio, retorna false*/
        if (!comprobarVacio(codCentro)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            //Comprobamos que no hay espacio intermedios
            if (!/[\s]/.test(codCentro.value)) {
                return false;
            } else {// si no cumple con la condición del if anterior,
                /*Comprobamos si tiene caracteres especiales, si es así, retorna false */
                if (!comprobarTexto(codCentro, 10)) {
                    return false;
                }//fin comprobartexto
            }//fin comprobar espacio
        }//fin comprobar vacio 		

        /*Comprueba si area es vacio, retorna false*/
        if (!comprobarVacio(nombreCentro)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            /*Comprueba su longitud, si es mayor que 30, retorna false*/
            if (!comprobarAlfabetico(nombreCentro,50)) {
                return false;
            }//fin comprobar alfabetico
        }//fin comprobar vacio

        /*Comprueba si area es vacio, retorna false*/
        if (!comprobarVacio(direccionCentro)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            /*Comprueba su longitud, si es mayor que 30, retorna false*/
            if (!comprobarTexto(direccionCentro,150)) {
                return false;
            }//fin comprobar texto
        }//fin comprobar vacio

    /*Comprueba si area es vacio, retorna false*/
        if (!comprobarVacio(responsableCentro)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            /*Comprueba su longitud, si es mayor que 30, retorna false*/
            if (!comprobarAlfabetico(responsableCentro,60)){
                return false;
            } //fin comprobacion alfabetico 
        }//fin comprobar vacio
        return true;
    } //fin comprobar add centro

/* ****************************************************************************************************************************************************************** */

    //function comprobarSearch:comprobar buscar
    function comprobarSearchUsuario() {
        var login; /*variable que representa el elemento codTitulacion del formulario add */
        var password; /*variable que representa el elemento password del formulario add */
        var dni; /*variable que representa el elemento dni del formulario add */
        var nombre; /*variable que representa el elemento nombresuser del formulario add */
        var apellidos; /*variable que representa el elemento apellidos del formulario add */
        var telefono; /*variable que representa el elemento telefono del formulario add */
        var email; /*variable que representa el elemento email del formulario add */
        var fechaNacimiento; /*variable que representa el elemento direccion del formulario add */
        var fotoPersonal; /*variable que representa el elemento fotoPersonal del usuario del formulario add */
        var sexo; /*variable que representa el elemento sexo del usuario del formulario add */

        login = document.forms['ADD'].elements[0];
        password = document.forms['ADD'].elements[1];
        dni = document.forms['ADD'].elements[2];
        nombre = document.forms['ADD'].elements[3];
        apellidos = document.forms['ADD'].elements[4];
        telefono = document.forms['ADD'].elements[5];
        email = document.forms['ADD'].elements[6];
        fechaNacimiento = document.forms['ADD'].elements[7];
        fotoPersonal= document.forms['ADD'].elements[8];
        sexo = document.forms['ADD'].elements[9];

        /*Comprobamos su longitud y si es texto, si es mayor que 15 o no es un texto, retorna false*/
        if (!comprobarTexto(login, 15)) {
            return false;
        }//fin comprobar texto
        
        /*Comprueba su longitud y si es texto, si es mayor que 20 o no es texto, retorna false*/
        if (!comprobarTexto(password, 20)) {
            return false;
        }//fin comprobar texto
        
        /*Comprueba si tiene un formato valido de dni */
            if (!comprobarDni(dni)) {
                return false;
            } //fin comprobar dni

        /*Comprueba si tiene carácteres no alfanuméricos, si es así, retorna false */
        if (!comprobarAlfabetico(nombre, 30)) {
            return false;
        }//fin comprobar alfabetico

        /*Comprueba si tiene carácteres no alfanuméricos, si es así, retorna false */
        if (!comprobarAlfabetico(apellidos, 50)) {
            return false;
        }//fin comprobar alfabetico

        /*Comprueba si fechaNacimiento es vacio, retorna false*/
        if (!comprobarTexto(fechaNacimiento,8)) {
            return false;
        }

        /*Comprueba si foto es vacio, retorna false*/
        if (!comprobarTexto(fotoPersonal,50)) {
            return false;
        }

        /*Comprueba si tiene su formato incorrecto, si es así, retorna false*/
        if (!comprobarTexto(email,60)) {
            return false;
        }//fin comprobar email

        /*Comprueba si el formato no es correcto, si es así, retorna false */
        if (!comprobarEntero(telefono,0,99999999999)) {
            return false;
        }//fin comprobar telefono 

        /*Comprueba si sexo es vacio, retorna false*/
        if (!comprobarTexto(sexo)) {
            return false;
        }
        return true;
    }//fin search usuario

    //function comprobarSearch():valida todos los campos del formulario search antes de realizar el submit
    function comprobarSearchTitulacion() {

        var codTitulacion; /*variable que representa el elemento codTitulacion del formulario add */
        var codCentro; /*variable que representa el elemento codCentro del formulario add */
        var nombreTitulacion; /*variable que representa el elemento nombreTitulacion del formulario add */
        var responsableTitulacion; /*variable que representa el elemento responsableTitulacion del formulario add */


        codTitulacion = document.forms['ADD'].elements[0];
        codCentro = document.forms['ADD'].elements[1];
        nombreTitulacion = document.forms['ADD'].elements[2];
        responsableTitulacion = document.forms['ADD'].elements[3];

        //Comprobamos que no hay espacio intermedios
        if (!/[\s]/.test(codTitulacion.value)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            /*Comprobamos si tiene caracteres especiales, si es así, retorna false */
            if (!comprobarTexto(codTitulacion, 10)) {
                return false;
            }//fin comprobartexto
        }//fin comprobar espacio
        
        //Comprobamos que no hay espacio s intermedios
        if (!/[\s]/.test(codCentro.value)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            /*Comprueba si tiene caracteres especiales, si es así, retorna false */
            if (!comprobarTexto(codCentro, 10)) {
                return false;
            }//comprobar texto 			
        }//comprobar espacio

        /*Comprueba si tiene carácteres no alfanuméricos, si es así, retorna false */
        if (!comprobarAlfabetico(nombreTitulacion, 50)) {
            return false;
        } //fin comprobar alfabetico

        /*Comprueba si tiene carácteres no alfanuméricos, si es así, retorna false */
        if (!comprobarAlfabetico(responsableTitulacion, 60)) {
            return false;
        } //fin comprobacion alfabetico
        return true;
    } //fin search titulacion

    //function comprobarSearch():valida todos los campos del formulario search antes de realizar el submit
    function comprobarSearchProfesor() {
        var dni; /*variable que representa el elemento dni del formulario add */
        var nombre; /*variable que representa el elemento nombre del formulario add */
        var apellidos; /*variable que representa el elemento apellidos del formulario add */
        var area; /*variable que representa el elemento area del formulario add */
        var departamento; /*variable que representa el elemento departamento del formulario add */

        dni = document.forms['ADD'].elements[0];
        nombre = document.forms['ADD'].elements[1];
        apellidos = document.forms['ADD'].elements[2];
        area = document.forms['ADD'].elements[3];
        departamento = document.forms['ADD'].elements[4];

        /*Comprueba si tiene un formato valido de dni */
        if (!comprobarTexto(dni,9)) {
            return false;
        } //fin comprobar dni

        /*Comprueba si tiene carácteres no alfanuméricos, si es así, retorna false */
        if (!comprobarAlfabetico(nombre, 15)) {
            return false;
        }// fin comprobar alfabetico

        /*Comprueba si tiene carácteres no alfanuméricos, si es así, retorna false */
        if (!comprobarAlfabetico(apellidos, 30)) {
            return false;
        }//fin comprobar alfabetico

        /*Comprueba si tiene carácteres no alfanuméricos, si es así, retorna false */
        if (!comprobarAlfabetico(area, 60)) {
            return false;
        }//fin comprobar alfabetico

        /*Comprueba si tiene carácteres no alfanuméricos, si es así, retorna false */
        if (!comprobarAlfabetico(departamento, 60)) {
            return false;
        }//fin comprobar alfabetico
        return true;
    } //fin comprobar add profesor

    //function comprobarSearch():valida todos los campos del formulario add antes de realizar el submit
    function comprobarSearchProf_Titulacion() {

        var dni; /*variable que representa el elemento dni del formulario add */
        var codTitulacion; /*variable que representa el elemento codTitulacion del formulario add */
        var anhoAcademico; /*variable que representa el elemento anhoAcademico del formulario add */

        dni = document.forms['ADD'].elements[0];
        codTitulacion = document.forms['ADD'].elements[1];
        anhoAcademico = document.forms['ADD'].elements[2];

        //Comprobamos que no hay espacio intermedios
        if (!/[\s]/.test(codTitulacion.value)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            /*Comprobamos si tiene caracteres especiales, si es así, retorna false */
            if (!comprobarTexto(codTitulacion, 10)) {
                return false;
            }//fin comprobartexto
        }//fin comprobar espacio 	
        
        /*Comprueba si tiene caracteres especiales, si es así, retorna false */
        if (!comprobarTexto(dni, 9)) {
            return false;
        }//comprobar dni 			

        /*Comprueba si tiene caracteres especiales, si es así, retorna false */
        if (!comprobarEntero(anhoAcademico,1,999999999)) {
            return false;
        }//fin comprobar entero
        return true;
    } //fin search prof_titulacion

    //function comprobarSearch():valida todos los campos del formulario search antes de realizar el submit
    function comprobarSearchProf_Espacio() {

        var dni; /*variable que representa el elemento dni del formulario add */
        var codEspacio; /*variable que representa el elemento codTitulacion del formulario add */

        dni = document.forms['ADD'].elements[0];
        codEspacio = document.forms['ADD'].elements[1];

        //Comprobamos que no hay espacio intermedios
        if (!/[\s]/.test(codEspacio.value)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            /*Comprobamos si tiene caracteres especiales, si es así, retorna false */
            if (!comprobarTexto(codEspacio, 10)) {
                return false;
            }//fin comprobartexto
        }//fin comprobar espacio 	
        
        /*Comprueba si tiene caracteres especiales, si es así, retorna false */
        if (!comprobarTexto(dni, 9)) {
            return false;
        }//comprobar dni 			
        return true;
    } //fin search prof_Espacio

    //function comprobarSearch():valida todos los campos del formulario search antes de realizar el submit
    function comprobarSearchEspacio() {
        var codEspacio; /*variable que representa el elemento dni del formulario add */
        var codEdificio; /*variable que representa el elemento nombre del formulario add */
        var codCentro; /*variable que representa el elemento apellidos del formulario add */
        var tipo; /*variable que representa el elemento area del formulario add */
        var superficieEspacio; /*variable que representa el elemento departamento del formulario add */
        var numInventarioEspacio; //variable que representa el elemento numInventarioEspacio del formulario add

        codEspacio = document.forms['ADD'].elements[0];
        codEdificio = document.forms['ADD'].elements[1];
        codCentro = document.forms['ADD'].elements[2];
        tipo = document.forms['ADD'].elements[3];
        superficieEspacio = document.forms['ADD'].elements[4];
        numInventarioEspacio = document.forms['ADD'].elements[5];

        //Comprobamos que no hay espacio intermedios
        if (!/[\s]/.test(codEspacio.value)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            /*Comprobamos si tiene caracteres especiales, si es así, retorna false */
            if (!comprobarTexto(codEspacio, 10)) {
                return false;
            }//fin comprobartexto
        }//fin comprobar espacio	

        //Comprobamos que no hay espacio intermedios
        if (!/[\s]/.test(codEdificio.value)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            /*Comprobamos si tiene caracteres especiales, si es así, retorna false */
            if (!comprobarTexto(codEdificio, 10)) {
                return false;
            }//fin comprobartexto
        }//fin comprobar espacio 	

        //Comprobamos que no hay espacio intermedios
        if (!/[\s]/.test(codCentro.value)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            /*Comprobamos si tiene caracteres especiales, si es así, retorna false */
            if (!comprobarTexto(codCentro, 10)) {
                return false;
            }//fin comprobartexto
        }//fin comprobar espacio

        /*Comprueba si tipo es vacio, retorna false*/
        if (!comprobarTexto(tipo)) {
            return false;
        }//fin comprobar vacio

        /*Comprueba su longitud, si es mayor que 30, retorna false*/
        if (!comprobarReal(superficieEspacio,3,0,9999)) {
            return false;
        }//fin comprobar real

        //comprobar que numInventario es un entero
        if (!comprobarEntero(numInventarioEspacio, 1,99999999)) {
            return false;
        }//fin comprobar entero
        return true;
    } //fin comprobar add espacio

    //function comprobarSearch():valida todos los campos del formulario search antes de realizar el submit
    function comprobarSearchEdificio() {
        var codEdificio; /*variable que representa el elemento codEdificio del formulario add */
        var nombreEdificio; /*variable que representa el elemento nombreEdificio del formulario add */
        var direccionEdificio; /*variable que representa el elemento direccionEdificio del formulario add */
        var campusEdificio; /*variable que representa el elemento campuesEdificio del formulario add */

        codEdificio = document.forms['ADD'].elements[0];
        nombreEdificio = document.forms['ADD'].elements[1];
        direccionEdificio = document.forms['ADD'].elements[2];
        campusEdificio = document.forms['ADD'].elements[3];	

        //Comprobamos que no hay espacio intermedios
        if (!/[\s]/.test(codEdificio.value)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            /*Comprobamos si tiene caracteres especiales, si es así, retorna false */
            if (!comprobarTexto(codEdificio, 10)) {
                return false;
            }//fin comprobartexto
        }//fin comprobar espacio 		

        /*Comprueba si area 
            /*Comprueba su longitud, si es mayor que 30, retorna false*/
            if (!comprobarAlfabetico(nombreEdificio,50)) {
                return false;
            }//fin comprobar alfabetico

        /*Comprueba su longitud, si es mayor que 30, retorna false*/
        if (!comprobarTexto(direccionEdificio,150)) {
            return false;
        }//fin comprobar texto

        /*Comprueba su longitud, si es mayor que 30, retorna false*/
        if (!comprobarAlfabetico(campusEdificio,10)){
            return false;
        } //fin comprobacion alfabetico
        return true;
    } //fin comprobar search Edificio

    //function comprobarSearch():valida todos los campos del formulario search antes de realizar el submit
    function comprobarSearchCentro() {
        var codCentro; /*variable que representa el elemento codEdificio del formulario add */
        var codEdificio; /*variable que representa el elemento nombreEdificio del formulario add */
        var nombreCentro; /*variable que representa el elemento direccionEdificio del formulario add */
        var direccionCentro; /*variable que representa el elemento campuesEdificio del formulario add */
        var responsableCentro; //variable que represneta repsonsablecentro del formulario add

        codCentro = document.forms['ADD'].elements[0];
        codEdificio = document.forms['ADD'].elements[1];
        nombreCentro = document.forms['ADD'].elements[2];
        direccionCentro = document.forms['ADD'].elements[3];
        responsableCentro = document.forms['ADD'].elements[4];	

        //Comprobamos que no hay espacio intermedios
        if (!/[\s]/.test(codEdificio.value)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            /*Comprobamos si tiene caracteres especiales, si es así, retorna false */
            if (!comprobarTexto(codEdificio, 10)) {
                return false;
            }//fin comprobartexto
        }//fin comprobar espacio 	

        //Comprobamos que no hay espacio intermedios
        if (!/[\s]/.test(codCentro.value)) {
            return false;
        } else {// si no cumple con la condición del if anterior,
            /*Comprobamos si tiene caracteres especiales, si es así, retorna false */
            if (!comprobarTexto(codCentro, 10)) {
                return false;
            }//fin comprobartexto
        }//fin comprobar espacio		

        /*Comprueba su longitud, si es mayor que 30, retorna false*/
        if (!comprobarAlfabetico(nombreCentro,50)) {
            return false;
        }//fin comprobar alfabetico

        /*Comprueba su longitud, si es mayor que 30, retorna false*/
        if (!comprobarTexto(direccionCentro,150)) {
            return false;
        }//fin comprobar texto

 	    /*Comprueba su longitud, si es mayor que 30, retorna false*/
        if (!comprobarAlfabetico(responsableCentro,60)){
            return false;
        } //fin comprobacion alfabetico 
        return true;
    } //fin comprobar add centro
