<?php

/*
	Archivo php
	Nombre: PROFESOR_SEARCH_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 5/10/2019 
	Función: vista del menú buscar
*/

	class PROFESOR_SEARCH{ //clase buscar

		//constructor
		function __construct(){	

			//inicialización función render
			$this->render();
		
		}//fin constructor

//--------------------------------------------------------------------------------------------------------------------------

		//función render
		function render(){

			//header necesita los strings
			include '../View/Header.php';

?>
<!-- ------------------------------------------------------------------------------------------------------------ -->
			
			<!-- texto -->
			<h1 class="tituloFormulario" data-translate="Buscar">   <img src="../View/Icons/buscar.png" width="42" height="42"></h1>	

			<!-- formulario -->
			<form name = 'Form' action='../Controller/PROFESOR_Controller.php' method='post' onsubmit="return comprobarSearchProfesor();">

				<div class="row justify-content-md-left">
					<!-- formulario dni -->
					<label class="col-sm-2 col-form-label" data-translate="DNI"></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'dni' id = 'dni' data-translate="Utiliza tu Dni" size = '9' maxlength=9 value = '' onblur="comprobarTexto(this,9)" ><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario nombre -->
					<label class="col-sm-2 col-form-label" data-translate="NOMBREPROFESOR"></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'nombre' id = 'nombre' data-translate="Solo letras" size = '15' maxlength=15 onblur="comprobarAlfabetico(this,15)" value = ''><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario apellidos-->
					<label class="col-sm-2 col-form-label" data-translate="APELLIDOSPROFESOR"></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'apellidos' id = 'apellidos' data-translate="Solo letras" size = '30' maxlength=30 onblur="comprobarAlfabetico(this,30)" value = ''><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario area -->
					<label class="col-sm-2 col-form-label" data-translate="AREAPROFESOR"></label>
					<div class="form-group">
						<input type = 'number' class="form-control input-lg" name = 'area' id = 'area' data-translate="Solo numeros" size = '60' maxlength=60 onblur="comprobarReal(this,3,0,60)" value = ''><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario departamento -->
					<label class="col-sm-2 col-form-label" data-translate="departamento"></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'departamento' id = 'departamento' size = '60' maxlength=60 value = '' data-translate="Solo letras" onblur="comprobarAlfabetico(this,60)"><br>
					</div>
				</div>

				<div class="row justify-content-md-center">
					<a href='../Controller/PROFESOR_Controller.php'><img src="../View/Icons/volver.png" width="42" height="42"/> </a>
					<!-- botón -->
					<button type='submit'  class="button" name='action' value='SEARCH'><img src="../View/Icons/buscar.png" width="42" height="42" /></button>
				</div>
				
			</form> <!-- cierre formulario-->
		
		<br>
		<br>
<!-- ------------------------------------------------------------------------------------------------------------ -->	

		<?php

			//llamada a footer
			include '../View/Footer.php';
			
		} //fin metodo render

	} //fin search

?>