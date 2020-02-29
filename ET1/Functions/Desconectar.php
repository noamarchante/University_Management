<?php

/*
	Archivo php
	Nombre: Desconectar.php
	Autor: 	Noa López Marchante
	Fecha de creación: 21-09-2019
	Función: permite cerrar la sesión
*/

	//llamada a la sesión
	session_start(); 
	
	// se destruye la sesión
	session_destroy(); 

	//redirección a index.php
	header('Location:../index.php'); 

?>
