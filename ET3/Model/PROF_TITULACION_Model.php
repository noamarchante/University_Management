<?php

/*
	Archivo php
	Nombre: PROF_TITULACION_Model.php
	Autor: 	Noa López Marchante
	Fecha de creación: 09/10/2019 
	Función: Clase que define e implementa la estructura de prof_titulacion y sus funciones (add, delete,edit,update,search,showall,showcurrent)
*/

	class PROF_TITULACION_Model { //clase prof_titulacion

		//declaración de variables
		var $dni; //representa el dni con el que se identifica el profesor
		var $codTitulacion; //representa el código con el que se identifica la titulacion
		var $anhoAcademico; //representa el año academico de esa relación
		var $mysqli;//representa la BD

//------------------------------------------------------------------------------------------------------------------------

		//Constructor de la clase
		function __construct($dni,$codTitulacion,$anhoAcademico){
		
			//inicialización de variables
			$this->dni = $dni;
			$this->codTitulacion = $codTitulacion;
			$this->anhoAcademico = $anhoAcademico;
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
	if(is_array($this->Comprobar_CODTITULACION())){
		$this->erroresdatos = array_merge($this->erroresdatos, $this->Comprobar_CODTITULACION()); //errores
		$correcto=false;
	}//fin comprobacion password

	//comp
	if(is_array($this->Comprobar_ANHOACADEMICO())){
		$this->erroresdatos = array_merge($this->erroresdatos, $this->Comprobar_ANHOACADEMICO()); //errores
		$correcto=false;
	}//fin comprobacion password

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

	$letra = substr($this->dni, -1);//lertra
	$numeros = substr($this->dni, 0, -1);//num
	//comp
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
/* function Comprobar_CODTITULACION(): Comprueba el formato del CODTITULACION*/
		// devuelve un true o un false y rellena en caso de error el array de errores de datos
		function Comprobar_CODTITULACION(){
			$arrayCODTITULACION=array(); //definicion de array temporal
			$correcto = true; //variable de control

			//si no cumple la expresión regular
			if(strlen($this->codTitulacion)==0 || $this->codTitulacion==null || preg_match("/(^\s+$)/", $this->codTitulacion)){
				$error = 'Atributo vacío'; //error
				$array = array('nombreatributo' => $this->codTitulacion, 'codigoincidencia' => '00001', 'mensajeerror' => $error); //array errores
				array_push($arrayCODTITULACION, $array);
				$correcto=false;
			} //fin comprobacion vacio
			//si el nº de letras del nombre es menor que tres
			if (strlen($this->codTitulacion)<3){
				//mensaje de error
				$error = 'Valor de atributo no numérico demasiado corto';
				$array = array('nombreatributo' =>$this->codTitulacion, 'codigoincidencia' =>'00003', 'mensajeerror' => $error); //errores
				//introduce el mensaje en el rray de errores
				array_push($arrayCODTITULACION, $array);

				//cambia correcto a false
				$correcto = false;

			}//fin comprobación longitud <3

			//si el nº de letras del nombre es mayor que 30
			if (strlen($this->codTitulacion)>10){

				//crea mensaje de error
				$error = 'Valor de atributo demasiado largo';
				$array = array('nombreatributo' =>$this->codTitulacion, 'codigoincidencia' =>'00002', 'mensajeerror' => $error); //errores
				//intrudce el mensaje en el array de errores
				array_push($arrayCODTITULACION, $array);

				//establece correcto a false
				$correcto = false;
		
			}//fin comprobación nº letras >30
			//comp
			if (!preg_match("/^[\w]+$/",$this->codTitulacion)){

				//mensaje de error
				$error = 'Solo se permiten alfabéticos y números';
				$array =  array( 'nombreatributo' => $this->codTitulacion,'codigoincidencia' => '00060', 'mensajeerror' => $error); //errores
				//carga el error en el array de errores
				array_push($arrayCODTITULACION, $array);
				$correcto=false;
			} //fin comprobacion patron

			//comprobacion errores
			if($correcto==true){
				//devuelve el valor de correcto
				return $correcto;
				}else{ //si errores
					return $arrayCODTITULACION;
				} //fin
		}//fin función comprobar_CODTITULACION()

		/* ************************************************************************************************************************************************** */
/* function Comprobar_ANHOACADEMICO(): Comprueba el formato del ANHOACADEMICO*/
		// devuelve un true o un false y rellena en caso de error el array de errores de datos
		function Comprobar_ANHOACADEMICO(){
			$arrayANHOACADEMICO=array(); //definicion de array temporal
			$correcto = true; //variable de control

			//si no cumple la expresión regular
			if(strlen($this->anhoAcademico)==0 || $this->anhoAcademico==null || preg_match("/(^\s+$)/", $this->anhoAcademico)){
				$error = 'Atributo vacío'; //error
				$array = array('nombreatributo' => $this->anhoAcademico, 'codigoincidencia' => '00001', 'mensajeerror' => $error); //array errores
				array_push($arrayANHOACADEMICO, $array);
				$correcto=false;
			} //fin comprobacion vacio
			//si el nº de letras del nombre es menor que tres
			if (strlen($this->anhoAcademico)<3){
				//mensaje de error
				$error = 'Valor de atributo no numérico demasiado corto';
				$array = array('nombreatributo' =>$this->anhoAcademico, 'codigoincidencia' =>'00003', 'mensajeerror' => $error); //errores
				//introduce el mensaje en el rray de errores
				array_push($arrayANHOACADEMICO, $array);

				//cambia correcto a false
				$correcto = false;

			}//fin comprobación longitud <3

			//si el nº de letras del nombre es mayor que 30
			if (strlen($this->anhoAcademico)>9){

				//crea mensaje de error
				$error = 'Valor de atributo demasiado largo';
				$array = array('nombreatributo' =>$this->anhoAcademico, 'codigoincidencia' =>'00002', 'mensajeerror' => $error); //errores
				//intrudce el mensaje en el array de errores
				array_push($arrayANHOACADEMICO, $array);

				//establece correcto a false
				$correcto = false;
		
			}//fin comprobación nº letras >30
			//comp
			if (!preg_match("/[\d]{4}\-[\d]{4}/",$this->anhoAcademico)){

				//mensaje de error
				$error = 'Solo se permiten dddd-dddd';
				$array =  array( 'nombreatributo' => $this->anhoAcademico,'codigoincidencia' => '00110', 'mensajeerror' => $error); //errores
				//carga el error en el array de errores
				array_push($arrayANHOACADEMICO, $array);
				$correcto=false;
			} //fin comprobacion patron

			//comprobacion errores
			if($correcto==true){
				//devuelve el valor de correcto
				return $correcto;
				}else{ //si errores
					return $arrayANHOACADEMICO;
				} //fin
		}//fin función comprobar_anhoaCADEMICO()
/* ************************************************************************************************************************************************** */


		/*Función ADD: Inserta en la tabla  de la bd los valores de los atributos del objeto. 
				  Comprueba si la clave/s está/n vacía/s y si existe ya en la tabla*/
		function ADD(){

			//sentencia sql que selecciona una tupla a partir de la clave
			$sql = "SELECT * FROM PROF_TITULACION WHERE (DNI = '$this->dni' AND CODTITULACION = '$this->codTitulacion')";

			//si no se puede ejecutar la select
			if (!$result = $this->mysqli->query($sql)){

				//devuelve mensaje de error
				return 'Error de gestor de base de datos';
		
			}//fin comprobación ejecución select

			//si existe la relación
			if ($result->num_rows == 1){

				//devuelve mensaje de error
				return 'Inserción fallida: el elemento ya existe';
		
			}//fin comprobación existe relación

			//si los datos están vacíos
			if(empty($this->dni) || empty($this->codTitulacion) || empty($this->anhoAcademico)){

				//mensaje de error
				return 'Los datos no pueden estar vacios';
			
			}//fin comprobación datos vacíos
//VALIDACIONES BACK
$temp = $this->Comprobar_atributos();
//comp
if(is_array($temp)){

	return $temp;
}//fin
			//sentencia sql que devuelve las titulaciones
			$sql = "SELECT * FROM TITULACION WHERE CODTITULACION='$this->codTitulacion'";
			
			//si no existe la titulacion que se inserta en la relacion
			//if(($this->mysqli->query($sql))->num_rows==0){

				//mensaje de error
				//return 'La titulacion no existe';
				
			//}//fin comprobación existe la titulacion

			//sentencia sql que devuelve los profesores
			$sql = "SELECT * FROM PROFESOR WHERE DNI='$this->dni'";
			
			//si no existe el profesor que se inserta en la relacion
			if(($this->mysqli->query($sql))->num_rows==0){

				//mensaje de error
				return 'El profesor no existe';
				
			}//fin comprobación existe el profesor

			//sentencia sql que permite la inserción de una relacion con los datos recogidos
			$sql = "INSERT INTO PROF_TITULACION (
			DNI,
			CODTITULACION,
			ANHOACADEMICO
			) 
			VALUES (
				'".$this->dni."',
				'".$this->codTitulacion."',
				'".$this->anhoAcademico."'
			)";

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
					  Si van vacios devuelve todas las titulaciones*/
		function SEARCH(){

			//sentencia sql de búsqueda de datos 
			$sql= "SELECT * FROM PROF_TITULACION WHERE (
				DNI LIKE '%$this->dni%' AND
				CODTITULACION LIKE '%$this->codTitulacion%' AND 
				ANHOACADEMICO LIKE '%$this->anhoAcademico%'
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
//VALIDACIONES BACK
$temp = $this->Comprobar_CODTITULACION();
//comp
if(is_array($temp)){

	return $temp;
}//fin
   			//sentencia sql que permite el borrado de una tupla a partir de su clave
   			$sql = "DELETE FROM PROF_TITULACION
   				WHERE( DNI ='$this->dni' AND CODTITULACION = '$this->codTitulacion')";

   			//si se puede ejecutar la sentencia
   			if ($this->mysqli->query($sql)){

				//devuelve un mensaje de confirmación
				$resultado = 'Borrado realizado con éxito';
			
			//si no se puede ejecutar
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
				FROM PROF_TITULACION
				WHERE (DNI = '$this->dni' AND CODTITULACION = '$this->codTitulacion'
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
			//if(empty($this->dni) || empty($this->codTitulacion) || empty($this->anhoAcademico)){

				//mensaje de error
			//	return 'Los datos no pueden estar vacios';
			
			//}//fin comprobación datos vacíos

			//sentencia sql que devuelve las titulaciones
			$sql = "SELECT * FROM TITULACION WHERE CODTITULACION='$this->codTitulacion'";
			
			//si no existe la titulacion que se inserta en la relacion
			if(($this->mysqli->query($sql))->num_rows==0){

				//mensaje de error
				return 'La titulacion no existe';
				
			}//fin comprobación existe la titulacion

			//sentencia sql que devuelve los profesores
			$sql = "SELECT * FROM PROFESOR WHERE DNI='$this->dni'";
			
			//si no existe el profesor que se inserta en la relacion
			if(($this->mysqli->query($sql))->num_rows==0){

				//mensaje de error
				return 'El profesor no existe';
				
			}//fin comprobación existe el profesor
			//VALIDACIONES BACK
//VALIDACIONES BACK
$temp = $this->Comprobar_atributos();
//comp
if(is_array($temp)){

	return $temp;
}//fin
			//sentencia sql que permite la edición de una tupla
			$sql = "UPDATE PROF_TITULACION SET  
						DNI = '$this->dni',
						CODTITULACION = '$this->codTitulacion',
						ANHOACADEMICO = '$this->anhoAcademico'
					WHERE (DNI = '$this->dni' AND CODTITULACION = '$this->codTitulacion')" ;

			//si la sentencia se puede ejecutar
			if ($this->mysqli->query($sql)){

				//guarda mensaje de confirmación
				$resultado = 'Actualización realizada con éxito';
			
			//si no se puede ejecutar
			}else{

				//guarda mensaje de error
				$resultado = 'Error de gestor de base de datos';
		
			}//fin comprobación

			//devuelve mensaje
			return $resultado;

		} //fin función EDIT

	}//fin de clase

?> 