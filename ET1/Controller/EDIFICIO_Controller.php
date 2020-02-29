<?php

/*
	Archivo php
	Nombre: EDIFICIO_Controller.php
	Autor: 	Noa López Marchante
	Fecha de creación: 06/10/2019 
	Función: Script que recibe datos introducidos por el usuario a través de una vista (asociada a una acción). Según la acción a realizar seleccionada (ADD, EDIT, SHOWCURRENT, DELETE, DEFAULT), el controlador llama a un método u otro del modelo.
*/

	//solicitud para trabajar con la session
	session_start(); 

	//llamada a la función de autenticación
	include '../Functions/Authentication.php';

	//si no está autenticado
	if (!IsAuthenticated()){ 
		
		//redireccionamiento a fichero index.php
		header('Location:../index.php'); 

	}//fin comprobación autenticación

	//llamada a los datos y funciones de los edificios
	include '../Model/EDIFICIO_Model.php'; 
	
	//llamada a la vista de la función ver todos (SHOWALL) de los edificios
	include '../View/Edificio/EDIFICIO_SHOWALL_View.php'; 
	
	//llamada a la vista de la función buscar (SEARCH) de los edificios
	include '../View/Edificio/EDIFICIO_SEARCH_View.php'; 
	
	//llamada a la vista de la función añadir (ADD) de los edificios
	include '../View/Edificio/EDIFICIO_ADD_View.php'; 
	
	//llamada a la vista de la función editar (EDIT) de los edificios
	include '../View/Edificio/EDIFICIO_EDIT_View.php'; 
	
	//llamada a la vista de la función borrar (DELETE) de los edificios
	include '../View/Edificio/EDIFICIO_DELETE_View.php'; 
	
	//llamada a la vista de la función mostrar información detallada (SHOWCURRENT) de los edificios
	include '../View/Edificio/EDIFICIO_SHOWCURRENT_View.php'; 
	
	//llamada a la vista de los mensajes
	include '../View/MESSAGE_View.php'; 

