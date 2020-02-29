<?php

/*
	Archivo php
	Nombre: PROF_ESPACIO_ADD_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 09/10/2019 
	Función: vista del menú añadir
*/

	
	class PROF_ESPACIO_ADD{//clase añadir

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
			<h1 class="tituloFormulario"><label data-translate="Añadir"></label>   <img src="../View/Icons/añadir.png" width="42" height="42"></h1>	

			<!-- formulario -->
			<form name = 'Form' action='../Controller/PROF_ESPACIO_Controller.php' method='post' onsubmit="return comprobarAddProf_Espacio()">
				<div class="row justify-content-md-left">
					<!--formulario DNI -->
					<label class="col-sm-2 col-form-label" data-translate="DNI"></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg"   name = 'dni' id = 'dni' data-translate="Letras y numeros" size = '9' maxlength=9 value = '' onblur="comprobarVacio(this) && comprobarDni(this)" required ><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!--formulario codEspacio -->
					<label class="col-sm-2 col-form-label" data-translate="CODESPACIO"></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" maxlength=10 name = 'codEspacio' id = 'codEspacio' data-translate="Letras y numeros" size = '10' value = '' onblur="comprobarVacio(this) && comprobarTexto(this,10)" required><br>
					</div>
				</div>
				<!-- salto -->
				<br>
				<div class="row justify-content-md-center">
					<!-- link -->
					<a href='../Controller/PROF_ESPACIO_Controller.php'><img src="../View/Icons/volver.png" width="42" height="42" alt="<?php echo $strings['Volver']; ?>"/> </a>
					<!-- botón -->
					<button type='submit'  class="button" name='action' value='ADD'><img src="../View/Icons/añadir.png" width="42" height="42" alt="<?php echo $strings['Añadir']; ?>"/></button>
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

	