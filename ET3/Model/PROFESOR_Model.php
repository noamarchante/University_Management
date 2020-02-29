<?php

/*
	Archivo php
	Nombre: PROFESOR_Model.php
	Autor: 	Noa López Marchante
	Fecha de creación: 05/10/2019 
	Función: Clase que define e implementa la estructura del profesor y sus funciones (add, delete,edit,update,search,showall,showcurrent)
*/

	class PROFESOR_Model { //clase profesor

		//declaración de variables
		var $dni; //representa el dni que identifica al profesor
		var $nombreProfesor; //representa el nombre del profesor
		var $apellidosProfesor; //representa los apellidos del profesor
		var $areaProfesor; //representa el area del profesor
		var $departamentoProfesor; //representa el departamento del profesor
		var $mysqli; //representa la BD

//------------------------------------------------------------------------------------------------------------------------

		//Constructor de la clase
		function __construct($dni,$nombreProfesor,$apellidosProfesor,$areaProfesor,$departamentoProfesor){
		
			//inicialización de variables
			$this->dni = $dni;
			$this->nombreProfesor = $nombreProfesor;
			$this->apellidosProfesor = $apellidosProfesor;
			$this->areaProfesor = $areaProfesor;
			$this->departamentoProfesor = $departamentoProfesor;
			$this->erroresdatos = array(); 

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
	if (is_array($this->Comprobar_DNI())){
		$this->erroresdatos = array_merge($this->erroresdatos, $this->Comprobar_DNI()); //errores
		$correcto=false; 
		
	} //fin comprobacion login
	
	//si comprobar password devuelve un array
	if(is_array($this->Comprobar_NOMBREPROFESOR())){
		$this->erroresdatos = array_merge($this->erroresdatos, $this->Comprobar_NOMBREPROFESOR()); //errores
		$correcto=false;
		
	}//fin comprobacion password

	//comp
	if(is_array($this->Comprobar_APELLIDOSPROFESOR())){
		$this->erroresdatos = array_merge($this->erroresdatos, $this->Comprobar_APELLIDOSPROFESOR()); //errores
		$correcto=false;
		
	}//fin comprobacion password
	
	//si comprobar nombre devuelve un array
	if (is_array($this->Comprobar_AREAPROFESOR())){
		$this->erroresdatos = array_merge($this->erroresdatos, $this->Comprobar_AREAPROFESOR()); //errores
		$correcto=false;
		
	}//fin comprobación nombre

	//si comprobar nombre devuelve un array
	if (is_array($this->Comprobar_DEPARTAMENTOPROFESOR())){
		$this->erroresdatos = array_merge($this->erroresdatos, $this->Comprobar_DEPARTAMENTOPROFESOR()); //errores
		$correcto=false;
		
	}//fin comprobación nombre

	//si hay algun error
	if($correcto==false){
		//devuelve el array con los errores
		return $this->erroresdatos;
	}else{ //si no hay ningun error
		return $correcto;//fin comprobación login y nombre
	}//fin comprobacion errores
}//fin función comprobar datos

/* ************************************************************************************************************************************************** */

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
	///comp
	if ( !(substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8) ){
		$error ='Dni no válido';//error
		$array = array('nombreatributo' => $this->dni, 'codigoincidencia' => '00011', 'mensajeerror' => $error); //errores
		array_push($arrayDni, $array);
		$correcto=false;

	}//fin letra
}
	//comprobacion errores
	if($correcto==true){
		//devuelve el valor de correcto
		return $correcto;
	}else{//si errores
		return $arrayDni;
	}//fin comprobacion
}//fin comprobar_dni

