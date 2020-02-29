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
			if(empty($this->codCentro) || empty($this->codEdificio) || empty($this->nombreCentro) || empty($this->direccionCentro) || empty($this->responsableCentro)){

				//mensaje de error
				return 'Los datos no pueden estar vacios';
			
			}//fin comprobación datos vacíos

			//sentencia sql que devuelve los edificios
			$sql = "SELECT * FROM EDIFICIO WHERE CODEDIFICIO='$this->codEdificio'";
			
			//si no existe el edificio en el que se inserta el centro
			if(($this->mysqli->query($sql))->num_rows==0){

				//mensaje de error
				return 'El edificio no existe';
				
			}//fin comprobación existe el edificio

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
			if(empty($this->codCentro) || empty($this->codEdificio) || empty($this->nombreCentro) || empty($this->direccionCentro) || empty($this->responsableCentro)){

				//mensaje de error
				return 'Los datos no pueden estar vacios';
			
			}//fin comprobación datos vacíos

			//sentencia sql que devuelve los edificios
			$sql = "SELECT * FROM EDIFICIO WHERE CODEDIFICIO='$this->codEdificio'";
			
			//si no existe el edificio en el que se inserta el centro
			if(($this->mysqli->query($sql))->num_rows==0){

				//mensaje de error
				return 'El edificio no existe';

			}//fin comprobación existe el edificio

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