<?php

/*
	Archivo php
	Nombre: Authentication.php
	Autor: 	Noa López Marchante
	Fecha de creación: 21-09-2019
	Función: comprueba si existe una sesión de usuario o no
*/

	/* function IsAuthenticated(): Esta función valida si existe la variable de session login
	Si no existe redirige a la pagina de login
	Si existe comprueba si el usuario tiene permisos para ejecutar la accion de ese controlador */
	function IsAuthenticated(){

		//si la variable login no tiene un valor 
		if (!isset($_SESSION['login'])){ 

			//Si no existe redirige a la pagina de login
			//header('Location:USUARIOS_Controller.php?accion=Login'); 

			// devuelve falso
			return false; 

		//en otro caso
		}else{ 

			//si el usuario no tiene permisos para ejecutar la accion de ese controlador
			/*if (!HavePermissions($controller, $_REQUEST['accion'])){ 
	
				//muestra un mensaje con el error
				new Mensaje('No tiene permisos para ejecutar esta acción','index.php');	

			} //fin comprobación permisos*/

			//redirección a USUARIOS_CONTROLLER
			//header('Location:USUARIOS_Controller.php'); 

			//devuelve verdadero
			return true; 

		}//fin comprobación login con valor

	} //fin función isAuthenticated
	
?>

