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
			if(empty($this->dni) || empty($this->nombreProfesor) || empty($this->apellidosProfesor) || empty($this->areaProfesor) || empty($this->departamentoProfesor)){

				//mensaje de error
				return 'Los datos no pueden estar vacios';
			
			}//fin comprobación datos vacíos

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
			if(empty($this->dni) || empty($this->nombreProfesor) || empty($this->apellidosProfesor) || empty($this->areaProfesor) || empty($this->departamentoProfesor)){

				//mensaje de error
				return 'Los datos no pueden estar vacios';
			
			}//fin comprobación datos vacíos

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