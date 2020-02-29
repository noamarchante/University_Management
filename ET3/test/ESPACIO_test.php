<?php
/*Archivo php
Nombre: ESPACIO_test.php
Autor: 	Noa López Marchante
Fecha de creación: 14/12/2019 
Función: Testea ESPACIO
    */
	include '../Model/ESPACIO_Model.php';


//ESPACIO_ADD_test: test espacio
function ESPACIO_ADD_test()
{
//def
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$ESPACIO_array_test1 = array();

// Comprobar el login existe
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'ADD';
	$ESPACIO_array_test1['error'] = 'La espacio ya existe';
	$ESPACIO_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	//Creo un edificio y un centro para no romper la integridad referencial
	$edificio=new EDIFICIO_Model('aaaAdd','aaa','aaa','aaa');
	$edificio->ADD();
	$centro=new CENTRO_Model('aaa','aaaAdd','aaa','aaa','aaa');
	$centro->ADD();
	
	// Relleno los datos de espacio
	 $codEspacio='aaa';
	 $codEdificio='aaaAdd';
	 $codCentro='aaa';
	 $tipo='DESPACHO';
	 $superficieEspacio='10';
	 $numInventarioEspacio='10';

	
// creo el modelo
	$espacio = new ESPACIO_Model($codEspacio,$codEdificio,$codCentro, $tipo,$superficieEspacio,$numInventarioEspacio);
// inserto la tupla
	$espacio->ADD();

	$ESPACIO_array_test1['error_obtenido'] = $espacio->ADD();
	if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado']) //Si error esperado igual a obtenido
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $ESPACIO_array_test1);

	$espacio->DELETE();	



// Comprobar Inserción realizada con éxito
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'ADD';
	$ESPACIO_array_test1['error'] = 'Inserción realizada con éxito';
	$ESPACIO_array_test1['error_esperado'] = 'Inserción realizada con éxito';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	
// Relleno los datos de espacio	
	 $codEspacio='aaa';
	 $codEdificio='aaaAdd';
	 $codCentro='aaa';
	 $tipo='DESPACHO';
	 $superficieEspacio='10';
	 $numInventarioEspacio='10';

	
// creo el modelo
	$espacio = new ESPACIO_Model($codEspacio,$codEdificio,$codCentro, $tipo,$superficieEspacio,$numInventarioEspacio);
	$ESPACIO_array_test1['error_obtenido'] = $espacio->ADD();
	if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado']) //Si error esperado igual a obtenido
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $ESPACIO_array_test1);

	$espacio->DELETE();

	$centro->DELETE();
	$edificio->DELETE();


}



function ESPACIO_RellenaDatos_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$ESPACIO_array_test1 = array();


// Comprobar devuelve recordset
//----------------------------------------------
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'RellenaDatos';
	$ESPACIO_array_test1['error'] = 'Devuelve el recordset';
	$ESPACIO_array_test1['error_esperado'] = 'array';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';

	//Creo un edificio y un centro para no romper la integridad referencial
	$edificio=new EDIFICIO_Model('aaaRe','aaa','aaa','aaa');
	$edificio->ADD();
	$centro=new CENTRO_Model('aaa','aaaRe','aaa','aaa','aaa');
	$centro->ADD();

	
	// Relleno los datos de espacio	
	 $codEspacio='aaa';
	 $codEdificio='aaaRe';
	 $codCentro='aaa';
	 $tipo='DESPACHO';
	 $superficieEspacio='10';
	 $numInventarioEspacio='10';

	
// creo el modelo
	$espacio = new ESPACIO_Model($codEspacio,$codEdificio,$codCentro, $tipo,$superficieEspacio,$numInventarioEspacio);
	$ESPACIO_array_test1['error_obtenido'] = $espacio->ADD();


	$ESPACIO_array_test1['error_obtenido'] = gettype($espacio->RellenaDatos());
	if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado']) //Si error esperado igual a obtenido
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $ESPACIO_array_test1);

	$espacio->DELETE();
	$centro->DELETE();
	$edificio->DELETE();
	

}


function ESPACIO_DELETE_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$ESPACIO_array_test1 = array();


	

