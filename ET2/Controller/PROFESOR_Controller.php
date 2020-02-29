<?php

/*
	Archivo php
	Nombre: PROFESOR_CONTROLLER.php
	Autor: 	Noa López Marchante
	Fecha de creación: 05/10/2019 
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

	//llamada a los datos y funciones de los profesor
	include '../Model/PROFESOR_Model.php'; 
	
	//llamada a la vista de la función ver todos los profesor
	include '../View/Profesor/PROFESOR_SHOWALL_View.php'; 
	
	//llamada a la vista de la función buscar profesor
	include '../View/Profesor/PROFESOR_SEARCH_View.php'; 
	
	//llamada a la vista de la función añadir profesor
	include '../View/Profesor/PROFESOR_ADD_View.php'; 
	
	//llamada a la vista de la función editar profesor
	include '../View/Profesor/PROFESOR_EDIT_View.php'; 
	
	//llamada a la vista de la función borrar profesor
	include '../View/Profesor/PROFESOR_DELETE_View.php'; 
	
	//llamada a la vista de la función mostrar información detallada del profesor
	include '../View/Profesor/PROFESOR_SHOWCURRENT_View.php'; 
	
	//llamada a la vista de los mensajes
	include '../View/MESSAGE_View.php'; 

//------------------------------------------------------------------------------------------------------------------------

	/* Función get_data_form(): Recoge los datos que el usuario introduce desde la vista y crea (y devuelve) un espacio con esos datos*/
	function get_data_form(){

		//variables almacenan los valores
		$dni = $_POST['dni']; 
		$nombreProfesor = $_POST['nombre'];
		$apellidosProfesor = $_POST['apellidos'];
		$areaProfesor = $_POST['area'];
		$departamentoProfesor = $_POST['departamento'];
		$action = $_POST['action'];
		
		//Variable que almacena un objeto profesor
		$PROFESOR = new PROFESOR_Model(
		$dni,
		$nombreProfesor,
		$apellidosProfesor,
		$areaProfesor,
		$departamentoProfesor
		);

		//Devuelve el valor del objecto
		return $PROFESOR;

	}//fin función get_data_form()

	
	// si no existe la variable action
	if (!isset($_REQUEST['action'])){  

		//la crea vacia para no tener error de undefined index
		$_REQUEST['action'] = ''; 

	}//fin comprobación existe variable action

	// En funcion del action se realizan las acciones necesarias
	Switch ($_REQUEST['action']){

		//en el caso de que la acción sea añadir
		case 'ADD': 

			//si no le llegan los datos
			if (!$_POST){ 

				// se invoca la vista de add de profesor
				new PROFESOR_ADD(); 
			
			//si le llegan los datos
			}else{ 
			
				//se recogen los datos del formulario
				$PROFESOR = get_data_form(); 

				//llamada a la función añadir
				$respuesta = $PROFESOR->ADD(); 

				//se crea un nuevo mensaje con la respuesta de la función añadir
				new MESSAGE($respuesta, '../Controller/PROFESOR_Controller.php'); 

			} //fin comprobación hay datos

		//fin opción del case
		break; 	

		//en el caso de que la acción sea borrar
		case 'DELETE': 

			//si no le llegan los datos 
			if (!$_POST){ 

				//se crea un nuevo objeto profesor con la información de su dni
				$PROFESOR = new PROFESOR_Model($_REQUEST['DNI'],'','','',''); 

				//se utilia la función rellena datos para mostrar todos los datos de ese profesor
				$valores = $PROFESOR->RellenaDatos();

				//se le muestra al usuario la vista de borrado con los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				new PROFESOR_DELETE($valores); 
			
			//si llegan los datos
			}else{ 

				//se recogen los datos del formulario
				$PROFESOR = get_data_form(); 

				//se llama a la función borrar del profesor
				$respuesta = $PROFESOR->DELETE(); 

				//muestra el mensaje devuelto por la función
				new MESSAGE($respuesta, '../Controller/PROFESOR_Controller.php'); 
				
			}//fin comprobación hay datos
			
		//fin opción del case
		break; 

		//en el caso de que la acción sea editar
		case 'EDIT':
			
			//si no le llegan los datos
			if (!$_POST){ 

				// Creo el objeto	
				$PROFESOR = new PROFESOR_Model($_REQUEST['DNI'],'','','',''); 

				// se obtienen todos los datos de la tupla
				$valores = $PROFESOR->RellenaDatos();
			
				//si lo que se pasa en valores es un array
				if (is_array($valores)){

					//se llama a la vista de edit con los datos precargados
					new PROFESOR_EDIT($valores);
				
				//si no es un array
				}else{
					
					//muestra mensaje de error correspondiente	
					new MESSAGE($valores, '../Controller/PROFESOR_Controller.php');

				} //fin comprobación valores es un array

			//si le pasan datos
			}else{

				//se recogen los valores del formulario
				$PROFESOR = get_data_form(); 

				// update en la bd mediante la función editar
				$respuesta = $PROFESOR->EDIT(); 

				//muestra el mensaje devuelto por la función
				new MESSAGE($respuesta, '../Controller/PROFESOR_Controller.php'); 

			}//fin comprobación hay datos

		//fin opción del case
		break;

		//en caso de que la acción sea buscar
		case 'SEARCH':

			//si no llegaron los datos
			if (!$_POST){ 
					
				//se crea una nueva vista buscar
				new PROFESOR_SEARCH(); 
			
			//si le llegan los datos
			}else{ 
					
				//se recogen los valores del formulario
				$PROFESOR = get_data_form();
				
				//se llama a la función buscar
				$datos = $PROFESOR->SEARCH();

				//guarda una lista de nombres de atributos
				$lista = array('NOMBREPROFESOR','APELLIDOSPROFESOR','AREAPROFESOR'); 

				//muestra la vista de mostrar todos los profesores con una tabla formada por los nombres almacenamos en la lista y los valores de los atributos
				new PROFESOR_SHOWALL($lista, $datos, '../index.php'); 
			
			} //fin comprobación hay datos

		//fin opción del case
		break;

		//si la acción es mostrar todos los datos del profesor actual
		case 'SHOWCURRENT':
	
			//se crea un objeto profesor con su clave
			$PROFESOR = new PROFESOR_Model($_REQUEST['DNI'],'','','',''); 

			//se obtienen todos los datos de la tupla
			$valores = $PROFESOR->RellenaDatos(); 

			//llamada a la vista de mostrar profesor actual con los datos obtenidos
			new PROFESOR_SHOWCURRENT($valores); 

		//fin opción del case
		break; 

		//si la acción no se especifica
		default:

			//si no se pasan datos
			if (!$_POST){ 

				//se crea un objeto profesor vacio
				$PROFESOR = new PROFESOR_Model('','','','',''); 

			//si se pasan los datos
			}else{ 

				//se recogen los valores del formulario
				$PROFESOR = get_data_form(); 
			
			}//fin comprobación hay datos

			//se llama a la función buscar
			$datos = $PROFESOR->SEARCH(); 

			//se guardan unos nombres para los atributos
			$lista = array('NOMBREPROFESOR','APELLIDOSPROFESOR','AREAPROFESOR'); 

			//se llama a la vista de mostrar todos los profesores con los nombres y atributos correspondientes
			new PROFESOR_SHOWALL($lista, $datos); 
	
	}//fin selección action

?>