/* ************************************************************************************************************************************************** */
/* function Comprobar_NOMBREPROFESOR(): Comprueba el formato del NOMBREPROFESOR*/
		// devuelve un true o un false y rellena en caso de error el array de errores de datos
		function Comprobar_NOMBREPROFESOR(){
			$arrayNOMBREPROFESOR=array(); //definicion de array temporal
			$correcto = true; //variable de control

			//si no cumple la expresión regular
			if(strlen($this->nombreProfesor)==0 || $this->nombreProfesor==null || preg_match("/(^\s+$)/", $this->nombreProfesor)){
				$error = 'Atributo vacío'; //error
				$array = array('nombreatributo' => $this->nombreProfesor, 'codigoincidencia' => '00001', 'mensajeerror' => $error); //array errores
				array_push($arrayNOMBREPROFESOR, $array);
				$correcto=false;
			} //fin comprobacion vacio
			//si el nº de letras del nombre es menor que tres
			if (strlen($this->nombreProfesor)<3){
				//mensaje de error
				$error = 'Valor de atributo no numérico demasiado corto';
				$array = array('nombreatributo' =>$this->nombreProfesor, 'codigoincidencia' =>'00003', 'mensajeerror' => $error); //errores
				//introduce el mensaje en el rray de errores
				array_push($arrayNOMBREPROFESOR, $array);

				//cambia correcto a false
				$correcto = false;

			}//fin comprobación longitud <3

			//si el nº de letras del nombre es mayor que 30
			if (strlen($this->nombreProfesor)>15){

				//crea mensaje de error
				$error = 'Valor de atributo demasiado largo';
				$array = array('nombreatributo' =>$this->nombreProfesor, 'codigoincidencia' =>'00002', 'mensajeerror' => $error); //errores
				//intrudce el mensaje en el array de errores
				array_push($arrayNOMBREPROFESOR, $array);

				//establece correcto a false
				$correcto = false;
		
			}//fin comprobación nº letras >30
			//si no se cumple la expresión regular
			if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜïÏ]+(\s*[a-zA-ZA-ZñÑáéíóúÁÉÍÓÚüÜïÏ]*)+$/",$this->nombreProfesor)){

				//guarda mensaje de error
				$error = 'Solo están permitidas alfabéticos';
				$array = array( 'nombreatributo' =>$this->nombreProfesor, 'codigoincidencia' =>'00030', 'mensajeerror' => $error);//error
				//añade el error al array
				array_push($arrayNOMBREPROFESOR, $array);

				//establece correcto a falso
				$correcto = false;
		
			}//fin comprobación expresión regular
			//comprobacion errores
			if($correcto==true){
				//devuelve el valor de correcto
				return $correcto;
				}else{ //si errores
					return $arrayNOMBREPROFESOR;
				} //fin
		}//fin función comprobar_NOMBREPROFESOR()


		/* ****************************************************************************************************************************** */

/* function Comprobar_APELLIDOSPROFESOR(): Comprueba el formato del NOMBREPROFESOR*/
		// devuelve un true o un false y rellena en caso de error el array de errores de datos
		function Comprobar_APELLIDOSPROFESOR(){
			$arrayAPELLIDOSPROFESOR=array(); //definicion de array temporal
			$correcto = true; //variable de control

			//si no cumple la expresión regular
			if(strlen($this->apellidosProfesor)==0 || $this->apellidosProfesor==null || preg_match("/(^\s+$)/", $this->apellidosProfesor)){
				$error = 'Atributo vacío'; //error
				$array = array('nombreatributo' => $this->apellidosProfesor, 'codigoincidencia' => '00001', 'mensajeerror' => $error); //array errores
				array_push($arrayAPELLIDOSPROFESOR, $array);
				$correcto=false;
			} //fin comprobacion vacio
			//si el nº de letras del nombre es menor que tres
			if (strlen($this->apellidosProfesor)<3){
				//mensaje de error
				$error = 'Valor de atributo no numérico demasiado corto';
				$array = array('nombreatributo' =>$this->apellidosProfesor, 'codigoincidencia' =>'00003', 'mensajeerror' => $error); //errores
				//introduce el mensaje en el rray de errores
				array_push($arrayAPELLIDOSPROFESOR, $array);

				//cambia correcto a false
				$correcto = false;

			}//fin comprobación longitud <3

			//si el nº de letras del nombre es mayor que 30
			if (strlen($this->apellidosProfesor)>30){

				//crea mensaje de error
				$error = 'Valor de atributo demasiado largo';
				$array = array('nombreatributo' =>$this->apellidosProfesor, 'codigoincidencia' =>'00002', 'mensajeerror' => $error); //errores
				//intrudce el mensaje en el array de errores
				array_push($arrayAPELLIDOSPROFESOR, $array);

				//establece correcto a false
				$correcto = false;
		
			}//fin comprobación nº letras >30
			//si no se cumple la expresión regular
			if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜïÏ]+(\s*[a-zA-ZA-ZñÑáéíóúÁÉÍÓÚüÜïÏ]*)+$/",$this->apellidosProfesor)){

				//guarda mensaje de error
				$error = 'Solo están permitidas alfabéticos';
				$array = array( 'nombreatributo' =>$this->apellidosProfesor, 'codigoincidencia' =>'00030', 'mensajeerror' => $error);//error
				//añade el error al array
				array_push($arrayAPELLIDOSPROFESOR, $array);

				//establece correcto a falso
				$correcto = false;
		
			}//fin comprobación expresión regular
			//comprobacion errores
			if($correcto==true){
				//devuelve el valor de correcto
				return $correcto;
				}else{ //si errores
					return $arrayAPELLIDOSPROFESOR;
				} //fin
		}//fin función comprobar_APELLIDOSPROFESOR()


		/* ****************************************************************************************************************************** */
