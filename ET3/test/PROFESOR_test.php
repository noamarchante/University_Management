<?php
// Autor : Noa Lóperz Marchante
// Fecha : 11/12/2019
// Descripción : 
//	Fichero de test de unidad de la entidad PROFESOR
//	Saca por pantalla el resultado de los test
// incluir el modelo de la entidad PROFESOR
	include '../Model/PROFESOR_Model.php';



function PROFESOR_ADD_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROFESOR_array_test1 = array();

// Comprobar el login existe
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'ADD';
	$PROFESOR_array_test1['error'] = 'El profesor ya existe';
	$PROFESOR_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	
	// Relleno los datos de profesor
	
	$DNI='70291704R';
	$nombre='aaa';
	$apellidos='aaa';
	$area='aaa';
	$departamento='aaa';

	
// creo el modelo
	$profesor = new PROFESOR_Model($DNI,$nombre,$apellidos,$area,$departamento);
// inserto la tupla
	$profesor->ADD();

	$PROFESOR_array_test1['error_obtenido'] = $profesor->ADD();
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);

	$profesor->DELETE();	



// Comprobar Inserción realizada con éxito
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'ADD';
	$PROFESOR_array_test1['error'] = 'Inserción realizada con éxito';
	$PROFESOR_array_test1['error_esperado'] = 'Inserción realizada con éxito';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	
// Relleno los datos de profesor
	
	$DNI='70291704R';
	$nombre='aaa';
	$apellidos='aaa';
	$area='aaa';
	$departamento='aaa';

	
// creo el modelo
	$profesor = new PROFESOR_Model($DNI,$nombre,$apellidos,$area,$departamento);
	$PROFESOR_array_test1['error_obtenido'] = $profesor->ADD();
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);

	$profesor->DELETE();

	

}



function PROFESOR_RellenaDatos_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROFESOR_array_test1 = array();

// Comprobar devuelve recordset
//----------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'RellenaDatos';
	$PROFESOR_array_test1['error'] = 'Devuelve el recordset';
	$PROFESOR_array_test1['error_esperado'] = 'array';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	// Relleno los datos de profesor	
	
	$DNI='70291704R';
	$nombre='aaa';
	$apellidos='aaa';
	$area='aaa';
	$departamento='aaa';

	
// creo el modelo
	$profesor = new PROFESOR_Model($DNI,$nombre,$apellidos,$area,$departamento);
	$PROFESOR_array_test1['error_obtenido'] = $profesor->ADD();


	$PROFESOR_array_test1['error_obtenido'] = gettype($profesor->RellenaDatos());
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);

	$profesor->DELETE();
	

}


function PROFESOR_DELETE_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROFESOR_array_test1 = array();


// Comprobar borrado correcto
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'DELETE';
	$PROFESOR_array_test1['error'] = 'Borrado correcto';
	$PROFESOR_array_test1['error_esperado'] = 'Borrado realizado con éxito';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	// Relleno los datos de profesor
	
	$DNI='70291704R';
	$nombre='aaa';
	$apellidos='aaa';
	$area='aaa';
	$departamento='aaa';

	
// creo el modelo
	$profesor = new PROFESOR_Model($DNI,$nombre,$apellidos,$area,$departamento);

	$profesor->ADD();

	$PROFESOR_array_test1['error_obtenido'] = $profesor->DELETE();
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);

	

}


function PROFESOR_EDIT_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROFESOR_array_test1 = array();



// Comprobar actualización correcta
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'EDIT';
	$PROFESOR_array_test1['error'] = 'Actualización correcta';
	$PROFESOR_array_test1['error_esperado'] = 'Actualización realizada con éxito';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	// Relleno los datos de profesor
	
	$DNI='70291704R';
	$nombre='aaa';
	$apellidos='aaa';
	$area='aaa';
	$departamento='aaa';

	
// creo el modelo
	$profesor = new PROFESOR_Model($DNI,$nombre,$apellidos,$area,$departamento);
	$profesor->ADD();

	$PROFESOR_array_test1['error_obtenido'] = $profesor->EDIT();
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);
	$profesor->DELETE();
	


}

function PROFESOR_SEARCH_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROFESOR_array_test1 = array();

// Comprobar el login existe
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'SEARCH';
	$PROFESOR_array_test1['error'] = 'Error en la búsqueda';
	$PROFESOR_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	// Relleno los datos de profesor
	
	$DNI='70291704R\'hola';
	

	
// creo el modelo
	$profesor = new PROFESOR_Model($DNI,'','','','');



	$PROFESOR_array_test1['error_obtenido'] = $profesor->SEARCH();
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}
	array_push($ERRORS_array_test, $PROFESOR_array_test1);

	// Comprobar devuelve recordset
//----------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'SEARCH';
	$PROFESOR_array_test1['error'] = 'Devuelve el recordset';
	$PROFESOR_array_test1['error_esperado'] = 'array';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	// Relleno los datos de profesor	
	
	$DNI='70291704R';
	$nombre='aaa';
	$apellidos='aaa';
	$area='aaa';
	$departamento='aaa';

	
// creo el modelo
	$profesor = new PROFESOR_Model($DNI,$nombre,$apellidos,$area,$departamento);
	$PROFESOR_array_test1['error_obtenido'] = $profesor->ADD();


	$PROFESOR_array_test1['error_obtenido'] = gettype($profesor->RellenaDatos());
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);

	$profesor->DELETE();

}




	PROFESOR_ADD_test();
	PROFESOR_RellenaDatos_test();
	PROFESOR_DELETE_test();
	PROFESOR_EDIT_test();
	PROFESOR_SEARCH_test();

?>


