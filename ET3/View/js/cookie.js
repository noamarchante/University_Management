/* Archivo javaScript
	Nombre: cookie.js
	Autor: 	Noa López Marchante
	Fecha de creación: 20/11/2019 
	Función: Crea y borra la cookie
*/

//modifica el valor de la cookie
function setCookie(name,value) {
    document.cookie = name + "=" + (value || "");
}

//recoge el valor de la cookie
function getCookie(name) {
    var nameEQ = name + "="; //nombre cookie
    var ca = document.cookie.split(';'); //separa la cookie por un punto y coma
    //recorre la cookie hasta que llega a un ;
    for(var i=0;i < ca.length;i++) {
        var c = ca[i]; //coge un elemento
        //hace un trim
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        //hace cosas
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    } //fin de recorrer la cookie
    return null;
} //fin funcion

function eraseCookie(name) { //borrar la cookie
    document.cookie = name+'=; Max-Age=-99999999;';
} //fin funcion