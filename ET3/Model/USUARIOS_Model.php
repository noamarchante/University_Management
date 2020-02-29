
<?php

/*
	Archivo php
	Nombre: USUARIOS_Model.php
	Autor: 	Noa López Marchante
	Fecha de creación: 21/09/2019 
	Función: Clase que define e implementa la estructura del usuarios y sus funciones (add, delete,edit,update,search,showall,showcurrent)
*/

	class USUARIOS_Model { //clase usuarios

		//declaración de variables
		var $login; //representa el login con el que se identifca el usuario
		var $password; //representa la contraseña con la que accede el usuario
		var $dni; //representa el dni del usuario
		var $nombre; //representa el nombre del usuario
		var $apellidos; //representa los apellidos del usuario
		var $telefono; //representa el telefono del usuario
		var $email; //representa el email del usuario 
		var $fechaNacimiento; //representa la fecha de nacimiento del usuario
		var $fotoPersonal; //representa la foto del usuario
		var $sexo; //representa el sexo del usuario
		var $mysqli; //representa la BD
		var $erroresdatos; //array de errores en validación

//------------------------------------------------------------------------------------------------------------------------

		//Constructor de la clase
		function __construct($login,$password,$dni,$nombre,$apellidos,$telefono,$email,$fechaNacimiento,$fotoPersonal,$sexo){
		
			//inicialización de variables
			$this->login = $login;
			$this->password = $password;
			$this->dni = $dni;
			$this->nombre = $nombre;
			$this->apellidos = $apellidos;
			$this->telefono = $telefono;
			$this->email = $email;
			$this->fechaNacimiento = $fechaNacimiento;
			$this->fotoPersonal = $fotoPersonal;
			$this->sexo = $sexo;

			$this->erroresdatos=array();
			//$this->Comprobar_atributos();

			//llamada a la base de datos
			include_once '../Model/Access_DB.php';
	

			//llamada a la función que conecta con la base de datos
			$this->mysqli = ConnectDB();

		} //fin función constructor

//------------------------------------------------------------------------------------------------------------------------

		// function Comprobar_atributos: si todas las funciones de comprobacion de atributos individuales son true devuelve true, si alguna es false, devuelve el array de errores de datos
		function Comprobar_atributos() {
			$correcto=true; //variable de control
			//si comprobar login devuelve un array
			if (is_array($this->Comprobar_login())){
				$this->erroresdatos = array_merge($this->erroresdatos, $this->Comprobar_login()); //errores
				$correcto=false; 
			} //fin comprobacion login
			
			//si comprobar password devuelve un array
			if(is_array($this->Comprobar_password())){
				$this->erroresdatos = array_merge($this->erroresdatos, $this->Comprobar_password()); //errores
				$correcto=false;
			}//fin comprobacion password

			//comp
			if(is_array($this->Comprobar_DNI())){
				$this->erroresdatos = array_merge($this->erroresdatos, $this->Comprobar_DNI()); //errores
				$correcto=false;
			}//fin comprobacion password

			//si comprobar nombre devuelve un array
			if (is_array($this->Comprobar_nombre())){
				$this->erroresdatos = array_merge($this->erroresdatos, $this->Comprobar_nombre()); //errores
				$correcto=false;
			}//fin comprobación nombre

			//si comprobar apellidos devuelve un array
			if (is_array($this->Comprobar_apellidos())){
				$this->erroresdatos = array_merge($this->erroresdatos, $this->Comprobar_apellidos()); //errores
				$correcto=false;
			}//fin comprobación apellidos

			//si comprobar telefono devuelve un array
			if (is_array($this->Comprobar_telefono())){
				$this->erroresdatos = array_merge($this->erroresdatos, $this->Comprobar_telefono()); //errores
				$correcto=false;
			}//fin comprobación telefono

			//si comprobar email devuelve un array
			if (is_array($this->Comprobar_email())){
				$this->erroresdatos = array_merge($this->erroresdatos, $this->Comprobar_email()); //errores
				$correcto=false;
			}//fin comprobación email

			//si comprobar FechaNacimiento devuelve un array
			if (is_array($this->Comprobar_FechaNacimiento())){
				$this->erroresdatos = array_merge($this->erroresdatos, $this->Comprobar_FechaNacimiento()); //errores
				$correcto=false;
			}//fin comprobación FechaNacimiento

			//si comprobar sexo devuelve un array
			if (is_array($this->Comprobar_sexo())){
				$this->erroresdatos = array_merge($this->erroresdatos, $this->Comprobar_sexo()); //errores
				$correcto=false;
			}//fin comprobación FechaNacimiento

			//si hay algun error
			if($correcto==false){
				//devuelve el array con los errores
				return $this->erroresdatos;
			}else{ //si no hay ningun error
				return $correcto;//fin comprobación login y nombre
			}//fin comprobacion errores
		}//fin función comprobar datos

/* ******************************************************************************************************************************************************** */
		
	/* function Comprobar_login(): Comprueba el formato del login*/
		// devuelve un true o un false y rellena en caso de error el array de errores de datos
		function Comprobar_login(){
			$arrayLogin=array(); //definicion de array temporal
			$correcto = true; //variable de control
			//si no cumple la expresión regular
			if(strlen($this->login)==0 || $this->login==null || preg_match("/(^\s+$)/", $this->login)){
				$error = 'Atributo vacío'; //error
				$array = array('nombreatributo' => $this->login, 'codigoincidencia' => '00001', 'mensajeerror' => $error); //array errores
				array_push($arrayLogin, $array);
				$correcto=false;
			} //fin comprobacion vacio
			//si el nº de letras del nombre es menor que tres
			if (strlen($this->login)<3){
				//mensaje de error
				$error = 'Valor de atributo no numérico demasiado corto';
				$array = array('nombreatributo' =>$this->login, 'codigoincidencia' =>'00003', 'mensajeerror' => $error); //errores
				//introduce el mensaje en el rray de errores
				array_push($arrayLogin, $array);

				//cambia correcto a false
				$correcto = false;

			}//fin comprobación longitud <3

			//si el nº de letras del nombre es mayor que 30
			if (strlen($this->login)>15){

				//crea mensaje de error
				$error = 'Valor de atributo demasiado largo';
				$array = array('nombreatributo' =>$this->login, 'codigoincidencia' =>'00002', 'mensajeerror' => $error); //errores
				//intrudce el mensaje en el array de errores
				array_push($arrayLogin, $array);

				//establece correcto a false
				$correcto = false;
		
			}//fin comprobación nº letras >30
			//comp
			if (!preg_match("/[a-zA-Z]+/",$this->login)){

				//mensaje de error
				$error = 'Solo se permiten alfabéticos';
				$array =  array( 'nombreatributo' => $this->login,'codigoincidencia' => '00090', 'mensajeerror' => $error); //errores
				//carga el error en el array de errores
				array_push($arrayLogin, $array);
				$correcto=false;
			} //fin comprobacion patron

			//comprobacion errores
			if($correcto==true){
				//devuelve el valor de correcto
				return $correcto;
				}else{ //si errores
					return $arrayLogin;
				} //fin
		}//fin función comprobar_login()


		/* ****************************************************************************************************************************** */
		//comprobar contraseña
		function Comprobar_password(){
			$arrayPassword=array(); //array temporal
			$correcto=true; //variable de control
			//comprobacion vacio
			if(strlen($this->password)==0 || $this->password==null || preg_match("/(^\s+$)/", $this->password)){
				$error = 'Atributo vacío'; //error
				$array = array('nombreatributo' => $this->password, 'codigoincidencia' => '00001', 'mensajeerror' => $error); //array error
				array_push($arrayPassword, $array);
				$correcto=false;
			}//fin vacio
			//si el nº de letras del nombre es menor que tres
			if (strlen($this->password)<3){
				//mensaje de error
				$error = 'Valor de atributo no numérico demasiado corto'; //error
				$array = array('nombreatributo' =>$this->password, 'codigoincidencia' =>'00003', 'mensajeerror' => $error); //array error
				//introduce el mensaje en el rray de errores
				array_push($arrayPassword, $array);

				//cambia correcto a false
				$correcto = false;

			}//fin comprobación longitud <3

			//si el nº de letras del nombre es mayor que 30
			if (strlen($this->password)>15){

				//crea mensaje de error
				$error = 'Password demasiado larga';
				$array = array('nombreatributo' =>$this->password, 'codigoincidencia' =>'00005', 'mensajeerror' => $error);//array error
				//intrudce el mensaje en el array de errores
				array_push($arrayPassword, $array);

				//establece correcto a false
				$correcto = false;
		
			}//fin comprobación nº letras >30
			//comp
			if (!preg_match("/[a-zA-Z]+/",$this->password)){

				//mensaje de error
				$error = 'Solo se permiten alfabéticos';//error
				$array =  array( 'nombreatributo' => $this->password,'codigoincidencia' => '00090', 'mensajeerror' => $error); //errores
				//carga el error en el array de errores
				array_push($arrayPassword, $array);
				$correcto=false;
			}//fin tamaño 

			//errores o no
			if($correcto==true){
				//devuelve el valor de correcto
				return $correcto;
				}else{//si errores
					return $arrayPassword;
				}//fin errores

		}//fin comprobar_password

		/* ************************************************************************************************************************** */
		//funcion comprobar_dni
function Comprobar_DNI(){
	$arrayDni=array();//array temporal
	$correcto=true;//variable de control
	//comprobar vacio
	if(strlen($this->dni)==0 || $this->dni==null || preg_match("/(^\s+$)/", $this->dni)){
		$error = 'Atributo vacío'; //error
		$array = array('nombreatributo' => $this->dni, 'codigoincidencia' => '00001', 'mensajeerror' => $error); //array errores
		array_push($arrayDni, $array);
		$correcto=false;
	}//fin vacio
	//si el nº de letras del nombre es menor que tres
	if (strlen($this->dni)<3){
		//mensaje de error
		$error = 'Valor de atributo no numérico demasiado corto'; //error
		$array = array('nombreatributo' =>$this->dni, 'codigoincidencia' =>'00003', 'mensajeerror' => $error); //errores
		//introduce el mensaje en el rray de errores
		array_push($arrayDni, $array);

		//cambia correcto a false
		$correcto = false;

	}//fin comprobación longitud <3

	//si el nº de letras del nombre es mayor que 30
	if (strlen($this->dni)>9){

		//crea mensaje de error
		$error = 'Valor de atributo demasiado largo';//error
		$array = array('nombreatributo' =>$this->dni, 'codigoincidencia' =>'00002', 'mensajeerror' => $error);//errores
		//intrudce el mensaje en el array de errores
		array_push($arrayDni, $array);

		//establece correcto a false
		$correcto = false;

	}//fin comprobación nº letras >30
	//patron 
	if(!preg_match("/^\d{8}[a-zA-Z]{1}$/",$this->dni)){
		//crea mensaje de error
		$error = 'Formato dni erróneo';//error
		$array = array('nombreatributo' =>$this->dni, 'codigoincidencia' =>'00010', 'mensajeerror' => $error); //errores
		//intrudce el mensaje en el array de errores
		array_push($arrayDni, $array);
		//establece correcto a false
		$correcto = false;
	}else{//letras

	$letra = substr($this->dni, -1);//letra
	$numeros = substr($this->dni, 0, -1);//num
	//comp
	if ( !(substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8) ){
		$error ='Dni no válido';//error
		$array = array('nombreatributo' => $this->dni, 'codigoincidencia' => '00011', 'mensajeerror' => $error); //errores
		//intrudce el mensaje en el array de errores
		array_push($arrayDni, $array);
		$correcto=false;

	}//fin letra
}//fin
	//comprobacion errores
	if($correcto==true){
		//devuelve el valor de correcto
		return $correcto;
	}else{//si errores
		return $arrayDni;
	}//fin comprobacion
}//fin comprobar_dni

		/* **************************************************************************************************************************** */

		// function Comprobar_nombre(): comprueba que el nombre introducido es correcto
		function Comprobar_nombre(){
			$arrayNombre=array();//array temporal
			//guarda valor en la variable por defecto
			$correcto = true;
			//comprobar vacio
			if(strlen($this->nombre)==0 || $this->nombre==null || preg_match("/(^\s+$)/", $this->nombre)){
				$error = 'Atributo vacío';//error
				$array = array('nombreatributo' => $this->nombre, 'codigoincidencia' => '00001', 'mensajeerror' => $error); //array errores
				array_push($arrayNombre, $array);
				$correcto=false;
			}//fin vacio
			//si el nº de letras del nombre es menor que tres
			if (strlen($this->nombre)<3){
				//mensaje de error
				$error = 'Valor de atributo no numérico demasiado corto';
				$array = array('nombreatributo' =>$this->nombre, 'codigoincidencia' =>'00003', 'mensajeerror' => $error); //errores
				//introduce el mensaje en el rray de errores
				array_push($arrayNombre, $array);

				//cambia correcto a false
				$correcto = false;

			}//fin comprobación longitud <3

			//si el nº de letras del nombre es mayor que 30
			if (strlen($this->nombre)>30){

				//crea mensaje de error
				$error = 'Valor de atributo demasiado largo';
				$array = array('nombreatributo' =>$this->nombre, 'codigoincidencia' =>'00002', 'mensajeerror' => $error);//errores
				//intrudce el mensaje en el array de errores
				array_push($arrayNombre, $array);

				//establece correcto a false
				$correcto = false;
		
			}//fin comprobación nº letras >30

			//si no se cumple la expresión regular
			if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜïÏ]+(\s*[a-zA-ZA-ZñÑáéíóúÁÉÍÓÚüÜïÏ]*)+$/",$this->nombre)){

				//guarda mensaje de error
				$error = 'Solo están permitidas alfabéticos';
				$array = array( 'nombreatributo' =>$this->nombre, 'codigoincidencia' =>'00030', 'mensajeerror' => $error);//error
				//añade el error al array
				array_push($arrayNombre, $array);

				//establece correcto a falso
				$correcto = false;
		
			}//fin comprobación expresión regular
			//comprobacion errores
			if($correcto==true){
			//devuelve el valor de correcto
			return $correcto;
			}else{//si errores
				return $arrayNombre;
			}//fin comprobacion errores
	
		}//fin comprobación nombre

