<?php
// Autor : Noa López Marchante
// Fecha : 11/12/2019
// Descripción : 
//	Fichero de test de unidad de la entidad PROF_ESPACIO
//	Saca por pantalla el resultado de los test
// incluir el modelo de la entidad PROF_ESPACIO
	include '../Model/PROF_ESPACIO_Model.php';

	



function PROF_ESPACIO_ADD_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_ESPACIO_array_test1 = array();

// Comprobar el login existe
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['metodo'] = 'ADD';
	$PROF_ESPACIO_array_test1['error'] = 'La prof_espacio ya existe';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
	
	//Creo un edificio,centro,espacio para no romper la integridad referencial
	$edificio=new EDIFICIO_Model('aaa','aaa','aaa','aaa');
	$edificio->ADD();
	$centro=new CENTRO_Model('aaa','aaa','aaa','aaa','aaa');
	$centro->ADD();
	$espacio = new ESPACIO_Model('aaa','aaa','aaa','DESPACHO','10','10');
	$espacio->ADD();
	$profesor = new PROFESOR_Model('70291704R','aaa','aaa','aaa','aaa');
	$profesor->ADD();

	
	// Relleno los datos de prof_espacio
	$DNI='70291704R';
	$codEspacio ='aaa';
	
	
	// creo el modelo
	$prof_espacio = new PROF_ESPACIO_Model($DNI,$codEspacio);

	
	// inserto la tupla
	$prof_espacio->ADD();
	

	$PROF_ESPACIO_array_test1['error_obtenido'] = $prof_espacio->ADD();
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado']) //Si error esperado igual a obtenido
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);

	$prof_espacio->DELETE();	


// Comprobar Inserción realizada con éxito
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['metodo'] = 'ADD';
	$PROF_ESPACIO_array_test1['error'] = 'Inserción realizada con éxito';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'Inserción realizada con éxito';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
	
	
// Relleno los datos de prof_espacio
	$DNI='70291704R';
	$codEspacio ='aaa';
	
	
	// creo el modelo
	$prof_espacio = new PROF_ESPACIO_Model($DNI,$codEspacio);

	$PROF_ESPACIO_array_test1['error_obtenido'] = $prof_espacio->ADD();
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado']) //Si error esperado igual a obtenido
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);

	$prof_espacio->DELETE();

	
	$espacio->DELETE();
	$profesor->DELETE();
	$centro->DELETE();
	$edificio->DELETE();


}



function PROF_ESPACIO_RellenaDatos_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_ESPACIO_array_test1 = array();


// Comprobar devuelve recordset
//----------------------------------------------
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['metodo'] = 'RellenaDatos';
	$PROF_ESPACIO_array_test1['error'] = 'Devuelve el recordset';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'array';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';

	//Creo un edificio,centro,espacio para no romper la integridad referencial
	$edificio=new EDIFICIO_Model('aaa','aaa','aaa','aaa');
	$edificio->ADD();
	$centro=new CENTRO_Model('aaa','aaa','aaa','aaa','aaa');
	$centro->ADD();
	$espacio = new ESPACIO_Model('aaa','aaa','aaa','DESPACHO','10','10');
	$espacio->ADD();
	$profesor = new PROFESOR_Model('70291704R','aaa','aaa','aaa','aaa');
	$profesor->ADD();

	
	// Relleno los datos de prof_espacio
	$DNI='70291704R';
	$codEspacio ='aaa';
	
	
	// creo el modelo
	$prof_espacio = new PROF_ESPACIO_Model($DNI,$codEspacio);

	
	// inserto la tupla
	$prof_espacio->ADD();


	$PROF_ESPACIO_array_test1['error_obtenido'] = gettype($prof_espacio->RellenaDatos());
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado']) //Si error esperado igual a obtenido
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);

	$prof_espacio->DELETE();

	$espacio->DELETE();
	$profesor->DELETE();
	$centro->DELETE();
	$edificio->DELETE();
	

}


function PROF_ESPACIO_DELETE_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_ESPACIO_array_test1 = array();


// Comprobar borrado correcto
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['metodo'] = 'DELETE';
	$PROF_ESPACIO_array_test1['error'] = 'Borrado correcto';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'Borrado realizado con éxito';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
	
	//Creo un edificio,centro,espacio para no romper la integridad referencial
	$edificio=new EDIFICIO_Model('aaa','aaa','aaa','aaa');
	$edificio->ADD();
	$centro=new CENTRO_Model('aaa','aaa','aaa','aaa','aaa');
	$centro->ADD();
	$espacio = new ESPACIO_Model('aaa','aaa','aaa','DESPACHO','10','10');
	$espacio->ADD();
	$profesor = new PROFESOR_Model('70291704R','aaa','aaa','aaa','aaa');
	$profesor->ADD();
	
	// Relleno los datos de prof_espacio
	$DNI='70291704R';
	$codEspacio ='aaa';
	
	
	// creo el modelo
	$prof_espacio = new PROF_ESPACIO_Model($DNI,$codEspacio);

	$prof_espacio->ADD();

	$PROF_ESPACIO_array_test1['error_obtenido'] = $prof_espacio->DELETE();
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado']) //Si error esperado igual a obtenido
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);

	$prof_espacio->DELETE();

	$espacio->DELETE();
	$profesor->DELETE();
	$centro->DELETE();
	$edificio->DELETE();



}


