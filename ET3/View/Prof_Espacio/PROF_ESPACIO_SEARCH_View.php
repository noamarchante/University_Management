 <?php

/*
	Archivo php
	Nombre: PROF_ESPACIO_SEARCH_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 09/10/2019 
	Función: vista del menú buscar
*/

	class PROF_ESPACIO_SEARCH{//clase buscar

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
			<form name = 'Form' action='../Controller/PROF_ESPACIO_Controller.php' method='post' onsubmit="return comprobarSearchProf_Espacio();">
				
				<div class="row justify-content-md-left">
					<!-- formulario DNI-->
					<label class="col-sm-2 col-form-label" data-translate="DNI"></label>
					<div class="form-group">
						<input type = 'text' name = 'dni' class="form-control input-lg" id = 'dni' data-translate="Letras y numeros" size = '9' value = '' maxlength=9 onblur="comprobarTexto(this,9)"><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!--formulario codEspacio -->
					<label class="col-sm-2 col-form-label" data-translate="CODESPACIO"></label>
					<div class="form-group">
						<input type = 'text' name = 'codEspacio' class="form-control input-lg" id = 'codEspacio' data-translate="Letras y numeros" size = '10' maxlength=10 value = '' onblur="comprobarTexto(this,10)"><br>
					</div>
				</div>
				<!-- salto -->
				<br>
				<div class="row justify-content-md-center">
					<!-- link -->
					<a href='../Controller/PROF_ESPACIO_Controller.php'> <img src="../View/Icons/volver.png" width="42" height="42" alt="<?php echo $strings['Volver']; ?>"/> </a>

					<!-- botón -->
					<button type='submit'  class="button" name='action' value='SEARCH'><img src="../View/Icons/buscar.png" width="42" height="42" alt="<?php echo $strings['Buscar']; ?>"/></button>
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