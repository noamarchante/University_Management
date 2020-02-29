<?php

/*
	Archivo php
	Nombre: TITULACION_Model.php
	Autor: 	Noa López Marchante
	Fecha de creación: 08/10/2019 
	Función: Clase que define e implementa la estructura del titulación y sus funciones (add, delete,edit,update,search,showall,showcurrent)
*/

	class TITULACION_Model { //clase titulacion

		//declaración de variables
		var $codTitulacion; //representa el código que identifica la titulación
		var $codCentro; //representa el código que identifica el centro
		var $nombreTitulacion; //representa el nombre de la titulacion
		var $responsableTitulacion; //representa el responsable de la titulacion
		var $mysqli; //represeta la BD

//------------------------------------------------------------------------------------------------------------------------

		//Constructor de la clase
		function __construct($codTitulacion,$codCentro,$nombreTitulacion,$responsableTitulacion){
		
			//inicialización de variables
			$this->codTitulacion = $codTitulacion;
			$this->codCentro = $codCentro;
			$this->nombreTitulacion = $nombreTitulacion;
			$this->responsableTitulacion = $responsableTitulacion;
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
			if (is_array($this->Comprobar_CODTITULACION())){
				$this->erroresdatos = array_merge($this->erroresdatos, $this->Comprobar_CODTITULACION()); //errores
				$correcto=false; 
			} //fin comprobacion login
			
			//si comprobar password devuelve un array
			if(is_array($this->Comprobar_CODCENTRO())){
				$this->erroresdatos = array_merge($this->erroresdatos, $this->Comprobar_CODCENTRO()); //errores
				$correcto=false;
			}//fin comprobacion password

			//comp
			if(is_array($this->Comprobar_NOMBRETITULACION())){
				$this->erroresdatos = array_merge($this->erroresdatos, $this->Comprobar_NOMBRETITULACION()); //errores
				$correcto=false;
			}//fin comprobacion password

			//si comprobar nombre devuelve un array
			if (is_array($this->Comprobar_RESPONSABLETITULACION())){
				$this->erroresdatos = array_merge($this->erroresdatos, $this->Comprobar_RESPONSABLETITULACION()); //errores
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


		/* ****************************************************************************************************************************** */

		/* function Comprobar_CODCENTRO(): Comprueba el formato del CODCENTRO*/
		// devuelve un true o un false y rellena en caso de error el array de errores de datos
		function Comprobar_CODCENTRO(){
			$arrayCODCENTRO=array(); //definicion de array temporal
			$correcto = true; //variable de control

			//si no cumple la expresión regular
			if(strlen($this->codCentro)==0 || $this->codCentro==null || preg_match("/(^\s+$)/", $this->codCentro)){
				$error = 'Atributo vacío'; //error
				$array = array('nombreatributo' => $this->codCentro, 'codigoincidencia' => '00001', 'mensajeerror' => $error); //array errores
				array_push($arrayCODCENTRO, $array);
				$correcto=false;
			} //fin comprobacion vacio
			//si el nº de letras del nombre es menor que tres
			if (strlen($this->codCentro)<3){
				//mensaje de error
				$error = 'Valor de atributo no numérico demasiado corto';
				$array = array('nombreatributo' =>$this->codCentro, 'codigoincidencia' =>'00003', 'mensajeerror' => $error); //errores
				//introduce el mensaje en el rray de errores
				array_push($arrayCODCENTRO, $array);

				//cambia correcto a false
				$correcto = false;

			}//fin comprobación longitud <3

			//si el nº de letras del nombre es mayor que 30
			if (strlen($this->codCentro)>10){

				//crea mensaje de error
				$error = 'Valor de atributo demasiado largo';
				$array = array('nombreatributo' =>$this->codCentro, 'codigoincidencia' =>'00002', 'mensajeerror' => $error); //errores
				//intrudce el mensaje en el array de errores
				array_push($arrayCODCENTRO, $array);

				//establece correcto a false
				$correcto = false;
		
			}//fin comprobación nº letras >30
			//comp
			if (!preg_match("/[\w\-]+/",$this->codCentro)){

				//mensaje de error
				$error = 'Solo están permitidas alfabéticos, números y el “-”';
				$array =  array( 'nombreatributo' => $this->codCentro,'codigoincidencia' => '00040', 'mensajeerror' => $error); //errores
				//carga el error en el array de errores
				array_push($arrayCODCENTRO, $array);
				$correcto=false;
			} //fin comprobacion patron

			//comprobacion errores
			if($correcto==true){
				//devuelve el valor de correcto
				return $correcto;
				}else{ //si errores
					return $arrayCODCENTRO;
				} //fin
		}//fin función comprobar_CODCENTRO()


		/* ****************************************************************************************************************************** */
	
	/* function Comprobar_NOMBRETITULACION(): Comprueba el formato del NOMBRETITULACION*/
		// devuelve un true o un false y rellena en caso de error el array de errores de datos
		function Comprobar_NOMBRETITULACION(){
			$arrayNOMBRETITULACION=array(); //definicion de array temporal
			$correcto = true; //variable de control

			//si no cumple la expresión regular
			if(strlen($this->nombreTitulacion)==0 || $this->nombreTitulacion==null || preg_match("/(^\s+$)/", $this->nombreTitulacion)){
				$error = 'Atributo vacío'; //error
				$array = array('nombreatributo' => $this->nombreTitulacion, 'codigoincidencia' => '00001', 'mensajeerror' => $error); //array errores
				array_push($arrayNOMBRETITULACION, $array);
				$correcto=false;
			} //fin comprobacion vacio
			//si el nº de letras del nombre es menor que tres
			if (strlen($this->nombreTitulacion)<3){
				//mensaje de error
				$error = 'Valor de atributo no numérico demasiado corto';
				$array = array('nombreatributo' =>$this->nombreTitulacion, 'codigoincidencia' =>'00003', 'mensajeerror' => $error); //errores
				//introduce el mensaje en el rray de errores
				array_push($arrayNOMBRETITULACION, $array);

				//cambia correcto a false
				$correcto = false;

			}//fin comprobación longitud <3

			//si el nº de letras del nombre es mayor que 30
			if (strlen($this->nombreTitulacion)>50){

				//crea mensaje de error
				$error = 'Valor de atributo demasiado largo';
				$array = array('nombreatributo' =>$this->nombreTitulacion, 'codigoincidencia' =>'00002', 'mensajeerror' => $error); //errores
				//intrudce el mensaje en el array de errores
				array_push($arrayNOMBRETITULACION, $array);

				//establece correcto a false
				$correcto = false;
		
			}//fin comprobación nº letras >30
			//si no se cumple la expresión regular
			if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜïÏ]+(\s*[a-zA-ZA-ZñÑáéíóúÁÉÍÓÚüÜïÏ]*)+$/",$this->nombreTitulacion)){

		//guarda mensaje de error
		$error = 'Solo están permitidas alfabéticos';
		$array = array( 'nombreatributo' =>$this->nombreTitulacion, 'codigoincidencia' =>'00030', 'mensajeerror' => $error);//error
		//añade el error al array
		array_push($arrayNOMBRETITULACION, $array);

		//establece correcto a falso
		$correcto = false;

	}//fin comprobación expresión regular

			//comprobacion errores
			if($correcto==true){
				//devuelve el valor de correcto
				return $correcto;
				}else{ //si errores
					return $arrayNOMBRETITULACION;
				} //fin
		}//fin función comprobar_NOMBRETITULACION()


		/* ****************************************************************************************************************************** */
	
	/* function Comprobar_RESPONSABLETITULACION(): Comprueba el formato del REPONSABLETITULACION*/
		// devuelve un true o un false y rellena en caso de error el array de errores de datos
		function Comprobar_RESPONSABLETITULACION(){
			$arrayRESPONSABLETITULACION=array(); //definicion de array temporal
			$correcto = true; //variable de control

			//si no cumple la expresión regular
			if(strlen($this->responsableTitulacion)==0 || $this->responsableTitulacion==null || preg_match("/(^\s+$)/", $this->responsableTitulacion)){
				$error = 'Atributo vacío'; //error
				$array = array('nombreatributo' => $this->responsableTitulacion, 'codigoincidencia' => '00001', 'mensajeerror' => $error); //array errores
				array_push($arrayRESPONSABLETITULACION, $array);
				$correcto=false;
			} //fin comprobacion vacio
			//si el nº de letras del nombre es menor que tres
			if (strlen($this->responsableTitulacion)<3){
				//mensaje de error
				$error = 'Valor de atributo no numérico demasiado corto';
				$array = array('nombreatributo' =>$this->responsableTitulacion, 'codigoincidencia' =>'00003', 'mensajeerror' => $error); //errores
				//introduce el mensaje en el rray de errores
				array_push($arrayRESPONSABLETITULACION, $array);

				//cambia correcto a false
				$correcto = false;

			}//fin comprobación longitud <3

			//si el nº de letras del nombre es mayor que 30
			if (strlen($this->responsableTitulacion)>60){

				//crea mensaje de error
				$error = 'Valor de atributo demasiado largo';
				$array = array('nombreatributo' =>$this->responsableTitulacion, 'codigoincidencia' =>'00002', 'mensajeerror' => $error); //errores
				//intrudce el mensaje en el array de errores
				array_push($arrayRESPONSABLETITULACION, $array);

				//establece correcto a false
				$correcto = false;
		
			}//fin comprobación nº letras >30
			//si no se cumple la expresión regular
			if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜïÏ]+(\s*[a-zA-ZA-ZñÑáéíóúÁÉÍÓÚüÜïÏ]*)+$/",$this->responsableTitulacion)){

		//guarda mensaje de error
		$error = 'Solo están permitidas alfabéticos';
		$array = array( 'nombreatributo' =>$this->responsableTitulacion, 'codigoincidencia' =>'00030', 'mensajeerror' => $error);//error
		//añade el error al array
		array_push($arrayRESPONSABLETITULACION, $array);

		//establece correcto a falso
		$correcto = false;

	}//fin comprobación expresión regular

			//comprobacion errores
			if($correcto==true){
				//devuelve el valor de correcto
				return $correcto;
				}else{ //si errores
					return $arrayRESPONSABLETITULACION;
				} //fin
		}//fin función comprobar_CODTITULACION()


		/* ****************************************************************************************************************************** */
	
	
		/*Función ADD: Inserta en la tabla  de la bd los valores de los atributos del objeto. 
				  Comprueba si la clave/s está/n vacía/s y si existe ya en la tabla*/
		function ADD(){

			//sentencia sql que selecciona una tupla a partir de la clave
			$sql = "SELECT * FROM TITULACION WHERE (CODTITULACION = '$this->codTitulacion')";

			//si no se puede ejecutar la select
			if (!$result = $this->mysqli->query($sql)){

				//devuelve mensaje de error
				return 'Error de gestor de base de datos';
		
			}//fin comprobación ejecución select

			//si existe el titulacion
			if ($result->num_rows == 1){

				//devuelve mensaje de error
				return 'Inserción fallida: el elemento ya existe';
		
			}//fin comprobación existe titulacion

			//si los datos están vacíos
			//if(empty($this->codTitulacion) || empty($this->codCentro) || empty($this->nombreTitulacion) || empty($this->responsableTitulacion)){

				//mensaje de error
				//return 'Los datos no pueden estar vacios';
			
			//}//fin comprobación datos vacíos

			//sentencia sql que devuelve los centros
			$sql = "SELECT * FROM CENTRO WHERE CODCENTRO='$this->codCentro'";
			
			//si no existe el centro en el que se inserta la titulacion
			if(($this->mysqli->query($sql))->num_rows==0){

				//mensaje de error
				return 'El centro no existe';
				
			}//fin comprobación existe el edificio

			//VALIDACIONES BACK
$temp = $this->Comprobar_atributos();
//comp
if(is_array($temp)){

	return $temp;
}//fin

			//sentencia sql que permite la inserción de una nueva titulacion con los datos recogidos
			$sql = "INSERT INTO TITULACION (
			CODTITULACION,
			CODCENTRO,
			NOMBRETITULACION,
			RESPONSABLETITULACION
			) 
			VALUES (
				'".$this->codTitulacion."',
				'".$this->codCentro."',
				'".$this->nombreTitulacion."',
				'".$this->responsableTitulacion."'
			)";

			//si la sentencia se puede ejecutar
			if (!$this->mysqli->query($sql)) {

				//devuelve un mensaje de error
				return 'Error de gestor de base de datos';
		
			//si no se puede eejcutar	
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
			$sql= "SELECT * FROM TITULACION WHERE (
				CODTITULACION LIKE '%$this->codTitulacion%' AND 
				CODCENTRO LIKE '%$this->codCentro%' AND 
				NOMBRETITULACION LIKE '%$this->nombreTitulacion%' AND 
				RESPONSABLETITULACION LIKE '%$this->responsableTitulacion%'
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

			//sentencia sql que comprueba si hay profesores asignadas a la titulacion a eliminar
			$sql= "SELECT * FROM PROF_TITULACION WHERE (CODTITULACION='$this->codTitulacion')";

			//si la sentencia devuelve algún resultado
			if($this->mysqli->query($sql)->num_rows>0){

				//mensaje de error
				$resultado = 'Borrado no permitido: Hay profesores asignados a esta titulacion';	
				//variable de control
				$comprobacion = true;

			}//fin comprobación profesor
//VALIDACIONES BACK
$temp = $this->Comprobar_CODTITULACION();
//comp
if(is_array($temp)){

	return $temp;
}//fin
			if($comprobacion != true){

   				//sentencia sql que permite el borrado de una tupla a partir de su clave
   				$sql = "DELETE FROM TITULACION
   					WHERE( CODTITULACION = '$this->codTitulacion')";

   				//si se puede ejecutar la sentencia
   				if ($this->mysqli->query($sql)){

					//devuelve un mensaje de confirmación
					$resultado = 'Borrado realizado con éxito';
			
				//si no se puede ejecutar
				}else{

					//devuelve un mensaje de error
					$resultado = 'Error de gestor de base de datos';
			
				}//fin de comproción de ejecución correcta de la sentencia

			}//fin comprobacion posible borrar
			
			//devuelve mensaje
			return $resultado;

		}//fin función delete

