<?php
/*Archivo php
Nombre: EDIFICIO_test.php
Autor: 	Noa López Marchante
Fecha de creación: 14/12/2019 
Función: Testea EDIFICIOS
	*/
	include '../Model/EDIFICIO_Model.php';
	


//EDIFICIO_ADD_test(): test add
function EDIFICIO_ADD_test()
{
//DEF
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$EDIFICIO_array_test1 = array();

// Comprobar el login existe
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'ADD';
	$EDIFICIO_array_test1['error'] = 'El edificio ya existe';
	$EDIFICIO_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	
	/// Relleno los datos de edificio
	
	$codigoEdificio='aaa';
	$nombreEdificio='aaa';
	$dirEdificio='aaa';
	$campusEdificio='aaa';

	
// creo el modelo
	$edificio = new EDIFICIO_Model($codigoEdificio,$nombreEdificio,$dirEdificio,$campusEdificio);
// inserto la tupla
	$edificio->ADD();

	$EDIFICIO_array_test1['error_obtenido'] = $edificio->ADD();
	//comp
	if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{//else
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}//fin

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);

	$edificio->DELETE();	



// Comprobar Inserción realizada con éxito
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'ADD';
	$EDIFICIO_array_test1['error'] = 'Inserción realizada con éxito';
	$EDIFICIO_array_test1['error_esperado'] = 'Inserción realizada con éxito';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	
	
	// Relleno los datos de edificio
	
	$codigoEdificio='aaa';
	$nombreEdificio='aaa';
	$dirEdificio='aaa';
	$campusEdificio='aaa';

	
// creo el modelo
	$edificio = new EDIFICIO_Model($codigoEdificio,$nombreEdificio,$dirEdificio,$campusEdificio);
	$EDIFICIO_array_test1['error_obtenido'] = $edificio->ADD();
	//comp
	if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{//else
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}//fin

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);

	$edificio->DELETE();

	

}//fin


//EDIFICIO_RellenaDatos_test(): rellena datos test
function EDIFICIO_RellenaDatos_test()
{
//def
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$EDIFICIO_array_test1 = array();


// Comprobar devuelve recordset
//----------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'RellenaDatos';
	$EDIFICIO_array_test1['error'] = 'Devuelve el recordset';
	$EDIFICIO_array_test1['error_esperado'] = 'array';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	// Relleno los datos de edificio	
	
	
	// Relleno los datos de edificio
	
	$codigoEdificio='aaa';
	$nombreEdificio='aaa';
	$dirEdificio='aaa';
	$campusEdificio='aaa';

	
// creo el modelo
	$edificio = new EDIFICIO_Model($codigoEdificio,$nombreEdificio,$dirEdificio,$campusEdificio);
	$EDIFICIO_array_test1['error_obtenido'] = $edificio->ADD();


	$EDIFICIO_array_test1['error_obtenido'] = gettype($edificio->RellenaDatos());
	//comp
	if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{//else
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}//fin

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);

	$edificio->DELETE();
	

}///fin

//EDIFICIO_DELETE_test(): delete test
function EDIFICIO_DELETE_test()
{
//def
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$EDIFICIO_array_test1 = array();



// Comprobar borrado correcto
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'DELETE';
	$EDIFICIO_array_test1['error'] = 'Borrado correcto';
	$EDIFICIO_array_test1['error_esperado'] = 'Borrado realizado con éxito';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	// Relleno los datos de edificio
	
	$codigoEdificio='aaa';
	$nombreEdificio='aaa';
	$dirEdificio='aaa';
	$campusEdificio='aaa';

	
// creo el modelo
	$edificio = new EDIFICIO_Model($codigoEdificio,$nombreEdificio,$dirEdificio,$campusEdificio);

	$edificio->ADD();

	$EDIFICIO_array_test1['error_obtenido'] = $edificio->DELETE();
	//comp
	if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{//else
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}//fin

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);

	

}//fin

//EDIFICIO_EDIT_test(): edit test
function EDIFICIO_EDIT_test()
{
//derf
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$EDIFICIO_array_test1 = array();

	

// Comprobar actualización correcta
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'EDIT';
	$EDIFICIO_array_test1['error'] = 'Actualización correcta';
	$EDIFICIO_array_test1['error_esperado'] = 'Actualización realizada con éxito';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	// Relleno los datos de edificio
	
	// Relleno los datos de edificio
	
	$codigoEdificio='aaa';
	$nombreEdificio='aaa';
	$dirEdificio='aaa';
	$campusEdificio='aaa';

	
// creo el modelo
	$edificio = new EDIFICIO_Model($codigoEdificio,$nombreEdificio,$dirEdificio,$campusEdificio);
	$edificio->ADD();

	$EDIFICIO_array_test1['error_obtenido'] = $edificio->EDIT();
	//comp
	if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{//else
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}//fin

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);
	$edificio->DELETE();
	


}//fin
//EDIFICIO_SEARCH_test():search test
function EDIFICIO_SEARCH_test()
{
//def
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$EDIFICIO_array_test1 = array();

// Comprobar el login existe
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'SEARCH';
	$EDIFICIO_array_test1['error'] = 'Error en la búsqueda';
	$EDIFICIO_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	// Relleno los datos de edificio
	
	$codigoEdificio='aaa \' a';

	
// creo el modelo
	$edificio = new EDIFICIO_Model($codigoEdificio,'','','');



	$EDIFICIO_array_test1['error_obtenido'] = $edificio->SEARCH();
	//comp
	if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{//else
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}//fin
	array_push($ERRORS_array_test, $EDIFICIO_array_test1);

	// Comprobar devuelve recordset
//----------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'SEARCH';
	$EDIFICIO_array_test1['error'] = 'Devuelve el recordset';
	$EDIFICIO_array_test1['error_esperado'] = 'array';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	// Relleno los datos de edificio	
	
	
	// Relleno los datos de edificio
	
	$codigoEdificio='aaa';
	$nombreEdificio='aaa';
	$dirEdificio='aaa';
	$campusEdificio='aaa';

	
// creo el modelo
	$edificio = new EDIFICIO_Model($codigoEdificio,$nombreEdificio,$dirEdificio,$campusEdificio);
	$EDIFICIO_array_test1['error_obtenido'] = $edificio->ADD();


	$EDIFICIO_array_test1['error_obtenido'] = gettype($edificio->RellenaDatos());
	//comp
	if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{//else
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}///fin

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);

	$edificio->DELETE();

}//fin




	EDIFICIO_ADD_test();
	EDIFICIO_RellenaDatos_test();
	EDIFICIO_DELETE_test();
	EDIFICIO_EDIT_test();
	EDIFICIO_SEARCH_test();

?>
