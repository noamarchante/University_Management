
<?php

/*
	Archivo php
	Nombre: ESPACIO_Controller.php
	Autor: 	Noa López Marchante
	Fecha de creación: 07/10/2019 
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

	//llamada a los datos y funciones de los espacios
	include '../Model/ESPACIO_Model.php'; 
	
	//llamada a la vista de la función ver todos (SHOWALL) de los espacios
	include '../View/Espacio/ESPACIO_SHOWALL_View.php'; 
	
	//llamada a la vista de la función buscar (SEARCH) de los espacios
	include '../View/Espacio/ESPACIO_SEARCH_View.php'; 
	
	//llamada a la vista de la función añadir (ADD) de los espacios
	include '../View/Espacio/ESPACIO_ADD_View.php'; 
	
	//llamada a la vista de la función editar (EDIT) de los espacios
	include '../View/Espacio/ESPACIO_EDIT_View.php'; 
	
	//llamada a la vista de la función borrar (DELETE) de los espacios
	include '../View/Espacio/ESPACIO_DELETE_View.php'; 
	
	//llamada a la vista de la función mostrar información detallada (SHOWCURRENT) de los espacios
	include '../View/Espacio/ESPACIO_SHOWCURRENT_View.php'; 
	
	//llamada a la vista de los mensajes
	include '../View/MESSAGE_View.php'; 

//------------------------------------------------------------------------------------------------------------------------

	/* Función get_data_form(): Recoge los datos que el usuario introduce desde la vista y crea (y devuelve) un espacio con esos datos*/
	function get_data_form(){

		//variables almacenan los valores develtos por la vista
		$codEspacio = $_REQUEST['codEspacio']; 
		$codEdificio = $_REQUEST['codEdificio']; 
		$codCentro = $_REQUEST['codCentro']; 
		$tipo = $_REQUEST['tipo'];
		$superficieEspacio = $_REQUEST['superficieEspacio']; 
		$numInventarioEspacio = $_REQUEST['numInventarioEspacio'];
		$action = $_REQUEST['action'];

		//Variable que almacena un objeto espacio con los datos anteriores
		$ESPACIO = new ESPACIO_Model(
		$codEspacio,
		$codEdificio,
		$codCentro,
		$tipo,
		$superficieEspacio,
		$numInventarioEspacio);

		//Devuelve el valor del objecto
		return $ESPACIO;

	}//fin función get_data_form()

	
	// si no existe la variable action
	if (!isset($_REQUEST['action'])){  

		//la crea vacía para no tener error de undefined index
		$_REQUEST['action'] = ''; 

	}//fin comprobación existe variable action

	// En funcion del action realizamos las acciones necesarias
	Switch ($_REQUEST['action']){

		//en el caso de que la acción sea añadir
		case 'ADD': 

			//si no le llegan los datos
			if (!$_POST){ 
				
				// se invoca la vista de add de espacio
				new ESPACIO_ADD(); 
				
			//si le llegan los datos
			}else{ 
			
				//se recogen los datos del formulario
				$ESPACIO = get_data_form(); 

				//llamada a la función añadir
				$respuesta = $ESPACIO->ADD(); 

				//se crea un nuevo mensaje con la respuesta de la función añadir
				new MESSAGE($respuesta, '../Controller/ESPACIO_Controller.php'); 

			} //fin comprobación hay datos

		//fin opción del case
		break; 	

		//en el caso de que la acción sea borrar
		case 'DELETE': 

			//si no le llegan los datos
			if (!$_POST){ 

				//se crea un nuevo objeto espacio con la información de su código de espacio
				$ESPACIO = new ESPACIO_Model($_REQUEST['CODESPACIO'],'','','','',''); 

				//se utilia la función rellena datos para mostrar todos los datos de ese espacio
				$valores = $ESPACIO->RellenaDatos();

				//se le muestra al usuario la vista de borrado con los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				new ESPACIO_DELETE($valores); 
			
			//si le llegan los datos
			}else{ 

				//se recogen los datos del formulario
				$ESPACIO = get_data_form(); 

				//se llama a la función borrar del espacio
				$respuesta = $ESPACIO->DELETE(); 

				//muestra el mensaje devuelto por la función
				new MESSAGE($respuesta, '../Controller/ESPACIO_Controller.php'); 
				
			}//fin comprobación hay datos
			
		//fin opción del case
		break; 

		//en el caso de que la acción sea editar
		case 'EDIT':
			
			//si no le llegan los datos
			if (!$_POST){ 

				// Creo el objeto con el atributo clave
				$ESPACIO = new ESPACIO_Model($_REQUEST['CODESPACIO'],'','','','',''); 

				//se obtienen todos los datos de la tupla
				$valores = $ESPACIO->RellenaDatos();
			
				//si lo que se pasa en valores es un array
				if (is_array($valores)){

					//invoco la vista de edit con los datos precargados
					new ESPACIO_EDIT($valores);
					
				//si no es un array
				}else{
					
					//muestra mensaje de error correspondiente	
					new MESSAGE($valores, '../Controller/ESPACIO_Controller.php');

				} //fin comprobación valores es un array

			//en caso de que reciba datos
			}else{

				//se recogen los valores del formulario
				$ESPACIO = get_data_form(); 

				// update en la bd mediante la función editar
				$respuesta = $ESPACIO->EDIT(); 

				//muestra el mensaje devuelto por la función
				new MESSAGE($respuesta, '../Controller/ESPACIO_Controller.php'); 

			}//fin comprobación hay datos

		//fin opción del case
		break;

		//en caso de que la acción sea buscar
		case 'SEARCH':

			//si no llegaron los datos
			if (!$_POST){ 
					
				//se crea una nueva vista buscar
				new ESPACIO_SEARCH(); 
			
			//si llegan los datos
			}else{ 
					
				//se recogen los valores del formulario
				$ESPACIO = get_data_form();
				
				//se llama a la función buscar
				$datos = $ESPACIO->SEARCH();

				//guarda una lista de nombres de atributos
				$lista = array('CODESPACIO','TIPO'); 

				//muestra la vista de mostrar todos los espacios con una tabla formada por los nombres almacenamos en la lista y los valores de los atributos
				new ESPACIO_SHOWALL($lista, $datos, '../index.php'); 
			
			} //fin comprobación hay datos

		//fin opción del case
		break;

		//si la acción es mostrar todos los datos del espacio actual
		case 'SHOWCURRENT':
	
			//se crea un objeto espacio con su clave
			$ESPACIO = new ESPACIO_Model($_REQUEST['CODESPACIO'],'','','','',''); 

			//se obtienen todos los datos de la tupla
			$valores = $ESPACIO->RellenaDatos(); 

			//llamada a la vista de mostrar datos espacio seleccionado con los datos obtenidos
			new ESPACIO_SHOWCURRENT($valores); 

		//fin opción del case
		break; 

		//si la acción no se especifica
		default:

			//si no se pasan datos
			if (!$_POST){ 

				//se crea un objeto usuario vacio
				$ESPACIO = new ESPACIO_Model('','','','','',''); 

			//si se pasan datos
			}else{ 

				//se recogen los valores del formulario
				$ESPACIO = get_data_form(); 
			
			}//fin comprobación hay datos

			//se llama a la función buscar
			$datos = $ESPACIO->SEARCH(); 

			//se guardan unos nombres para los atributos
			$lista = array('CODESPACIO','TIPO'); 

			//se llama a la vista de mostrar todos los espacios con los nombres y atributos correspondientes
			new ESPACIO_SHOWALL($lista, $datos); 
	
	}//fin selección action

?>