//----------------------------------------------------------------------------------------------------------------------
// function Comprobar_apellidos(): comprueba que el nombre introducido es correcto
function Comprobar_apellidos(){
	$arrayApellidos=array();//array temporal
	//guarda valor en la variable por defecto
	$correcto = true;
	//comprobar vacio
	if(strlen($this->apellidos)==0 || $this->apellidos==null || preg_match("/(^\s+$)/", $this->apellidos)){
		$error = 'Atributo vacío';//error
		$array = array('nombreatributo' => $this->apellidos, 'codigoincidencia' => '00001', 'mensajeerror' => $error); //array errores
		array_push($arrayApellidos, $array);
		$correcto=false;
	}//fin vacio
	//si el nº de letras del apellido es menor que tres
	if (strlen($this->apellidos)<3){
		//mensaje de error
		$error = 'Valor de atributo no numérico demasiado corto';
		$array = array('nombreatributo' =>$this->apellidos, 'codigoincidencia' =>'00003', 'mensajeerror' => $error); //errores
		//introduce el mensaje en el rray de errores
		array_push($arrayApellidos, $array);

		//cambia correcto a false
		$correcto = false;

	}//fin comprobación longitud <3

	//si el nº de letras del nombre es mayor que 30
	if (strlen($this->apellidos)>50){

		//crea mensaje de error
		$error = 'Valor de atributo demasiado largo';
		$array = array('nombreatributo' =>$this->apellidos, 'codigoincidencia' =>'00002', 'mensajeerror' => $error);//errores
		//intrudce el mensaje en el array de errores
		array_push($arrayApellidos, $array);

		//establece correcto a false
		$correcto = false;

	}//fin comprobación nº letras >30

	//si no se cumple la expresión regular
	if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜïÏ]+(\s*[a-zA-ZA-ZñÑáéíóúÁÉÍÓÚüÜïÏ]*)+$/",$this->apellidos)){

		//guarda mensaje de error
		$error = 'Solo están permitidas alfabéticos';
		$array = array( 'nombreatributo' =>$this->apellidos, 'codigoincidencia' =>'00030', 'mensajeerror' => $error);//error
		//añade el error al array
		array_push($arrayApellidos, $array);

		//establece correcto a falso
		$correcto = false;

	}//fin comprobación expresión regular
	//comprobacion errores
	if($correcto==true){
	//devuelve el valor de correcto
	return $correcto;
	}else{//si errores
		return $arrayApellidos;
	}//fin comprobacion errores

}//fin comprobación apellidos