/* function Comprobar_AREAPROFESOR(): Comprueba el formato del NOMBREPROFESOR*/
		// devuelve un true o un false y rellena en caso de error el array de errores de datos
		function Comprobar_AREAPROFESOR(){
			$arrayAREAPROFESOR=array(); //definicion de array temporal
			$correcto = true; //variable de control

			//si no cumple la expresión regular
			if(strlen($this->areaProfesor)==0 || $this->areaProfesor==null || preg_match("/(^\s+$)/", $this->areaProfesor)){
				$error = 'Atributo vacío'; //error
				$array = array('nombreatributo' => $this->areaProfesor, 'codigoincidencia' => '00001', 'mensajeerror' => $error); //array errores
				array_push($arrayAREAPROFESOR, $array);
				$correcto=false;
			} //fin comprobacion vacio
			//si el nº de letras del nombre es menor que tres
			if (strlen($this->areaProfesor)<3){
				//mensaje de error
				$error = 'Valor de atributo no numérico demasiado corto';
				$array = array('nombreatributo' =>$this->areaProfesor, 'codigoincidencia' =>'00003', 'mensajeerror' => $error); //errores
				//introduce el mensaje en el rray de errores
				array_push($arrayAREAPROFESOR, $array);

				//cambia correcto a false
				$correcto = false;

			}//fin comprobación longitud <3

			//si el nº de letras del nombre es mayor que 30
			if (strlen($this->areaProfesor)>60){

				//crea mensaje de error
				$error = 'Valor de atributo demasiado largo';
				$array = array('nombreatributo' =>$this->areaProfesor, 'codigoincidencia' =>'00002', 'mensajeerror' => $error); //errores
				//intrudce el mensaje en el array de errores
				array_push($arrayAREAPROFESOR, $array);

				//establece correcto a false
				$correcto = false;
		
			}//fin comprobación nº letras >30
			//si no se cumple la expresión regular
			if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜïÏ]+(\s*[a-zA-ZA-ZñÑáéíóúÁÉÍÓÚüÜïÏ]*)+$/",$this->areaProfesor)){

				//guarda mensaje de error
				$error = 'Solo están permitidas alfabéticos';
				$array = array( 'nombreatributo' =>$this->areaProfesor, 'codigoincidencia' =>'00030', 'mensajeerror' => $error);//error
				//añade el error al array
				array_push($arrayAREAPROFESOR, $array);

				//establece correcto a falso
				$correcto = false;
		
			}//fin comprobación expresión regular
			//comprobacion errores
			if($correcto==true){
				//devuelve el valor de correcto
				return $correcto;
				}else{ //si errores
					return $arrayAREAPROFESOR;
				} //fin
		}//fin función comprobar_AREAPROFESOR()


		/* ****************************************************************************************************************************** */
