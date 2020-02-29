<?php

/*
	Archivo php
	Nombre: CENTRO_Controller.php
	Autor: 	Noa López Marchante
	Fecha de creación: 06/10/2019 
	Función: Script que recibe datos introducidos por el usuario a través de una vista (asociada a una acción). Según la acción a realizar seleccionada (ADD, EDIT, SHOWCURRENT, DELETE, DEFAULT), el controlador llama a un método u otro del modelo.
*/

	//solicitud para trabajar con la sesión
	session_start(); 

	//llamada a la función de autenticación
	include '../Functions/Authentication.php';

	//si no está autenticado
	if (!IsAuthenticated()){ 
		
		//redireccionamiento a fichero index.php
		header('Location:../index.php'); 

	}//fin comprobación autenticación

	//llamada a los datos y funciones de la entidad centro
	include '../Model/CENTRO_Model.php'; 
	
	//llamada a la vista de la función ver todos (SHOWALL) de los centros
	include '../View/Centro/CENTRO_SHOWALL_View.php'; 
	
	//llamada a la vista de la función buscar (SEARCH) de los centros
	include '../View/Centro/CENTRO_SEARCH_View.php'; 
	
	//llamada a la vista de la función añadir (ADD) de los centros
	include '../View/Centro/CENTRO_ADD_View.php'; 
	
	//llamada a la vista de la función editar (EDIT) de los centros
	include '../View/Centro/CENTRO_EDIT_View.php'; 
	
	//llamada a la vista de la función borrar (DELETE) de los centros
	include '../View/Centro/CENTRO_DELETE_View.php'; 
	
	//llamada a la vista de la función mostrar información detallada (SHOWCURRENT) de los centros
	include '../View/Centro/CENTRO_SHOWCURRENT_View.php'; 
	
	//llamada a la vista de los mensajes
	include '../View/MESSAGE_View.php'; 

