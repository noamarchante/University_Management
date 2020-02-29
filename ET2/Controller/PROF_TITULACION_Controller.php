<?php

/*
	Archivo php
	Nombre: PROF_TITULACION_Controller.php
	Autor: 	Noa López Marchante
	Fecha de creación: 09/10/2019 
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

	//llamada a los datos y funciones de la relación de profesores y titulación
	include '../Model/PROF_TITULACION_Model.php'; 
	
	//llamada a la vista de la función ver todos (SHOWALL) de la relación de profesores y titulación
	include '../View/Prof_Titulacion/PROF_TITULACION_SHOWALL_View.php'; 
	
	//llamada a la vista de la función buscar (SEARCH) de la relación de profesores y titulación
	include '../View/Prof_Titulacion/PROF_TITULACION_SEARCH_View.php'; 
	
	//llamada a la vista de la función añadir (ADD) de la relación de profesores y titulación
	include '../View/Prof_Titulacion/PROF_TITULACION_ADD_View.php'; 
	
	//llamada a la vista de la función editar (EDIT) de la relación de profesores y titulación
	include '../View/Prof_Titulacion/PROF_TITULACION_EDIT_View.php'; 
	
	//llamada a la vista de la función borrar (DELETE) de la relación de profesores y titulación
	include '../View/Prof_Titulacion/PROF_TITULACION_DELETE_View.php'; 
	
	//llamada a la vista de la función mostrar información detallada (SHOWCURRENT) de la relación de profesores y titulación
	include '../View/Prof_Titulacion/PROF_TITULACION_SHOWCURRENT_View.php'; 
	
	//llamada a la vista de los mensajes
	include '../View/MESSAGE_View.php'; 

//------------------------------------------------------------------------------------------------------------------------

	/* Función get_data_form(): Recoge los datos que el usuario introduce desde la vista y crea (y devuelve) un espacio con esos datos*/
	function get_data_form(){

		//Asignación de valores a las variables
		$dni = $_POST['dni']; 
		$codTitulacion = $_POST['codTitulacion'];
		$anhoAcademico = $_POST['anhoAcademico'];
		$action = $_POST['action'];
		
		//Variable que almacena un objeto prof_titulacion
		$PROF_TITULACION = new PROF_TITULACION_Model(
		$dni,
		$codTitulacion,
		$anhoAcademico
		);

		//Devuelve el valor del objecto
		return $PROF_TITULACION;

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

				// se invoca la vista de add
				new PROF_TITULACION_ADD(); 
			
			//si le llegan los datos
			}else{ 
			
				//se recogen los datos del formulario
				$PROF_TITULACION = get_data_form(); 

				//llamada a la función añadir
				$respuesta = $PROF_TITULACION->ADD(); 

				//se crea un nuevo mensaje con la respuesta de la función añadir
				new MESSAGE($respuesta, '../Controller/PROF_TITULACION_Controller.php'); 

			} //fin comprobación hay datos

		//fin opción del case
		break; 	

		//en el caso de que la acción sea borrar
		case 'DELETE': 

			//si no le llegan los datos
			if (!$_POST){ 

				//se crea un nuevo objeto prof_titulación con la información de su clave
				$PROF_TITULACION = new PROF_TITULACION_Model($_REQUEST['DNI'],$_REQUEST['CODTITULACION'],''); 

				//se utiliza la función rellena datos para recoger los datos
				$valores = $PROF_TITULACION->RellenaDatos();

				//se le muestra al usuario la vista de borrado con los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				new PROF_TITULACION_DELETE($valores); 
			
			//si le llegan los datos
			}else{ 

				//se recogen los datos del formulario
				$PROF_TITULACION = get_data_form(); 

				//se llama a la función borrar
				$respuesta = $PROF_TITULACION->DELETE(); 

				//muestra el mensaje devuelto por la función
				new MESSAGE($respuesta, '../Controller/PROF_TITULACION_Controller.php'); 
				
			}//fin comprobación hay datos
			
		//fin opción del case
		break; 

		//en el caso de que la acción sea editar
		case 'EDIT':
			
			//si no le llegan los datos
			if (!$_POST){ 

				// Creo el objeto con los valores de su clave
				$PROF_TITULACION = new PROF_TITULACION_Model($_REQUEST['DNI'],$_REQUEST['CODTITULACION'],''); 

				// se obtienen todos los datos de la tupla
				$valores = $PROF_TITULACION->RellenaDatos();
			
				//si lo que se pasa en valores es un array
				if (is_array($valores)){

					//invoco la vista de edit con los datos precargados
					new PROF_TITULACION_EDIT($valores);
				
				//si no se pasa un array	
				}else{
					
					//muestra mensaje de error correspondiente	
					new MESSAGE($valores, '../Controller/PROF_TITULACION_Controller.php');

				} //fin comprobación valores es un array

			//si le llegan los datos
			}else{

				//se recogen los valores del formulario
				$PROF_TITULACION = get_data_form(); 

				// update en la bd mediante la función editar
				$respuesta = $PROF_TITULACION->EDIT(); 

				//muestra el mensaje devuelto por la función
				new MESSAGE($respuesta, '../Controller/PROF_TITULACION_Controller.php'); 

			}//fin comprobación hay datos

		//fin opción del case
		break;

		//en caso de que la acción sea buscar
		case 'SEARCH':

			//si no llegaron los datos
			if (!$_POST){ 
					
				//se crea una nueva vista buscar
				new PROF_TITULACION_SEARCH(); 
			
			//si le llegan los datos
			}else{ 
					
				//se recogen los valores del formulario
				$PROF_TITULACION = get_data_form();
				
				//se llama a la función buscar
				$datos = $PROF_TITULACION->SEARCH();

				//guarda una lista de nombres de atributos
				$lista = array('DNI','CODTITULACION'); 

				//muestra la vista de mostrar todos con una tabla formada por los nombres almacenamos en la lista y los valores de los atributos
				new PROF_TITULACION_SHOWALL($lista, $datos, '../index.php'); 
			
			} //fin comprobación hay datos

		//fin opción del case
		break;

		//si la acción es mostrar todos los datos 
		case 'SHOWCURRENT':
	
			//se crea un objeto con su clave
			$PROF_TITULACION = new PROF_TITULACION_Model($_REQUEST['DNI'],$_REQUEST['CODTITULACION'],''); 

			//se obtienen todos los datos de la tupla
			$valores = $PROF_TITULACION->RellenaDatos(); 

			//llamada a la vista de mostrar todos los datos con los datos obtenidos
			new PROF_TITULACION_SHOWCURRENT($valores); 

		//fin opción del case
		break; 

		//si la acción no se especifica
		default:

			//si no se pasan datos
			if (!$_POST){ 

				//se crea un objeto vacio
				$PROF_TITULACION = new PROF_TITULACION_Model('','','',''); 

			//si se pasan los datos
			}else{ 

				//se recogen los valores del formulario
				$PROF_TITULACION = get_data_form(); 
			
			}//fin comprobación hay datos

			//se llama a la función buscar
			$datos = $PROF_TITULACION->SEARCH(); 

			//se guardan unos nombres para los atributos
			$lista = array('DNI','CODTITULACION'); 

			//se llama a la vista de mostrar todos con los nombres y atributos correspondientes
			new PROF_TITULACION_SHOWALL($lista, $datos); 
	
	}//fin selección action

?>