//----------------------------------------------------------------------------------------------------------------------
// function Comprobar_telefono(): comprueba que el nombre introducido es correcto
function Comprobar_telefono(){
	$arrayTelefono=array();//array temporal
	//guarda valor en la variable por defecto
	$correcto = true;
	//comprobar vacio
	if(strlen($this->telefono)==0 || $this->telefono==null || preg_match("/(^\s+$)/", $this->telefono)){
		$error = 'Atributo vacío';//error
		$array = array('nombreatributo' => $this->telefono, 'codigoincidencia' => '00001', 'mensajeerror' => $error); //array errores
		array_push($arrayTelefono, $array);
		$correcto=false;
	}//fin vacio
	//si el nº de letras del apellido es menor que tres
	if (strlen($this->telefono)<3){
		//mensaje de error
		$error = 'Valor de atributo no numérico demasiado corto';
		$array = array('nombreatributo' =>$this->telefono, 'codigoincidencia' =>'00003', 'mensajeerror' => $error); //errores
		//introduce el mensaje en el rray de errores
		array_push($arrayTelefono, $array);

		//cambia correcto a false
		$correcto = false;

	}//fin comprobación longitud <3

	//si el nº de letras del nombre es mayor que 30
	if (strlen($this->telefono)>11){

		//crea mensaje de error
		$error = 'Valor de atributo demasiado largo';
		$array = array('nombreatributo' =>$this->telefono, 'codigoincidencia' =>'00002', 'mensajeerror' => $error);//errores
		//intrudce el mensaje en el array de errores
		array_push($arrayTelefono, $array);

		//establece correcto a false
		$correcto = false;

	}//fin comprobación nº letras >30

	//si no se cumple la expresión regular
	if (!preg_match("/^(34)?[6|7|9][0-9]{8}$/",$this->telefono)){

		//guarda mensaje de error
		$error = 'Teléfono no válido';
		$array = array( 'nombreatributo' =>$this->telefono, 'codigoincidencia' =>'00006', 'mensajeerror' => $error);//error
		//añade el error al array
		array_push($arrayTelefono, $array);

		//establece correcto a falso
		$correcto = false;

	}//fin comprobación expresión regular
	//si no se cumple la expresión regular
	if (!preg_match("/^[\d]+$/",$this->telefono)){

		//guarda mensaje de error
		$error = 'Solo se permiten números';
		$array = array( 'nombreatributo' =>$this->telefono, 'codigoincidencia' =>'00070', 'mensajeerror' => $error);//error
		//añade el error al array
		array_push($arrayTelefono, $array);

		//establece correcto a falso
		$correcto = false;

	}//fin comprobación expresión regular
	//comprobacion errores
	if($correcto==true){
	//devuelve el valor de correcto
	return $correcto;
	}else{//si errores
		return $arrayTelefono;
	}//fin comprobacion errores

}//fin comprobación telefono

