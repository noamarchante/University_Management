
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
			if(empty($this->codEspacio) || empty($this->codEdificio) || empty($this->codCentro) || empty($this->tipo) || empty($this->superficieEspacio) || empty($this->numInventarioEspacio)){

				//mensaje de error
				return 'Los datos no pueden estar vacios';
			
			}//fin comprobación datos vacíos

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
			if(empty($this->codEspacio) || empty($this->codEdificio) || empty($this->codCentro) || empty($this->tipo) || empty($this->superficieEspacio) || empty($this->numInventarioEspacio)){

				//mensaje de error
				return 'Los datos no pueden estar vacios';
			
			}//fin comprobación datos vacíos

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