//------------------------------------------------------------------------------------------------------------------------

	/* Función get_data_form(): Recoge los datos que el usuario introduce desde la vista y crea (y devuelve) un edificio con esos datos*/
	function get_data_form(){

		//Asignación de valores pasados desde la vista a las variables
		$codEdificio = $_POST['codEdificio']; 
		$nombreEdificio = $_POST['nombreEdificio'];
		$direccionEdificio = $_POST['direccionEdificio'];
		$campusEdificio = $_POST['campusEdificio'];
		$action = $_POST['action'];
		
		//Variable que almacena un objeto edificio creado con los valores anteriores
		$EDIFICIO = new EDIFICIO_Model(
		$codEdificio,
		$nombreEdificio,
		$direccionEdificio,
		$campusEdificio
		);

		//Devuelve el valor del objecto
		return $EDIFICIO;

	}//fin función get_data_form()

	
	// si no existe la variable action
	if (!isset($_REQUEST['action'])){  

		//Crea vacío el action para no tener error de undefined index
		$_REQUEST['action'] = ''; 

	}//fin comprobación existe variable action

	// En función del action se realizan las acciones necesarias
	Switch ($_REQUEST['action']){

		//en el caso de que la acción sea añadir
		case 'ADD': 

			//si no le llegan los datos
			if (!$_POST){ 

				// se invoca la vista de add de edificio
				new EDIFICIO_ADD(); 
			
			//en otro caso
			}else{ 
			
				//se recogen los datos del formulario
				$EDIFICIO = get_data_form(); 
	
				//llamada a la función añadir
				$respuesta = $EDIFICIO->ADD(); 

				//se crea un nuevo mensaje con la respuesta de la función añadir
				new MESSAGE($respuesta, '../Controller/EDIFICIO_Controller.php'); 

			} //fin comprobación hay datos

		//fin opción del case
		break; 	

		//en el caso de que la acción sea borrar
		case 'DELETE': 

			//si no le llegan los datos por post
			if (!$_POST){ 

				//se crea un nuevo objeto edificio con la información de su codigo de edificio
				$EDIFICIO = new EDIFICIO_Model($_REQUEST['CODEDIFICIO'],'','',''); 

				//se utiliza la función rellena datos para mostrar todos los datos de ese edificio
				$valores = $EDIFICIO->RellenaDatos();

				//se le muestra al usuario la vista de borrado del edificio con los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				new EDIFICIO_DELETE($valores); 
			
			//en caso de que le lleguen los datos
			}else{ 

				//se recogen los datos del formulario
				$EDIFICIO = get_data_form(); 

				//se llama a la función borrar del usuario
				$respuesta = $EDIFICIO->DELETE(); 

				//muestra el mensaje devuelto por la función
				new MESSAGE($respuesta, '../Controller/EDIFICIO_Controller.php'); 
				
			}//fin comprobación hay datos
			
		//fin opción del case
		break; 

		//en el caso de que la acción sea editar
		case 'EDIT':
			
			//si no le llegan los datos
			if (!$_POST){ 

				// Se crea el objeto edificio con su atributo clave
				$EDIFICIO = new EDIFICIO_Model($_REQUEST['CODEDIFICIO'],'','',''); 

				// Se obtiene todos los datos de la tupla
				$valores = $EDIFICIO->RellenaDatos();
			
				//si lo que se pasa en valores es un array
				if (is_array($valores)){

					//se invoca la vista de edit con los datos precargados
					new EDIFICIO_EDIT($valores);
				
				//en otro caso	
				}else{
					
					//muestra mensaje de error correspondiente	
					new MESSAGE($valores, '../Controller/EDIFICIO_Controller.php');
				
				} //fin comprobación valores es un array

			//si le llegan los datos
			}else{

				//se recogen los valores del formulario
				$EDIFICIO = get_data_form(); 

				// update en la bd mediante la función editar
				$respuesta = $EDIFICIO->EDIT(); 

				//muestra el mensaje devuelto por la función
				new MESSAGE($respuesta, '../Controller/EDIFICIO_Controller.php'); 

			}//fin comprobación hay datos

		//fin opción del case
		break;

		//en caso de que la acción sea buscar
		case 'SEARCH':

			//si no llegaron los datos
			if (!$_POST){ 
					
				//se crea una nueva vista buscar
				new EDIFICIO_SEARCH(); 
			
			//en caso de que le lleguen los datos
			}else{ 
					
				//se recogen los valores del formulario
				$EDIFICIO = get_data_form();
				
				//se llama a la función buscar
				$datos = $EDIFICIO->SEARCH();

				//guarda una lista de nombres de atributos
				$lista = array('NOMBREEDIFICIO','CAMPUSEDIFICIO'); 

				//muestra la vista de mostrar todos los edificios con una tabla formada por los nombres almacenamos en la lista y los valores de los atributos
				new EDIFICIO_SHOWALL($lista, $datos, '../index.php'); 
			
			} //fin comprobación hay datos

		//fin opción del case
		break;

		//si la acción es mostrar todos los datos del edificio seleccionado
		case 'SHOWCURRENT':
	
			//se crea un objeto edificio con su clave
			$EDIFICIO = new EDIFICIO_Model($_REQUEST['CODEDIFICIO'],'','',''); 

			//se obtienen todos los datos de la tupla
			$valores = $EDIFICIO->RellenaDatos(); 

			//llamada a la vista de mostrar datos del edificio seleccionado con los datos obtenidos
			new EDIFICIO_SHOWCURRENT($valores); 

		//fin opción del case
		break; 

		//si la acción no se especifica
		default:

			//si no se pasan datos
			if (!$_POST){ 

				//se crea un objeto edificio vacio
				$EDIFICIO = new EDIFICIO_Model('','','',''); 

			//en caso de que se pasen datos
			}else{ 

				//se recogen los valores del formulario
				$EDIFICIO = get_data_form(); 
			
			}//fin comprobación hay datos

			//se llama a la función buscar
			$datos = $EDIFICIO->SEARCH(); 

			//se guardan unos nombres para los atributos
			$lista = array('NOMBREEDIFICIO','CAMPUSEDIFICIO'); 

			//se llama a la vista de mostrar todos los edificios con los nombres y atributos correspondientes
			new EDIFICIO_SHOWALL($lista, $datos); 
	
	}//fin selección action

?>