//----------------------------------------------------------------------------------------------------------------------
// function Comprobar_email(): comprueba que el nombre introducido es correcto
function Comprobar_email(){
	$arrayEmail=array();//array temporal
	//guarda valor en la variable por defecto
	$correcto = true;
	//comprobar vacio
	if(strlen($this->email)==0 || $this->email==null || preg_match("/(^\s+$)/", $this->email)){
		$error = 'Atributo vacío';//error
		$array = array('nombreatributo' => $this->email, 'codigoincidencia' => '00001', 'mensajeerror' => $error); //array errores
		array_push($arrayEmail, $array);
		$correcto=false;
	}//fin vacio
	//si el nº de letras del apellido es menor que tres
	if (strlen($this->email)<3){
		//mensaje de error
		$error = 'Valor de atributo no numérico demasiado corto';
		$array = array('nombreatributo' =>$this->email, 'codigoincidencia' =>'00003', 'mensajeerror' => $error); //errores
		//introduce el mensaje en el rray de errores
		array_push($arrayEmail, $array);

		//cambia correcto a false
		$correcto = false;

	}//fin comprobación longitud <3

	//si el nº de letras del nombre es mayor que 30
	if (strlen($this->email)>60){

		//crea mensaje de error
		$error = 'Valor de atributo demasiado largo';
		$array = array('nombreatributo' =>$this->email, 'codigoincidencia' =>'00002', 'mensajeerror' => $error);//errores
		//intrudce el mensaje en el array de errores
		array_push($arrayEmail, $array);

		//establece correcto a false
		$correcto = false;

	}//fin comprobación nº letras >30

	//si no se cumple la expresión regular
	if (!preg_match("/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/",$this->email)){

		//guarda mensaje de error
		$error = 'Formato email erroneo';
		$array = array( 'nombreatributo' =>$this->email, 'codigoincidencia' =>'00120', 'mensajeerror' => $error);//error
		//añade el error al array
		array_push($arrayEmail, $array);

		//establece correcto a falso
		$correcto = false;

	}//fin comprobación expresión regular

	//comprobacion errores
	if($correcto==true){
	//devuelve el valor de correcto
	return $correcto;
	}else{//si errores
		return $arrayEmail;
	}//fin comprobacion errores

}//fin comprobación telefono

