<?php

/*
	Archivo php
	Nombre: EDIFICIO_Model.php
	Autor: 	Noa López Marchante
	Fecha de creación: 06/10/2019 
	Función: Clase que define e implementa la estructura del edificio y sus funciones (add, delete,edit,update,search,showall,showcurrent)
*/

	class EDIFICIO_Model { //clase edificio

		//declaración de variables
		var $codEdificio; //representa el código con el que se identifica el edificio
		var $nombreEdificio; //representa el nombre del edificio
		var $direccionEdificio;//representa la dirección del edificio
		var $campusEdificio;//representa el campus al que pertenece el edificio
		var $mysqli;//representa la BD

//------------------------------------------------------------------------------------------------------------------------

		//Constructor de la clase
		function __construct($codEdificio, $nombreEdificio, $direccionEdificio, $campusEdificio){
		
			//inicialización de variables
			$this->codEdificio = $codEdificio;
			$this->nombreEdificio = $nombreEdificio;
			$this->direccionEdificio = $direccionEdificio;
			$this->campusEdificio = $campusEdificio;
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
	if(is_array($this->Comprobar_CODEDIFICIO())){
		$this->erroresdatos = array_merge($this->erroresdatos, $this->Comprobar_CODEDIFICIO()); //errores
		$correcto=false;
	}//fin comprobacion password
	//comp
	if(is_array($this->Comprobar_NOMBREEDIFICIO())){
		$this->erroresdatos = array_merge($this->erroresdatos, $this->Comprobar_NOMBREEDIFICIO()); //errores
		$correcto=false;
	}//fin comprobacion password
	//comp
	if(is_array($this->Comprobar_DIRECCIONEDIFICIO())){
		$this->erroresdatos = array_merge($this->erroresdatos, $this->Comprobar_DIRECCIONEDIFICIO()); //errores
		$correcto=false;
	}//fin comprobacion password
	//comp
	if(is_array($this->Comprobar_CAMPUSEDIFICIO())){
		$this->erroresdatos = array_merge($this->erroresdatos, $this->Comprobar_CAMPUSEDIFICIO()); //errores
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
/* function Comprobar_NOMBREEDIFICIO(): Comprueba el formato del NOMBREPROFESOR*/
		// devuelve un true o un false y rellena en caso de error el array de errores de datos
		function Comprobar_NOMBREEDIFICIO(){
			$arrayNOMBREEDIFICIO=array(); //definicion de array temporal
			$correcto = true; //variable de control

			//si no cumple la expresión regular
			if(strlen($this->nombreEdificio)==0 || $this->nombreEdificio==null || preg_match("/(^\s+$)/", $this->nombreEdificio)){
				$error = 'Atributo vacío'; //error
				$array = array('nombreatributo' => $this->nombreEdificio, 'codigoincidencia' => '00001', 'mensajeerror' => $error); //array errores
				array_push($arrayNOMBREEDIFICIO, $array);
				$correcto=false;
			} //fin comprobacion vacio
			//si el nº de letras del nombre es menor que tres
			if (strlen($this->nombreEdificio)<3){
				//mensaje de error
				$error = 'Valor de atributo no numérico demasiado corto';
				$array = array('nombreatributo' =>$this->nombreEdificio, 'codigoincidencia' =>'00003', 'mensajeerror' => $error); //errores
				//introduce el mensaje en el rray de errores
				array_push($arrayNOMBREEDIFICIO, $array);

				//cambia correcto a false
				$correcto = false;

			}//fin comprobación longitud <3

			//si el nº de letras del nombre es mayor que 30
			if (strlen($this->nombreEdificio)>50){

				//crea mensaje de error
				$error = 'Valor de atributo demasiado largo';
				$array = array('nombreatributo' =>$this->nombreEdificio, 'codigoincidencia' =>'00002', 'mensajeerror' => $error); //errores
				//intrudce el mensaje en el array de errores
				array_push($arrayNOMBREEDIFICIO, $array);

				//establece correcto a false
				$correcto = false;
		
			}//fin comprobación nº letras >30
			//si no se cumple la expresión regular
			if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜïÏ]+(\s*[a-zA-ZA-ZñÑáéíóúÁÉÍÓÚüÜïÏ]*)+$/",$this->nombreEdificio)){

				//guarda mensaje de error
				$error = 'Solo están permitidas alfabéticos';
				$array = array( 'nombreatributo' =>$this->nombreEdificio, 'codigoincidencia' =>'00030', 'mensajeerror' => $error);//error
				//añade el error al array
				array_push($arrayNOMBREEDIFICIO, $array);

				//establece correcto a falso
				$correcto = false;
		
			}//fin comprobación expresión regular
			//comprobacion errores
			if($correcto==true){
				//devuelve el valor de correcto
				return $correcto;
				}else{ //si errores
					return $arrayNOMBREEDIFICIO;
				} //fin
		}//fin función comprobar_NOMBREPROFESOR()

/* ************************************************************************************************************************************************** */

/* function Comprobar_DIRECCIONEDIFICIO(): Comprueba el formato del NOMBREPROFESOR*/
		// devuelve un true o un false y rellena en caso de error el array de errores de datos
		function Comprobar_DIRECCIONEDIFICIO(){
			$arrayDIRECCIONEDIFICIO=array(); //definicion de array temporal
			$correcto = true; //variable de control

			//si no cumple la expresión regular
			if(strlen($this->direccionEdificio)==0 || $this->direccionEdificio==null || preg_match("/(^\s+$)/", $this->direccionEdificio)){
				$error = 'Atributo vacío'; //error
				$array = array('nombreatributo' => $this->direccionEdificio, 'codigoincidencia' => '00001', 'mensajeerror' => $error); //array errores
				array_push($arrayDIRECCIONEDIFICIO, $array);
				$correcto=false;
			} //fin comprobacion vacio
			//si el nº de letras del nombre es menor que tres
			if (strlen($this->direccionEdificio)<3){
				//mensaje de error
				$error = 'Valor de atributo no numérico demasiado corto';
				$array = array('nombreatributo' =>$this->direccionEdificio, 'codigoincidencia' =>'00003', 'mensajeerror' => $error); //errores
				//introduce el mensaje en el rray de errores
				array_push($arrayDIRECCIONEDIFICIO, $array);

				//cambia correcto a false
				$correcto = false;

			}//fin comprobación longitud <3

			//si el nº de letras del nombre es mayor que 30
			if (strlen($this->direccionEdificio)>150){

				//crea mensaje de error
				$error = 'Valor de atributo demasiado largo';
				$array = array('nombreatributo' =>$this->direccionEdificio, 'codigoincidencia' =>'00002', 'mensajeerror' => $error); //errores
				//intrudce el mensaje en el array de errores
				array_push($arrayDIRECCIONEDIFICIO, $array);

				//establece correcto a false
				$correcto = false;
		
			}//fin comprobación nº letras >30
			//si no se cumple la expresión regular
			if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜïÏ]+[\s]?[a-zA-ZñÑáéíóúÁÉÍÓÚüÜïÏ\d\-\/ºª]+[\s]?[a-zA-ZñÑáéíóúÁÉÍÓÚüÜïÏ\d\-\/ºª]+$/",$this->direccionEdificio)){

				//guarda mensaje de error
				$error = 'Solo están permitidas alfabéticos y espacios, números y los símbolos  “- / º ª”';
				$array = array( 'nombreatributo' =>$this->direccionEdificio, 'codigoincidencia' =>'00050', 'mensajeerror' => $error);//error
				//añade el error al array
				array_push($arrayDIRECCIONEDIFICIO, $array);

				//establece correcto a falso
				$correcto = false;
		
			}//fin comprobación expresión regular
			//comprobacion errores
			if($correcto==true){
				//devuelve el valor de correcto
				return $correcto;
				}else{ //si errores
					return $arrayDIRECCIONEDIFICIO;
				} //fin
		}//fin función comprobar_NOMBREPROFESOR()

