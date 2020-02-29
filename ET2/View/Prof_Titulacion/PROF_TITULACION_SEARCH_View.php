<?php

/*
	Archivo php
	Nombre: PROF_TITULACION_SEARCH_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 09/10/2019 
	Función: vista del menú buscar
*/

	class PROF_TITULACION_SEARCH{//clase buscar

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
			<h1 class="tituloFormulario"><?php echo $strings['Buscar']; ?>   <img src="../View/Icons/buscar.jpg" width="42" height="42"></h1>

			<!-- formulario -->
			<form name = 'Form' action='../Controller/PROF_TITULACION_Controller.php' method='post'>

				<div class="row justify-content-md-left">
					<!-- formulario DNI-->
					<label class="col-sm-2 col-form-label"><?php echo $strings['DNI']?></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'dni' id = 'dni' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '9' maxlength=9 onblur="comprobarTexto(this,9)" value = ''><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario codTitulacion -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['CODTITULACION']?></label> 
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'codTitulacion' id = 'codTitulacion' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '10' maxlength=10 value = '' onblur="comprobarTexto(this,10)"><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario anhoAcademico -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['anhoAcademico']?></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'anhoAcademico' id = 'anhoAcademico' placeholder = "<?php echo $strings['Solo numeros']; ?>" size = '9' value = '' maxlength=9 onblur="comprobarEntero(this,0,9)" ><br>
					</div>
				</div>

				<!-- salto -->
				<br>
				<div class="row justify-content-md-center">
					<a href='../Controller/PROF_TITULACION_Controller.php'><img src="../View/Icons/volver.png" width="42" height="42" alt="<?php echo $strings['Volver']; ?>"/> </a>
					<!-- botón -->
					<button type='submit'  class="button" name='action' value='SEARCH'><img src="../View/Icons/buscar.jpg" width="42" height="42" alt="<?php echo $strings['Buscar'];?>"/></button>
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