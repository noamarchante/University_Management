
<?php

/*
	Archivo php
	Nombre: USUARIOS_CONTROLLER.php
	Autor: 	Noa López Marchante
	Fecha de creación: 21/09/2019 
	Función: Script que recibe datos introducidos por el usuario a través de una vista (asociada a una acción). Según la acción a realizar seleccionada (ADD, EDIT, SHOWCURRENT, DELETE, DEFAULT), el controlador llama a un método u otro del modelo.
*/

	//solicito trabajar con la session
	session_start(); 

	//llamada a la función de autenticación
	include '../Functions/Authentication.php';

	//si no está autenticado
	if (!IsAuthenticated()){ 
		
		//redireccionamiento a fichero index.php
		header('Location:../index.php'); 

	}//fin comprobación autenticación

	//llamada a los datos y funciones de los usuarios
	include '../Model/USUARIOS_Model.php'; 
	
	//llamada a la vista de la función ver todos de los usuarios
	include '../View/Usuarios/USUARIOS_SHOWALL_View.php'; 
	
	//llamada a la vista de la función buscar de los usuarios
	include '../View/Usuarios/USUARIOS_SEARCH_View.php'; 
	
	//llamada a la vista de la función añadir de los usuarios
	include '../View/Usuarios/USUARIOS_ADD_View.php'; 
	
	//llamada a la vista de la función editar de los usuarios
	include '../View/Usuarios/USUARIOS_EDIT_View.php'; 
	
	//llamada a la vista de la función borrar de los usuarios
	include '../View/Usuarios/USUARIOS_DELETE_View.php'; 
	
	//llamada a la vista de la función mostrar actual de los usuarios
	include '../View/Usuarios/USUARIOS_SHOWCURRENT_View.php'; 
	
	//llamada a la vista de los mensajes
	include '../View/MESSAGE_View.php'; 

//------------------------------------------------------------------------------------------------------------------------

	/* Función get_data_form(): Recoge los datos que el usuario introduce desde la vista y crea (y devuelve) un espacio con esos datos*/
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
		$fotoPersonal = $_REQUEST['fotoPersonal'];
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

	}//fin función get_data_form()

	
	// si no existe la variable action
	if (!isset($_REQUEST['action'])){  

		//la crea vacia para no tener error de undefined index
		$_REQUEST['action'] = ''; 

	}//fin comprobación existe variable action

	// En funcion del action realizamos las acciones necesarias
	Switch ($_REQUEST['action']){

		//en el caso de que la acción sea añadir
		case 'ADD': 

			//si no le llegan los datos
			if (!$_POST){ 
				
				// se invoca la vista de add de usuarios
				new USUARIOS_ADD(); 
				
			//si le llegan los datos
			}else{ 
			
				//se recogen los datos del formulario
				$USUARIOS = get_data_form(); 

				//llamada a la función añadir
				$respuesta = $USUARIOS->ADD(); 

				//se crea un nuevo mensaje con la respuesta de la función añadir
				new MESSAGE($respuesta, '../Controller/USUARIOS_Controller.php'); 

			} //fin comprobación hay datos

		//fin opción del case
		break; 	

		//en el caso de que la acción sea borrar
		case 'DELETE': 

			//si no le llegan los datos por get
			if (!$_POST){ 

				//se crea un nuevo objeto usuario con la información de su login
				$USUARIOS = new USUARIOS_Model($_REQUEST['login'],'','','','','','','','',''); 

				//se utilia la función rellena datos para mostrar todos los datos de ese usuario
				$valores = $USUARIOS->RellenaDatos();

				//se le muestra al usuario la vista de borrado con los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				new USUARIOS_DELETE($valores); 
			
			//si le llegan los datos
			}else{ 

				//se recogen los datos del formulario
				$USUARIOS = get_data_form(); 

				//se llama a la función borrar del usuario
				$respuesta = $USUARIOS->DELETE(); 

				//muestra el mensaje devuelto por la función
				new MESSAGE($respuesta, '../Controller/USUARIOS_Controller.php'); 
				
			}//fin comprobación hay datos
			
		//fin opción del case
		break; 

		//en el caso de que la acción sea editar
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
				
				} //fin comprobación valores es un array

			//en otro caso
			}else{

				//recojo los valores del formulario
				$USUARIOS = get_data_form(); 

				// update en la bd mediante la función editar
				$respuesta = $USUARIOS->EDIT(); 

				//muestra el mensaje devuelto por la función
				new MESSAGE($respuesta, '../Controller/USUARIOS_Controller.php'); 

			}//fin comprobación hay datos

		//fin opción del case
		break;

		//en caso de que la acción sea buscar
		case 'SEARCH':

			//si no llegaron los datos
			if (!$_POST){ 
					
				//se crea una nueva vista buscar
				new USUARIOS_SEARCH(); 
			
			//en otro caso
			}else{ 
					
				//recojo los valores del formulario
				$USUARIOS = get_data_form();
				
				//se llama a la función buscar
				$datos = $USUARIOS->SEARCH();

				//guarda una lista de nombres de atributos
				$lista = array('login','email'); 

				//muestra la vista de mostrar todos los usuarios con una tabla formada por los nombres almacenamos en la lista y los valores de los atributos
				new USUARIOS_SHOWALL($lista, $datos, '../index.php'); 
			
			} //fin comprobación hay datos

		//fin opción del case
		break;

		//si la acción es mostrar el usuario actual
		case 'SHOWCURRENT':
	
			//se crea un objeto usuario con su clave
			$USUARIOS = new USUARIOS_Model($_REQUEST['login'],'','','','','','','','',''); 

			//obtengo todos los datos de la tupla
			$valores = $USUARIOS->RellenaDatos(); 

			//llamada a la vista de mostrar usuario actual con los datos obtenidos
			new USUARIOS_SHOWCURRENT($valores); 

		//fin opción del case
		break; 

		//si la acción no se especifica
		default:
		
			//si no se pasan datos
			if (!$_POST){ 

				//se crea un objeto usuario vacio
				$USUARIOS = new USUARIOS_Model('','','','','','','','','',''); 

			//si le llegan los datos
			}else{ 

				//recojo los valores del formulario
				$USUARIOS = get_data_form(); 
			
			}//fin comprobación hay datos

			//se llama a la función buscar
			$datos = $USUARIOS->SEARCH(); 

			//se guardan unos nombres para los atributos
			$lista = array('login','email'); 

			//se llama a la vista de mostrar todos los usuarios con los nombres y atributos correspondientes
			new USUARIOS_SHOWALL($lista, $datos); 
	
	}//fin selección action

?>
