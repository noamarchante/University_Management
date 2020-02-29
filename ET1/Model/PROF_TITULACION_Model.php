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
			if(empty($this->dni) || empty($this->codTitulacion) || empty($this->anhoAcademico)){

				//mensaje de error
				return 'Los datos no pueden estar vacios';
			
			}//fin comprobación datos vacíos

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