//----------------------------------------------------------------------------------------------------------------------
// function Comprobar_FechaNacimiento(): comprueba que el nombre introducido es correcto
function Comprobar_FechaNacimiento(){
	$arrayFechaNacimiento=array();//array temporal
	//guarda valor en la variable por defecto
	$correcto = true;
	//comprobar vacio
	if(strlen($this->fechaNacimiento)==0 || $this->fechaNacimiento==null || preg_match("/(^\s+$)/", $this->fechaNacimiento)){
		$error = 'Atributo vacío';//error
		$array = array('nombreatributo' => $this->fechaNacimiento, 'codigoincidencia' => '00001', 'mensajeerror' => $error); //array errores
		array_push($arrayFechaNacimiento, $array);
		$correcto=false;
	}//fin vacio

	//si no se cumple la expresión regular
	if (!preg_match('/^(?:3[01]|[12][0-9]|0?[1-9])([\-\/.])(0?[1-9]|1[1-2])\1\d{4}$/',$this->fechaNacimiento) && !preg_match('/^(?:0?[1-9]|1[1-2])([\-\/.])(3[01]|[12][0-9]|0?[1-9])\1\d{4}$/',$this->fechaNacimiento) && !preg_match('/^\d{4}([\-\/.])(0?[1-9]|1[1-2])\1(3[01]|[12][0-9]|0?[1-9])$/',$this->fechaNacimiento)){

		//guarda mensaje de error
		$error = 'Formato fecha erróneo';
		$array = array( 'nombreatributo' =>$this->fechaNacimiento, 'codigoincidencia' =>'00020', 'mensajeerror' => $error);//error
		//añade el error al array
		array_push($arrayFechaNacimiento, $array);

		//establece correcto a falso
		$correcto = false;

	}//fin comprobación expresión regular
	
	//comprobacion errores
	if($correcto==true){
	//devuelve el valor de correcto
	return $correcto;
	}else{//si errores
		return $arrayFechaNacimiento;
	}//fin comprobacion errores

}//fin comprobación telefono

