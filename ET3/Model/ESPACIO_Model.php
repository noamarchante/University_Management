
<?php

/*
	Archivo php
	Nombre: ESPACIO_Model.php
	Autor: 	Noa López Marchante
	Fecha de creación: 07/10/2019 
	Función: Clase que define e implementa la estructura del espacio y sus funciones (add, delete,edit,update,search,showall,showcurrent)
*/

	class ESPACIO_Model { //clase espacio

		//declaración de variables
		var $codEspacio; //representa el código con el que se identifica el espacio
		var $codEdificio; //representa el código con el que se identifica el edificio
		var $codCentro; //representa el código con el que se identifica el centro
		var $tipo; //representa el tipo de espacio
		var $superficieEspacio; //representa el valor de la superficie
		var $numInventarioEspacio; //representa el valor del inventario
		var $mysqli; //representa la BD

//------------------------------------------------------------------------------------------------------------------------

		//Constructor de la clase
		function __construct($codEspacio,$codEdificio,$codCentro,$tipo,$superficieEspacio,$numInventarioEspacio){
		
			//inicialización de variables
			$this->codEspacio = $codEspacio;
			$this->codEdificio = $codEdificio;
			$this->codCentro = $codCentro;
			$this->tipo = $tipo;
			$this->superficieEspacio = $superficieEspacio;
			$this->numInventarioEspacio = $numInventarioEspacio;
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
	
	//si comprobar password devuelve un array
	if(is_array($this->Comprobar_CODESPACIO())){
		$this->erroresdatos = array_merge($this->erroresdatos, $this->Comprobar_CODESPACIO()); //errores
		$correcto=false;
	}//fin comprobacion password

	//comp
	if(is_array($this->Comprobar_CODEDIFICIO())){
		$this->erroresdatos = array_merge($this->erroresdatos, $this->Comprobar_CODEDIFICIO()); //errores
		$correcto=false;
	}//fin comprobacion password
	//comp
	if(is_array($this->Comprobar_CODCENTRO())){
		$this->erroresdatos = array_merge($this->erroresdatos, $this->Comprobar_CODCENTRO()); //errores
		$correcto=false;
	}//fin comprobacion password
	//comp
	if(is_array($this->Comprobar_TIPO())){
		$this->erroresdatos = array_merge($this->erroresdatos, $this->Comprobar_TIPO()); //errores
		$correcto=false;
	}//fin comprobacion password
	//comp
	if(is_array($this->Comprobar_SUPERFICIEESPACIO())){
		$this->erroresdatos = array_merge($this->erroresdatos, $this->Comprobar_SUPERFICIEESPACIO()); //errores
		$correcto=false;
	}//fin comprobacion password
	//comp
	if(is_array($this->Comprobar_NUMINVENTARIOESPACIO())){
		$this->erroresdatos = array_merge($this->erroresdatos, $this->Comprobar_NUMINVENTARIOESPACIO()); //errores
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

/* function Comprobar_CODESPACIO(): Comprueba el formato del CODESPACIO*/
		// devuelve un true o un false y rellena en caso de error el array de errores de datos
		function Comprobar_CODESPACIO(){
			$arrayCODESPACIO=array(); //definicion de array temporal
			$correcto = true; //variable de control

			//si no cumple la expresión regular
			if(strlen($this->codEspacio)==0 || $this->codEspacio==null || preg_match("/(^\s+$)/", $this->codEspacio)){
				$error = 'Atributo vacío'; //error
				$array = array('nombreatributo' => $this->codEspacio, 'codigoincidencia' => '00001', 'mensajeerror' => $error); //array errores
				array_push($arrayCODESPACIO, $array);
				$correcto=false;
			} //fin comprobacion vacio
			//si el nº de letras del nombre es menor que tres
			if (strlen($this->codEspacio)<3){
				//mensaje de error
				$error = 'Valor de atributo no numérico demasiado corto';
				$array = array('nombreatributo' =>$this->codEspacio, 'codigoincidencia' =>'00003', 'mensajeerror' => $error); //errores
				//introduce el mensaje en el rray de errores
				array_push($arrayCODESPACIO, $array);

				//cambia correcto a false
				$correcto = false;

			}//fin comprobación longitud <3

			//si el nº de letras del nombre es mayor que 30
			if (strlen($this->codEspacio)>10){

				//crea mensaje de error
				$error = 'Valor de atributo demasiado largo';
				$array = array('nombreatributo' =>$this->codEspacio, 'codigoincidencia' =>'00002', 'mensajeerror' => $error); //errores
				//intrudce el mensaje en el array de errores
				array_push($arrayCODESPACIO, $array);

				//establece correcto a false
				$correcto = false;
		
			}//fin comprobación nº letras >30
			//comp
			if (!preg_match("/[\w\-]+/",$this->codEspacio)){

				//mensaje de error
				$error = 'Solo están permitidas alfabéticos, números y el “-”';
				$array =  array( 'nombreatributo' => $this->codEspacio,'codigoincidencia' => '00040', 'mensajeerror' => $error); //errores
				//carga el error en el array de errores
				array_push($arrayCODESPACIO, $array);
				$correcto=false;
			} //fin comprobacion patron

			//comprobacion errores
			if($correcto==true){
				//devuelve el valor de correcto
				return $correcto;
				}else{ //si errores
					return $arrayCODESPACIO;
				} //fin
		}//fin función comprobar_CODESPACIO()

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
// function Comprobar_TIPO(): comprueba que el nombre introducido es correcto
function Comprobar_TIPO(){
	$arrayTIPO=array();//array temporal
	//guarda valor en la variable por defecto
	$correcto = true;
	//comprobar vacio
	if(strlen($this->tipo)==0 || $this->tipo==null || preg_match("/(^\s+$)/", $this->tipo)){
		$error = 'Atributo vacío';//error
		$array = array('nombreatributo' => $this->tipo, 'codigoincidencia' => '00001', 'mensajeerror' => $error); //array errores
		array_push($arrayTIPO, $array);
		$correcto=false;
	}//fin vacio

	//si no se cumple la expresión regular
	if (!preg_match("/^(DESPACHO|LABORATORIO|PAS)$/",$this->tipo)){

		//guarda mensaje de error
		$error = "Solo se permiten los valores 'DESPACHO','LABORATORIO','PAS'";
		$array = array( 'nombreatributo' =>$this->tipo, 'codigoincidencia' =>'00080', 'mensajeerror' => $error);//error
		//añade el error al array
		array_push($arrayTIPO, $array);

		//establece correcto a falso
		$correcto = false;

	}//fin comprobación expresión regular
	
	//comprobacion errores
	if($correcto==true){
	//devuelve el valor de correcto
	return $correcto;
	}else{//si errores
		return $arrayTIPO;
	}//fin comprobacion errores

}//fin comprobación telefono

//----------------------------------------------------------------------------------------------------------------------

// function Comprobar_SUPERFICIEESPACIO(): comprueba que el nombre introducido es correcto
function Comprobar_SUPERFICIEESPACIO(){
	$arraySUPERFICIE=array();//array temporal
	//guarda valor en la variable por defecto
	$correcto = true;
	//comprobar vacio
	if(strlen($this->superficieEspacio)==0 || $this->superficieEspacio==null || preg_match("/(^\s+$)/", $this->superficieEspacio)){
		$error = 'Atributo vacío';//error
		$array = array('nombreatributo' => $this->superficieEspacio, 'codigoincidencia' => '00001', 'mensajeerror' => $error); //array errores
		array_push($arraySUPERFICIE, $array);
		$correcto=false;
	}//fin vacio
	//si el nº de letras del apellido es menor que tres
	if (strlen($this->superficieEspacio)<1){
		//mensaje de error
		$error = 'Valor de atributo numérico demasiado corto';
		$array = array('nombreatributo' =>$this->superficieEspacio, 'codigoincidencia' =>'00004', 'mensajeerror' => $error); //errores
		//introduce el mensaje en el rray de errores
		array_push($arraySUPERFICIE, $array);

		//cambia correcto a false
		$correcto = false;

	}//fin comprobación longitud <3

	//si el nº de letras del nombre es mayor que 30
	if (strlen($this->superficieEspacio)>4){

		//crea mensaje de error
		$error = 'Valor de atributo demasiado largo';
		$array = array('nombreatributo' =>$this->superficieEspacio, 'codigoincidencia' =>'00002', 'mensajeerror' => $error);//errores
		//intrudce el mensaje en el array de errores
		array_push($arraySUPERFICIE, $array);

		//establece correcto a false
		$correcto = false;

	}//fin comprobación nº letras >30

	//si no se cumple la expresión regular
	if (!preg_match("/[0-9]+/",$this->superficieEspacio)){

		//guarda mensaje de error
		$error = 'Solo se permiten números';
		$array = array( 'nombreatributo' =>$this->superficieEspacio, 'codigoincidencia' =>'00070', 'mensajeerror' => $error);//error
		//añade el error al array
		array_push($arraySUPERFICIE, $array);

		//establece correcto a falso
		$correcto = false;

	}//fin comprobación expresión regular
	
	//comprobacion errores
	if($correcto==true){
	//devuelve el valor de correcto
	return $correcto;
	}else{//si errores
		return $arraySUPERFICIE;
	}//fin comprobacion errores

}//fin comprobación telefono

//----------------------------------------------------------------------------------------------------------------------

// function Comprobar_NUMINVENTARIOESPACIO(): comprueba que el nombre introducido es correcto
function Comprobar_NUMINVENTARIOESPACIO(){
	$arrayNUMINVENTARIO=array();//array temporal
	//guarda valor en la variable por defecto
	$correcto = true;
	//comprobar vacio
	if(strlen($this->numInventarioEspacio)==0 || $this->numInventarioEspacio==null || preg_match("/(^\s+$)/", $this->numInventarioEspacio)){
		$error = 'Atributo vacío';//error
		$array = array('nombreatributo' => $this->numInventarioEspacio, 'codigoincidencia' => '00001', 'mensajeerror' => $error); //array errores
		array_push($arrayNUMINVENTARIO, $array);
		$correcto=false;
	}//fin vacio
	//si el nº de letras del apellido es menor que tres
	if (strlen($this->numInventarioEspacio)<1){
		//mensaje de error
		$error = 'Valor de atributo numérico demasiado corto';
		$array = array('nombreatributo' =>$this->numInventarioEspacio, 'codigoincidencia' =>'00004', 'mensajeerror' => $error); //errores
		//introduce el mensaje en el rray de errores
		array_push($arrayNUMINVENTARIO, $array);

		//cambia correcto a false
		$correcto = false;

	}//fin comprobación longitud <3

	//si el nº de letras del nombre es mayor que 30
	if (strlen($this->numInventarioEspacio)>8){

		//crea mensaje de error
		$error = 'Valor de atributo demasiado largo';
		$array = array('nombreatributo' =>$this->numInventarioEspacio, 'codigoincidencia' =>'00002', 'mensajeerror' => $error);//errores
		//intrudce el mensaje en el array de errores
		array_push($arrayNUMINVENTARIO, $array);

		//establece correcto a false
		$correcto = false;

	}//fin comprobación nº letras >30

	//si no se cumple la expresión regular
	if (!preg_match("/[0-9]+/",$this->numInventarioEspacio)){

		//guarda mensaje de error
		$error = 'Solo se permiten números';
		$array = array( 'nombreatributo' =>$this->numInventarioEspacio, 'codigoincidencia' =>'00070', 'mensajeerror' => $error);//error
		//añade el error al array
		array_push($arrayNUMINVENTARIO, $array);

		//establece correcto a falso
		$correcto = false;

	}//fin comprobación expresión regular
	
	//comprobacion errores
	if($correcto==true){
	//devuelve el valor de correcto
	return $correcto;
	}else{//si errores
		return $arrayNUMINVENTARIO;
	}//fin comprobacion errores

}//fin comprobación telefono

//----------------------------------------------------------------------------------------------------------------------


		/*Función ADD: Inserta en la tabla  de la bd los valores de los atributos del objeto. 
				  Comprueba si la clave/s está/n vacía/s y si existe ya en la tabla*/
		function ADD(){

			//sentencia sql que selecciona una tupla a partir de la clave
			$sql = "SELECT * FROM ESPACIO WHERE (CODESPACIO = '$this->codEspacio')";

			//si no se puede ejecutar la select
			if (!$result = $this->mysqli->query($sql)){

				//devuelve mensaje de error
				return 'Error de gestor de base de datos';
		
			}//fin comprobación ejecución select

			//si existe el espacio
			if ($result->num_rows == 1){

				//devuelve mensaje de error
				return 'Inserción fallida: el elemento ya existe';
		
			}//fin comprobación existe espacio

			//si los datos están vacíos
			//if(empty($this->codEspacio) || empty($this->codEdificio) || empty($this->codCentro) || empty($this->tipo) || empty($this->superficieEspacio) || empty($this->numInventarioEspacio)){

				//mensaje de error
			//	return 'Los datos no pueden estar vacios';
			
		//	}//fin comprobación datos vacíos

			//sentencia sql que devuelve los centros
			$sql = "SELECT * FROM CENTRO WHERE CODCENTRO='$this->codCentro'";
			
			//si no existe el centro en el que se inserta el espacio
			if(($this->mysqli->query($sql))->num_rows==0){

				//mensaje de error
				return 'El centro no existe';
				
			}//fin comprobación existe el centro

			//sentencia sql que devuelve los edificios
			$sql = "SELECT * FROM EDIFICIO WHERE CODEDIFICIO='$this->codEdificio'";
			
			//si no existe el edificio en el que se inserta el espacio
			if(($this->mysqli->query($sql))->num_rows==0){

				//mensaje de error
				return 'El edificio no existe';
				
			}//fin comprobación existe el edificio

			//VALIDACIONES BACK
			// $temp = $this->Comprobar_atributos();
			// if(is_array($temp)){
			
			// 	return $temp;
			// }//fin

			//sentencia sql que permite la inserción de un nuevo espacio con los datos recogidos
			$sql = "INSERT INTO ESPACIO (
			CODESPACIO,
			CODEDIFICIO,
			CODCENTRO,
			TIPO,
			SUPERFICIEESPACIO,
			NUMINVENTARIOESPACIO) 
			VALUES (
				'".$this->codEspacio."',
				'".$this->codEdificio."',
				'".$this->codCentro."',
				'".$this->tipo."',
				'".$this->superficieEspacio."',
				'".$this->numInventarioEspacio."'
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
					  Si van vacios devuelve todos los espacios*/
		function SEARCH(){

			//sentencia sql de búsqueda de datos 
			$sql= "SELECT * FROM ESPACIO WHERE (
				CODESPACIO LIKE '%$this->codEspacio%' AND 
				CODEDIFICIO LIKE '%$this->codEdificio%' AND 
				CODCENTRO LIKE '%$this->codCentro%' AND 
				TIPO LIKE '%$this->tipo%' AND 
				SUPERFICIEESPACIO LIKE '%$this->superficieEspacio%' AND 
				NUMINVENTARIOESPACIO LIKE '%$this->numInventarioEspacio%')";

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

			//sentencia sql que comprueba si hay profesores asignadas al espacio a eliminar
			$sql= "SELECT * FROM PROF_ESPACIO WHERE (CODESPACIO='$this->codEspacio')";

			//si la sentencia devuelve algún resultado
			if($this->mysqli->query($sql)->num_rows>0){

				//mensaje de error
				$resultado = 'Borrado no permitido: Hay profesores asignados a este espacio';	
				
				//variable de control
				$comprobacion = true;

			}//fin comprobación profesor
			//VALIDACIONES BACK
			$temp = $this->Comprobar_CODESPACIO();
			//comp
			if(is_array($temp)){
			
				return $temp;
			}//fin
			if($comprobacion != true){
   				//sentencia sql que permite el borrado de una tupla a partir de su clave
   				$sql = "DELETE FROM ESPACIO
   					WHERE( CODESPACIO = '$this->codEspacio')";

   				//si se puede ejecutar la sentencia
   				if ($this->mysqli->query($sql)){

					//devuelve un mensaje de confirmación
					$resultado = 'Borrado realizado con éxito';
			
				//si no se puede ejecutar
				}else{

					//devuelve un mensaje de error
					$resultado = 'Error de gestor de base de datos';
			
				}//fin de comproción de ejecución correcta de la sentencia

			}//fin comprobación de si se puede borrar

			//devuelve mensaje
			return $resultado;
			
		}//fin función delete

//------------------------------------------------------------------------------------------------------------------------

		// función RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
		function RellenaDatos(){
    
    		//sentencia sql que devuelve una tupla a partir de su clave
    		$sql = "SELECT *
				FROM ESPACIO
				WHERE (
					CODESPACIO = '$this->codEspacio' 
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
			//if(empty($this->codEspacio) || empty($this->codEdificio) || empty($this->codCentro) || empty($this->tipo) || empty($this->superficieEspacio) || empty($this->numInventarioEspacio)){

				//mensaje de error
				//return 'Los datos no pueden estar vacios';
			
			//}//fin comprobación datos vacíos

			//sentencia sql que devuelve los centros
			$sql = "SELECT * FROM CENTRO WHERE CODCENTRO='$this->codCentro'";
			
			//si no existe el centro en el que se inserta el espacio
			if(($this->mysqli->query($sql))->num_rows==0){

				//mensaje de error
				return 'El centro no existe';
				
			}//fin comprobación existe el centro

			//sentencia sql que devuelve los edificios
			$sql = "SELECT * FROM EDIFICIO WHERE CODEDIFICIO='$this->codEdificio'";
			
			//si no existe el edificio en el que se inserta el espacio
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
			$sql = "UPDATE ESPACIO SET  
						CODESPACIO = '$this->codEspacio',
						CODEDIFICIO = '$this->codEdificio',
						CODCENTRO = '$this->codCentro',
						TIPO = '$this->tipo',
						SUPERFICIEESPACIO = '$this->superficieEspacio',
						NUMINVENTARIOESPACIO = '$this->numInventarioEspacio'
						WHERE (CODESPACIO = '$this->codEspacio')";
			
			//si la sentencia se puede ejecutar
			if ($this->mysqli->query($sql)){

				//guarda mensaje de confirmación
				$resultado = 'Actualización realizada con éxito';
			//si no se puede eejcutar
			}else{

				//guarda mensaje de error
				$resultado = 'Error de gestor de base de datos';
		
			}//fin comprobación

			//devuelve mensaje
			return $resultado;

		} //fin función EDIT

	}//fin de clase

?> 