//------------------------------------------------------------------------------------------------------------------------

		// función RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
		function RellenaDatos(){
    
    		//sentencia sql que devuelve una tupla a partir de su clave
    		$sql = "SELECT *
				FROM TITULACION
				WHERE (CODTITULACION = '$this->codTitulacion'
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
			//if(empty($this->codTitulacion) || empty($this->codCentro) || empty($this->nombreTitulacion) || empty($this->responsableTitulacion)){

				//mensaje de error
				//return 'Los datos no pueden estar vacios';
			
			//}//fin comprobación datos vacíos

			//sentencia sql que devuelve los centros
			$sql = "SELECT * FROM CENTRO WHERE CODCENTRO='$this->codCentro'";
			
			//si no existe el centro en el que se inserta la titulacion
			if(($this->mysqli->query($sql))->num_rows==0){

				//mensaje de error
				return 'El centro no existe';
				
			}//fin comprobación existe el centro

			//VALIDACIONES BACK
$temp = $this->Comprobar_atributos();
//comp
if(is_array($temp)){

	return $temp;
}//fin

			//sentencia sql que permite la edición de una tupla
			$sql = "UPDATE TITULACION SET  
						CODTITULACION = '$this->codTitulacion',
						CODCENTRO = '$this->codCentro',
						NOMBRETITULACION = '$this->nombreTitulacion',
						RESPONSABLETITULACION = '$this->responsableTitulacion'
					WHERE (CODTITULACION = '$this->codTitulacion')" ;

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