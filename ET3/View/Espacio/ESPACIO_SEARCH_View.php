 <?php

/*
	Archivo php
	Nombre: ESPACIO_SEARCH_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 07/10/2019 
	Función: vista del menú buscar
*/

	class ESPACIO_SEARCH{//clase buscar

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
			<form name = 'Form' action='../Controller/ESPACIO_Controller.php' method='post' onsubmit="return comprobarSearchEspacio();">
			
				<div class="row justify-content-md-left">
					<!--formulario codEspacio -->
					<label class="col-sm-2 col-form-label" data-translate="CODESPACIO"></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'codEspacio' id = 'codEspacio' data-translate="Letras y numeros" size = '10' maxlength=10 value = '' onblur="comprobarTexto(this,10)"><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario codEdificio-->
					<label class="col-sm-2 col-form-label" data-translate="CODEDIFICIO"></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'codEdificio' id = 'codEdificio' data-translate="Letras y numeros" size = '10' maxlength=10 onblur="comprobarTexto(this,10)" value = ''><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario codCentro -->
					<label class="col-sm-2 col-form-label" data-translate="CODCENTRO"> </label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'codCentro' id = 'codCentro' data-translate="Letras y numeros" size = '10' maxlength=10 value = '' onblur="comprobarTexto(this,10)"><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
				<label class="col-sm-2 col-form-label" data-translate="TIPO"></label>
					<div class="form-group">
						<!-- formulario tipo-->
						<select name="tipo" class="form-control input-lg" id ='tipo'>
							<option selected="true" value=""  data-translate="Elige una opcion"></option>
							<option value="DESPACHO" data-translate="despacho"></option>
		        			<option value="LABORATORIO" data-translate="laboratorio"></option>
		        			<option value="PAS" data-translate="pas"></option>
						</select> 
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario superficieEspacio-->
					<label class="col-sm-2 col-form-label" data-translate="superficieEspacio"></label>
					<div class="form-group">
						<input type = 'number' class="form-control input-lg" name = 'superficieEspacio' id = 'superficieEspacio' data-translate="Solo numeros" size=4 max=9999 value = '' onblur="comprobarReal(this,3,0,4)"><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario numInventarioEspacio -->
					<label class="col-sm-2 col-form-label" data-translate="numInventarioEspacio"></label>
					<div class="form-group">
						<input type = 'number' class="form-control input-lg" name = 'numInventarioEspacio'  id = 'numInventarioEspacio' data-translate="Solo numeros" value = '' size=8 max=99999999 onblur="comprobarEntero(this,0,8)"><br>
					</div>
				</div>

				<!-- salto -->
				<br>
				<div class="row justify-content-md-center">
					<!-- link -->
					<a href='../Controller/ESPACIO_Controller.php'>  <img src="../View/Icons/volver.png" width="42" height="42" alt="<?php echo $strings['Volver']; ?>"/></a>
					<!-- botón -->
					<button type='submit'   class="button" name='action' value='SEARCH'> <img src="../View/Icons/buscar.png" width="42" height="42" alt="<?php echo $strings['Buscar']; ?>"/></button>
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