<?php

/*
	Archivo php
	Nombre: Login_Controller.php
	Autor: 	Noa López Marchante
	Fecha de creación: 21-09-2019
	Función: Script que comprueba si las credenciales son correctas para permitir el login o no
*/
	//llamada a la sesión
	session_start(); 

	//si no está establecido ningún login o contraseña
	if(!isset($_REQUEST['login']) && !(isset($_REQUEST['password']))){  

		//llamada a la vista de login
		include '../View/Login_View.php'; 

		//se crea un nuevo login
		$login = new Login(); 

	//si está autenticado
	}else{ 

		//llamada a los datos y funciones de la base de datos
		include '../Model/Access_DB.php'; 

		//llamada a los datos y funciones de usuarios
		include '../Model/USUARIOS_Model.php'; 
	
		//se crea un usuario con su login y contraseña
		$usuario = new USUARIOS_Model($_REQUEST['login'],$_REQUEST['password'],'','','','','','','',''); 
		
		//llamada al método login que, con los datos del usuario, comprueba si ya existe en la base de datos y si la contraseña es correcta
		$respuesta = $usuario->login(); 

		//si el método login confirma que el usuario es correcto
		if ($respuesta == 'true'){ 

			//llamada a la sesión
			session_start(); 

			//se guarda en el array asociativo que contiene las variables de sesión el valor dado por el usuario en cuanto a su login
			$_SESSION['login'] = $_REQUEST['login']; 

			//redireccionamiento a index.php
			header('Location:../index.php'); 
		
		//si el login confirma que el usuario no es correcto
		}else{ 

			//llamada a la vista de los mensajes
			include '../View/MESSAGE_View.php'; 

			//muestra el mensaje de error correspondiente 
			new MESSAGE($respuesta, './Login_Controller.php'); 

		}//fin comprobación usuario correcto

	}//fin comprobación establecido usuario y contraseña

?>