//----------------------------------------------------------------------------------------------------------------------
// function Comprobar_sexo(): comprueba que el nombre introducido es correcto
function Comprobar_sexo(){
	$arraySexo=array();//array temporal
	//guarda valor en la variable por defecto
	$correcto = true;
	//comprobar vacio
	if(strlen($this->sexo)==0 || $this->sexo==null || preg_match("/(^\s+$)/", $this->sexo)){
		$error = 'Atributo vacío';//error
		$array = array('nombreatributo' => $this->sexo, 'codigoincidencia' => '00001', 'mensajeerror' => $error); //array errores
		array_push($arraySexo, $array);
		$correcto=false;
	}//fin vacio

	//si no se cumple la expresión regular
	if (!preg_match("/^(hombre|mujer)$/",$this->sexo)){

		//guarda mensaje de error
		$error = "Solo se permiten los valores 'hombre','mujer'";
		$array = array( 'nombreatributo' =>$this->sexo, 'codigoincidencia' =>'00100', 'mensajeerror' => $error);//error
		//añade el error al array
		array_push($arraySexo, $array);

		//establece correcto a falso
		$correcto = false;

	}//fin comprobación expresión regular
	
	//comprobacion errores
	if($correcto==true){
	//devuelve el valor de correcto
	return $correcto;
	}else{//si errores
		return $arraySexo;
	}//fin comprobacion errores

}//fin comprobación telefono

//----------------------------------------------------------------------------------------------------------------------

		/*Función ADD: Inserta en la tabla  de la bd los valores de los atributos del objeto. 
				  Comprueba si la clave/s está/n vacía/s y si existe ya en la tabla*/
		function ADD(){

			//sentencia sql que selecciona una tupla a partir de la clave
			$sql = "SELECT * FROM USUARIOS WHERE login = '$this->login'";

			//si no se puede ejecutar la select
			if (!$result = $this->mysqli->query($sql)){

				//devuelve mensaje de error
				return 'Error de gestor de base de datos';
		
			}//fin comprobación ejecución select

			//si existe el usuario
			if ($result->num_rows == 1){

				//devuelve mensaje de error
				return 'Inserción fallida: el elemento ya existe';
		
			}//fin comprobación existe usuario
			//si los datos están vacíos
			//if(empty($this->login) || empty($this->password) || empty($this->dni) || empty($this->nombre)|| empty($this->apellidos)|| empty($this->telefono)|| empty($this->email)|| empty($this->fechaNacimiento)|| empty($this->sexo)){

				//mensaje de error
				//return 'Los datos no pueden estar vacios';
			
			//}//fin comprobación datos vacíos
						//validacion back
			//$temp = $this->Comprobar_atributos();
//if(is_array($temp)){

	//return $temp;
//}//fin
			  
			//sentencia sql que permite la inserción de un nuevo usuario con los datos recogidos
			$sql = "INSERT INTO USUARIOS ( 
			login, 
			password, 
			DNI,
			nombre,
			apellidos,
			telefono,
			email,
			FechaNacimiento,
			fotopersonal,
			sexo) 
			VALUES (
				'".$this->login."',
				'".$this->password."',
				'".$this->dni."',
				'".$this->nombre."',
				'".$this->apellidos."',
				'".$this->telefono."',
				'".$this->email."',
				'".$this->fechaNacimiento."',
				'".$this->fotoPersonal."',
				'".$this->sexo."'
			)";

