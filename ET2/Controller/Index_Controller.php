<?php

/*
	Archivo php
	Nombre: INDEX_CONTROLLER.php
	Autor: Noa López Marchante	
	Fecha de creación:  21-09-2019
	Función: Script que comprueba si el usuario está autenticado o no
*/
	//llamada a la sesión
	session_start(); 

	//llamada a fichero que controla la autenticación
	include '../Functions/Authentication.php'; 

	//si no esta autenticado
	if (!IsAuthenticated()){ 

		//redireccionamiento a index.php
		header('Location: ../index.php'); 

	//si está autenticado
	}else{

		//llamada a la vista general del usuario
		include '../View/users_index_View.php'; 

		//crea un nuevo índice
		new Index(); 
		
	}//fin comprobación autenticación

?>