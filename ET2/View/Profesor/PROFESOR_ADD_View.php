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
			<h1 class="tituloFormulario"><?php echo $strings['Añadir']; ?>  <img src="../View/Icons/añadir.png" width="42" height="42"></h1>	

			<!-- formulario -->
			<form name = 'Form' action='../Controller/PROFESOR_Controller.php' method='post' onsubmit="return comprobarAddProfesor()">

				<div class="row justify-content-md-left">
					<!-- formulario dni -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['DNI']?></label>
					<div class="form-group">
						<input type = 'text' name = 'dni' id = 'dni' class="form-control input-lg" placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '9' value = '' maxlength=9 onblur="comprobarVacio(this) && comprobarDni(this)" required><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario nombre -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['NOMBREPROFESOR']?></label>
					<div class="form-group">
						<input type = 'text' name = 'nombre' id = 'nombre' class="form-control input-lg" placeholder = "<?php echo $strings['Solo letras']; ?>" size = '15' maxlength=15 value = '' onblur="comprobarVacio(this)  && comprobarAlfabetico(this,15)" required><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario apellidos-->
					<label class="col-sm-2 col-form-label"><?php echo $strings['APELLIDOSPROFESOR']?></label>
					<div class="form-group">
						<input type = 'text' name = 'apellidos' class="form-control input-lg" id = 'apellidos' placeholder = "<?php echo $strings['Solo letras'];?>" size = '30' maxlength=30 value = '' onblur="comprobarVacio(this)&& comprobarAlfabetico(this,30)" required><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario area -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['AREAPROFESOR']?></label>
					<div class="form-group">
						<input type = 'text' name = 'area' class="form-control input-lg" id = 'area' placeholder = "<?php echo $strings['Solo letras']; ?>" size = '60' maxlength=60 value = '' onblur="comprobarVacio(this) && comprobarAlfabetico(this,60)"required><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario departamento -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['departamento']?></label>
					<div class="form-group">
						<input type = 'text' name = 'departamento' class="form-control input-lg" id = 'departamento' size = '60' maxlength=60 value = '' placeholder = "<?php echo $strings['Solo letras'];?>" onblur="comprobarVacio(this) && comprobarAlfabetico(this,60)" required ><br> 
					</div>
				</div>

				<!-- salto -->
				<br>
				<div class="row justify-content-md-center">
					<a href='../Controller/PROFESOR_Controller.php'><img src="../View/Icons/volver.png" width="42" height="42" alt="<?php echo $strings['Volver']; ?>"/> </a>
					<!-- botón -->
					<button type='submit'  class="button" name='action' value='ADD'><img src="../View/Icons/añadir.png" width="42" height="42" alt="<?php echo $strings['Añadir'];?>"/></button>
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

	