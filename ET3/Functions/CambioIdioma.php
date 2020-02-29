<?php

/*
	Archivo php
	Nombre: CambioIdioma.php
	Autor: 	Noa López Marchante
	Fecha de creación: 21-09-2019
	Función: Guarda el idioma escogido
*/

	//llamada a la sesión
	session_start(); 
	
	//guarda el idioma escogido por el usuario
	$idioma = $_POST['idioma']; 

	//guarda en el array asociativo de la sesión el idioma escogido
	$_SESSION['idioma'] = $idioma; 

	//redirige a un array que contiene cabeceras, rutas y ubicaciones de script
	header('Location:' . $_SERVER["HTTP_REFERER"]); 

?>