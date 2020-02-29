<?php

/*
	Archivo php
	Nombre: Register_Controller.php
	Autor: 	Noa López Marchante
	Fecha de creación: 21/09/2019
	Función: Controlador que registra usuarios
*/
	//llamada a la sesión
	session_start(); 

	//llamada al array de strings que se corresponda con el idioma seleccionado
	include_once '../Locale/Strings_'.$_SESSION['idioma'].'.php'; 

	//session_start();
	
	//si el valor pasado de login no está especificado
	if(!isset($_POST['login'])){ 
	
		//llamada a la vista de registro
		include '../View/Register_View.php'; 
		
		//se crea un nuevo registro
		$register = new Register(); 
	
	//si no se especifica el login
	}else{ 
		
		//llamada a los datos y funciones de usuarios
		include '../Model/USUARIOS_Model.php'; 

		//crea un usuario con todos los valores pasados al formulario
		$usuario = new USUARIOS_Model($_REQUEST['login'],$_REQUEST['password'],$_REQUEST['dni'],$_REQUEST['nombre'],
		$_REQUEST['apellidos'],$_REQUEST['telefono'],$_REQUEST['email'],$_REQUEST['fechaNacimiento'],$_REQUEST['fotoPersonal'],$_REQUEST['sexo']); 

		//llamada al método register que comprueba si el usuario ya existe y en caso contrario devuelve true
		$respuesta = $usuario->Register(); 

		// si el usuario no existe
		if ($respuesta == 'true'){ 
		
			//llamada al método registrar que inserta los datos en la base de datos
			$respuesta = $usuario->registrar(); 

			//llamada a la vista de mensajes
			Include '../View/MESSAGE_View.php'; 

			//muestra el mensaje de confirmación correspondiente
			new MESSAGE($respuesta, './Login_Controller.php'); 
		
		//si el usuario existe
		}else{ 

			//llamada a la vista de mensajes
			include '../View/MESSAGE_View.php'; 

			//muestra el mensaje de error correspondiente
			new MESSAGE($respuesta, './Login_Controller.php'); 

		}//fin comprobación usuario existe

	}//fin comprobación login especificado

?>