/* ************************************************************************************************************************************************** */
/* function Comprobar_CAMPUSEDIFICIO(): Comprueba el formato del NOMBREPROFESOR*/
		// devuelve un true o un false y rellena en caso de error el array de errores de datos
		function Comprobar_CAMPUSEDIFICIO(){
			$arrayCAMPUSEDIFICIO=array(); //definicion de array temporal
			$correcto = true; //variable de control

			//si no cumple la expresión regular
			if(strlen($this->campusEdificio)==0 || $this->campusEdificio==null || preg_match("/(^\s+$)/", $this->campusEdificio)){
				$error = 'Atributo vacío'; //error
				$array = array('nombreatributo' => $this->campusEdificio, 'codigoincidencia' => '00001', 'mensajeerror' => $error); //array errores
				array_push($arrayCAMPUSEDIFICIO, $array);
				$correcto=false;
			} //fin comprobacion vacio
			//si el nº de letras del nombre es menor que tres
			if (strlen($this->campusEdificio)<3){
				//mensaje de error
				$error = 'Valor de atributo no numérico demasiado corto';
				$array = array('nombreatributo' =>$this->campusEdificio, 'codigoincidencia' =>'00003', 'mensajeerror' => $error); //errores
				//introduce el mensaje en el rray de errores
				array_push($arrayCAMPUSEDIFICIO, $array);

				//cambia correcto a false
				$correcto = false;

			}//fin comprobación longitud <3

			//si el nº de letras del nombre es mayor que 30
			if (strlen($this->campusEdificio)>10){

				//crea mensaje de error
				$error = 'Valor de atributo demasiado largo';
				$array = array('nombreatributo' =>$this->campusEdificio, 'codigoincidencia' =>'00002', 'mensajeerror' => $error); //errores
				//intrudce el mensaje en el array de errores
				array_push($arrayCAMPUSEDIFICIO, $array);

				//establece correcto a false
				$correcto = false;
		
			}//fin comprobación nº letras >30
			//si no se cumple la expresión regular
			if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜïÏ]+(\s*[a-zA-ZA-ZñÑáéíóúÁÉÍÓÚüÜïÏ]*)+$/",$this->campusEdificio)){

				//guarda mensaje de error
				$error = 'Solo están permitidas alfabéticos';
				$array = array( 'nombreatributo' =>$this->campusEdificio, 'codigoincidencia' =>'00030', 'mensajeerror' => $error);//error
				//añade el error al array
				array_push($arrayCAMPUSEDIFICIO, $array);

				//establece correcto a falso
				$correcto = false;
		
			}//fin comprobación expresión regular
			//comprobacion errores
			if($correcto==true){
				//devuelve el valor de correcto
				return $correcto;
				}else{ //si errores
					return $arrayCAMPUSEDIFICIO;
				} //fin
		}//fin función comprobar_NOMBREPROFESOR()

