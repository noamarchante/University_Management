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
			if(empty($this->codEdificio) || empty($this->nombreEdificio) || empty($this->direccionEdificio) || empty($this->campusEdificio)){

				//mensaje de error
				return 'Los datos no pueden estar vacios';
			
			}//fin comprobación datos vacíos

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
			if(empty($this->codEdificio) || empty($this->nombreEdificio) || empty($this->direccionEdificio) || empty($this->campusEdificio)){

				//mensaje de error
				return 'Los datos no pueden estar vacios';
			
			}//fin comprobación datos vacíos

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