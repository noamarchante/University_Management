<?php

/*
	Archivo php
	Nombre: Register_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 21-09-2019
	Función: muestra la vista de registro
*/

	class Register{ //clase register

		//constructor
		function __construct(){	

			//inicialización función render
			$this->render();

		}//fin cosntructor

//-----------------------------------------------------------------------------------------------------------------------

		//función render
		function render(){

			//header necesita los strings
			include '../View/Header.php'; 

		?>

<!-- ------------------------------------------------------------------------------------------------------------------ -->
			<!-- texto -->
			<h1 class="tituloFormulario"><label data-translate="Registro"></label>   <img src="../View/Icons/registrar.png" width="42" height="42"/></h1>

			<!-- formulario -->	
			<form name = 'Form' action='../Controller/Register_Controller.php' method='post' enctype="multipart/form-data"   onsubmit="return comprobarAddUsuario();">
				
				<div class="row justify-content-md-left">
					<!-- formulario login-->
					<label class="col-sm-2 col-form-label" data-translate="login"></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'login' id = 'login' data-translate="Utiliza tu Dni" size = '15' maxlength=15 value = '' onblur="comprobarVacio(this) && comprobarTexto(this,15)" required ><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!--formulario contraseña -->
					<label class="col-sm-2 col-form-label" data-translate="password"></label>
					<div class="form-group">
						<input type = 'password'  class="form-control input-lg" name = 'password' id = 'password' data-translate="Letras y numeros" size = '20' maxlength=20 value = '' onblur="esNoVacio(this) && comprobarLetrasNumeros(this,20)" required><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario dni-->
					<label class="col-sm-2 col-form-label" data-translate="DNI"></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'dni' id = 'dni' data-translate="Utiliza tu Dni" size = '9' maxlength=9 value = '' onblur="comprobarVacio(this) && comprobarDni(this)"required ><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario nombre-->
					<label class="col-sm-2 col-form-label" data-translate="Nombre"></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'nombre' id = 'nombre' data-translate="Solo letras" size = '30' maxlength=30 value = '' onblur="comprobarVacio(this)  && comprobarAlfabetico(this,30)" required><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario apellidos-->
					<label class="col-sm-2 col-form-label" data-translate="Apellidos"></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'apellidos' id = 'apellidos' data-translate="Solo letras" size = '50' maxlength=50 value = '' onblur="comprobarVacio(this)  && comprobarAlfabetico(this,50)" required ><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario telefono -->
					<label class="col-sm-2 col-form-label" data-translate="Telefono"></label>
					<div class="form-group">
						<input type = 'number' class="form-control input-lg" name = 'telefono' max='34999999999' id = 'telefono' data-translate="Solo numeros" size = '11' value = '' onblur="comprobarVacio(this) && comprobarTelf(this)" required><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario email -->
					<label class="col-sm-2 col-form-label" data-translate="email"></label>
					<div class="form-group">
						<input type = 'email' class="form-control input-lg" name = 'email' id = 'email' size = '60' maxlength=60 value = '' data-translate="Letras y numeros"   onblur="comprobarVacio(this) && comprobarEmail(this)" required><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario cumpleaños-->
					<label class="col-sm-2 col-form-label" data-translate="Fecha de nacimiento"> </label>
					<div class="form-group">
						<input type = 'date' class="form-control input-lg"  name = 'fechaNacimiento' id = 'fechaNacimiento' onblur="comprobarVacio(this)" required onkeydown="return false;"><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario foto-->
					<label class="col-sm-2 col-form-label" data-translate="Foto personal"> </label>
					<div class="form-group">
						<input type = 'file' class="form-control input-lg" name = 'fotoPersonal' id = 'fotoPersonal' size=50 maxlength=50 data-translate="Foto personal"><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<label class="col-sm-2 col-form-label" data-translate="sexo"></label> 
					<div class="form-group">
						<!-- formulario sexo -->
						<select name="sexo" class="form-control input-lg" required>
						<option selected="true" disabled data-translate="Elige una opcion"></option>
							<option value="Hombre" data-translate="Hombre"></option>
		        			<option value="Mujer" data-translate="Mujer"></option>
						</select> 
					</div>
				</div>
				<!-- salto -->
				<br>
				<div class="row justify-content-md-center">
					<!--link -->
					<a href='../Controller/Index_Controller.php'><img src="../View/Icons/volver.png" width="42" height="42"/> </a>
					<!--botón -->
					<button type='submit' style="background:white;border:white" name='action' value='ADD'><img src="../View/Icons/registrar.png" width="42" height="42"/></button>
				</div>
			</form><!-- cierre formulario-->
					<br>
					<br>
					<br>
			
<!-- -------------------------------------------------------------------------------------------------------------- -->

		<?php

			//llamada a footer
			include '../View/Footer.php';
			
		} //fin metodo render

	} //fin REGISTER

?>

	