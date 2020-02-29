<?php

/*
	Archivo php
	Nombre: EDIFICIO_ADD_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 06/10/2019 
	Función: vista del menú añadir
*/

	class EDIFICIO_ADD{//clase añadir

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
			<h1 class="tituloFormulario"><?php echo $strings['Añadir']; ?>   <img src="../View/Icons/añadir.png" width="42" height="42"></h1>	

			<!-- formulario -->
			<form name = 'Form' action='../Controller/EDIFICIO_Controller.php' method='post' onsubmit="return comprobarAddEdificio()">

				<div class="row justify-content-md-left">
					<!-- formulario codEdificio -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['CODEDIFICIO']?></label>
					<div class="form-group">
						<input type = 'text'  class="form-control input-lg" name = 'codEdificio' id = 'codEdificio' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '19' maxlength=10 value = '' onblur= "comprobarVacio(this) && comprobarTexto(this,10)" required><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario nombre -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['NOMBREEDIFICIO']?></label>
					<div class="form-group">
						<input type = 'text'  class="form-control input-lg" name = 'nombreEdificio' id = 'nombreEdificio' placeholder = "<?php echo $strings['Solo letras']; ?>" size = '50' maxlength=50 value = '' onblur="comprobarVacio(this) && comprobarAlfabetico(this,50)" required><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario direccion-->
					<label class="col-sm-2 col-form-label"><?php echo $strings['direccion']?></label>
					<div class="form-group">
						<input type = 'text'  class="form-control input-lg" name = 'direccionEdificio' id = 'direccionEdificio' placeholder = "<?php echo $strings['Letras y numeros'];?>" size = '150' maxlength=150 value = '' onblur="comprobarVacio(this) && comprobarTexto(this,150)" required><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario campus -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['CAMPUSEDIFICIO']?></label>
					<div class="form-group">
						<input type = 'text'  class="form-control input-lg" name = 'campusEdificio' id = 'campusEdificio' placeholder = "<?php echo $strings['Solo letras']; ?>" size = '10' maxlength=10 value = '' onblur="comprobarVacio(this) && comprobarAlfabetico(this,10)" required><br>
					</div>
				</div>

				<!-- salto -->
				<br>
				<div class="row justify-content-md-center">
					<!-- link -->
					<a href='../Controller/EDIFICIO_Controller.php'> <img src="../View/Icons/volver.png" width="42" height="42" alt="<?php echo $strings['Volver']; ?>"/>   </a>
					<!-- botón -->
					<button type='submit'  class="button" name='action' value='ADD'><img src="../View/Icons/añadir.png" width="42" height="42" alt="<?php echo $strings['Añadir']; ?>"/> </button>
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

	