//------------------------------------------------------------------------------------------------------------------------

	/* get_data_form(): Recoge los datos que el usuario introduce desde la vista y crea (y devuelve) un centro con esos datos*/
	function get_data_form(){

		//Asignación de valores a las variables
		$codCentro = $_POST['codCentro']; 
		$codEdificio = $_POST['codEdificio'];
		$nombreCentro = $_POST['nombreCentro'];
		$direccionCentro = $_POST['direccionCentro'];
		$responsableCentro = $_POST['responsableCentro'];
		$action = $_POST['action'];
		//Variable que almacena un objeto centro
		$CENTRO = new CENTRO_Model(
		$codCentro,
		$codEdificio,
		$nombreCentro,
		$direccionCentro,
		$responsableCentro
		);

		//Devuelve el valor del objecto
		return $CENTRO;

	}//fin función get_data_form()

	
	// si no existe la variable action
	if (!isset($_REQUEST['action'])){  

		//se crea vacía para no tener error de undefined index
		$_REQUEST['action'] = ''; 

	}//fin comprobación existe variable action

	// En funcion del action se realizan las acciones necesarias
	Switch ($_REQUEST['action']){

		//en el caso de que la acción sea añadir
		case 'ADD': 

			//si no se pasan datos al controlador
			if (!$_POST){ 

				// se invoca la vista de add de centros
				new CENTRO_ADD(); 
			
			//en caso de que se pasen datos al controlador
			}else{ 
			
				//se recogen los datos del formulario
				$CENTRO = get_data_form(); 

				//se llama a la función añadir y se guarda su respuesta en una variable
				$respuesta = $CENTRO->ADD(); 

				//se crea un nuevo mensaje con la respuesta de la función añadir
				new MESSAGE($respuesta, '../Controller/CENTRO_Controller.php'); 

			} //fin comprobación se pasan datos

		//fin opción del case
		break; 	

		//en el caso de que la acción sea borrar
		case 'DELETE': 

			//si no le llegan los datos
			if (!$_POST){ 

				//se crea un nuevo objeto centro con la información de su código de centro
				$CENTRO = new CENTRO_Model($_REQUEST['CODCENTRO'],'','','',''); 

				//se guardan los valores asociados al centro creado (a partir de la clave) en una variable 
				$valores = $CENTRO->RellenaDatos();

				//se le muestra al usuario la vista de borrado de centro con los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				new CENTRO_DELETE($valores); 
			
			//si llegan los datos a través de la vista
			}else{ 

				//se recogen los datos del formulario y se guardan en una variable
				$CENTRO = get_data_form(); 

				//se realiza el borrado de la tupla asociada a la variable anterior
				$respuesta = $CENTRO->DELETE(); 

				//muestra el mensaje devuelto por la función
				new MESSAGE($respuesta, '../Controller/CENTRO_Controller.php'); 
				
			}//fin comprobación hay datos
			
		//fin opción del case
		break; 

		//en el caso de que la acción sea editar
		case 'EDIT':
			
			//si no le llegan los datos
			if (!$_POST){ 

				// Crea un objeto centro al que se le pasa el valor de su clave	
				$CENTRO = new CENTRO_Model($_REQUEST['CODCENTRO'],'','','',''); 

				// obtengo todos los datos de la tupla
				$valores = $CENTRO->RellenaDatos();
			
				//si lo que se pasa en valores es un array
				if (is_array($valores)){

					//invoco la vista de edit con los datos precargados
					new CENTRO_EDIT($valores);
				
				//en caso de que no le llegue un array	
				}else{
					
					//muestra mensaje de error correspondiente	
					new MESSAGE($valores, '../Controller/CENTRO_Controller.php');

				} //fin comprobación valores es un array

			//si se le pasan los datos
			}else{

				//recojo los valores del formulario
				$CENTRO = get_data_form(); 

				// update en la bd mediante la función editar
				$respuesta = $CENTRO->EDIT(); 

				//muestra el mensaje devuelto por la función
				new MESSAGE($respuesta, '../Controller/CENTRO_Controller.php'); 

			}//fin comprobación hay datos

		//fin opción del case
		break;

		//en caso de que la acción sea buscar
		case 'SEARCH':

			//si no llegaron los datos
			if (!$_POST){ 
					
				//se crea una nueva vista buscar
				new CENTRO_SEARCH(); 
			
			//en ocaso de que le lleguen los datos
			}else{ 
					
				//recojo los valores del formulario
				$CENTRO = get_data_form();
				
				//se llama a la función buscar
				$datos = $CENTRO->SEARCH();
				
				//guarda una lista de nombres de atributos
				$lista = array('NOMBRECENTRO','DIRECCIONCENTRO'); 

				//muestra la vista de mostrar todos los centros con una tabla formada por los nombres almacenamos en la lista y los valores de los atributos
				new CENTRO_SHOWALL($lista, $datos, '../index.php'); 
			
			} //fin comprobación hay datos

		//fin opción del case
		break;

		//si la acción es mostrar todos los datos del centro
		case 'SHOWCURRENT':
	
			//se crea un objeto centro con su clave
			$CENTRO = new CENTRO_Model($_REQUEST['CODCENTRO'],'','','',''); 

			//obtengo todos los datos de la tupla
			$valores = $CENTRO->RellenaDatos(); 

			//llamada a la vista de mostrar todos los datos de centro con los datos obtenidos
			new CENTRO_SHOWCURRENT($valores); 

		//fin opción del case
		break; 

		//si la acción no se especifica
		default:

			//si no se pasan datos
			if (!$_POST){ 

				//se crea un objeto centro vacio
				$CENTRO = new CENTRO_Model('','','','',''); 

			//si se pasan datos
			}else{ 

				//recojo los valores del formulario
				$CENTRO = get_data_form(); 
			
			}//fin comprobación hay datos

			//se llama a la función buscar
			$datos = $CENTRO->SEARCH(); 

			//se guardan unos nombres para los atributos
			$lista = array('NOMBRECENTRO','DIRECCIONCENTRO'); 

			//se llama a la vista de mostrar todos los centros con los nombres y atributos correspondientes
			new CENTRO_SHOWALL($lista, $datos); 
	
	}//fin selección action

?>
