<?php

/*
	Archivo php
	Nombre: TITULACION_ADD_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 08/10/2019 
	Función: vista del menú añadir
*/

	class TITULACION_ADD{ //clase añadir

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
			<form name = 'Form' action='../Controller/TITULACION_Controller.php' method='post' onsubmit="return comprobarAddTitulacion()">

				<div class="row justify-content-md-left">
					<!-- formulario codTitulacion -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['CODTITULACION']?></label>
					<div class="form-group">
						<input type = 'text' name = 'codTitulacion' class="form-control input-lg" id = 'codTitulacion' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '10' maxlength=10 value = '' onblur="comprobarVacio(this) && comprobarTexto(this,10)" required><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario codCentro -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['CODCENTRO']?></label>
					<div class="form-group">
						<input type = 'text' name = 'codCentro' class="form-control input-lg" id = 'codCentro' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '10' maxlength=10 value = '' onblur="comprobarVacio(this) && comprobarTexto(this,10)" required><br>
					</div>
				</div>
				
				<div class="row justify-content-md-left">
					<!-- formulario nombreTitulacion-->
					<label class="col-sm-2 col-form-label"><?php echo $strings['NOMBRETITULACION']?></label>
					<div class="form-group">
						<input type = 'text' name = 'nombreTitulacion' class="form-control input-lg" id = 'nombreTitulacion' placeholder = "<?php echo $strings['Solo letras'];?>" size = '50' maxlength=50 value = '' onblur="comprobarVacio(this) && comprobarAlfabetico(this,50)" required><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario responsableTitulacion -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['RESPONSABLETITULACION']?></label>
					<div class="form-group">
						<input type = 'text' name = 'responsableTitulacion' class="form-control input-lg" id = 'responsableTitulacion' placeholder = "<?php echo $strings['Solo letras']; ?>" size = '60' maxlength=60 value = '' onblur="comprobarVacio(this) && comprobarAlfabetico(this,60)" required><br>
					</div>
				</div>

				<!-- salto -->
				<br>
				<div class="row justify-content-md-center">
					<a href='../Controller/TITULACION_Controller.php'><img src="../View/Icons/volver.png" width="42" height="42" alt="<?php echo $strings['Volver']; ?>"/> </a>
					<!-- botón -->
					<button type='submit'  class="button" name='action' value='ADD'><img src="../View/Icons/añadir.png" width="42" height="42" alt="<?php echo $strings['Añadir'];?>"/></button>
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

	