function PROF_ESPACIO_EDIT_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_ESPACIO_array_test1 = array();



// Comprobar actualización correcta
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['metodo'] = 'EDIT';
	$PROF_ESPACIO_array_test1['error'] = 'Actualización correcta';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'Actualización realizada con éxito';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
	
	//Creo un edificio,centro,espacio para no romper la integridad referencial
	$edificio=new EDIFICIO_Model('aaa','aaa','aaa','aaa');
	$edificio->ADD();
	$centro=new CENTRO_Model('aaa','aaa','aaa','aaa','aaa');
	$centro->ADD();
	$espacio = new ESPACIO_Model('aaa','aaa','aaa','DESPACHO','10','10');
	$espacio->ADD();
	$profesor = new PROFESOR_Model('70291704R','aaa','aaa','aaa','aaa');
	$profesor->ADD();
	
	// Relleno los datos de prof_espacio
	$DNI='70291704R';
	$codEspacio ='aaa';
	
	
	// creo el modelo
	$prof_espacio = new PROF_ESPACIO_Model($DNI,$codEspacio);

	$prof_espacio->ADD();

	$PROF_ESPACIO_array_test1['error_obtenido'] = $prof_espacio->EDIT();
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado']) //Si error esperado igual a obtenido
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);

	$prof_espacio->DELETE();

	$espacio->DELETE();
	$profesor->DELETE();
	$centro->DELETE();
	$edificio->DELETE();




}

function PROF_ESPACIO_SEARCH_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_ESPACIO_array_test1 = array();

// Comprobar el login existe
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['metodo'] = 'SEARCH';
	$PROF_ESPACIO_array_test1['error'] = 'Error en la búsqueda';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
	
	//Creo un edificio,centro,espacio para no romper la integridad referencial
	$edificio=new EDIFICIO_Model('aaa','aaa','aaa','aaa');
	$edificio->ADD();
	$centro=new CENTRO_Model('aaa','aaa','aaa','aaa','aaa');
	$centro->ADD();
	$espacio = new ESPACIO_Model('aaa','aaa','aaa','DESPACHO','10','10');
	$espacio->ADD();
	$profesor = new PROFESOR_Model('70291704R','aaa','aaa','aaa','aaa');
	$profesor->ADD();
	
	// Relleno los datos de prof_espacio
	$DNI='70291704R\'hola';
	$codEspacio ='aaa';
	
	
	// creo el modelo
	$prof_espacio = new PROF_ESPACIO_Model($DNI,$codEspacio);



	$PROF_ESPACIO_array_test1['error_obtenido'] = $prof_espacio->SEARCH();
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado']) //Si error esperado igual a obtenido
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}
	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);

	// Comprobar devuelve recordset
//----------------------------------------------
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['metodo'] = 'SEARCH';
	$PROF_ESPACIO_array_test1['error'] = 'Devuelve el recordset';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'array';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';

	//Creo un edificio,centro,espacio para no romper la integridad referencial
	$edificio=new EDIFICIO_Model('aaa','aaa','aaa','aaa');
	$edificio->ADD();
	$centro=new CENTRO_Model('aaa','aaa','aaa','aaa','aaa');
	$centro->ADD();
	$espacio = new ESPACIO_Model('aaa','aaa','aaa','DESPACHO','10','10');
	$espacio->ADD();
	$profesor = new PROFESOR_Model('70291704R','aaa','aaa','aaa','aaa');
	$profesor->ADD();

	
	// Relleno los datos de prof_espacio
	$DNI='70291704R';
	$codEspacio ='aaa';
	
	
	// creo el modelo
	$prof_espacio = new PROF_ESPACIO_Model($DNI,$codEspacio);

	
	// inserto la tupla
	$prof_espacio->ADD();


	$PROF_ESPACIO_array_test1['error_obtenido'] = gettype($prof_espacio->RellenaDatos()); //Si error esperado igual a obtenido
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);

	$prof_espacio->DELETE();
	
	$espacio->DELETE();
	$profesor->DELETE();
	$centro->DELETE();
	$edificio->DELETE();

}




	PROF_ESPACIO_ADD_test();
	PROF_ESPACIO_RellenaDatos_test();
	PROF_ESPACIO_DELETE_test();
	PROF_ESPACIO_EDIT_test();
	PROF_ESPACIO_SEARCH_test();

?>


