<?php

/*
	Archivo php
	Nombre: CENTRO_Model.php
	Autor: 	Noa López Marchante
	Fecha de creación: 06/10/2019 
	Función: Clase que define e implementa la estructura del centro y sus funciones (add, delete,edit,update,search,showall,showcurrent)
*/

	class CENTRO_Model { //clase centro

		//declaración de variables
		var $codCentro; //representa el código con el que se identifica el centro 
		var $codEdificio; //representa el código con el que se identifica el edificio
		var $nombreCentro; //representa el nombre del centro
		var $direccionCentro; //representa la dirección del centro
		var $responsableCentro; //representa el responsable del centro
		var $mysqli; //representa a la BD

//------------------------------------------------------------------------------------------------------------------------

		//Constructor de la clase
		function __construct($codCentro,$codEdificio,$nombreCentro,$direccionCentro,$responsableCentro){
		
			//inicialización de variables
			$this->codCentro = $codCentro;
			$this->codEdificio = $codEdificio;
			$this->nombreCentro = $nombreCentro;
			$this->direccionCentro = $direccionCentro;
			$this->responsableCentro = $responsableCentro;
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
	//si comprobar login devuelve un arrY
	if(is_array($this->Comprobar_CODCENTRO())){
		$this->erroresdatos = array_merge($this->erroresdatos, $this->Comprobar_CODCENTRO()); //errores
		$correcto=false;
	}//fin comprobacion password
	//comp
	if(is_array($this->Comprobar_CODEDIFICIO())){
		$this->erroresdatos = array_merge($this->erroresdatos, $this->Comprobar_CODEDIFICIO()); //errores
		$correcto=false;
	}//fin comprobacion password
	//comp
	if(is_array($this->Comprobar_NOMBRECENTRO())){
		$this->erroresdatos = array_merge($this->erroresdatos, $this->Comprobar_NOMBRECENTRO()); //errores
		$correcto=false;
	}//fin comprobacion password
	//COMPROBAR DIR
	if(is_array($this->Comprobar_DIRECCIONCENTRO())){
		$this->erroresdatos = array_merge($this->erroresdatos, $this->Comprobar_DIRECCIONCENTRO()); //errores
		$correcto=false;
	}//fin comprobacion password
	//COMPROBAR DIR
	if(is_array($this->Comprobar_RESPONSABLECENTRO())){
		$this->erroresdatos = array_merge($this->erroresdatos, $this->Comprobar_RESPONSABLECENTRO()); //errores
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
/* function Comprobar_CODEDIFICIO(): Comprueba el formato del CODEDIFICIO*/
		// devuelve un true o un false y rellena en caso de error el array de errores de datos
		function Comprobar_CODEDIFICIO(){
			$arrayCODEDIFICIO=array(); //definicion de array temporal
			$correcto = true; //variable de control

			//si no cumple la expresión regular
			if(strlen($this->codEdificio)==0 || $this->codEdificio==null || preg_match("/(^\s+$)/", $this->codEdificio)){
				$error = 'Atributo vacío'; //error
				$array = array('nombreatributo' => $this->codEdificio, 'codigoincidencia' => '00001', 'mensajeerror' => $error); //array errores
				array_push($arrayCODEDIFICIO, $array);
				$correcto=false;
			} //fin comprobacion vacio
			//si el nº de letras del nombre es menor que tres
			if (strlen($this->codEdificio)<3){
				//mensaje de error
				$error = 'Valor de atributo no numérico demasiado corto';
				$array = array('nombreatributo' =>$this->codEdificio, 'codigoincidencia' =>'00003', 'mensajeerror' => $error); //errores
				//introduce el mensaje en el rray de errores
				array_push($arrayCODEDIFICIO, $array);

				//cambia correcto a false
				$correcto = false;

			}//fin comprobación longitud <3

			//si el nº de letras del nombre es mayor que 30
			if (strlen($this->codEdificio)>10){

				//crea mensaje de error
				$error = 'Valor de atributo demasiado largo';
				$array = array('nombreatributo' =>$this->codEdificio, 'codigoincidencia' =>'00002', 'mensajeerror' => $error); //errores
				//intrudce el mensaje en el array de errores
				array_push($arrayCODEDIFICIO, $array);

				//establece correcto a false
				$correcto = false;
		
			}//fin comprobación nº letras >30
			
			//comp
			if (!preg_match("/[\w\-]+/",$this->codEdificio)){

				//mensaje de error
				$error = 'Solo están permitidas alfabéticos, números y el “-”';
				$array =  array( 'nombreatributo' => $this->codEdificio,'codigoincidencia' => '00040', 'mensajeerror' => $error); //errores
				//carga el error en el array de errores
				array_push($arrayCODEDIFICIO, $array);
				$correcto=false;
			} //fin comprobacion patron

			//comprobacion errores
			if($correcto==true){
				//devuelve el valor de correcto
				return $correcto;
				}else{ //si errores
					return $arrayCODEDIFICIO;
				} //fin
		}//fin función comprobar_CODEDIFICIO()

		/* ************************************************************************************************************************************************** */

/* function Comprobar_NOMBRECENTRO(): Comprueba el formato del NOMBREPROFESOR*/
		// devuelve un true o un false y rellena en caso de error el array de errores de datos
		function Comprobar_NOMBRECENTRO(){
			$arrayNOMBREECENTRO=array(); //definicion de array temporal
			$correcto = true; //variable de control

			//si no cumple la expresión regular
			if(strlen($this->nombreCentro)==0 || $this->nombreCentro==null || preg_match("/(^\s+$)/", $this->nombreCentro)){
				$error = 'Atributo vacío'; //error
				$array = array('nombreatributo' => $this->nombreCentro, 'codigoincidencia' => '00001', 'mensajeerror' => $error); //array errores
				array_push($arrayNOMBREECENTRO, $array);
				$correcto=false;
			} //fin comprobacion vacio
			//si el nº de letras del nombre es menor que tres
			if (strlen($this->nombreCentro)<3){
				//mensaje de error
				$error = 'Valor de atributo no numérico demasiado corto';
				$array = array('nombreatributo' =>$this->nombreCentro, 'codigoincidencia' =>'00003', 'mensajeerror' => $error); //errores
				//introduce el mensaje en el rray de errores
				array_push($arrayNOMBREECENTRO, $array);

				//cambia correcto a false
				$correcto = false;

			}//fin comprobación longitud <3

			//si el nº de letras del nombre es mayor que 30
			if (strlen($this->nombreCentro)>50){

				//crea mensaje de error
				$error = 'Valor de atributo demasiado largo';
				$array = array('nombreatributo' =>$this->nombreCentro, 'codigoincidencia' =>'00002', 'mensajeerror' => $error); //errores
				//intrudce el mensaje en el array de errores
				array_push($arrayNOMBREECENTRO, $array);

				//establece correcto a false
				$correcto = false;
		
			}//fin comprobación nº letras >30
			//si no se cumple la expresión regular
			if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜïÏ]+(\s*[a-zA-ZA-ZñÑáéíóúÁÉÍÓÚüÜïÏ]*)+$/",$this->nombreCentro)){

				//guarda mensaje de error
				$error = 'Solo están permitidas alfabéticos';
				$array = array( 'nombreatributo' =>$this->nombreCentro, 'codigoincidencia' =>'00030', 'mensajeerror' => $error);//error
				//añade el error al array
				array_push($arrayNOMBREECENTRO, $array);

				//establece correcto a falso
				$correcto = false;
		
			}//fin comprobación expresión regular
			//comprobacion errores
			if($correcto==true){
				//devuelve el valor de correcto
				return $correcto;
				}else{ //si errores
					return $arrayNOMBREECENTRO;
				} //fin
		}//fin función comprobar_NOMBREPROFESOR()

/* ************************************************************************************************************************************************** */
/* function Comprobar_DIRECCIONEDIFICIO(): Comprueba el formato del NOMBREPROFESOR*/
		// devuelve un true o un false y rellena en caso de error el array de errores de datos
		function Comprobar_DIRECCIONCENTRO(){
			$arrayDIRECCIONCENTRO=array(); //definicion de array temporal
			$correcto = true; //variable de control

			//si no cumple la expresión regular
			if(strlen($this->direccionCentro)==0 || $this->direccionCentro==null || preg_match("/(^\s+$)/", $this->direccionCentro)){
				$error = 'Atributo vacío'; //error
				$array = array('nombreatributo' => $this->direccionCentro, 'codigoincidencia' => '00001', 'mensajeerror' => $error); //array errores
				array_push($arrayDIRECCIONCENTRO, $array);
				$correcto=false;
			} //fin comprobacion vacio
			//si el nº de letras del nombre es menor que tres
			if (strlen($this->direccionCentro)<3){
				//mensaje de error
				$error = 'Valor de atributo no numérico demasiado corto';
				$array = array('nombreatributo' =>$this->direccionCentro, 'codigoincidencia' =>'00003', 'mensajeerror' => $error); //errores
				//introduce el mensaje en el rray de errores
				array_push($arrayDIRECCIONCENTRO, $array);

				//cambia correcto a false
				$correcto = false;

			}//fin comprobación longitud <3

			//si el nº de letras del nombre es mayor que 30
			if (strlen($this->direccionCentro)>150){

				//crea mensaje de error
				$error = 'Valor de atributo demasiado largo';
				$array = array('nombreatributo' =>$this->direccionCentro, 'codigoincidencia' =>'00002', 'mensajeerror' => $error); //errores
				//intrudce el mensaje en el array de errores
				array_push($arrayDIRECCIONCENTRO, $array);

				//establece correcto a false
				$correcto = false;
		
			}//fin comprobación nº letras >30
			//si no se cumple la expresión regular
			if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜïÏ]+[\s]?[a-zA-ZñÑáéíóúÁÉÍÓÚüÜïÏ\d\-\/ºª]+[\s]?[a-zA-ZñÑáéíóúÁÉÍÓÚüÜïÏ\d\-\/ºª]+$/",$this->direccionCentro)){

				//guarda mensaje de error
				$error = 'Solo están permitidas alfabéticos y espacios, números y los símbolos  “- / º ª”';
				$array = array( 'nombreatributo' =>$this->direccionCentro, 'codigoincidencia' =>'00050', 'mensajeerror' => $error);//error
				//añade el error al array
				array_push($arrayDIRECCIONCENTRO, $array);

				//establece correcto a falso
				$correcto = false;
		
			}//fin comprobación expresión regular
			//comprobacion errores
			if($correcto==true){
				//devuelve el valor de correcto
				return $correcto;
				}else{ //si errores
					return $arrayDIRECCIONCENTRO;
				} //fin
		}//fin función comprobar_NOMBREPROFESOR()

