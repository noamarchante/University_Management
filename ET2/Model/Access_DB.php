<?php
 	
 	/*
	Archivo php
	Nombre: Access_DB.php
	Autor: 	Noa López Marchante
	Fecha de creación: 21-09-2019
	Función: permite el acceso a la BD
*/

 	//incluye el fichero config.php
	include_once '../Model/config.php';

	// DB connection function: Can be modified to use CONSTANTS defined in config.inc
	function ConnectDB(){

		//crea el objeto de la base de datos
    	$mysqli = new mysqli(host, user, pass , BD);
    	
    	//si se produce un error al conectar
		if ($mysqli->connect_errno) {
		
			//llama a la vista mensaje
			include '../MESSAGE_View.php'; 

			//se muestra un mensaje con el fallo concreto
			new MESSAGE("Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error, '../index.php'); 

			//devuelve falso
			return false; 
		
		//en otro caso
		}else{ 

			//devuelve la base de datos
			return $mysqli; 
		
		}//fin comprobación posible conexión
		
	}//fin función connectDB

?>
