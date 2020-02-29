<?php
/*Archivo php
Nombre: CENTRO_test.php
Autor: 	Noa López Marchante
Fecha de creación: 14/12/2019 
Función: Testea centro
	*/
include '../Model/CENTRO_Model.php';

// function CENTRO_ADD_test()
// Valida:
//		usuario ya existe
//		el usuario no existe
//		
function CENTRO_ADD_test()
{

	//def var
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$CENTRO_array_test1 = array();

// Comprobar el codigocentro existe
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'ADD';
	$CENTRO_array_test1['error'] = 'El usuario ya existe';
	$CENTRO_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	//Inserto un edificio para mantener la integridad Referencial
	$edificio=new EDIFICIO_Model('aaa','aaa','aaa','aaa');
	$edificio->ADD();

	// Relleno los datos de usuario	
	$codigoCentro='aaa';
	 $codigoEdificio='aaa';
	 $nombreCentro='aaa';
	 $dirCentro='aaa';
	 $responsable='aaa';
	
// creo el modelo
	$centro = new CENTRO_Model($codigoCentro,$codigoEdificio,$nombreCentro,$dirCentro,$responsable);
// inserto la tupla
	$centro->ADD();

	$CENTRO_array_test1['error_obtenido'] = $centro->ADD();
	///comp
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{//otro
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}//fin

	array_push($ERRORS_array_test, $CENTRO_array_test1);

	$centro->DELETE();	




// Comprobar Inserción realizada con éxito
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'ADD';
	$CENTRO_array_test1['error'] = 'Inserción realizada con éxito';
	$CENTRO_array_test1['error_esperado'] = 'Inserción realizada con éxito';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	 $codigoCentro='aaa';
	 $codigoEdificio='aaa';
	 $nombreCentro='aaa';
	 $dirCentro='aaa';
	 $responsable='aaa';
	
// creo el modelo
	$centro = new CENTRO_Model($codigoCentro,$codigoEdificio,$nombreCentro,$dirCentro,$responsable);
	$CENTRO_array_test1['error_obtenido'] = $centro->ADD();
	//comp
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{//else
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}//fin

	array_push($ERRORS_array_test, $CENTRO_array_test1);

	$centro->DELETE();
	$edificio->DELETE();


}//fin


//CENTRO_RellenaDatos_test(): test de rellenar datos
function CENTRO_RellenaDatos_test()
{

	//def
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$CENTRO_array_test1 = array();


// Comprobar devuelve recordset
//----------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'RellenaDatos';
	$CENTRO_array_test1['error'] = 'Devuelve el recordset';
	$CENTRO_array_test1['error_esperado'] = 'array';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';

	//Inserto un edificio para mantener la integridad Referencial

	$edificio=new EDIFICIO_Model('aaa','aaa','aaa','aaa');
	$edificio->ADD();
	
	 $codigoCentro='aaa';
	 $codigoEdificio='aaa';
	 $nombreCentro='aaa';
	 $dirCentro='aaa';
	 $responsable='aaa';
	
// creo el modelo
	$centro = new CENTRO_Model($codigoCentro,$codigoEdificio,$nombreCentro,$dirCentro,$responsable);
	$CENTRO_array_test1['error_obtenido'] = $centro->ADD();


	$CENTRO_array_test1['error_obtenido'] = gettype($centro->RellenaDatos());
	//comp
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])//Si error esperado igual a obtenido
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{//else
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}//fin

	array_push($ERRORS_array_test, $CENTRO_array_test1);

	$centro->DELETE();
	$edificio->DELETE();

}//fin

