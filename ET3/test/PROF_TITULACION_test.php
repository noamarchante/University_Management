<?php
// Autor : Noa López Marchante
// Fecha : 11/12/2019
// Descripción : 
//	Fichero de test de unidad de la entidad PROF_TITULACION
//	Saca por pantalla el resultado de los test
// incluir el modelo de la entidad PROF_TITULACION
	include '../Model/PROF_TITULACION_Model.php';
	



function PROF_TITULACION_ADD_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_TITULACION_array_test1 = array();

// Comprobar el login existe
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'ADD';
	$PROF_TITULACION_array_test1['error'] = 'La prof_titulacion ya existe';
	$PROF_TITULACION_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	
	//Creo un edificio,centro,titulación para no romper la integridad referencial
	$edificio=new EDIFICIO_Model('aaa','aaa','aaa','aaa');
	$edificio->ADD();
	$centro=new CENTRO_Model('aaa','aaa','aaa','aaa','aaa');
	$centro->ADD();
	$titulacion = new TITULACION_Model('aaa','aaa','aaa','aaa');
	$titulacion->ADD();
	$profesor = new PROFESOR_Model('70291704R','aaa','aaa','aaa','aaa');
	$profesor->ADD();
	
	// Relleno los datos de prof_titulacion
	$DNI='70291704R';
	$codTitulacion ='aaa';
	$anhoAcademico='2019-2020';
	
	// creo el modelo
	$prof_titulacion = new PROF_TITULACION_Model($DNI,$codTitulacion,$anhoAcademico);

	
	// inserto la tupla
	$prof_titulacion->ADD();
	

	$PROF_TITULACION_array_test1['error_obtenido'] = $prof_titulacion->ADD();
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

	$prof_titulacion->DELETE();	


// Comprobar Inserción realizada con éxito
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'ADD';
	$PROF_TITULACION_array_test1['error'] = 'Inserción realizada con éxito';
	$PROF_TITULACION_array_test1['error_esperado'] = 'Inserción realizada con éxito';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	
	
// Relleno los datos de prof_titulacion
	$DNI='70291704R';
	$codTitulacion ='aaa';
	$anhoAcademico='2019-2020';
	
	// creo el modelo
	$prof_titulacion = new PROF_TITULACION_Model($DNI,$codTitulacion,$anhoAcademico);

	$PROF_TITULACION_array_test1['error_obtenido'] = $prof_titulacion->ADD();
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

	$prof_titulacion->DELETE();

	
	$titulacion->DELETE();
	$profesor->DELETE();
	$centro->DELETE();
	$edificio->DELETE();


}



function PROF_TITULACION_RellenaDatos_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_TITULACION_array_test1 = array();


// Comprobar devuelve recordset
//----------------------------------------------
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'RellenaDatos';
	$PROF_TITULACION_array_test1['error'] = 'Devuelve el recordset';
	$PROF_TITULACION_array_test1['error_esperado'] = 'array';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';

	//Creo un edificio,centro,titulación para no romper la integridad referencial
	$edificio=new EDIFICIO_Model('aaa','aaa','aaa','aaa');
	$edificio->ADD();
	$centro=new CENTRO_Model('aaa','aaa','aaa','aaa','aaa');
	$centro->ADD();
	$titulacion = new TITULACION_Model('aaa','aaa','aaa','aaa');
	$titulacion->ADD();
	$profesor = new PROFESOR_Model('70291704R','aaa','aaa','aaa','aaa');
	$profesor->ADD();
	
	// Relleno los datos de prof_titulacion
	$DNI='70291704R';
	$codTitulacion ='aaa';
	$anhoAcademico='2019-2020';
	
	// creo el modelo
	$prof_titulacion = new PROF_TITULACION_Model($DNI,$codTitulacion,$anhoAcademico);
	$PROF_TITULACION_array_test1['error_obtenido'] = $prof_titulacion->ADD();


	$PROF_TITULACION_array_test1['error_obtenido'] = gettype($prof_titulacion->RellenaDatos());
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

	$prof_titulacion->DELETE();

	$titulacion->DELETE();
	$profesor->DELETE();
	$centro->DELETE();
	$edificio->DELETE();
	

}


function PROF_TITULACION_DELETE_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_TITULACION_array_test1 = array();


// Comprobar borrado correcto
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'DELETE';
	$PROF_TITULACION_array_test1['error'] = 'Borrado correcto';
	$PROF_TITULACION_array_test1['error_esperado'] = 'Borrado realizado con éxito';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	
	//Creo un edificio,centro,titulación para no romper la integridad referencial
	$edificio=new EDIFICIO_Model('aaa','aaa','aaa','aaa');
	$edificio->ADD();
	$centro=new CENTRO_Model('aaa','aaa','aaa','aaa','aaa');
	$centro->ADD();
	$titulacion = new TITULACION_Model('aaa','aaa','aaa','aaa');
	$titulacion->ADD();
	$profesor = new PROFESOR_Model('70291704R','aaa','aaa','aaa','aaa');
	$profesor->ADD();
	
	// Relleno los datos de prof_titulacion
	$DNI='70291704R';
	$codTitulacion ='aaa';
	$anhoAcademico='2019-2020';
	
	// creo el modelo
	$prof_titulacion = new PROF_TITULACION_Model($DNI,$codTitulacion,$anhoAcademico);

	$prof_titulacion->ADD();

	$PROF_TITULACION_array_test1['error_obtenido'] = $prof_titulacion->DELETE();
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

	$prof_titulacion->DELETE();

	$titulacion->DELETE();
	$profesor->DELETE();
	$centro->DELETE();
	$edificio->DELETE();

}