//VALIDACIONES BACK
			$var=$this->Comprobar_atributos();
			//comp
			  if(is_array($var)){
			 	 return $var;
			  }//fin comprobacion

			//si la sentencia no se puede ejecutar
			if (!$this->mysqli->query($sql)) {

				//devuelve un mensaje de error
				return 'Error de gestor de base de datos';
		
			//en otro caso	
			}else{

				//devuelve un mensaje de operación correcta
				return 'Inserción realizada con éxito';
		
			}//fin comprobación inserción		
	
		}//fin función add
    

		//función de destrucción del objeto: se ejecuta automaticamente al finalizar el script
		function __destruct(){
		}//fin función destruct

//------------------------------------------------------------------------------------------------------------------------

		/*función SEARCH: hace una búsqueda en la tabla con los datos proporcionados. 
					  Si van vacios devuelve todos los usuarios*/
		function SEARCH(){

			//sentencia sql de búsqueda de datos 
			$sql= "SELECT * FROM USUARIOS WHERE (
				login LIKE '%$this->login%' AND 
				password LIKE '%$this->password%' AND 
				DNI LIKE '%$this->dni%' AND 
				nombre LIKE '%$this->nombre%' AND 
				apellidos LIKE '%$this->apellidos%' AND 
				telefono LIKE '%$this->telefono%' AND
				email LIKE '%$this->email%' AND
				FechaNacimiento LIKE '%$this->fechaNacimiento%' AND
				fotopersonal LIKE '%$this->fotoPersonal%' AND
				sexo LIKE '%$this->sexo%')";

			//si no se puede ejecutar la select
			if (!$resultado = $this->mysqli->query($sql)){

				//mensaje de error
				return 'Error de gestor de base de datos';
		
			}//fin comprobación existen datos que cumplen condición de búsqueda

			//devuelve los datos
			return $resultado;
    
		}//fin función search


//------------------------------------------------------------------------------------------------------------------------

		/*función DELETE : comprueba que la tupla a borrar existe y una vez verificado la borra*/
		function DELETE() {
						//validacion back
						//$temp = $this->Comprobar_login();
						//if(is_array($temp)){
						
							//return $temp;
						//}//fin
			// //si el usuario a borrar es el que tiene la sesión iniciada
			// $sql = "SELECT * FROM USUARIOS WHERE (login='$this->login')";
			// if(($this->mysqli->query($sql))->fetch_array()['login'] == $_SESSION['login']){

			// 	//desconecta la sesión
			// 	include '../Functions/Desconectar.php';
			// }//fin comprobacion
			
	
   			//sentencia sql que permite el borrado de una tupla a partir de su clave
   			$sql = "DELETE FROM USUARIOS
   				WHERE( login = '$this->login')";

//VALIDACIONES BACK
			$var=$this->Comprobar_login();
			//comp
			if(is_array($var)){
			return $var;
			}//fin

   			//si no se puede ejecutar la sentencia
   			if ($this->mysqli->query($sql)){

				//devuelve un mensaje de confirmación
				$resultado = 'Borrado realizado con éxito';
			
			//en otro caso
			}else{

				//devuelve un mensaje de error
				$resultado = 'Error de gestor de base de datos';
			
			}//fin de comproción de ejecución correcta de la sentencia

			//devuelve mensaje
			return $resultado;
		}//fin función delete

//------------------------------------------------------------------------------------------------------------------------

		// función RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
		function RellenaDatos(){
	
    		//sentencia sql que devuelve una tupla a partir de su clave
    		$sql = "SELECT *
				FROM USUARIOS
				WHERE (
					login = '$this->login' 
				)";

			//si no se puede ejecutar la sentencia sql
			if (!$resultado = $this->mysqli->query($sql)){
			
				//devuelve mensaje de error
				return 'Error de gestor de base de datos';
		
			//en otro caso
			}else{

				//guarda los valores de la tupla
				$tupla = $resultado->fetch_array();
		
			}//fin comprobación sql
	
			//devuelve la tupla
			return $tupla;
	
		}//fin función rellenaDatos()

