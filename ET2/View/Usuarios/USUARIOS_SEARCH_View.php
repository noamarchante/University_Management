 <?php

/*
	Archivo php
	Nombre: USUARIOS_SEARCH_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 24/09/2019 
	Función: vista del menú de búsqueda
*/
 	
	class USUARIOS_SEARCH{//clase buscar

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
			<form name = 'Form' action='../Controller/USUARIOS_Controller.php' method='post' onsubmit="return comprobarSearchUsuario()">
				<!-- texto -->
				<h1 class="tituloFormulario"><?php echo $strings['Buscar']; ?>   <img  src='../View/Icons/buscar.jpg' width="42" height="42"/></h1>
				
				<div class="row justify-content-md-left">
					<!--formulario login -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['login']?></label>
					<div class="form-group">
						<input type = 'text' name = 'login' id = 'login' class="form-control input-lg" placeholder = "<?php echo $strings['Utiliza tu Dni']; ?>" size = '15' value = '' maxlength='15' onblur="comprobarTexto(this,15)" ><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario contraseña-->
					<label class="col-sm-2 col-form-label"><?php echo $strings['password']?></label>
					<div class="form-group">
						<input type = 'password' name = 'password' class="form-control input-lg" id = 'password' placeholder ="<?php echo $strings['Letras y numeros']; ?>" size = '20' maxlength='128' value = '' onblur="comprobarTexto(this,128)"><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario dni -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['DNI']?></label>
					<div class="form-group">
						<input type = 'text' name = 'dni' id = 'dni' class="form-control input-lg" placeholder = "<?php echo $strings['Utiliza tu Dni']; ?>" size = '9' maxlength='9' value = '' onblur="comprobarTexto(this,9)"><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario nombre -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['Nombre']?></label>
					<div class="form-group">
						<input type = 'text' name = 'nombre' id = 'nombre' class="form-control input-lg" placeholder = "<?php echo $strings['Solo letras']; ?>" size = '30' maxlength='30' value = '' onblur="comprobarAlfabetico(this,30)"><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario apellidos-->
					<label class="col-sm-2 col-form-label"><?php echo $strings['Apellidos']?></label>
					<div class="form-group">
						<input type = 'text' name = 'apellidos' id = 'apellidos' class="form-control input-lg" placeholder = "<?php echo $strings['Solo letras']; ?>" size = '50' maxlength='50' value = '' onblur="comprobarAlfabetico(this,50)" ><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario telefono -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['Telefono']?></label>
					<div class="form-group">
						<input type = 'telf' name = 'telefono' class="form-control input-lg" min='600000000' max='34999999999' id = 'telefono' placeholder = "<?php echo $strings['Solo numeros']; ?>" size = '11' maxlength="11" value = '' onblur="comprobarEntero(this,34600000000,34999999999)"><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario email -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['email']?></label>
					<div class="form-group">
						<input type = 'email' name = 'email' class="form-control input-lg" id = 'email' size = '60' maxlength='60' placeholder = "<?php echo $strings['Letras y numeros']; ?>" value = '' onblur="comprobarTexto(this,60)" ><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario fecha de nacimiento -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['Fecha de nacimiento']?></label>
					<div class="form-group">
						<input type = 'date' class="form-control input-lg" name = 'fechaNacimiento' id = 'fechaNacimiento'><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario foto-->
					<label class="col-sm-2 col-form-label"><?php echo $strings['Foto personal']?></label>
					<div class="form-group">
						<input type = 'text' maxlength="50" class="form-control input-lg" size='50' name = 'fotoPersonal' id = 'fotoPersonal' placeholder = "<?php echo $strings['Foto personal']; ?>" onblur="comprobarTexto(this,50)"><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario sexo-->
					<label class="col-sm-2 col-form-label"><?php echo $strings['sexo']?></label>
					<div class="form-group">
						<select name="sexo" class="form-control input-lg">
							<option selected="true"></option>
							<option value="Hombre"><?php echo $strings['Hombre']; ?></option>
		        			<option value="Mujer"><?php echo $strings['Mujer']; ?></option>
						</select> 
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- link -->
					<a href='../Controller/USUARIOS_Controller.php'><img  src='../View/Icons/volver.png' width="42" height="42" alt=" <?php echo $strings['Volver']; ?>"/> </a>
					<!-- botón -->
					<button type='submit'  class="button" name='action' value='SEARCH'><img  src='../View/Icons/buscar.jpg' width="42" height="42" alt="<?php echo $strings['Buscar']; ?>"/></button>
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

	} //fin search

?>