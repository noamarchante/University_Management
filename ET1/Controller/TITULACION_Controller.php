<?php

/*
	Archivo php
	Nombre: TITULACION_Controller.php
	Autor: 	Noa López Marchante
	Fecha de creación: 08/10/2019 
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

	//llamada a los datos y funciones de los titulacion
	include '../Model/TITULACION_Model.php'; 
	
	//llamada a la vista de la función ver todas las titulaciones
	include '../View/Titulacion/TITULACION_SHOWALL_View.php'; 
	
	//llamada a la vista de la función buscar titulaciones
	include '../View/Titulacion/TITULACION_SEARCH_View.php'; 
	
	//llamada a la vista de la función añadir titulación
	include '../View/Titulacion/TITULACION_ADD_View.php'; 
	
	//llamada a la vista de la función editar titulación
	include '../View/Titulacion/TITULACION_EDIT_View.php'; 
	
	//llamada a la vista de la función borrar titulación
	include '../View/Titulacion/TITULACION_DELETE_View.php'; 
	
	//llamada a la vista de la función mostrar información detallada de titulación
	include '../View/Titulacion/TITULACION_SHOWCURRENT_View.php'; 
	
	//llamada a la vista de los mensajes
	include '../View/MESSAGE_View.php'; 

//------------------------------------------------------------------------------------------------------------------------

	/* Función get_data_form(): Recoge los datos que el usuario introduce desde la vista y crea (y devuelve) un espacio con esos datos*/
	function get_data_form(){

		//Asignación de valores a las variables
		$codTitulacion = $_POST['codTitulacion'];
		$codCentro = $_POST['codCentro']; 
		$nombreTitulacion = $_POST['nombreTitulacion'];
		$responsableTitulacion = $_POST['responsableTitulacion'];
		$action = $_POST['action'];
		
		//Variable que almacena un objeto titulacion
		$TITULACION = new TITULACION_Model(
		$codTitulacion,
		$codCentro,
		$nombreTitulacion,
		$responsableTitulacion
		);

		//Devuelve el valor del objecto
		return $TITULACION;

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

				// se invoca la vista de add de titulacion
				new TITULACION_ADD(); 
			
			//si le llegan los datos
			}else{ 
			
				//se recogen los datos del formulario
				$TITULACION = get_data_form(); 

				//llamada a la función añadir
				$respuesta = $TITULACION->ADD(); 

				//se crea un nuevo mensaje con la respuesta de la función añadir
				new MESSAGE($respuesta, '../Controller/TITULACION_Controller.php'); 

			} //fin comprobación hay datos

		//fin opción del case
		break; 	

		//en el caso de que la acción sea borrar
		case 'DELETE': 

			//si no le llegan los datos por post
			if (!$_POST){ 

				//se crea un nuevo objeto titulacion con la información de su código de titulacion
				$TITULACION = new TITULACION_Model($_REQUEST['CODTITULACION'],'','',''); 

				//se utilia la función rellena datos para mostrar todos los datos de ese titulacion
				$valores = $TITULACION->RellenaDatos();

				//se le muestra al usuario la vista de borrado de titulacion con los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				new TITULACION_DELETE($valores); 
			
			//si le llegan los datos
			}else{ 

				//se recogen los datos del formulario
				$TITULACION = get_data_form(); 

				//se llama a la función borrar del titulacion
				$respuesta = $TITULACION->DELETE(); 

				//muestra el mensaje devuelto por la función
				new MESSAGE($respuesta, '../Controller/TITULACION_Controller.php'); 
				
			}//fin comprobación hay datos
			
		//fin opción del case
		break; 

		//en el caso de que la acción sea editar
		case 'EDIT':
			
			//si no le llegan los datos
			if (!$_POST){ 

				// Creo el objeto	
				$TITULACION = new TITULACION_Model($_REQUEST['CODTITULACION'],'','',''); 

				// obtengo todos los datos de la tupla
				$valores = $TITULACION->RellenaDatos();
			
				//si lo que se pasa en valores es un array
				if (is_array($valores)){

					//invoco la vista de edit con los datos precargados
					new TITULACION_EDIT($valores);
				
				//si no es un array	
				}else{
					
					//muestra mensaje de error correspondiente	
					new MESSAGE($valores, '../Controller/TITULACION_Controller.php');

				} //fin comprobación valores es un array

			//si le llegan los datos
			}else{

				//recojo los valores del formulario
				$TITULACION = get_data_form(); 

				// update en la bd mediante la función editar
				$respuesta = $TITULACION->EDIT(); 

				//muestra el mensaje devuelto por la función
				new MESSAGE($respuesta, '../Controller/TITULACION_Controller.php'); 

			}//fin comprobación hay datos

		//fin opción del case
		break;

		//en caso de que la acción sea buscar
		case 'SEARCH':

			//si no llegaron los datos
			if (!$_POST){ 
					
				//se crea una nueva vista buscar
				new TITULACION_SEARCH(); 
			
			//si le llegan los datos
			}else{ 
					
				//recojo los valores del formulario
				$TITULACION = get_data_form();
				
				//se llama a la función buscar
				$datos = $TITULACION->SEARCH();

				//guarda una lista de nombres de atributos
				$lista = array('NOMBRETITULACION','RESPONSABLETITULACION'); 

				//muestra la vista de mostrar todos los titulaciones con una tabla formada por los nombres almacenamos en la lista y los valores de los atributos
				new TITULACION_SHOWALL($lista, $datos, '../index.php'); 
			
			} //fin comprobación hay datos

		//fin opción del case
		break;

		//si la acción es mostrar todos los datos del titulacion
		case 'SHOWCURRENT':
	
			//se crea un objeto titulacion con su clave
			$TITULACION = new TITULACION_Model($_REQUEST['CODTITULACION'],'','',''); 

			//obtengo todos los datos de la tupla
			$valores = $TITULACION->RellenaDatos(); 

			//llamada a la vista de mostrar todos los datos de titulacion con los datos obtenidos
			new TITULACION_SHOWCURRENT($valores); 

		//fin opción del case
		break; 

		//si la acción no se especifica
		default:

			//si no se pasan datos
			if (!$_POST){ 

				//se crea un objeto titulacion vacio
				$TITULACION = new TITULACION_Model('','','',''); 

			//si se pasan los datos
			}else{ 

				//recojo los valores del formulario
				$TITULACION = get_data_form(); 
			
			}//fin comprobación hay datos

			//se llama a la función buscar
			$datos = $TITULACION->SEARCH(); 

			//se guardan unos nombres para los atributos
			$lista = array('NOMBRETITULACION','RESPONSABLETITULACION'); 

			//se llama a la vista de mostrar todos los titulacion con los nombres y atributos correspondientes
			new TITULACION_SHOWALL($lista, $datos); 
	
	}//fin selección action

?>
