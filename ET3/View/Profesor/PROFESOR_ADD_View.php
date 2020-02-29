<?php

/*
	Archivo php
	Nombre: PROFESOR_ADD_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 5/10/2019 
	Función: vista del menú añadir
*/

	
	class PROFESOR_ADD{ //clase añadir

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
			<h1 class="tituloFormulario"><label data-translate="Añadir"></label>  <img src="../View/Icons/añadir.png" width="42" height="42"></h1>	

			<!-- formulario -->
			<form name = 'Form' action='../Controller/PROFESOR_Controller.php' method='post' onsubmit="return comprobarAddProfesor()">

				<div class="row justify-content-md-left">
					<!-- formulario dni -->
					<label class="col-sm-2 col-form-label" data-translate="DNI"></label>
					<div class="form-group">
						<input type = 'text' name = 'dni' id = 'dni' class="form-control input-lg" data-translate="Letras y numeros" size = '9' value = '' maxlength=9 onblur="comprobarVacio(this) && comprobarDni(this)" required><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario nombre -->
					<label class="col-sm-2 col-form-label" data-translate="NOMBREPROFESOR"></label>
					<div class="form-group">
						<input type = 'text' name = 'nombre' id = 'nombre' class="form-control input-lg" data-translate="Solo letras" size = '15' maxlength=15 value = '' onblur="comprobarVacio(this)  && comprobarAlfabetico(this,15)" required><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario apellidos-->
					<label class="col-sm-2 col-form-label" data-translate="APELLIDOSPROFESOR"></label>
					<div class="form-group">
						<input type = 'text' name = 'apellidos' class="form-control input-lg" id = 'apellidos' data-translate="Solo letras" size = '30' maxlength=30 value = '' onblur="comprobarVacio(this)&& comprobarAlfabetico(this,30)" required><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario area -->
					<label class="col-sm-2 col-form-label" data-translate="AREAPROFESOR"></label>
					<div class="form-group">
						<input type = 'text' name = 'area' class="form-control input-lg" id = 'area' data-translate="Solo letras" size = '60' maxlength=60 value = '' onblur="comprobarVacio(this) && comprobarAlfabetico(this,60)"required><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario departamento -->
					<label class="col-sm-2 col-form-label" data-translate="departamento"></label>
					<div class="form-group">
						<input type = 'text' name = 'departamento' class="form-control input-lg" id = 'departamento' size = '60' maxlength=60 value = '' data-translate="Solo letras" onblur="comprobarVacio(this) && comprobarAlfabetico(this,60)" required ><br> 
					</div>
				</div>

				<!-- salto -->
				<br>
				<div class="row justify-content-md-center">
					<a href='../Controller/PROFESOR_Controller.php'><img src="../View/Icons/volver.png" width="42" height="42"/> </a>
					<!-- botón -->
					<button type='submit'  class="button" name='action' value='ADD'><img src="../View/Icons/añadir.png" width="42" height="42" /></button>
				</div>
			</form> <!-- cierre formulario-->
			<br>
			<br>
		
<!-- ------------------------------------------------------------------------------------------------------------ -->	

		<?php

			//llamada a footer
			include '../View/Footer.php';
			
		} //fin metodo render

	} //fin add

?>

	