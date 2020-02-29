<?php

/*
	Archivo php
	Nombre: TITULACION_SEARCH_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 08/10/2019 
	Función: vista del menú buscar
*/

	class TITULACION_SEARCH{//clase buscar

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
			<form name = 'Form' action='../Controller/TITULACION_Controller.php' method='post' onsubmit="return comprobarSearchTitulacion()">

				<div class="row justify-content-md-left">
					<!-- formulario codTitulacion -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['CODTITULACION']?></label>
					<div class="form-group">
						<input type = 'text' name = 'codTitulacion' class="form-control input-lg" id = 'codTitulacion' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '10' maxlength=10 value = '' onblur="comprobarTexto(this,10)"><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario codCentro-->
					<label class="col-sm-2 col-form-label"><?php echo $strings['CODCENTRO']?></label>
					<div class="form-group">
						<input type = 'text' name = 'codCentro' class="form-control input-lg" id = 'codCentro' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '10' value = '' maxlength=10 onblur="comprobarTexto(this,10)"><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario nombre -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['NOMBRETITULACION']?></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'nombreTitulacion' id = 'nombreTitulacion' placeholder = "<?php echo $strings['Solo letras']; ?>" size = '50' maxlength=50 value = '' onblur="comprobarAlfabetico(this,50)"><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario responsable -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['RESPONSABLETITULACION']?></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'responsableTitulacion' id = 'responsableTitulacion' size = '60' maxlength=60 value = '' placeholder = "<?php echo $strings['Solo letras']; ?>" onblur="comprobarAlfabetico(this,60)"><br>
					</div>
				</div>
				<!-- salto -->
				<br>
				<div class="row justify-content-md-center">
					<!-- link -->
					<a href='../Controller/TITULACION_Controller.php'><img src="../View/Icons/volver.png" width="42" height="42" alt="<?php echo $strings['Volver']; ?>"/></a>
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