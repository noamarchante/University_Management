<!-- Archivo test
    Nombre: ESPACIO_VALIDACION_test.php
    Autor:  Noa López Marchante
    Fecha de creación: 13/12/2019 
    Función: test funciones de validación usuario-->

<?php
//testing funcionalidades globales
include '../Model/config.php';

function ExisteBD()
{

	global $ERRORS_array_test;

// creo array de almacen de test individual
	$global_array_test = array();
	$ERRORS_array_test = array();

/* ************************************************************************************************************************ */

// usuario o contraseña no es correcto
	$global_array_test['error'] = 'Usuario contraseña erronea';
	$global_array_test['error_esperado'] = "Access denied for user 'iu2018'@'localhost' (using password: YES)";
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';

	try{
		error_reporting(E_ALL ^ E_WARNING);
		$mysqli = new mysqli(host, user, 'aaaa' , BD);
	}catch (mysqli_sql_exception $e) {
    
	 }
	 error_reporting(-1);
    	
	/* Comprueba la conexión */
	if ($mysqli->connect_errno) {
    	 $global_array_test['error_obtenido'] = $mysqli->connect_error;
    }


   	if ($global_array_test['error_obtenido'] === $global_array_test['error_esperado'])
	{
		$global_array_test['resultado'] = 'OK';
	}
	else
	{
		$global_array_test['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $global_array_test);


	
	/* ************************************************************************************************************************ */

	//NO existe la BD
	$global_array_test['error'] = 'No existe la bd';
	$global_array_test['error_esperado'] = "Access denied for user 'iu2018'@'localhost' to database ";
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';


	try{
		error_reporting(E_ALL ^ E_WARNING);
		$mysqli = new mysqli(host, user, pass , 'aaaaa');
		   }catch (mysqli_sql_exception $e) {
	  
	   }
	   error_reporting(-1);
	/* Comprueba la conexión */
	if ($mysqli->connect_errno) {
    	 $global_array_test['error_obtenido'] = $mysqli->connect_error;
    }


   	if ((strpos($global_array_test['error_esperado'],$global_array_test['error_obtenido'])) >= 0 && !empty($global_array_test['error_obtenido']))
	{
		$global_array_test['resultado'] = 'OK';
	}
	else
	{
		$global_array_test['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $global_array_test);

	/* ************************************************************************************************************************ */

	//LA DIRECCION NO EXISTE
	$global_array_test['error'] = 'La dirección no existe';
	$global_array_test['error_esperado'] = "Name or service not known";
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';


	try{
		error_reporting(E_ALL ^ E_WARNING);
		$mysqli = new mysqli('aaaa', user, pass , BD);
		   }catch (mysqli_sql_exception $e) {
	  
	   }
	   error_reporting(-1);


	if ($mysqli->connect_errno) {
    	 $global_array_test['error_obtenido'] = $mysqli->connect_error;
	}

	if ((strpos($global_array_test['error_esperado'],$global_array_test['error_obtenido'])) >=0 && !empty($global_array_test['error_obtenido']))
    {
		$global_array_test['resultado'] = 'OK';
		
    }else{
		$global_array_test['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $global_array_test);


	/* ************************************************************************************************************************ */
	//DATOS DE CONEXION CORRECTOS

	$global_array_test['error'] = 'Conexion correcta';
	$global_array_test['error_esperado'] = 'Conexion correcta';
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';


	try{
		error_reporting(E_ALL ^ E_WARNING);
		$mysqli = new mysqli(host, user, pass,BD);
		   }catch (mysqli_sql_exception $e) {
	  
	   }
	   error_reporting(-1);
	
   	
	if ($mysqli->connect_errno) {
		 $global_array_test['error_obtenido'] = $mysqli->connect_error;
	}
	
    if (empty($global_array_test['error_obtenido']))
    {
		$global_array_test['error_obtenido'] ='Conexion correcta';
		$global_array_test['resultado'] = 'OK';
    }else{
		
		$global_array_test['resultado'] = 'FALSE';
	}
	array_push($ERRORS_array_test, $global_array_test);
	

}



/* ************************************************************************************************************************ */
//NO EXISTEN LAS TABLAS
function ExistenTablas()
{

	global $ERRORS_array_test;

// creo array de almacen de test individual
	$global_array_test = array();
	$mysqli = new mysqli(host, user, pass,BD);

	//COMPROBAR QUE EXISTE USUARIOS
	//**************************************************************************


	$global_array_test['error'] = 'Existe tabla USUARIOS';
	$global_array_test['error_esperado'] = 'La tabla existe';
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';


	$sql='SELECT * FROM USUARIOS';
	// si no existe la tabla se pone false
	if(!$result=$mysqli->query($sql)){
		$global_array_test['resultado'] = 'FALSE';
		$global_array_test['error_obtenido'] = 'La tabla no existe';
	}else{//si existe se pone ok
		$global_array_test['resultado'] = 'OK';
		$global_array_test['error_obtenido'] = 'La tabla existe';

	}
	array_push($ERRORS_array_test, $global_array_test);

	//COMPROBAR QUE EXISTE TITULACION
	//**************************************************************************


	$global_array_test['error'] = 'Existe tabla TITULACION';
	$global_array_test['error_esperado'] = 'La tabla existe';
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';


	$sql='SELECT * FROM TITULACION';
	if(!$result=$mysqli->query($sql)){// si no existe la tabla se pone false
		$global_array_test['resultado'] = 'FALSE';
		$global_array_test['error_obtenido'] = 'La tabla no existe';
	}else{//si existe se pone ok
		$global_array_test['resultado'] = 'OK';
		$global_array_test['error_obtenido'] = 'La tabla existe';

	}
	array_push($ERRORS_array_test, $global_array_test);

	//COMPROBAR QUE EXISTE PROFESOR
	//*************************************************************************


	$global_array_test['error'] = 'Existe tabla PROFESOR';
	$global_array_test['error_esperado'] = 'La tabla existe';
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';


	$sql='SELECT * FROM PROFESOR';
	if(!$result=$mysqli->query($sql)){// si no existe la tabla se pone false
		$global_array_test['resultado'] = 'FALSE';
		$global_array_test['error_obtenido'] = 'La tabla no existe';
	}else{//si existe se pone ok
		$global_array_test['resultado'] = 'OK';
		$global_array_test['error_obtenido'] = 'La tabla existe';

	}
	array_push($ERRORS_array_test, $global_array_test);

	//COMPROBAR QUE EXISTE PROF_ESPACIO
	//**************************************************************************


	$global_array_test['error'] = 'Existe tabla PROF_ESPACIO';
	$global_array_test['error_esperado'] = 'La tabla existe';
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';


	$sql='SELECT * FROM PROF_ESPACIO';
	if(!$result=$mysqli->query($sql)){// si no existe la tabla se pone false
		$global_array_test['resultado'] = 'FALSE';
		$global_array_test['error_obtenido'] = 'La tabla no existe';
	}else{//si existe se pone ok
		$global_array_test['resultado'] = 'OK';
		$global_array_test['error_obtenido'] = 'La tabla existe';
	}
	array_push($ERRORS_array_test, $global_array_test);

	//COMPROBAR QUE EXISTE PROF_TITULACION
	//**************************************************************************


	$global_array_test['error'] = 'Existe tabla PROF_TITULACION';
	$global_array_test['error_esperado'] = 'La tabla existe';
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';


	$sql='SELECT * FROM PROF_TITULACION';
	if(!$result=$mysqli->query($sql)){// si no existe la tabla se pone false
		$global_array_test['resultado'] = 'FALSE';
		$global_array_test['error_obtenido'] = 'La tabla no existe';
	}else{//si existe se pone ok
		$global_array_test['resultado'] = 'OK';
		$global_array_test['error_obtenido'] = 'La tabla existe';
	}
	array_push($ERRORS_array_test, $global_array_test);

	//COMPROBAR QUE EXISTE ESPACIO
	//**************************************************************************
	$global_array_test['entidad'] = 'BD';	
	$global_array_test['metodo'] = 'ExistenTablas';
	$global_array_test['error'] = 'Existe tabla ESPACIO';
	$global_array_test['error_esperado'] = 'La tabla existe';
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';


	$sql='SELECT * FROM ESPACIO';
	if(!$result=$mysqli->query($sql)){// si no existe la tabla se pone false
		$global_array_test['resultado'] = 'FALSE';
		$global_array_test['error_obtenido'] = 'La tabla no existe';
	}else{//si existe se pone ok
		$global_array_test['resultado'] = 'OK';
		$global_array_test['error_obtenido'] = 'La tabla existe';
	}
	array_push($ERRORS_array_test, $global_array_test);

	//COMPROBAR QUE EXISTE EDIFICIO
	//**************************************************************************


	$global_array_test['error'] = 'Existe tabla EDIFICIO';
	$global_array_test['error_esperado'] = 'La tabla existe';
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';


	$sql='SELECT * FROM EDIFICIO';
	if(!$result=$mysqli->query($sql)){// si no existe la tabla se pone false
		$global_array_test['resultado'] = 'FALSE';
		$global_array_test['error_obtenido'] = 'La tabla no existe';
	}else{//si existe se pone ok
		$global_array_test['resultado'] = 'OK';
		$global_array_test['error_obtenido'] = 'La tabla existe';
	}
	array_push($ERRORS_array_test, $global_array_test);


	
	//COMPROBAR QUE EXISTE CENTRO
	//**************************************************************************

	$global_array_test['error'] = 'Existe tabla CENTRO';
	$global_array_test['error_esperado'] = 'La tabla existe';
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';


	$sql='SELECT * FROM CENTRO';
	if(!$result=$mysqli->query($sql)){// si no existe la tabla se pone false
		$global_array_test['resultado'] = 'FALSE';
		$global_array_test['error_obtenido'] = 'La tabla no existe';
	}else{//si existe se pone ok
		$global_array_test['resultado'] = 'OK';
		$global_array_test['error_obtenido'] = 'La tabla existe';
	}
	array_push($ERRORS_array_test, $global_array_test);
	

}



ExisteBD();
ExistenTablas();

?>