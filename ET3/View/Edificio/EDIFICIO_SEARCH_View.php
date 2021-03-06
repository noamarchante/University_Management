<?php

/*
	Archivo php
	Nombre: EDIFICIO_EDIT_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 06/10/2019 
	Función: vista del menú editar
*/
 
	class EDIFICIO_SEARCH{//clase buscar

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
			<h1 class="tituloFormulario"><label data-translate="Buscar"></label>   <img src="../View/Icons/buscar.png" width="42" height="42"></h1>	

			<!-- formulario -->
			<form name = 'Form' action='../Controller/EDIFICIO_Controller.php' method='post' onsubmit="return comprobarSearchEdificio();">

				<div class="row justify-content-md-left">
					<!-- formulario codEdificio -->
					<label class="col-sm-2 col-form-label" data-translate="CODEDIFICIO"></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'codEdificio' id = 'codEdificio' data-translate="Letras y numeros" size = '10' maxlength=10 onblur="comprobarTexto(this,10)" value = ''><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario nombre -->
					<label class="col-sm-2 col-form-label" data-translate="NOMBREEDIFICIO"> </label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'nombreEdificio' id = 'nombreEdificio' data-translate="Solo letras" size = '50' maxlength=50 onblur="comprobarAlfabetico(this,50)" value = ''><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario direccion-->
					<label class="col-sm-2 col-form-label" data-translate="direccion"></label> 
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'direccionEdificio' id = 'direccionEdificio' data-translate="Letras y numeros" size = '150' maxlength=150 onblur="comprobarTexto(this,150)" value = ''><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario campus -->
					<label class="col-sm-2 col-form-label" data-translate="CAMPUSEDIFICIO"></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'campusEdificio' id = 'campusEdificio' data-translate="Letras y numeros" size = '10' maxlength=10 onblur="comprobarTexto(this,10)" value = ''><br>
					</div>
				</div>

				<!-- salto -->
				<br>

				<div class="row justify-content-md-center">
					<!-- link -->
					<a href='../Controller/EDIFICIO_Controller.php'> <img src="../View/Icons/volver.png" width="42" height="42" alt="<?php echo $strings['Volver']; ?>"/>  </a>
					<!-- botón -->
					<button type='submit'  class="button" name='action' value='SEARCH'><img src="../View/Icons/buscar.png" width="42" height="42" alt="<?php echo $strings['Buscar']; ?>"/> </button>
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