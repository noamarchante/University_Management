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
			if(empty($this->codTitulacion) || empty($this->codCentro) || empty($this->nombreTitulacion) || empty($this->responsableTitulacion)){

				//mensaje de error
				return 'Los datos no pueden estar vacios';
			
			}//fin comprobación datos vacíos

			//sentencia sql que devuelve los centros
			$sql = "SELECT * FROM CENTRO WHERE CODCENTRO='$this->codCentro'";
			
			//si no existe el centro en el que se inserta la titulacion
			if(($this->mysqli->query($sql))->num_rows==0){

				//mensaje de error
				return 'El centro no existe';
				
			}//fin comprobación existe el edificio

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
			if(empty($this->codTitulacion) || empty($this->codCentro) || empty($this->nombreTitulacion) || empty($this->responsableTitulacion)){

				//mensaje de error
				return 'Los datos no pueden estar vacios';
			
			}//fin comprobación datos vacíos

			//sentencia sql que devuelve los centros
			$sql = "SELECT * FROM CENTRO WHERE CODCENTRO='$this->codCentro'";
			
			//si no existe el centro en el que se inserta la titulacion
			if(($this->mysqli->query($sql))->num_rows==0){

				//mensaje de error
				return 'El centro no existe';
				
			}//fin comprobación existe el centro

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