// Comprobar borrado correcto
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'DELETE';
	$ESPACIO_array_test1['error'] = 'Borrado correcto';
	$ESPACIO_array_test1['error_esperado'] = 'Borrado realizado con éxito';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';

	//Creo un edificio y un centro para no romper la integridad referencial
	$edificio=new EDIFICIO_Model('aaaDe','aaa','aaa','aaa');
	$edificio->ADD();
	$centro=new CENTRO_Model('aaa','aaaDe','aaa','aaa','aaa');
	$centro->ADD();

	
	
	// Relleno los datos de espacio	
	 $codEspacio='aaaDe';
	 $codEdificio='aaa';
	 $codCentro='aaa';
	 $tipo='DESPACHO';
	 $superficieEspacio='10';
	 $numInventarioEspacio='10';

	
// creo el modelo
	$espacio = new ESPACIO_Model($codEspacio,$codEdificio,$codCentro, $tipo,$superficieEspacio,$numInventarioEspacio);
	


	$espacio->ADD();

	$ESPACIO_array_test1['error_obtenido'] = $espacio->DELETE();
	if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado']) //Si error esperado igual a obtenido
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $ESPACIO_array_test1);

	$centro->DELETE();
	$edificio->DELETE();


}


function ESPACIO_EDIT_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$ESPACIO_array_test1 = array();


// Comprobar actualización correcta
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'EDIT';
	$ESPACIO_array_test1['error'] = 'Actualización correcta';
	$ESPACIO_array_test1['error_esperado'] = 'Actualización realizada con éxito';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';

	//Creo un edificio y un centro para no romper la integridad referencial
	$edificio=new EDIFICIO_Model('aaaEd','aaa','aaa','aaa');
	$edificio->ADD();
	$centro=new CENTRO_Model('aaa','aaaEd','aaa','aaa','aaa');
	$centro->ADD();
	
	// Relleno los datos de espacio	
	 $codEspacio='aaa';
	 $codEdificio='aaaEd';
	 $codCentro='aaa';
	 $tipo='DESPACHO';
	 $superficieEspacio='10';
	 $numInventarioEspacio='10';

	
// creo el modelo
	$espacio = new ESPACIO_Model($codEspacio,$codEdificio,$codCentro, $tipo,$superficieEspacio,$numInventarioEspacio);
	// creo el modelo
	$espacio->ADD();

	$ESPACIO_array_test1['error_obtenido'] = $espacio->EDIT();
	if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado']) //Si error esperado igual a obtenido
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $ESPACIO_array_test1);
	$espacio->DELETE();
	$centro->DELETE();
	$edificio->DELETE();



}

function ESPACIO_SEARCH_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$ESPACIO_array_test1 = array();

// Comprobar el login existe
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'SEARCH';
	$ESPACIO_array_test1['error'] = 'Error en la búsqueda';
	$ESPACIO_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	$codEspacio='aaa\'hola';
	
// creo el modelo
	$espacio = new ESPACIO_Model($codEspacio,'','','','','');


	$ESPACIO_array_test1['error_obtenido'] = $espacio->SEARCH();
	if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado']) //Si error esperado igual a obtenido
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}
	array_push($ERRORS_array_test, $ESPACIO_array_test1);

	// Comprobar devuelve recordset
//----------------------------------------------
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'SEARCH';
	$ESPACIO_array_test1['error'] = 'Devuelve el recordset';
	$ESPACIO_array_test1['error_esperado'] = 'array';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';

	//Creo un edificio y un centro para no romper la integridad referencial
	$edificio=new EDIFICIO_Model('aaaRe','aaa','aaa','aaa');
	$edificio->ADD();
	$centro=new CENTRO_Model('aaa','aaaRe','aaa','aaa','aaa');
	$centro->ADD();

	
	// Relleno los datos de espacio	
	 $codEspacio='aaa';
	 $codEdificio='aaaRe';
	 $codCentro='aaa';
	 $tipo='DESPACHO';
	 $superficieEspacio='10';
	 $numInventarioEspacio='10';

	
// creo el modelo
	$espacio = new ESPACIO_Model($codEspacio,$codEdificio,$codCentro, $tipo,$superficieEspacio,$numInventarioEspacio);
	$ESPACIO_array_test1['error_obtenido'] = $espacio->ADD();


	$ESPACIO_array_test1['error_obtenido'] = gettype($espacio->RellenaDatos());
	if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado']) //Si error esperado igual a obtenido
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $ESPACIO_array_test1);

	$espacio->DELETE();
	$centro->DELETE();
	$edificio->DELETE();

}




	ESPACIO_ADD_test();
	ESPACIO_RellenaDatos_test();
	ESPACIO_DELETE_test();
	ESPACIO_EDIT_test();
	ESPACIO_SEARCH_test();

?>