/* function Comprobar_DEPARTAMENTOPROFESOR(): Comprueba el formato del NOMBREPROFESOR*/
		// devuelve un true o un false y rellena en caso de error el array de errores de datos
		function Comprobar_DEPARTAMENTOPROFESOR(){
			$arrayDEPARTAMENTOPROFESOR=array(); //definicion de array temporal
			$correcto = true; //variable de control

			//si no cumple la expresión regular
			if(strlen($this->departamentoProfesor)==0 || $this->departamentoProfesor==null || preg_match("/(^\s+$)/", $this->departamentoProfesor)){
				$error = 'Atributo vacío'; //error
				$array = array('nombreatributo' => $this->departamentoProfesor, 'codigoincidencia' => '00001', 'mensajeerror' => $error); //array errores
				array_push($arrayDEPARTAMENTOPROFESOR, $array);
				$correcto=false;
			} //fin comprobacion vacio
			//si el nº de letras del nombre es menor que tres
			if (strlen($this->departamentoProfesor)<3){
				//mensaje de error
				$error = 'Valor de atributo no numérico demasiado corto';
				$array = array('nombreatributo' =>$this->departamentoProfesor, 'codigoincidencia' =>'00003', 'mensajeerror' => $error); //errores
				//introduce el mensaje en el rray de errores
				array_push($arrayDEPARTAMENTOPROFESOR, $array);

				//cambia correcto a false
				$correcto = false;

			}//fin comprobación longitud <3

			//si el nº de letras del nombre es mayor que 30
			if (strlen($this->departamentoProfesor)>60){

				//crea mensaje de error
				$error = 'Valor de atributo demasiado largo';
				$array = array('nombreatributo' =>$this->departamentoProfesor, 'codigoincidencia' =>'00002', 'mensajeerror' => $error); //errores
				//intrudce el mensaje en el array de errores
				array_push($arrayDEPARTAMENTOPROFESOR, $array);

				//establece correcto a false
				$correcto = false;
		
			}//fin comprobación nº letras >30
			//si no se cumple la expresión regular
			if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜïÏ]+(\s*[a-zA-ZA-ZñÑáéíóúÁÉÍÓÚüÜïÏ]*)+$/",$this->departamentoProfesor)){

				//guarda mensaje de error
				$error = 'Solo están permitidas alfabéticos';
				$array = array( 'nombreatributo' =>$this->departamentoProfesor, 'codigoincidencia' =>'00030', 'mensajeerror' => $error);//error
				//añade el error al array
				array_push($arrayDEPARTAMENTOPROFESOR, $array);

				//establece correcto a falso
				$correcto = false;
		
			}//fin comprobación expresión regular
			//comprobacion errores
			if($correcto==true){
				//devuelve el valor de correcto
				return $correcto;
				}else{ //si errores
					return $arrayDEPARTAMENTOPROFESOR;
				} //fin
		}//fin función comprobar_DEPARTAMENTOPROFESOR()
		/* ****************************************************************************************************************************** */




		/*Función ADD: Inserta en la tabla  de la bd los valores de los atributos del objeto. 
				  Comprueba si la clave/s está/n vacía/s y si existe ya en la tabla*/
		function ADD(){

			//sentencia sql que selecciona una tupla a partir de la clave
			$sql = "SELECT * FROM PROFESOR WHERE (DNI = '$this->dni')";

			//si no se puede ejecutar la select
			if (!$result = $this->mysqli->query($sql)){

				//devuelve mensaje de error
				return 'Error de gestor de base de datos';
		
			}//fin comprobación ejecución select

			//si existe el profesor
			if ($result->num_rows == 1){

				//devuelve mensaje de error
				return 'Inserción fallida: el elemento ya existe';
		
			}//fin comprobación existe profesor

			//si los datos están vacíos
		//	if(empty($this->dni) || empty($this->nombreProfesor) || empty($this->apellidosProfesor) || empty($this->areaProfesor) || empty($this->departamentoProfesor)){

				//mensaje de error
			//	return 'Los datos no pueden estar vacios';
			
		//	}//fin comprobación datos vacíos
//VALIDACIONES BACK
$temp = $this->Comprobar_atributos();
//comp
if(is_array($temp)){

	return $temp;
}//fin
			//sentencia sql que permite la inserción de un nuevo profesor con los datos recogidos
			$sql = "INSERT INTO PROFESOR (
			DNI,
			NOMBREPROFESOR,
			APELLIDOSPROFESOR,
			AREAPROFESOR,
			DEPARTAMENTOPROFESOR
			) 
			VALUES (
				'".$this->dni."',
				'".$this->nombreProfesor."',
				'".$this->apellidosProfesor."',
				'".$this->areaProfesor."',
				'".$this->departamentoProfesor."'
			)";

			//si la sentencia no se puede ejecutar
			if (!$this->mysqli->query($sql)) {

				//devuelve un mensaje de error
				return 'Error de gestor de base de datos';
		
			//si se peude ejecutar	
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
					  Si van vacios devuelve todos los profesores*/
		function SEARCH(){

			//sentencia sql de búsqueda de datos 
			$sql= "SELECT * FROM PROFESOR WHERE (
				DNI LIKE '%$this->dni%' AND 
				NOMBREPROFESOR LIKE '%$this->nombreProfesor%' AND 
				APELLIDOSPROFESOR LIKE '%$this->apellidosProfesor%' AND 
				AREAPROFESOR LIKE '%$this->areaProfesor%' AND
				DEPARTAMENTOPROFESOR LIKE '%$this->departamentoProfesor%'
				)";

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

			//variable de control
			$comprobacion = false;

			//sentencia sql que comprueba si hay un espacio asignado al profesor
			$sql= "SELECT * FROM PROF_ESPACIO WHERE (DNI='$this->dni')";

			//si la sentencia devuelve algún resultado
			if($this->mysqli->query($sql)->num_rows>0){

				//mensaje de error
				$resultado = 'Borrado no permitido: Hay un espacio asignado a este profesor';	
				
				//variable de control
				$comprobacion = true;

			}//fin comprobación espacio

			//sentencia sql que comprueba si hay titulaciones asignadas al profesor a eliminar
			$sql= "SELECT * FROM PROF_TITULACION WHERE (DNI='$this->dni')";

			//si la sentencia devuelve algún resultado
			if($this->mysqli->query($sql)->num_rows>0){

				//mensaje de error
				$resultado = 'Borrado no permitido: Hay un titulo asignado a este profesor';	
				
				//variable de control
				$comprobacion = true;

			}//fin comprobación titulación
//VALIDACIONES BACK
$temp = $this->Comprobar_DNI();
//comp
if(is_array($temp)){

	return $temp;
}//fin
			if($comprobacion != true){

   				//sentencia sql que permite el borrado de una tupla a partir de su clave
   				$sql = "DELETE FROM PROFESOR
   					WHERE( DNI = '$this->dni')";

   				//si no se puede ejecutar la sentencia
   				if ($this->mysqli->query($sql)){

					//devuelve un mensaje de confirmación
					$resultado = 'Borrado realizado con éxito';
				
				//si se puede ejecutar
				}else{

					//devuelve un mensaje de error
					$resultado = 'Error de gestor de base de datos';
			
				}//fin de comproción de ejecución correcta de la sentencia

			}//fin comprobación se puede eliminar

			//devuelve mensaje
			return $resultado;
			
		}//fin función delete

