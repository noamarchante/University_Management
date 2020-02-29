<?php

/*
	Archivo php
	Nombre: PROF_TITULACION_ADD_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 09/10/2019 
	Función: vista del menú añadir
*/

	class PROF_TITULACION_ADD{ //clase añadir

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
			<form name = 'Form' action='../Controller/PROF_TITULACION_Controller.php' method='post' onsubmit="return comprobarAddProf_Titulacion()">

				<div class="row justify-content-md-left">
					<!-- formulario dni -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['DNI']?></label>
					<div class="form-group">
						<input type = 'text' name = 'dni' class="form-control input-lg" id = 'dni' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '9' maxlenght=9 value = '' onblur="comprobarVacio(this) && comprobarDni(this)" required><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario codTitulacion -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['CODTITULACION']?></label>
					<div class="form-group">
						<input type = 'text' name = 'codTitulacion' class="form-control input-lg" id = 'codTitulacion' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '10' maxlength=10 value = '' onblur="comprobarVacio(this) && comprobarTexto(this,10)" required><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario anhoAcademico-->
					<label class="col-sm-2 col-form-label"><?php echo $strings['anhoAcademico']?></label>
					<div class="form-group">
						<input type = 'number' name = 'anhoAcademico' class="form-control input-lg" id = 'anhoAcademico' placeholder = "<?php echo $strings['Solo numeros'];?>" size = '9' maxlength=9 value = '' onblur="comprobarVacio(this) && comprobarEntero(this,1,999999999)" required><br>
					</div>
				</div>

				<!-- salto -->
				<br>
				<div class="row justify-content-md-center">
					<!-- link -->
					<a href='../Controller/PROF_TITULACION_Controller.php'><img src="../View/Icons/volver.png" width="42" height="42" alt="<?php echo $strings['Volver']; ?>"/>  </a>

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

	