<?php
// Autor : Noa López Marchante
// Fecha : 11/12/2019
// Descripción : 
//	Fichero de test de unidad de la entidad USUARIOS
//	Saca por pantalla el resultado de los test
// incluir el modelo de la entidad USUARIOS
	include '../Model/USUARIOS_Model.php';

// function USUARIOS_Login_test()
// Valida:
//		login no existente
//		password no correcta para el login
//		login correcto

function USUARIOS_login_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();

// Comprobar el login no existe
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'login';
	$USUARIOS_array_test1['error'] = 'El login no existe';
	$USUARIOS_array_test1['error_esperado'] = 'El login no existe';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$login = 'loginerror';
	$usuarios = new USUARIOS_Model($login,'','','','','','','','','');

	$USUARIOS_array_test1['error_obtenido'] = $usuarios->login();
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);



// Comprobar login exitoso
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'login';
	$USUARIOS_array_test1['error'] = 'Login Correcto';
	$USUARIOS_array_test1['error_esperado'] = true;
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';

// Relleno los datos de usuario	
	$login = 'miusuario';
	$password = 'mipassword';
	$DNI='74215125J';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido';
	$telefono='988252632';
	$email = 'miemail@uvigo.es';
	$fechaNacimiento='23-02-1999';
	$fotoPersonal='foto';
	$sexo='hombre';

	
// creo el modelo
	$usuarios = new USUARIOS_Model($login,$password,$DNI,$nombre,$apellidos,$telefono,$email,$fechaNacimiento,$fotoPersonal,$sexo);
// inserto la tupla
	$usuarios->ADD();
// pruebo el login
	$USUARIOS_array_test1['error_obtenido'] = $usuarios->login();
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}
	
	array_push($ERRORS_array_test, $USUARIOS_array_test1);	
// elimino la tupla
	$usuarios->DELETE();

}


// function USUARIOS_Registrar_test()
// Valida:
//		usuario ya existe
//		el usuario no existe
//		

function USUARIOS_registrar_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();


// Comprobar error en la inserción
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'registrar';
	$USUARIOS_array_test1['error'] = 'Error en la inserción';
	$USUARIOS_array_test1['error_esperado'] = 'Error en la inserción';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$login = 'javi';
	$password = 'mipassword\'hola';
	$DNI='74215125J';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido';
	$telefono='988252632';
	$email = 'miemail@uvigo.es';
	$fechaNacimiento='03-23-1999';
	$fotoPersonal='foto';
	$sexo='hombre';

	
// creo el modelo
	$usuarios = new USUARIOS_Model($login,$password,$DNI,$nombre,$apellidos,$telefono,$email,$fechaNacimiento,$fotoPersonal,$sexo);

	$USUARIOS_array_test1['error_obtenido'] = $usuarios->registrar();
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);	

	$usuarios->DELETE();

// Comprobar Inserción realizada con éxito
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'registrar';
	$USUARIOS_array_test1['error'] = 'Inserción realizada con éxito';
	$USUARIOS_array_test1['error_esperado'] = 'Inserción realizada con éxito';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$login = 'miusuario';
	$password = 'mipassword';
	$DNI='74215125J';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido';
	$telefono='988252632';
	$email = 'miemail@uvigo.es';
	$fechaNacimiento='23-02-1999';
	$fotoPersonal='foto';
	$sexo='hombre';

	
// creo el modelo
	$usuarios = new USUARIOS_Model($login,$password,$DNI,$nombre,$apellidos,$telefono,$email,$fechaNacimiento,$fotoPersonal,$sexo);

	$USUARIOS_array_test1['error_obtenido'] = $usuarios->registrar();
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

	$usuarios->DELETE();


}

// function USUARIOS_ADD_test()
// Valida:
//		usuario ya existe
//		el usuario no existe
//		

function USUARIOS_ADD_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();

// Comprobar el login existe
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'ADD';
	$USUARIOS_array_test1['error'] = 'El usuario ya existe';
	$USUARIOS_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$login = 'miusuario';
	$password = 'mipassword';
	$DNI='74215125J';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido';
	$telefono='988252632';
	$email = 'miemail@uvigo.es';
	$fechaNacimiento='1999-02-01';
	$fotoPersonal='foto';
	$sexo='hombre';

	
// creo el modelo
	$usuarios = new USUARIOS_Model($login,$password,$DNI,$nombre,$apellidos,$telefono,$email,$fechaNacimiento,$fotoPersonal,$sexo);
// inserto la tupla
	$usuarios->ADD();

	$USUARIOS_array_test1['error_obtenido'] = $usuarios->ADD();
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

	$usuarios->DELETE();	


// Comprobar Inserción realizada con éxito
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'ADD';
	$USUARIOS_array_test1['error'] = 'Inserción realizada con éxito';
	$USUARIOS_array_test1['error_esperado'] = 'Inserción realizada con éxito';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$login = 'miusuario';
	$password = 'mipassword';
	$DNI='74215125J';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido';
	$telefono='988252632';
	$email = 'miemail@uvigo.es';
	$fechaNacimiento='23-02-1999';
	$fotoPersonal='foto';
	$sexo='hombre';

	
// creo el modelo
	$usuarios = new USUARIOS_Model($login,$password,$DNI,$nombre,$apellidos,$telefono,$email,$fechaNacimiento,$fotoPersonal,$sexo);
	$USUARIOS_array_test1['error_obtenido'] = $usuarios->ADD();
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

	$usuarios->DELETE();


}



function USUARIOS_RellenaDatos_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();


