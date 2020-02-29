<?php

/*
	Archivo php
	Nombre: Register_Controller.php
	Autor: 	Noa LÃ³pez Marchante
	Fecha de creaciÃ³n: 21/09/2019
	FunciÃ³n: Controlador que registra usuarios
*/
	//llamada a la sesiÃ³n
	session_start(); 

	//llamada al array de strings que se corresponda con el idioma seleccionado
	include_once '../Locale/Strings_'.$_SESSION['idioma'].'.php'; 

	//session_start();
	
	//si el valor pasado de login no estÃ¡ especificado
	if(!isset($_POST['login'])){ 
	
		//llamada a la vista de registro
		include '../View/Register_View.php'; 
		
		//se crea un nuevo registro
		$register = new Register(); 
	
	//si no se especifica el login
	}else{ 
		
		//llamada a los datos y funciones de usuarios
		include '../Model/USUARIOS_Model.php'; 
		try{
			error_reporting(E_ALL ^ E_WARNING);
			
			   
		//comp foto1
		if ( isset( $_FILES[ 'fotoPersonal' ][ 'name' ] ) ) {//mira si existe una ruta
			$nombreRuta = $_FILES[ 'fotoPersonal' ][ 'name' ];//Variable que almacena el nombreRuta la ruta del archivo
		} else {//si no existe la ruta le asignamos a la variable el valor null
			$nombreRuta = null;
		}//fin comp

		//comp foto 2
		if ( isset( $_FILES[ 'fotoPersonal' ][ 'tmp_name' ] ) ) {//mira si existe una ruta con un nombre temporal
			$nombreTempRuta = $_FILES[ 'fotoPersonal' ][ 'tmp_name' ];//Variable que almacena el nombreRuta de la ruta del archivo con un nombre temporal
		} else {//si no existe la ruta le asignamos a la variable el valor null
			$nombreTempRuta = null;
		}//fin comp
	   
		//comp foto 3
		if (!file_exists("../Files/" . $_REQUEST['login'])){ //miramos si no existe este fichero, en el caso de que no exista lo creamos
				  //Da permisos a la carpete
				  mkdir("../Files/" . $_REQUEST['login'], 0777);
	   }//fin comp
	
	   //comp foto 4
		if ( $nombreRuta != null ) {//mira si la variable nombreRuta no es vacía
			$dir_subida = '../Files/' . $_REQUEST['login'].'/';//Variable que almacena la ruta donde se va a subir el archivo
			$rutapersonal = $dir_subida . $nombreRuta;//Variable que almacena la dirección de subida.
			move_uploaded_file( $nombreTempRuta, $rutapersonal );//movemos el archivo a la dirección especificad
		}//fin
	}catch (mysqli_sql_exception $e) {
		  
	}
	error_reporting(-1);
			//crea un usuario con todos los valores pasados al formulario
		$usuario = new USUARIOS_Model(
			$_REQUEST['login'],
			$_REQUEST['password'],
			$_REQUEST['dni'],
			$_REQUEST['nombre'],
			$_REQUEST['apellidos'],
			$_REQUEST['telefono'],
			$_REQUEST['email'],
			$_REQUEST['fechaNacimiento'],
			$rutapersonal,
			$_REQUEST['sexo']
		); 

		//llamada al mÃ©todo register que comprueba si el usuario ya existe y en caso contrario devuelve true
		$respuesta = $usuario->Register(); 

		// si el usuario no existe
		if ($respuesta == 'true'){ 
		
			//llamada al mÃ©todo registrar que inserta los datos en la base de datos
			$respuesta = $usuario->registrar(); 

			//llamada a la vista de mensajes
			Include '../View/MESSAGE_View.php'; 

			//muestra el mensaje de confirmaciÃ³n correspondiente
			new MESSAGE($respuesta, './Login_Controller.php'); 
		
		//si el usuario existe
		}else{ 

			//llamada a la vista de mensajes
			include '../View/MESSAGE_View.php'; 

			//muestra el mensaje de error correspondiente
			new MESSAGE($respuesta, './Login_Controller.php'); 

		}//fin comprobaciÃ³n usuario existe

	}//fin comprobaciÃ³n login especificado

?>

