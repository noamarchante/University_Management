
<?php

/*
	Archivo php
	Nombre: USUARIOS_Model.php
	Autor: 	Noa López Marchante
	Fecha de creación: 21/09/2019 
	Función: Clase que define e implementa la estructura del usuarios y sus funciones (add, delete,edit,update,search,showall,showcurrent)
*/

	class USUARIOS_Model { //clase usuarios

		//declaración de variables
		var $login; //representa el login con el que se identifca el usuario
		var $password; //representa la contraseña con la que accede el usuario
		var $dni; //representa el dni del usuario
		var $nombre; //representa el nombre del usuario
		var $apellidos; //representa los apellidos del usuario
		var $telefono; //representa el telefono del usuario
		var $email; //representa el email del usuario 
		var $fechaNacimiento; //representa la fecha de nacimiento del usuario
		var $fotoPersonal; //representa la foto del usuario
		var $sexo; //representa el sexo del usuario
		var $mysqli; //representa la BD

//------------------------------------------------------------------------------------------------------------------------

		//Constructor de la clase
		function __construct($login,$password,$dni,$nombre,$apellidos,$telefono,$email,$fechaNacimiento,$fotoPersonal,$sexo){
		
			//inicialización de variables
			$this->login = $login;
			$this->password = $password;
			$this->dni = $dni;
			$this->nombre = $nombre;
			$this->apellidos = $apellidos;
			$this->telefono = $telefono;
			$this->email = $email;
			$this->fechaNacimiento = $fechaNacimiento;
			$this->fotoPersonal = $fotoPersonal;
			$this->sexo = $sexo;
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

			//si comprobar login y comprobar nombre son correctos
			if ($this->Comprobar_login & $this->Comprobar_nombre){

				//devuelve true
				return true;
		
			//en otro caso
			}else{
			
				//devuelve el array con los errores
				
				return $this->erroresdatos;
		
			}//fin comprobación login y nombre
	
		}//fin función comprobar datos

		/* function Comprobar_login(): Comprueba el formato del login 
		alfanumerico
		mayor o igual a 5
		menor o igual a 15
		no vacio*/
		// devuelve un true o un false y rellena en caso de error el array de errores de datos
		function Comprobar_login(){
		
			//si no cumple la expresión regular
			if (!preg_match("^([a-zA-Z][0-9]){5,15}^",$this->login)){

				//mensaje de error
				$error = 'Error en login: ';

				//carga el error en el array de errores
				array_push($this->erroresdatos, $error);

				//devuelve false
				return false;

			//en otro caso
			}else{
			
				//devuelve true
				return true;
		
			} //fin comprobación expresión regular
	
		}//fin función comprobar_login()

		// function Comprobar_nombre(): comprueba que el nombre introducido es correcto
		function Comprobar_nombre(){
		
			//guarda valor en la variable por defecto
			$correcto = true;

			//si el nº de letras del nombre es menor que tres
			if (strlen($this->nombre)<3){

				//mensaje de error
				$error = 'Error en nombre: longitud menor que 3';

				//introduce el mensaje en el rray de errores
				array_push($this->erroresdatos, $error);

				//cambia correcto a false
				$correcto = false;

			}//fin comprobación longitud <3

			//si el nº de letras del nombre es mayor que 30
			if (strlen($this->nombre)>30){

				//crea mensaje de error
				$error = 'Error en nombre: longitud mayor de 30';

				//intrudce el mensaje en el array de errores
				array_push($this->erroresdatos, $error);

				//establece correcto a false
				$correcto = false;
		
			}//fin comprobación nº letras >30

			//si no se cumple la expresión regular
			if (!preg_match("^([a-zA-Z])^",$this->nombre)){

				//guarda mensaje de error
				$error = 'Error en nombre: Solo se admiten alfabéticos';

				//añade el error al array
				array_push($this->erroresdatos, $error);

				//establece correcto a falso
				$correcto = false;
		
			}//fin comprobación expresión regular
	
			//devuelve el valor de correcto
			return $correcto;
	
		}//fin comprobación nombre

//----------------------------------------------------------------------------------------------------------------------

		/*Función ADD: Inserta en la tabla  de la bd los valores de los atributos del objeto. 
				  Comprueba si la clave/s está/n vacía/s y si existe ya en la tabla*/
		function ADD(){

			//si los datos están vacíos
			if(empty($this->login) || empty($this->password) || empty($this->dni) || empty($this->nombre) || empty($this->apellidos) || empty($this->telefono) || empty($this->email) || empty($this->fechaNacimiento) || empty($this->fotoPersonal) || empty($this->sexo)){

				//mensaje de error
				return 'Los datos no pueden estar vacios';
			
			}//fin comprobación datos vacíos

			//sentencia sql que selecciona una tupla a partir de la clave
			$sql = "SELECT * FROM USUARIOS WHERE (login = '$this->login')";

			//si no se puede ejecutar la select
			if (!$result = $this->mysqli->query($sql)){

				//devuelve mensaje de error
				return 'Error de gestor de base de datos';
		
			}//fin comprobación ejecución select

			//si existe el usuario
			if ($result->num_rows == 1){

				//devuelve mensaje de error
				return 'Inserción fallida: el elemento ya existe';
		
			}//fin comprobación existe usuario

			//sentencia sql que permite la inserción de un nuevo usuario con los datos recogidos
			$sql = "INSERT INTO USUARIOS (
			login,
			password,
			DNI,
			nombre,
			apellidos,
			telefono,
			email,
			FechaNacimiento,
			fotopersonal,
			sexo) 
			VALUES (
				'".$this->login."',
				'".$this->password."',
				'".$this->dni."',
				'".$this->nombre."',
				'".$this->apellidos."',
				'".$this->telefono."',
				'".$this->email."',
				'".$this->fechaNacimiento."',
				'".$this->fotoPersonal."',
				'".$this->sexo."'
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
					  Si van vacios devuelve todos los usuarios*/
		function SEARCH(){

			//sentencia sql de búsqueda de datos 
			$sql= "SELECT * FROM USUARIOS WHERE (
				login LIKE '%$this->login%' AND 
				password LIKE '%$this->password%' AND 
				DNI LIKE '%$this->dni%' AND 
				nombre LIKE '%$this->nombre%' AND 
				apellidos LIKE '%$this->apellidos%' AND 
				telefono LIKE '%$this->telefono%' AND
				email LIKE '%$this->email%' AND
				FechaNacimiento LIKE '%$this->fechaNacimiento%' AND
				fotopersonal LIKE '%$this->fotoPersonal%' AND
				sexo LIKE '%$this->sexo%')";

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

			//si el usuario a borrar es el que tiene la sesión iniciada
			$sql = "SELECT * FROM USUARIOS WHERE login = '$this->login'";
			if(($this->mysqli->query($sql))->fetch_array()['login'] == $_SESSION['login']){

				//desconecta la sesión
				include '../Functions/Desconectar.php';
			}
			
   			//sentencia sql que permite el borrado de una tupla a partir de su clave
   			$sql = "DELETE FROM USUARIOS
   				WHERE( login = '$this->login')";

   			//si no se puede ejecutar la sentencia
   			if ($this->mysqli->query($sql)){

				//devuelve un mensaje de confirmación
				$resultado = 'Borrado realizado con éxito';
			
			//en otro caso
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
				FROM USUARIOS
				WHERE (
					login = '$this->login' 
				)";

			//si no se puede ejecutar la sentencia sql
			if (!$resultado = $this->mysqli->query($sql)){
			
				//devuelve mensaje de error
				return 'Error de gestor de base de datos';
		
			//en otro caso
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
			var_dump($this->login);
			var_dump($this->password);
			var_dump($this->dni);
			var_dump($this->nombre);
			var_dump($this->apellidos);
			 var_dump($this->telefono);
			 var_dump($this->email);
			 var_dump($this->fechaNacimiento);
			 var_dump($this->fotoPersonal);
			 var_dump($this->sexo);
			//si los datos están vacíos
			if(empty($this->login) || empty($this->password) || empty($this->dni) || empty($this->nombre) || empty($this->apellidos) || empty($this->telefono) || empty($this->email) || empty($this->fechaNacimiento) || empty($this->fotoPersonal) || empty($this->sexo)){

				//mensaje de error
				return 'Los datos no pueden estar vacios';
			
			}//fin comprobación datos vacíos

			//sentencia sql que permite la edición de una tupla
			$sql = "UPDATE USUARIOS SET  
						login = '$this->login',
						password = '$this->password',
						DNI = '$this->dni',
						nombre = '$this->nombre',
						apellidos = '$this->apellidos',
						telefono = '$this->telefono',
						email = '$this->email',
						FechaNacimiento = '$this->fechaNacimiento',
						fotopersonal = '$this->fotoPersonal',
						sexo = '$this->sexo'
					WHERE (login = '$this->login')" ;

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


//------------------------------------------------------------------------------------------------------------------------

		/*Función login: realiza la comprobación de si existe el usuario en la bd 
						 y después si la pass es correcta para ese usuario. 
						 Si es asi devuelve true, en cualquier otro caso devuelve el error correspondiente*/
		function login(){

			//sentencia sql que devuelve una tupla a partir de su clave
			$sql = "SELECT *
				FROM USUARIOS
				WHERE (
					   login = '$this->login')";

			//realiza la consulta y almacena el resultado
			$resultado = $this->mysqli->query($sql);
	
			//si el resultado tiene cero tuplas
			if ($resultado->num_rows == 0){

				//devuelve un mensaje de error
				return 'El login no existe';
		
			//en otro caso
			}else{

				//almacena los datos del usuario en forma de array
				$tupla = $resultado->fetch_array();
		
				//si los datos de la contraseña se corresponden con la pasada por el usuario
				if ($tupla['password'] == $this->password){

					//devuelve true
					return true;
			
				//en otro caso
				}else{

					//devuelve un mensaje de error
					return 'La password para este usuario no es correcta';
		
				} //fin de comprobación contraseña 	correcta
	
			}//fin comprobación existe login
		}//fin metodo login

//------------------------------------------------------------------------------------------------------------------------
		//Función Register: muestra si el usuario ya existe y si no devuelve true	
		function Register(){

			//sentencia sql que selecciona  todos los datos de un usuario
			$sql = "SELECT * FROM USUARIOS WHERE (login = '".$this->login."')"; 

			//almacena el resultado de la consulta
			$result = $this->mysqli->query($sql); 
		
			// si existe el usuario
			if ($result->num_rows == 1){  
			
				//devuelve este mensaje
				return 'El usuario ya existe'; 
			
			//en otro caso
			}else{ 
	    	
    			//devuelve true, no existe el usuario
    			return true; 
			
			}//fin comprobación existe el usuario

		}//fin función Register

//------------------------------------------------------------------------------------------------------------------------
		function registrar(){
			
			//si los datos están vacíos
			if(empty($this->login) || empty($this->password) || empty($this->dni) || empty($this->nombre) || empty($this->apellidos) || empty($this->telefono) || empty($this->email) || empty($this->fechaNacimiento) || empty($this->fotoPersonal) || empty($this->sexo)){

				//mensaje de error
				return 'Los datos no pueden estar vacios';
			
			}//fin comprobación datos vacíos

			//sentencia sql que inserta el nuevo usuario con los datos pasados
			$sql = "INSERT INTO USUARIOS (
					login,
					password,
					DNI,
					nombre,
					apellidos,
					telefono,
					email,
					FechaNacimiento,
					fotopersonal,
					sexo) 
					VALUES (
						'".$this->login."',
						'".$this->password."',
						'".$this->dni."',
						'".$this->nombre."',
						'".$this->apellidos."',
						'".$this->telefono."',
						'".$this->email."',
						'".$this->fechaNacimiento."',
						'".$this->fotoPersonal."',
						'".$this->sexo."'
					)";
			
			//si no se puede llevar a cabo la sentencia	
			if (!$this->mysqli->query($sql)) {

				//devuelve mensaje de error
				return 'Error en la inserción';
		
			//en otro caso
			}else{
			
				//devuelve mensaje de confirmación
				return 'Inserción realizada con éxito';
		
			}//fin comprobación sentencia sql ejecutada correctamente		
	
		}//fin función registrar

	}//fin de clase

?> 