// Comprobar devuelve recordset
//----------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'RellenaDatos';
	$USUARIOS_array_test1['error'] = 'Devuelve el recordset';
	$USUARIOS_array_test1['error_esperado'] = 'array';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$login = 'miusuario';
	$password = 'mipassword';
	$DNI='74215125J';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido';
	$telefono='988252632';
	$email = 'miemail@uvigo.es';
	$fechaNacimiento='23-02-1999';
	$fotoPersonal='foto';
	$sexo='hombre';

	
// creo el modelo
	$usuarios = new USUARIOS_Model($login,$password,$DNI,$nombre,$apellidos,$telefono,$email,$fechaNacimiento,$fotoPersonal,$sexo);
	$USUARIOS_array_test1['error_obtenido'] = $usuarios->ADD();


	$USUARIOS_array_test1['error_obtenido'] = gettype($usuarios->RellenaDatos());
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

	$usuarios->DELETE();

}


function USUARIOS_DELETE_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();
	

// Comprobar borrado correcto
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'DELETE';
	$USUARIOS_array_test1['error'] = 'Borrado Correcto';
	$USUARIOS_array_test1['error_esperado'] = 'Borrado realizado con éxito';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$login = 'miusuario';
	$password = 'mipassword';
	$DNI='74215125J';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido';
	$telefono='988252632';
	$email = 'miemail@uvigo.es';
	$fechaNacimiento='23-02-1999';
	$fotoPersonal='foto';
	$sexo='hombre';

	
// creo el modelo
	$usuarios = new USUARIOS_Model($login,$password,$DNI,$nombre,$apellidos,$telefono,$email,$fechaNacimiento,$fotoPersonal,$sexo);
	$usuarios->ADD();

	$USUARIOS_array_test1['error_obtenido'] = $usuarios->DELETE();
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);	


}


function USUARIOS_EDIT_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();



// Comprobar actualización correcta
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'EDIT';
	$USUARIOS_array_test1['error'] = 'Actualización correcta';
	$USUARIOS_array_test1['error_esperado'] = 'Actualización realizada con éxito';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$login = 'miusuario';
	$password = 'mipassw';
	$DNI='74215125J';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido';
	$telefono='988252632';
	$email = 'miemail@uvigo.es';
	$fechaNacimiento='23-02-1999';
	$fotoPersonal='foto';
	$sexo='hombre';

	
// creo el modelo
	$usuarios = new USUARIOS_Model($login,$password,$DNI,$nombre,$apellidos,$telefono,$email,$fechaNacimiento,$fotoPersonal,$sexo);
	$usuarios->ADD();

	$USUARIOS_array_test1['error_obtenido'] = $usuarios->EDIT();
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);	


	$usuarios->DELETE();


}

function USUARIOS_SEARCH_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();

// Comprobar el login existe
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'SEARCH';
	$USUARIOS_array_test1['error'] = 'Error en la búsqueda';
	$USUARIOS_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$login = 'javi ,\'hola';
	$usuarios = new USUARIOS_Model($login,'','','','','','','','','');



	$USUARIOS_array_test1['error_obtenido'] = $usuarios->SEARCH();
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}
	array_push($ERRORS_array_test, $USUARIOS_array_test1);

	// Comprobar devuelve recordset
//----------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'SEARCH';
	$USUARIOS_array_test1['error'] = 'Devuelve el recordset';
	$USUARIOS_array_test1['error_esperado'] = 'array';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$login = 'miusuario';
	$password = 'mipassword';
	$DNI='74215125J';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido';
	$telefono='988252632';
	$email = 'miemail@uvigo.es';
	$fechaNacimiento='23-02-1999';
	$fotoPersonal='foto';
	$sexo='hombre';

	
// creo el modelo
	$usuarios = new USUARIOS_Model($login,$password,$DNI,$nombre,$apellidos,$telefono,$email,$fechaNacimiento,$fotoPersonal,$sexo);
	$USUARIOS_array_test1['error_obtenido'] = $usuarios->ADD();


	$USUARIOS_array_test1['error_obtenido'] = gettype($usuarios->RellenaDatos());
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

	$usuarios->DELETE();

}


function USUARIOS_register_test(){

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();

// Comprobar el login existe
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'register';
	$USUARIOS_array_test1['error'] = 'El usuario ya existe';
	$USUARIOS_array_test1['error_esperado'] = 'El usuario ya existe';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$login = 'miusuario';
	$password = 'mipassword';
	$DNI='74215125J';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido';
	$telefono='988252632';
	$email = 'miemail@uvigo.es';
	$fechaNacimiento='23-02-1999';
	$fotoPersonal='foto';
	$sexo='hombre';

	
// creo el modelo
	$usuarios = new USUARIOS_Model($login,$password,$DNI,$nombre,$apellidos,$telefono,$email,$fechaNacimiento,$fotoPersonal,$sexo);
// inserto la tupla
	$usuarios->ADD();

	$USUARIOS_array_test1['error_obtenido'] = $usuarios->register();
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

	$usuarios->DELETE();	

// Comprobar el usuario no existe
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'register';
	$USUARIOS_array_test1['error'] = 'El usuario no existe';
	$USUARIOS_array_test1['error_esperado'] = true;
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$login = 'jrodeiro23223';
	$usuarios = new USUARIOS_Model($login,'','','','','','','','','');
	$USUARIOS_array_test1['error_obtenido'] = $usuarios->register();
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);
	

}






	USUARIOS_login_test();
	USUARIOS_registrar_test();
	USUARIOS_register_test();
	USUARIOS_ADD_test();
	USUARIOS_RellenaDatos_test();
	USUARIOS_DELETE_test();
	USUARIOS_EDIT_test();
	USUARIOS_SEARCH_test();
	

?>