function PROF_TITULACION_EDIT_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_TITULACION_array_test1 = array();



// Comprobar actualización correcta
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'EDIT';
	$PROF_TITULACION_array_test1['error'] = 'Actualización correcta';
	$PROF_TITULACION_array_test1['error_esperado'] = 'Actualización realizada con éxito';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	
	//Creo un edificio,centro,titulación para no romper la integridad referencial
	$edificio=new EDIFICIO_Model('aaa','aaa','aaa','aaa');
	$edificio->ADD();
	$centro=new CENTRO_Model('aaa','aaa','aaa','aaa','aaa');
	$centro->ADD();
	$titulacion = new TITULACION_Model('aaa','aaa','aaa','aaa');
	$titulacion->ADD();
	$profesor = new PROFESOR_Model('70291704R','aaa','aaa','aaa','aaa');
	$profesor->ADD();
	
	// Relleno los datos de prof_titulacion
	$DNI='70291704R';
	$codTitulacion ='aaa';
	$anhoAcademico='2019-2020';
	
	// creo el modelo
	$prof_titulacion = new PROF_TITULACION_Model($DNI,$codTitulacion,$anhoAcademico);

	$prof_titulacion->ADD();

	$PROF_TITULACION_array_test1['error_obtenido'] = $prof_titulacion->EDIT();
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

	$prof_titulacion->DELETE();

	$titulacion->DELETE();
	$profesor->DELETE();
	$centro->DELETE();
	$edificio->DELETE();




}

function PROF_TITULACION_SEARCH_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_TITULACION_array_test1 = array();

// Comprobar el login existe
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'SEARCH';
	$PROF_TITULACION_array_test1['error'] = 'Error en la búsqueda';
	$PROF_TITULACION_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	
	//Creo un edificio,centro,titulación para no romper la integridad referencial
	$edificio=new EDIFICIO_Model('aaa','aaa','aaa','aaa');
	$edificio->ADD();
	$centro=new CENTRO_Model('aaa','aaa','aaa','aaa','aaa');
	$centro->ADD();
	$titulacion = new TITULACION_Model('aaa','aaa','aaa','aaa');
	$titulacion->ADD();
	$profesor = new PROFESOR_Model('70291704R','aaa','aaa','aaa','aaa');
	$profesor->ADD();
	
	// Relleno los datos de prof_titulacion
	$DNI='70291704R\'hola';
	$codTitulacion ='aaa';
	$anhoAcademico='2019-2020';
	
	// creo el modelo
	$prof_titulacion = new PROF_TITULACION_Model($DNI,$codTitulacion,$anhoAcademico);



	$PROF_TITULACION_array_test1['error_obtenido'] = $prof_titulacion->SEARCH();
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}
	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

	// Comprobar devuelve recordset
//----------------------------------------------
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'SEARCH';
	$PROF_TITULACION_array_test1['error'] = 'Devuelve el recordset';
	$PROF_TITULACION_array_test1['error_esperado'] = 'array';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';

	//Creo un edificio,centro,titulación para no romper la integridad referencial
	$edificio=new EDIFICIO_Model('aaa','aaa','aaa','aaa');
	$edificio->ADD();
	$centro=new CENTRO_Model('aaa','aaa','aaa','aaa','aaa');
	$centro->ADD();
	$titulacion = new TITULACION_Model('aaa','aaa','aaa','aaa');
	$titulacion->ADD();
	$profesor = new PROFESOR_Model('70291704R','aaa','aaa','aaa','aaa');
	$profesor->ADD();
	
	// Relleno los datos de prof_titulacion
	$DNI='70291704R';
	$codTitulacion ='aaa';
	$anhoAcademico='2019-2020';
	
	// creo el modelo
	$prof_titulacion = new PROF_TITULACION_Model($DNI,$codTitulacion,$anhoAcademico);
	$PROF_TITULACION_array_test1['error_obtenido'] = $prof_titulacion->ADD();


	$PROF_TITULACION_array_test1['error_obtenido'] = gettype($prof_titulacion->RellenaDatos());
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

	$prof_titulacion->DELETE();
	
	$titulacion->DELETE();
	$profesor->DELETE();
	$centro->DELETE();
	$edificio->DELETE();

}




	PROF_TITULACION_ADD_test();
	PROF_TITULACION_RellenaDatos_test();
	PROF_TITULACION_DELETE_test();
	PROF_TITULACION_EDIT_test();
	PROF_TITULACION_SEARCH_test();

?>


