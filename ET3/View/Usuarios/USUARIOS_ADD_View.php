<?php

/*
	Archivo php
	Nombre: USUARIOS_ADD_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 23/09/2019 
	Función: vista de añadir usuarios
*/

	class USUARIOS_ADD{//clase añadir

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
			
		
			<!-- formulario -->
			
			<form name = 'Form' action='../Controller/USUARIOS_Controller.php' method='post'  enctype="multipart/form-data"  onsubmit="return comprobarAddUsuario()">
				<!-- texto -->
				<h1 class=tituloFormulario ><label data-translate="Añadir"></label> <img src="../View/Icons/añadir.png" width="42" height="42"></h1>  
				<br>
		
				<div class="row justify-content-md-left">
					<!--formulario login -->
					<label class="col-sm-2 col-form-label" data-translate="login"></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'login' id = 'login' data-translate="Utiliza tu Dni" size = '15' value = '' maxlength="15" onblur="comprobarVacio(this) && comprobarTexto(this,15)" required>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario contraseña-->
					<label class="col-sm-2 col-form-label" data-translate="password"></label>
					<div class="form-group">
						<input type = 'password' class="form-control input-lg" name = 'password' id = 'password' data-translate="Letras y numeros" size = '20' value = '' maxlength="20" onblur="comprobarVacio(this) && comprobarTexto(this,128)" required>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario nombre -->
					<label class="col-sm-2 col-form-label" data-translate="Nombre"></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'nombre' id = 'nombre' data-translate="Solo letras" size = '30' value = '' maxlength="30" onblur="comprobarVacio(this)  && comprobarAlfabetico(this,30)" required >
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario apellidos-->
					<label class="col-sm-2 col-form-label" data-translate="Apellidos"></label>
					<div class="form-group">
						<input type = 'text' name = 'apellidos' id = 'apellidos' class="form-control input-lg" data-translate="Solo letras" size = '50' value = '' maxlength="50"  onblur="comprobarVacio(this) && comprobarAlfabetico(this,50)" required >
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario dni -->
					<label class="col-sm-2 col-form-label" data-translate="DNI"></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'dni' id = 'dni' data-translate="Utiliza tu Dni" size = '9' value = '' maxlength="9" onblur="comprobarVacio(this) && comprobarDni(this)" required>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario telefono -->
					<label class="col-sm-2 col-form-label" data-translate="Telefono"></label>
					<div class="form-group">
						<input type = 'telf' class="form-control input-lg" name = 'telefono' min='600000000' max='34999999999' id = 'telefono' data-translate="Solo numeros" size = '11' value = '' maxlength="11" onblur="comprobarVacio(this) && comprobarTelf(this)" required>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario email -->
					<label class="col-sm-2 col-form-label" data-translate="email"></label>
					<div class="form-group">
						<input type = 'email' class="form-control input-lg" name = 'email' id = 'email' size = '60' value = '' data-translate="Introduce tu email" maxlength="60" onblur="comprobarVacio(this) && comprobarEmail(this)" required >
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario cumpleaños -->
					<label class="col-sm-2 col-form-label" data-translate="Fecha de nacimiento"></label>
					<div class="form-group">
						<input type = 'date' name = 'fechaNacimiento'  class="form-control input-lg" id = 'fechaNacimiento' required onblur="comprobarVacio(this)" onkeydown="return false;" >
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario foto-->
					<label class="col-sm-2 col-form-label" data-translate="Foto personal"></label>
					<div class="form-group">
						<input type = 'file' class="form-control input-lg" name = 'fotoPersonal' size=50 maxlength="50" id = 'fotoPersonal' data-translate="Foto personal">
					</div>
				</div>

					<div class="row justify-content-md-left">
					<!-- Formulario texto -->
    					<label class="col-sm-2 col-form-label" data-translate="sexo"></label>
						<div class="form-group">
							<select class="form-control input-lg"  name="sexo" id ='sexo' required  onblur="comprobarVacio(this)">
								<option selected="true" disabled data-translate="Elige una opcion"></option>
								<option value="hombre" data-translate="Hombre"></option>
		        				<option value="mujer" data-translate="Mujer"></option>
							</select> 
						</div>
					</div>
				</div>	
				
				<div class="row justify-content-md-center">
					<a href='../Controller/USUARIOS_Controller.php'><img src="../View/Icons/volver.png" width="42" height="42"/> </a>
					<!-- botón -->
					<button type='submit' class="button" name='action' value='ADD'><img src="../View/Icons/añadir.png" width="42" height="42" /></button>
				</div>
			</form> <!-- cierre formulario-->
		

			<!-- saltos -->
			<br>
			<br>
			<br>
		
<!-- ------------------------------------------------------------------------------------------------------------ -->	

		<?php

			//llamada a footer
			include '../View/Footer.php';
			
		} //fin metodo render

	} //fin add

?>

	