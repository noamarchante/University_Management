
<?php

/*
	Archivo php
	Nombre: USUARIOS_CONTROLLER.php
	Autor: 	Noa LÃ³pez Marchante
	Fecha de creaciÃ³n: 21/09/2019 
	FunciÃ³n: Script que recibe datos introducidos por el usuario a travÃ©s de una vista (asociada a una acciÃ³n). SegÃºn la acciÃ³n a realizar seleccionada (ADD, EDIT, SHOWCURRENT, DELETE, DEFAULT), el controlador llama a un mÃ©todo u otro del modelo.
*/

	//solicito trabajar con la session
	session_start(); 

	//llamada a la funciÃ³n de autenticaciÃ³n
	include '../Functions/Authentication.php';

	//si no estÃ¡ autenticado
	if (!IsAuthenticated()){ 
		
		//redireccionamiento a fichero index.php
		header('Location:../index.php'); 

	}//fin comprobaciÃ³n autenticaciÃ³n

	//llamada a los datos y funciones de los usuarios
	include '../Model/USUARIOS_Model.php'; 
	
	//llamada a la vista de la funciÃ³n ver todos de los usuarios
	include '../View/Usuarios/USUARIOS_SHOWALL_View.php'; 
	
	//llamada a la vista de la funciÃ³n buscar de los usuarios
	include '../View/Usuarios/USUARIOS_SEARCH_View.php'; 
	
	//llamada a la vista de la funciÃ³n aÃ±adir de los usuarios
	include '../View/Usuarios/USUARIOS_ADD_View.php'; 
	
	//llamada a la vista de la funciÃ³n editar de los usuarios
	include '../View/Usuarios/USUARIOS_EDIT_View.php'; 
	
	//llamada a la vista de la funciÃ³n borrar de los usuarios
	include '../View/Usuarios/USUARIOS_DELETE_View.php'; 
	
	//llamada a la vista de la funciÃ³n mostrar actual de los usuarios
	include '../View/Usuarios/USUARIOS_SHOWCURRENT_View.php'; 
	
	//llamada a la vista de los mensajes
	include '../View/MESSAGE_View.php'; 

