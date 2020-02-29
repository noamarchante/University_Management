<?php

/*
	Archivo php
	Nombre: index.php
	Autor: 	Noa López Marchante
	Fecha de creación: 21-09-2019 
	Función: entrada a la aplicacion
*/

//se va usar la session de la conexion
session_start();

//funcion de autenticacion
include './Functions/Authentication.php';

//si no ha pasado por el login de forma correcta
if (!IsAuthenticated()){

	//redirección a Login_Controller
	header('Location:./Controller/Login_Controller.php');

//si ha pasado por el login de forma correcta 
}else{
	
	//redirección a index_controller
	header('Location:./Controller/Index_Controller.php');
}//fin comprobación autenticación correcta

?>