/* ************************************************************************************************************************************************** */

	/*Función ADD: Inserta en la tabla  de la bd los valores de los atributos del objeto. 
				  Comprueba si la clave/s está/n vacía/s y si existe ya en la tabla*/
		function ADD(){

			//sentencia sql que selecciona una tupla a partir de la clave
			$sql = "SELECT * FROM EDIFICIO WHERE (CODEDIFICIO = '$this->codEdificio')";

			//si no se puede ejecutar la select
			if (!$result = $this->mysqli->query($sql)){

				//devuelve mensaje de error
				return 'Error de gestor de base de datos';
		
			}//fin comprobación ejecución select

			//si existe el edificio
			if ($result->num_rows == 1){

				//devuelve mensaje de error
				return 'Inserción fallida: el elemento ya existe';
		
			}//fin comprobación existe edificio

			//si los datos están vacíos
			//if(empty($this->codEdificio) || empty($this->nombreEdificio) || empty($this->direccionEdificio) || empty($this->campusEdificio)){

				//mensaje de error
			//	return 'Los datos no pueden estar vacios';
			
			//}//fin comprobación datos vacíos

			//VALIDACIONES BACK
			$temp = $this->Comprobar_atributos();
			//comp
			if(is_array($temp)){
			
				return $temp;
			}//fin
		

			//sentencia sql que permite la inserción de un nuevo edificio con los datos recogidos
			$sql = "INSERT INTO EDIFICIO (
			CODEDIFICIO,
			NOMBREEDIFICIO,
			DIRECCIONEDIFICIO,
			CAMPUSEDIFICIO
			) 
			VALUES (
				'".$this->codEdificio."',
				'".$this->nombreEdificio."',
				'".$this->direccionEdificio."',
				'".$this->campusEdificio."'
			)";

			//si la sentencia no se puede ejecutar
			if (!$this->mysqli->query($sql)) {
				
				//devuelve un mensaje de error
				return 'Error de gestor de base de datos';
		
			//si se puede eejcutar	
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
					  Si van vacios devuelve todos los edificios*/
		function SEARCH(){

			//sentencia sql de búsqueda de datos 
			$sql= "SELECT * FROM EDIFICIO WHERE (
				CODEDIFICIO LIKE '%$this->codEdificio%' AND 
				NOMBREEDIFICIO LIKE '%$this->nombreEdificio%' AND 
				DIRECCIONEDIFICIO LIKE '%$this->direccionEdificio%' AND 
				CAMPUSEDIFICIO LIKE '%$this->campusEdificio%'
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

			//sentencia sql que comprueba si hay centros asignados al edificio a eliminar
			$sql= "SELECT * FROM CENTRO WHERE (CODEDIFICIO='$this->codEdificio')";

			//si la sentencia devuelve algún resultado
			if($this->mysqli->query($sql)->num_rows>0){

				//mensaje de error
				$resultado = 'Borrado no permitido: Hay centros asignados a este edificio';	
				
				//variable de control
				$comprobacion = true;

			}//fin comprobación centros

			//sentencia sql que comprueba si hay espacios asignados al edificio a eliminar
			$sql= "SELECT * FROM ESPACIO WHERE (CODEDIFICIO='$this->codEdificio')";

			//si la sentencia devuelve algún resultado
			if($this->mysqli->query($sql)->num_rows>0){

				//mensaje de error
				$resultado = 'Borrado no permitido: Hay espacios asignados a este edificio';
			
				//variable de control
				$comprobacion=true;

			}//fin comprobación espacio

			//VALIDACIONES BACK
			$temp = $this->Comprobar_CODEDIFICIO();
			//comp
			if(is_array($temp)){
			
				return $temp;
			}//fin
			//si la variable de control especifica que se puede borrar
			if($comprobacion != true){

   				//sentencia sql que permite el borrado de una tupla a partir de su clave
   				$sql = "DELETE FROM EDIFICIO
   					WHERE( CODEDIFICIO = '$this->codEdificio')";

   				//si se puede ejecutar la sentencia
   				if ($this->mysqli->query($sql)){

					//devuelve un mensaje de confirmación
					$resultado = 'Borrado realizado con éxito';
			
				//si no se puede ejecutar
				}else{

					//devuelve un mensaje de error
					$resultado = 'Error de gestor de base de datos';
			
				}//fin de comproción de ejecución correcta de la sentencia

			}// fin comprobación de posible el borrado

			//devuelve mensaje
			return $resultado;

		}//fin función delete

//------------------------------------------------------------------------------------------------------------------------

		// función RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
		function RellenaDatos(){
    
    		//sentencia sql que devuelve una tupla a partir de su clave
    		$sql = "SELECT *
				FROM EDIFICIO
				WHERE (
					CODEDIFICIO = '$this->codEdificio' 
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
		//	if(empty($this->codEdificio) || empty($this->nombreEdificio) || empty($this->direccionEdificio) || empty($this->campusEdificio)){

				//mensaje de error
		//		return 'Los datos no pueden estar vacios';
			
		//	}//fin comprobación datos vacíos

			//VALIDACIONES BACK
			$temp = $this->Comprobar_atributos();
			//comp
			if(is_array($temp)){
			
				return $temp;
			}//fin
			//sentencia sql que permite la edición de una tupla
			$sql = "UPDATE EDIFICIO SET  
						CODEDIFICIO = '$this->codEdificio',
						NOMBREEDIFICIO = '$this->nombreEdificio',
						DIRECCIONEDIFICIO = '$this->direccionEdificio',
						CAMPUSEDIFICIO = '$this->campusEdificio'
					WHERE (CODEDIFICIO = '$this->codEdificio')" ;

			//si la sentencia se puede ejecutar
			if ($this->mysqli->query($sql)){

				//guarda mensaje de confirmación
				$resultado = 'Actualización realizada con éxito';
				
			//si la sentencia no se puede ejecutar
			}else{

				//guarda mensaje de error
				$resultado = 'Error de gestor de base de datos';
		
			}//fin comprobación

			//devuelve mensaje
			return $resultado;

		} //fin función EDIT

	}//fin de clase

?> 