//------------------------------------------------------------------------------------------------------------------------

		// función RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
		function RellenaDatos(){
    
    		//sentencia sql que devuelve una tupla a partir de su clave
    		$sql = "SELECT *
				FROM PROFESOR
				WHERE (
					DNI = '$this->dni' 
				)";

			//si no se puede ejecutar la sentencia sql
			if (!$resultado = $this->mysqli->query($sql)){
			
				//devuelve mensaje de error
				return 'Error de gestor de base de datos';
		
			//si se puede ejecutar
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
			//if(empty($this->dni) || empty($this->nombreProfesor) || empty($this->apellidosProfesor) || empty($this->areaProfesor) || empty($this->departamentoProfesor)){

				//mensaje de error
			//	return 'Los datos no pueden estar vacios';
			
		//	}//fin comprobación datos vacíos
//VALIDACIONES BACK
$temp = $this->Comprobar_atributos();
//comp
if(is_array($temp)){

	return $temp;
}//fin
			//sentencia sql que permite la edición de una tupla
			$sql = "UPDATE PROFESOR SET  
						DNI = '$this->dni',
						NOMBREPROFESOR = '$this->nombreProfesor',
						APELLIDOSPROFESOR = '$this->apellidosProfesor',
						AREAPROFESOR = '$this->areaProfesor',
						DEPARTAMENTOPROFESOR = '$this->departamentoProfesor'
					WHERE (DNI = '$this->dni')" ;

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

	}//fin de clase

?> 