//CENTRO_DELETE_test(): test de borrar
function CENTRO_DELETE_test()
{
//defr
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$CENTRO_array_test1 = array();
	
// Comprobar borrado correcto
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'DELETE';
	$CENTRO_array_test1['error'] = 'Borrado Correcto';
	$CENTRO_array_test1['error_esperado'] = 'Borrado realizado con éxito';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	//Inserto un edificio para mantener la integridad Referencial

	$edificio=new EDIFICIO_Model('aaa','aaa','aaa','aaa');
	$edificio->ADD();

	// Relleno los datos de usuario	
	$codigoCentro='aaa';
	 $codigoEdificio='aaa';
	 $nombreCentro='aaa';
	 $dirCentro='aaa';
	 $responsable='aaa';
	
// creo el modelo
	$centro = new CENTRO_Model($codigoCentro,$codigoEdificio,$nombreCentro,$dirCentro,$responsable);
// inserto la tupla
	$centro->ADD();

	$CENTRO_array_test1['error_obtenido'] = $centro->DELETE();
	//comp
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado']) //Si error esperado igual a obtenido
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{//else
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}//fin

	array_push($ERRORS_array_test, $CENTRO_array_test1);	


}//fin

//CENTRO_EDIT_test(): test edit
function CENTRO_EDIT_test()
{
//def
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$CENTRO_array_test1 = array();
	

// Comprobar actualización correcta
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'EDIT';
	$CENTRO_array_test1['error'] = 'Actualización correcta';
	$CENTRO_array_test1['error_esperado'] = 'Actualización realizada con éxito';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';


//Inserto un edificio para mantener la integridad Referencial
	$edificio=new EDIFICIO_Model('aaa','aaa','aaa','aaa');
	$edificio->ADD();

	

	// Relleno los datos de usuario	
	$codigoCentro='aaa';
	 $codigoEdificio='aaa';
	 $nombreCentro='aaa';
	 $dirCentro='aaa';
	 $responsable='aaa';
	
// creo el modelo
	$centro = new CENTRO_Model($codigoCentro,$codigoEdificio,$nombreCentro,$dirCentro,$responsable);
	$centro->ADD();

	$CENTRO_array_test1['error_obtenido'] = $centro->EDIT();
	//comp
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado']) //Si error esperado igual a obtenido
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{//else
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}//fin

	array_push($ERRORS_array_test, $CENTRO_array_test1);	


	$centro->DELETE();
	$edificio->DELETE();


}//fin

//CENTRO_SEARCH_test(): search test
function CENTRO_SEARCH_test()
{
//def
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$CENTRO_array_test1 = array();

// Comprobar el codigocentro existe
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'SEARCH';
	$CENTRO_array_test1['error'] = 'Error en la búsqueda';
	$CENTRO_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$codigoCentro='aaa\'hola';
	 
	
// creo el modelo
	$centro = new CENTRO_Model($codigoCentro,'','','','');



	$CENTRO_array_test1['error_obtenido'] = $centro->SEARCH();
	//comp
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado']) //Si error esperado igual a obtenido
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{//else
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}//fin
	array_push($ERRORS_array_test, $CENTRO_array_test1);

	// Comprobar devuelve recordset
//----------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'SEARCH';
	$CENTRO_array_test1['error'] = 'Devuelve el recordset';
	$CENTRO_array_test1['error_esperado'] = 'array';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';

	 $edificio=new EDIFICIO_Model('aaa','aaa','aaa','aaa');
	$edificio->ADD();
	
	 $codigoCentro='aaa';
	 $codigoEdificio='aaa';
	 $nombreCentro='aaa';
	 $dirCentro='aaa';
	 $responsable='aaa';


	
// creo el modelo
	$centro = new CENTRO_Model($codigoCentro,$codigoEdificio,$nombreCentro,$dirCentro,$responsable);
	$CENTRO_array_test1['error_obtenido'] = $centro->ADD();


	$CENTRO_array_test1['error_obtenido'] = gettype($centro->RellenaDatos());
	//comp
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado']) //Si error esperado igual a obtenido
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{//else
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}///fin

	array_push($ERRORS_array_test, $CENTRO_array_test1);

	$centro->DELETE();
	$edificio->DELETE();

}//fin



	CENTRO_ADD_test();
	CENTRO_RellenaDatos_test();
	CENTRO_DELETE_test();
	CENTRO_EDIT_test();
	CENTRO_SEARCH_test();

?>