//------------------------------------------------------------------------------------------------------------------------

		// función Edit: realizar el update de una tupla después de comprobar que existe
		function EDIT(){
			//si los datos están vacíos
			//if(empty($this->login) || empty($this->password) || empty($this->dni) || empty($this->nombre)|| empty($this->apellidos)|| empty($this->telefono)|| empty($this->email)|| empty($this->fechaNacimiento)|| empty($this->sexo)){

				//mensaje de error
				//return 'Los datos no pueden estar vacios';
			
			//}//fin comprobación datos vacíos
					//validacion back
					//$temp = $this->Comprobar_atributos();
					//if(is_array($temp)){
					
						//return $temp;
					//}//fin
			//sentencia sql que permite la edición de una tupla
			$sql = "UPDATE USUARIOS SET  
						login = '$this->login',
						password = '$this->password',
						DNI = '$this->dni',
						nombre = '$this->nombre',
						apellidos = '$this->apellidos',
						telefono = '$this->telefono',
						email = '$this->email',
						FechaNacimiento = '$this->fechaNacimiento',
						fotopersonal = '$this->fotoPersonal',
						sexo = '$this->sexo'
					WHERE (login = '$this->login')" ;


//VALIDACIONES BACK
			$var=$this->Comprobar_atributos();
			//comp
			  if(is_array($var)){
			 	 return $var;
			  }//fin comprobacion

			//si la sentencia se puede ejecutar
			if ($this->mysqli->query($sql)){

				//guarda mensaje de confirmación
				$resultado = 'Actualización realizada con éxito';
			
			//en otro caso
			}else{

				//guarda mensaje de error
				$resultado = 'Error de gestor de base de datos';
		
			}//fin comprobación

			//devuelve mensaje
			return $resultado;

		} //fin función EDIT


//------------------------------------------------------------------------------------------------------------------------

		/*Función login: realiza la comprobación de si existe el usuario en la bd 
						 y después si la pass es correcta para ese usuario. 
						 Si es asi devuelve true, en cualquier otro caso devuelve el error correspondiente*/
		function login(){
			//val back
			//$temp1 = $this->Comprobar_login();
			//$temp2 = $this->Comprobar_password();
			//if(is_array($temp1)){ //comp
			
				//return $temp1;
			//}//fin
			//if(is_array($temp2)){
			
				//return $temp2;
			//}//fin
			//sentencia sql que devuelve una tupla a partir de su clave
			$sql = "SELECT *
				FROM USUARIOS
				WHERE (login = '$this->login')";


//VALIDACIONES BACK
			$var=$this->Comprobar_login();
			//comp
			if(is_array($var)){
			return $var;
			}//fin



			//realiza la consulta y almacena el resultado
			$resultado = $this->mysqli->query($sql);
	
			//si el resultado tiene cero tuplas
			if ($resultado->num_rows == 0){

				//devuelve un mensaje de error
				return 'El login no existe';
		
			//en otro caso
			}else{

				//almacena los datos del usuario en forma de array
				$tupla = $resultado->fetch_array();
		
				//si los datos de la contraseña se corresponden con la pasada por el usuario
				if ($tupla['password'] == $this->password){

					//devuelve true
					return true;
			
				//en otro caso
				}else{

					//devuelve un mensaje de error
					return 'La password para este usuario no es correcta';
		
				} //fin de comprobación contraseña 	correcta
	
			}//fin comprobación existe login
		}//fin metodo login

//------------------------------------------------------------------------------------------------------------------------
		//Función Register: muestra si el usuario ya existe y si no devuelve true	
		function Register(){

			//sentencia sql que selecciona  todos los datos de un usuario
			$sql = "SELECT * FROM USUARIOS WHERE (login = '".$this->login."')"; 

			//almacena el resultado de la consulta
			$result = $this->mysqli->query($sql); 
		
			// si existe el usuario
			if ($result->num_rows == 1){  
			
				//devuelve este mensaje
				return 'El usuario ya existe'; 
			
			//en otro caso
			}else{ 
	    	
    			//devuelve true, no existe el usuario
    			return true; 
			
			}//fin comprobación existe el usuario

		}//fin función Register

//------------------------------------------------------------------------------------------------------------------------
		function registrar(){
			//validacion back
			$temp = $this->Comprobar_atributos();
			//comp
if(is_array($temp)){

	return $temp;
}//fin
			//sentencia sql que inserta el nuevo usuario con los datos pasados
			$sql = "INSERT INTO USUARIOS (
					login,
					password,
					DNI,
					nombre,
					apellidos,
					telefono,
					email,
					FechaNacimiento,
					fotopersonal,
					sexo) 
					VALUES (
						'".$this->login."',
						'".$this->password."',
						'".$this->dni."',
						'".$this->nombre."',
						'".$this->apellidos."',
						'".$this->telefono."',
						'".$this->email."',
						'".$this->fechaNacimiento."',
						'".$this->fotoPersonal."',
						'".$this->sexo."'
					)";
			
			//si no se puede llevar a cabo la sentencia	
			if (!$this->mysqli->query($sql)) {

				//devuelve mensaje de error
				return 'Error en la inserción';
		
			//en otro caso
			}else{
			
				//devuelve mensaje de confirmación
				return 'Inserción realizada con éxito';
		
			}//fin comprobación sentencia sql ejecutada correctamente		
	
		}//fin función registrar

	}//fin de clase

?> 