//------------------------------------------------------------------------------------------------------------------------

	/* FunciÃ³n get_data_form(): Recoge los datos que el usuario introduce desde la vista y crea (y devuelve) un espacio con esos datos*/
	function get_data_form(){

		//variables almacenan los valores
		$login = $_REQUEST['login']; 
		$password = $_REQUEST['password']; 
		$dni = $_REQUEST['dni']; 
		$nombre = $_REQUEST['nombre'];
		$apellidos = $_REQUEST['apellidos']; 
		$telefono = $_REQUEST['telefono'];
		$email = $_REQUEST['email'];
		$fechaNacimiento = $_REQUEST['fechaNacimiento'];
		$fotoPersonal = $_FILES['fotoPersonal'];
		$sexo = $_REQUEST['sexo'];
		$action = $_REQUEST['action'];
		
		//Variable que almacena un objeto usuario
		$USUARIOS = new USUARIOS_Model(
		$login,
		$password,
		$dni,
		$nombre,
		$apellidos,
		$telefono,
		$email,
		$fechaNacimiento,
		$fotoPersonal,
		$sexo);

		//Devuelve el valor del objecto
		return $USUARIOS;

	}//fin funciÃ³n get_data_form()

	function get_data_form2(){

		//variables almacenan los valores
		$login = $_REQUEST['login']; 
		$password = $_REQUEST['password']; 
		$dni = $_REQUEST['dni']; 
		$nombre = $_REQUEST['nombre'];
		$apellidos = $_REQUEST['apellidos']; 
		$telefono = $_REQUEST['telefono'];
		$email = $_REQUEST['email'];
		$fechaNacimiento = $_REQUEST['fechaNacimiento'];
		//$fotoPersonal = $_FILES['fotoPersonal'];
		$sexo = $_REQUEST['sexo'];

		if ( isset( $_FILES[ 'fotoPersonal' ][ 'name' ] ) ) {//mira si existe una ruta
			$nombreRuta = $_FILES[ 'fotoPersonal' ][ 'name' ];//Variable que almacena el nombreRuta la ruta del archivo
		} else {//si no existe la ruta le asignamos a la variable el valor null
			$nombreRuta = null;
		}

		if ( isset( $_FILES[ 'fotoPersonal' ][ 'tmp_name' ] ) ) {//mira si existe una ruta con un nombre temporal
			$nombreTempRuta = $_FILES[ 'fotoPersonal' ][ 'tmp_name' ];//Variable que almacena el nombreRuta de la ruta del archivo con un nombre temporal
		} else {//si no existe la ruta le asignamos a la variable el valor null
			$nombreTempRuta = null;
		}
	   
		if (!file_exists("../Files/" . $login)){ //miramos si no existe este fichero, en el caso de que no exista lo creamos
				  //Da permisos a la carpete
				  mkdir("../Files/" . $login, 0777);
	   }
	
		if ( $nombreRuta != null ) {//mira si la variable nombreRuta no es vacía
			$dir_subida = '../Files/' . $login.'/';//Variable que almacena la ruta donde se va a subir el archivo
			$rutapersonal = $dir_subida . $nombreRuta;//Variable que almacena la dirección de subida.
			move_uploaded_file( $nombreTempRuta, $rutapersonal );//movemos el archivo a la dirección especificada
		}

		$action = $_REQUEST['action'];
		
		//Variable que almacena un objeto usuario
		$USUARIOS = new USUARIOS_Model(
		$login,
		$password,
		$dni,
		$nombre,
		$apellidos,
		$telefono,
		$email,
		$fechaNacimiento,
		$rutapersonal,
		$sexo);

		//Devuelve el valor del objecto
		return $USUARIOS;

	}//fin funciÃ³n get_data_form()

	function get_data_form3(){

		//variables almacenan los valores
		$login = $_REQUEST['login']; 
		$password = $_REQUEST['password']; 
		$dni = $_REQUEST['dni']; 
		$nombre = $_REQUEST['nombre'];
		$apellidos = $_REQUEST['apellidos']; 
		$telefono = $_REQUEST['telefono'];
		$email = $_REQUEST['email'];
		$fechaNacimiento = $_REQUEST['fechaNacimiento'];
		//$fotoPersonal = $_FILES['fotoPersonal'];
		$sexo = $_REQUEST['sexo'];

		unlink($_REQUEST['fotoPersonal']);

		$action = $_REQUEST['action'];
		
		//Variable que almacena un objeto usuario
		$USUARIOS = new USUARIOS_Model(
		$login,
		$password,
		$dni,
		$nombre,
		$apellidos,
		$telefono,
		$email,
		$fechaNacimiento,
		$rutapersonal,
		$sexo);

		//Devuelve el valor del objecto
		return $USUARIOS;

	}//fin funciÃ³n get_data_form()
	
	// si no existe la variable action
	if (!isset($_REQUEST['action'])){  

		//la crea vacia para no tener error de undefined index
		$_REQUEST['action'] = ''; 

	}//fin comprobaciÃ³n existe variable action

	// En funcion del action realizamos las acciones necesarias
	Switch ($_REQUEST['action']){

		//en el caso de que la acciÃ³n sea aÃ±adir
		case 'ADD': 

			//si no le llegan los datos
			if (!$_POST){ 
				
				// se invoca la vista de add de usuarios
				new USUARIOS_ADD(); 
				
			//si le llegan los datos
			}else{ 
			
				//se recogen los datos del formulario
				$USUARIOS = get_data_form2(); 

				//llamada a la funciÃ³n aÃ±adir
				$respuesta = $USUARIOS->ADD(); 

				//se crea un nuevo mensaje con la respuesta de la funciÃ³n aÃ±adir
				new MESSAGE($respuesta, '../Controller/USUARIOS_Controller.php'); 

			} //fin comprobaciÃ³n hay datos

		//fin opciÃ³n del case
		break; 	

		//en el caso de que la acciÃ³n sea borrar
		case 'DELETE': 

			//si no le llegan los datos por get
			if (!$_POST){ 

				//se crea un nuevo objeto usuario con la informaciÃ³n de su login
				$USUARIOS = new USUARIOS_Model($_REQUEST['login'],'','','','','','','','',''); 

				//se utilia la funciÃ³n rellena datos para mostrar todos los datos de ese usuario
				$valores = $USUARIOS->RellenaDatos();

				//se le muestra al usuario la vista de borrado con los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				new USUARIOS_DELETE($valores); 
			
			//si le llegan los datos
			}else{ 

				//se recogen los datos del formulario
				$USUARIOS = get_data_form3(); 

				//se llama a la funciÃ³n borrar del usuario
				$respuesta = $USUARIOS->DELETE(); 

				//muestra el mensaje devuelto por la funciÃ³n
				new MESSAGE($respuesta, '../Controller/USUARIOS_Controller.php'); 
				
			}//fin comprobaciÃ³n hay datos
			
		//fin opciÃ³n del case
		break; 

		//en el caso de que la acciÃ³n sea editar
		case 'EDIT':
			
			//si no le llegan los datos
			if (!$_POST){ 

				// Creo el objeto	
				$USUARIOS = new USUARIOS_Model($_REQUEST['login'],'','','','','','','','',''); 

				// obtengo todos los datos de la tupla
				$valores = $USUARIOS->RellenaDatos();
			
				//si lo que se pasa en valores es un array
				if (is_array($valores)){

					//invoco la vista de edit con los datos precargados
					new USUARIOS_EDIT($valores);
				
				//si loe llegan los datos	
				}else{
					
					//muestra mensaje de error correspondiente	
					new MESSAGE($valores, '../Controller/USUARIOS_Controller.php');
				
				} //fin comprobaciÃ³n valores es un array

			//en otro caso
			}else{

				//recojo los valores del formulario
				$USUARIOS = get_data_form2(); 

				// update en la bd mediante la funciÃ³n editar
				$respuesta = $USUARIOS->EDIT(); 

				//muestra el mensaje devuelto por la funciÃ³n
				new MESSAGE($respuesta, '../Controller/USUARIOS_Controller.php'); 

			}//fin comprobaciÃ³n hay datos

		//fin opciÃ³n del case
		break;

		//en caso de que la acciÃ³n sea buscar
		case 'SEARCH':

			//si no llegaron los datos
			if (!$_POST){ 
					
				//se crea una nueva vista buscar
				new USUARIOS_SEARCH(); 
			
			//en otro caso
			}else{ 
					
				//recojo los valores del formulario
				$USUARIOS = get_data_form();
				
				//se llama a la funciÃ³n buscar
				$datos = $USUARIOS->SEARCH();

				//guarda una lista de nombres de atributos
				$lista = array('login','email'); 

				//muestra la vista de mostrar todos los usuarios con una tabla formada por los nombres almacenamos en la lista y los valores de los atributos
				new USUARIOS_SHOWALL($lista, $datos, '../index.php'); 
			
			} //fin comprobaciÃ³n hay datos

		//fin opciÃ³n del case
		break;

		//si la acciÃ³n es mostrar el usuario actual
		case 'SHOWCURRENT':
	
			//se crea un objeto usuario con su clave
			$USUARIOS = new USUARIOS_Model($_REQUEST['login'],'','','','','','','','',''); 

			//obtengo todos los datos de la tupla
			$valores = $USUARIOS->RellenaDatos(); 

			//llamada a la vista de mostrar usuario actual con los datos obtenidos
			new USUARIOS_SHOWCURRENT($valores); 

		//fin opciÃ³n del case
		break; 

		//si la acciÃ³n no se especifica
		default:
		
			//si no se pasan datos
			if (!$_POST){ 

				//se crea un objeto usuario vacio
				$USUARIOS = new USUARIOS_Model('','','','','','','','','',''); 

			//si le llegan los datos
			}else{ 

				//recojo los valores del formulario
				$USUARIOS = get_data_form(); 
			
			}//fin comprobaciÃ³n hay datos

			//se llama a la funciÃ³n buscar
			$datos = $USUARIOS->SEARCH(); 

			//se guardan unos nombres para los atributos
			$lista = array('login','email'); 

			//se llama a la vista de mostrar todos los usuarios con los nombres y atributos correspondientes
			new USUARIOS_SHOWALL($lista, $datos); 
	
	}//fin selecciÃ³n action

?>