/* ************************************************************************************************************************************************** */


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

		/* ************************************************************************************************************************************************** */

		/* function Comprobar_RESPONSABLECENTRO(): Comprueba el formato del REPONSABLETITULACION*/
		// devuelve un true o un false y rellena en caso de error el array de errores de datos
		function Comprobar_RESPONSABLECENTRO(){
			$arrayRESPONSABLECENTRO=array(); //definicion de array temporal
			$correcto = true; //variable de control

			//si no cumple la expresión regular
			if(strlen($this->responsableCentro)==0 || $this->responsableCentro==null || preg_match("/(^\s+$)/", $this->responsableCentro)){
				$error = 'Atributo vacío'; //error
				$array = array('nombreatributo' => $this->responsableCentro, 'codigoincidencia' => '00001', 'mensajeerror' => $error); //array errores
				array_push($arrayRESPONSABLECENTRO, $array);
				$correcto=false;
			} //fin comprobacion vacio
			//si el nº de letras del nombre es menor que tres
			if (strlen($this->responsableCentro)<3){
				//mensaje de error
				$error = 'Valor de atributo no numérico demasiado corto';
				$array = array('nombreatributo' =>$this->responsableCentro, 'codigoincidencia' =>'00003', 'mensajeerror' => $error); //errores
				//introduce el mensaje en el rray de errores
				array_push($arrayRESPONSABLECENTRO, $array);

				//cambia correcto a false
				$correcto = false;

			}//fin comprobación longitud <3

			//si el nº de letras del nombre es mayor que 30
			if (strlen($this->responsableCentro)>60){

				//crea mensaje de error
				$error = 'Valor de atributo demasiado largo';
				$array = array('nombreatributo' =>$this->responsableCentro, 'codigoincidencia' =>'00002', 'mensajeerror' => $error); //errores
				//intrudce el mensaje en el array de errores
				array_push($arrayRESPONSABLECENTRO, $array);

				//establece correcto a false
				$correcto = false;
		
			}//fin comprobación nº letras >30
			//si no se cumple la expresión regular
	
			//comprobacion
			if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜïÏ]+(\s*[a-zA-ZA-ZñÑáéíóúÁÉÍÓÚüÜïÏ]*)+$/",$this->responsableCentro)){

		//guarda mensaje de error
		$error = 'Solo están permitidas alfabéticos';
		$array = array( 'nombreatributo' =>$this->responsableCentro, 'codigoincidencia' =>'00030', 'mensajeerror' => $error);//error
		//añade el error al array
		array_push($arrayRESPONSABLECENTRO, $array);

		//establece correcto a falso
		$correcto = false;

	}//fin comprobación expresión regular

			//comprobacion errores
			if($correcto==true){
				//devuelve el valor de correcto
				return $correcto;
				}else{ //si errores
					return $arrayRESPONSABLECENTRO;
				} //fin
		}//fin función comprobar_CODTITULACION()


		/* ****************************************************************************************************************************** */
	

		/*Función ADD: Inserta en la tabla  de la bd los valores de los atributos del objeto. 
				  Comprueba si la clave/s está/n vacía/s y si existe ya en la tabla*/
		function ADD(){

			//sentencia sql que selecciona una tupla a partir de la clave
			$sql = "SELECT * FROM CENTRO WHERE (CODCENTRO = '$this->codCentro')";

			//si no se puede ejecutar la select
			if (!$result = $this->mysqli->query($sql)){

				//devuelve mensaje de error
				return 'Error de gestor de base de datos';
		
			}//fin comprobación ejecución select

			//si existe el centro
			if ($result->num_rows == 1){

				//devuelve mensaje de error
				return 'Inserción fallida: el elemento ya existe';
		
			}//fin comprobación existe centro

			//si los datos están vacíos
		//	if(empty($this->codCentro) || empty($this->codEdificio) || empty($this->nombreCentro) || empty($this->direccionCentro) || empty($this->responsableCentro)){

				//mensaje de error
			//return 'Los datos no pueden estar vacios';
			
			//}//fin comprobación datos vacíos

			//sentencia sql que devuelve los edificios
			$sql = "SELECT * FROM EDIFICIO WHERE CODEDIFICIO='$this->codEdificio'";
			
			//si no existe el edificio en el que se inserta el centro
			if(($this->mysqli->query($sql))->num_rows==0){

				//mensaje de error
				return 'El edificio no existe';
				
			}//fin comprobación existe el edificio
//VALIDACIONES BACK
$temp = $this->Comprobar_atributos();
//comp
if(is_array($temp)){

	return $temp;
}//fin
			//sentencia sql que permite la inserción de un nuevo centro con los datos recogidos
			$sql = "INSERT INTO CENTRO (
			CODCENTRO,
			CODEDIFICIO,
			NOMBRECENTRO,
			DIRECCIONCENTRO,
			RESPONSABLECENTRO
			) 
			VALUES (
				'".$this->codCentro."',
				'".$this->codEdificio."',
				'".$this->nombreCentro."',
				'".$this->direccionCentro."',
				'".$this->responsableCentro."'
			)";

			//si la sentencia no se puede ejecutar
			if (!$this->mysqli->query($sql)) {

				//devuelve un mensaje de error
				return 'Error de gestor de base de datos';
		
			//si se puede ejecutar
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
					  Si van vacios devuelve todos los centros*/
		function SEARCH(){

			//sentencia sql de búsqueda de datos 
			$sql= "SELECT * FROM CENTRO WHERE (
				CODCENTRO LIKE '%$this->codCentro%' AND 
				CODEDIFICIO LIKE '%$this->codEdificio%' AND 
				NOMBRECENTRO LIKE '%$this->nombreCentro%' AND 
				DIRECCIONCENTRO LIKE '%$this->direccionCentro%' AND
				RESPONSABLECENTRO LIKE '%$this->responsableCentro%'
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

			//sentencia sql que comprueba si hay titulaciones asignadas al centro a eliminar
			$sql= "SELECT * FROM TITULACION WHERE (CODCENTRO='$this->codCentro')";

			//si la sentencia devuelve algún resultado
			if($this->mysqli->query($sql)->num_rows>0){

				//mensaje de error
				$resultado = 'Borrado no permitido: Hay titulaciones asignadas a este centro';	
				
				//variable de control
				$comprobacion = true;

			}//fin comprobación titulación

			//sentencia sql que comprueba si hay espacios asignados al centro a eliminar
			$sql= "SELECT * FROM ESPACIO WHERE (CODCENTRO='$this->codCentro')";

			//si la sentencia devuelve algún resultado
			if($this->mysqli->query($sql)->num_rows>0){

				//mensaje de error
				$resultado = 'Borrado no permitido: Hay espacios asignados a este centro';
			
				//variable de control
				$comprobacion=true;

			}//fin comprobación espacio

	//VALIDACIONES BACK
	$temp = $this->Comprobar_CODCENTRO();
	//comp
	if(is_array($temp)){
	
		return $temp;
	}//fin
			//si la variable de control especifica que se puede borrar
			if($comprobacion != true){

   				//sentencia sql que permite el borrado de una tupla a partir de su clave
   				$sql = "DELETE FROM CENTRO
   					WHERE( CODCENTRO = '$this->codCentro')";

   				//si se puede ejecutar la sentencia
   				if ($this->mysqli->query($sql)){

					//devuelve un mensaje de confirmación
					$resultado = 'Borrado realizado con éxito';
			
				//si no se puede ejecutar
				}else{

					//devuelve un mensaje de error
					$resultado = 'Error de gestor de base de datos';
			
				}//fin de comproción de ejecución correcta de la sentencia

			}//fin comprobación variable de control

			//devuelve mensaje
			return $resultado;

		}//fin función delete

//------------------------------------------------------------------------------------------------------------------------

		// función RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
		function RellenaDatos(){
    	
    		//sentencia sql que devuelve una tupla a partir de su clave
    		$sql = "SELECT *
				FROM CENTRO
				WHERE (CODCENTRO = '$this->codCentro'
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
			//if(empty($this->codCentro) || empty($this->codEdificio) || empty($this->nombreCentro) || empty($this->direccionCentro) || empty($this->responsableCentro)){

				//mensaje de error
			//	return 'Los datos no pueden estar vacios';
			
			//}//fin comprobación datos vacíos

			//sentencia sql que devuelve los edificios
			$sql = "SELECT * FROM EDIFICIO WHERE CODEDIFICIO='$this->codEdificio'";
			
			//si no existe el edificio en el que se inserta el centro
			if(($this->mysqli->query($sql))->num_rows==0){

				//mensaje de error
				return 'El edificio no existe';

			}//fin comprobación existe el edificio
//VALIDACIONES BACK
$temp = $this->Comprobar_atributos();
//comp
if(is_array($temp)){

	return $temp;
}//fin
			//sentencia sql que permite la edición de una tupla
			$sql = "UPDATE CENTRO SET  
						CODCENTRO = '$this->codCentro',
						CODEDIFICIO = '$this->codEdificio',
						NOMBRECENTRO = '$this->nombreCentro',
						DIRECCIONCENTRO = '$this->direccionCentro',
						RESPONSABLECENTRO = '$this->responsableCentro'
					WHERE (CODCENTRO = '$this->codCentro')" ;

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