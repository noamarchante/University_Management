<?php

/*
	Archivo php
	Nombre: PROF_ESPACIO_Controller.php
	Autor: 	Noa López Marchante
	Fecha de creación: 08/10/2019 
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

	//llamada a los datos y funciones de la relacion de profesores y espacio
	include '../Model/PROF_ESPACIO_Model.php'; 
	
	//llamada a la vista de la función ver todos (SHOWALL) de la relacion de profesores y espacio
	include '../View/Prof_Espacio/PROF_ESPACIO_SHOWALL_View.php'; 
	
	//llamada a la vista de la función buscar (SEARCH) de la relacion de profesores y espacio
	include '../View/Prof_Espacio/PROF_ESPACIO_SEARCH_View.php'; 
	
	//llamada a la vista de la función añadir (ADD) de la relacion de profesores y espacio
	include '../View/Prof_Espacio/PROF_ESPACIO_ADD_View.php'; 
	
	//llamada a la vista de la función editar (EDIT) de la relacion de profesores y espacio
	include '../View/Prof_Espacio/PROF_ESPACIO_EDIT_View.php'; 
	
	//llamada a la vista de la función borrar (DELETE) de la relacion de profesores y espacio
	include '../View/Prof_Espacio/PROF_ESPACIO_DELETE_View.php'; 
	
	//llamada a la vista de la función mostrar información de la relacion de profesores y espacio
	include '../View/Prof_Espacio/PROF_ESPACIO_SHOWCURRENT_View.php'; 
	
	//llamada a la vista de los mensajes
	include '../View/MESSAGE_View.php'; 

//------------------------------------------------------------------------------------------------------------------------

	/* Función get_data_form(): Recoge los datos que el usuario introduce desde la vista y crea (y devuelve) un espacio con esos datos*/
	function get_data_form(){

		//Asignación de valores a las variables
		$dni = $_POST['dni'];
		$codEspacio = $_POST['codEspacio']; 
		$action = $_POST['action'];
		
		//Variable que almacena un objeto prof-espacio con los valores de las variables
		$PROF_ESPACIO = new PROF_ESPACIO_Model($dni,$codEspacio);

		//Devuelve el valor del objecto
		return $PROF_ESPACIO;

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

				// se invoca la vista de add de prof_espacio
				new PROF_ESPACIO_ADD(); 
			
			//si le llegan los datos
			}else{ 
			
				//se recogen los datos del formulario
				$PROF_ESPACIO = get_data_form(); 

				//llamada a la función añadir
				$respuesta = $PROF_ESPACIO->ADD(); 

				//se crea un nuevo mensaje con la respuesta de la función añadir
				new MESSAGE($respuesta, '../Controller/PROF_ESPACIO_Controller.php'); 

			} //fin comprobación hay datos

		//fin opción del case
		break; 	

		//en el caso de que la acción sea borrar
		case 'DELETE': 

			//si no le llegan los datos por post
			if (!$_POST){ 

				//se crea un nuevo objeto prof_espacio con la información de su clave
				$PROF_ESPACIO = new PROF_ESPACIO_Model($_REQUEST['DNI'],$_REQUEST['CODESPACIO']); 

				//se utiliza la función rellena datos para mostrar todos los datos 
				$valores = $PROF_ESPACIO->RellenaDatos();

				//se le muestra al usuario la vista de borrado con los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				new PROF_ESPACIO_DELETE($valores); 
			
			//si le llegan los datos
			}else{ 

				//se recogen los datos del formulario
				$PROF_ESPACIO = get_data_form(); 

				//se llama a la función borrar 
				$respuesta = $PROF_ESPACIO->DELETE(); 

				//muestra el mensaje devuelto por la función
				new MESSAGE($respuesta, '../Controller/PROF_ESPACIO_Controller.php'); 
				
			}//fin comprobación hay datos
			
		//fin opción del case
		break; 

		//en el caso de que la acción sea editar
		case 'EDIT':
			
			//si no le llegan los datos
			if (!$_POST){ 

				// Creo un objeto con los datyos de la clave
				$PROF_ESPACIO = new PROF_ESPACIO_Model($_REQUEST['DNI'],$_REQUEST['CODESPACIO']); 

				// se obtienen todos los datos de la tupla
				$valores = $PROF_ESPACIO->RellenaDatos();
				
				//si lo que se pasa en valores es un array
				if (is_array($valores)){

					//invoco la vista de edit con los datos precargados
					new PROF_ESPACIO_EDIT($valores);
				
				//si lo que se pasa no es un array	
				}else{
					
					//muestra mensaje de error correspondiente	
					new MESSAGE($valores, '../Controller/PROF_ESPACIO_Controller.php');

				} //fin comprobación valores es un array

			//si se pasan los datos
			}else{

				//se recogen los valores del formulario
				$PROF_ESPACIO = get_data_form(); 

				// update en la bd mediante la función editar
				$respuesta = $PROF_ESPACIO->EDIT(); 

				//muestra el mensaje devuelto por la función
				new MESSAGE($respuesta, '../Controller/PROF_ESPACIO_Controller.php'); 

			}//fin comprobación hay datos

		//fin opción del case
		break;

		//en caso de que la acción sea buscar
		case 'SEARCH':

			//si no llegaron los datos
			if (!$_POST){ 
					
				//se crea una nueva vista buscar
				new PROF_ESPACIO_SEARCH(); 
			
			//si llegan los datos
			}else{ 
					
				//se recogen los valores del formulario
				$PROF_ESPACIO = get_data_form();
				
				//se llama a la función buscar
				$datos = $PROF_ESPACIO->SEARCH();

				//guarda una lista de nombres de atributos
				$lista = array('DNI','CODESPACIO'); 

				//muestra la vista de mostrar todos con una tabla formada por los nombres almacenamos en la lista y los valores de los atributos
				new PROF_ESPACIO_SHOWALL($lista, $datos, '../index.php'); 
			
			} //fin comprobación hay datos

		//fin opción del case
		break;

		//si la acción es mostrar todos los datos 
		case 'SHOWCURRENT':
	
			//se crea un objeto PROF_ESPACIO con su clave
			$PROF_ESPACIO = new PROF_ESPACIO_Model($_REQUEST['DNI'],$_REQUEST['CODESPACIO']); 

			//se obtienen todos los datos de la tupla
			$valores = $PROF_ESPACIO->RellenaDatos(); 

			//llamada a la vista de mostrar todos los datos de la tupla seleccionada con los datos obtenidos
			new PROF_ESPACIO_SHOWCURRENT($valores); 

		//fin opción del case
		break; 

		//si la acción no se especifica
		default:

			//si no se pasan datos
			if (!$_POST){ 

				//se crea un objeto PROF_ESPACIO vacio
				$PROF_ESPACIO = new PROF_ESPACIO_Model('',''); 

			//si se pasan los datos
			}else{ 

				//recojo los valores del formulario
				$PROF_ESPACIO = get_data_form(); 
			
			}//fin comprobación hay datos

			//se llama a la función buscar
			$datos = $PROF_ESPACIO->SEARCH(); 

			//se guardan unos nombres para los atributos
			$lista = array('DNI','CODESPACIO'); 

			//se llama a la vista de mostrar todos con los nombres y atributos correspondientes
			new PROF_ESPACIO_SHOWALL($lista, $datos); 
	
	}//fin selección action

?>
