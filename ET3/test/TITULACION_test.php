<?php
// Autor : Noa López Marchante
// Fecha : 11/12/2019
// Descripción : 
//	Fichero de test de unidad de la entidad TITULACION
//	Saca por pantalla el resultado de los test
// incluir el modelo de la entidad TITULACION
	include '../Model/TITULACION_Model.php';
	



function TITULACION_ADD_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$TITULACION_array_test1 = array();

// Comprobar el login existe
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'ADD';
	$TITULACION_array_test1['error'] = 'La titulacion ya existe';
	$TITULACION_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	//Creo un edificio y un centro para no romper la integridad referencial
	$edificio=new EDIFICIO_Model('aaaAdd','aaa','aaa','aaa');
	$edificio->ADD();
	$centro=new CENTRO_Model('aaa','aaaAdd','aaa','aaa','aaa');
	$centro->ADD();
	
	// Relleno los datos de titulacion
	$codTitulacion='aaa';
	$codCentro ='aaa';
	$nombreTitulacion ='aaa';
	$responsableTitulacion ='aaa';

	
// creo el modelo
	$titulacion = new TITULACION_Model($codTitulacion,$codCentro,$nombreTitulacion,$responsableTitulacion);
// inserto la tupla
	$titulacion->ADD();

	$TITULACION_array_test1['error_obtenido'] = $titulacion->ADD();
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);

	$titulacion->DELETE();	



// Comprobar Inserción realizada con éxito
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'ADD';
	$TITULACION_array_test1['error'] = 'Inserción realizada con éxito';
	$TITULACION_array_test1['error_esperado'] = 'Inserción realizada con éxito';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	
// Relleno los datos de titulacion	
	$codTitulacion='aaa';
	$codCentro ='aaa';
	$nombreTitulacion ='aaa';
	$responsableTitulacion ='aaa';

	
// creo el modelo
	$titulacion = new TITULACION_Model($codTitulacion,$codCentro,$nombreTitulacion,$responsableTitulacion);
	$TITULACION_array_test1['error_obtenido'] = $titulacion->ADD();
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);

	$titulacion->DELETE();

	$centro->DELETE();
	$edificio->DELETE();


}



function TITULACION_RellenaDatos_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$TITULACION_array_test1 = array();


// Comprobar devuelve recordset
//----------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'RellenaDatos';
	$TITULACION_array_test1['error'] = 'Devuelve el recordset';
	$TITULACION_array_test1['error_esperado'] = 'array';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';

	//Creo un edificio y un centro para no romper la integridad referencial
	$edificio=new EDIFICIO_Model('aaaRe','aaa','aaa','aaa');
	$edificio->ADD();
	$centro=new CENTRO_Model('aaa','aaaRe','aaa','aaa','aaa');
	$centro->ADD();

	
	// Relleno los datos de titulacion	
	$codTitulacion='aaa';
	$codCentro ='aaa';
	$nombreTitulacion ='aaa';
	$responsableTitulacion ='aaa';

	
// creo el modelo
	$titulacion = new TITULACION_Model($codTitulacion,$codCentro,$nombreTitulacion,$responsableTitulacion);
	$TITULACION_array_test1['error_obtenido'] = $titulacion->ADD();


	$TITULACION_array_test1['error_obtenido'] = gettype($titulacion->RellenaDatos());
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);

	$titulacion->DELETE();
	$centro->DELETE();
	$edificio->DELETE();
	

}


function TITULACION_DELETE_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$TITULACION_array_test1 = array();

	

// Comprobar borrado correcto
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'DELETE';
	$TITULACION_array_test1['error'] = 'Borrado correcto';
	$TITULACION_array_test1['error_esperado'] = 'Borrado realizado con éxito';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	// Relleno los datos de titulacion	
	$codTitulacion='aaa';
	$codCentro ='aaa';
	$nombreTitulacion ='aaa';
	$responsableTitulacion ='aaa';

	

	//Creo un edificio y un centro para no romper la integridad referencial
	$edificio=new EDIFICIO_Model('aaaDe','aaa','aaa','aaa');
	$edificio->ADD();
	$centro=new CENTRO_Model('aaa','aaaDe','aaa','aaa','aaa');
	$centro->ADD();

	// creo el modelo

	$titulacion = new TITULACION_Model($codTitulacion,$codCentro,$nombreTitulacion,$responsableTitulacion);

	$titulacion->ADD();

	$TITULACION_array_test1['error_obtenido'] = $titulacion->DELETE();
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);

	$centro->DELETE();
	$edificio->DELETE();


}


function TITULACION_EDIT_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$TITULACION_array_test1 = array();	

// Comprobar actualización correcta
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'EDIT';
	$TITULACION_array_test1['error'] = 'Actualización correcta';
	$TITULACION_array_test1['error_esperado'] = 'Actualización realizada con éxito';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';

	//Creo un edificio y un centro para no romper la integridad referencial
	$edificio=new EDIFICIO_Model('aaaEd','aaa','aaa','aaa');
	$edificio->ADD();
	$centro=new CENTRO_Model('aaa','aaaEd','aaa','aaa','aaa');
	$centro->ADD();
	
	// Relleno los datos de titulacion	
	$codTitulacion='aaa';
	$codCentro ='aaa';
	$nombreTitulacion ='aaa';
	$responsableTitulacion ='aaa';

	
// creo el modelo
	$titulacion = new TITULACION_Model($codTitulacion,$codCentro,$nombreTitulacion,$responsableTitulacion);
	$titulacion->ADD();

	$TITULACION_array_test1['error_obtenido'] = $titulacion->EDIT();
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);
	$titulacion->DELETE();
	$centro->DELETE();
	$edificio->DELETE();



}

function TITULACION_SEARCH_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$TITULACION_array_test1 = array();

// Comprobar el login existe
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'SEARCH';
	$TITULACION_array_test1['error'] = 'Error en la búsqueda';
	$TITULACION_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	// Relleno los datos de titulacion	
	$codtitulacion = 'javi ,\'hola';
	$titulacion = new TITULACION_Model($codtitulacion,'','','');



	$TITULACION_array_test1['error_obtenido'] = $titulacion->SEARCH();
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}
	array_push($ERRORS_array_test, $TITULACION_array_test1);

	// Comprobar devuelve recordset
//----------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'SEARCH';
	$TITULACION_array_test1['error'] = 'Devuelve el recordset';
	$TITULACION_array_test1['error_esperado'] = 'array';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';

	//Creo un edificio y un centro para no romper la integridad referencial
	$edificio=new EDIFICIO_Model('aaaRe','aaa','aaa','aaa');
	$edificio->ADD();
	$centro=new CENTRO_Model('aaa','aaaRe','aaa','aaa','aaa');
	$centro->ADD();

	
	// Relleno los datos de titulacion	
	$codTitulacion='aaa';
	$codCentro ='aaa';
	$nombreTitulacion ='aaa';
	$responsableTitulacion ='aaa';

	
// creo el modelo
	$titulacion = new TITULACION_Model($codTitulacion,$codCentro,$nombreTitulacion,$responsableTitulacion);
	$TITULACION_array_test1['error_obtenido'] = $titulacion->ADD();


	$TITULACION_array_test1['error_obtenido'] = gettype($titulacion->RellenaDatos());
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);

	$titulacion->DELETE();
	$centro->DELETE();
	$edificio->DELETE();

}




	TITULACION_ADD_test();
	TITULACION_RellenaDatos_test();
	TITULACION_DELETE_test();
	TITULACION_EDIT_test();
	TITULACION_SEARCH_test();

?>


