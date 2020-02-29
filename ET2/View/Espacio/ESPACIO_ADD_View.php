<?php

/*
	Archivo php
	Nombre: ESPACIO_ADD_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 07/10/2019 
	Función: vista del menú añadir
*/

	
	class ESPACIO_ADD{//clase añadir

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
			<form name = 'Form' action='../Controller/ESPACIO_Controller.php' method='post' onsubmit="return comprobarAddEspacio()">
			
				<div class="row justify-content-md-left">
					<!--formulario codEspacio -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['CODESPACIO']?></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'codEspacio' id = 'codEspacio' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '10' maxlength=10 value = '' onblur="comprobarVacio(this) && comprobarTexto(this,10)" required><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario codEdificio-->
					<label class="col-sm-2 col-form-label"><?php echo $strings['CODEDIFICIO']?></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'codEdificio' id = 'codEdificio' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '10' maxlength=10 value = '' onblur="comprobarVacio(this) && comprobarTexto(this,10)" required><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario codCentro -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['CODCENTRO']?></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'codCentro' id = 'codCentro' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '10' maxlength=10 value = '' onblur="comprobarVacio(this) && comprobarTexto(this,10)" required><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<label class="col-sm-2 col-form-label"><?php echo $strings['TIPO']?></label>
					<div class="form-group">
						<!-- formulario tipo-->
						<select name="tipo" class="form-control input-lg" id ='tipo' required  onblur="comprobarVacio(this)">
						<option selected="true" disabled ><?php echo $strings['Elige una opcion'];?></option>
							<option value="despacho"><?php echo $strings['despacho']; ?></option>
		        			<option value="laboratorio"><?php echo $strings['laboratorio']; ?></option>
		        			<option value="pas"><?php echo $strings['pas']; ?></option>
						</select> 
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario superficieEspacio-->
					<label class="col-sm-2 col-form-label"><?php echo $strings['superficieEspacio']?></label>
					<div class="form-group">
						<input type = 'number' class="form-control input-lg" name = 'superficieEspacio' id = 'superficieEspacio' placeholder = "<?php echo $strings['Solo numeros'];?>" size = '4' value = '' maxlength=4 onblur="comprobarVacio(this) && comprobarReal(this,3,1,9999)" required><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario numInventarioEspacio -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['numInventarioEspacio']?></label>
					<div class="form-group">
						<input type = 'number' class="form-control input-lg" name = 'numInventarioEspacio' id = 'numInventarioEspacio' placeholder = "<?php echo $strings['Solo numeros']; ?>" size=8 maxlength=8 value = '' onblur="comprobarVacio(this) && comprobarEntero(this,1,99999999)" required><br>
					</div>
				</div>

				<!-- salto -->
				<br>
				<div class="row justify-content-md-center">
					<!-- link -->
					<a href='../Controller/ESPACIO_Controller.php'> <img src="../View/Icons/volver.png" width="42" height="42" alt="<?php echo $strings['Volver']; ?>"/> </a>
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

	