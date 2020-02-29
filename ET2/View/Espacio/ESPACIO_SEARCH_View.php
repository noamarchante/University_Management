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
			<h1 class="tituloFormulario"><?php echo $strings['Buscar']; ?>   <img src="../View/Icons/buscar.jpg" width="42" height="42"></h1>	

			<!-- formulario -->
			<form name = 'Form' action='../Controller/ESPACIO_Controller.php' method='post' onsubmit="return comprobar_registro();">
			
				<div class="row justify-content-md-left">
					<!--formulario codEspacio -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['CODESPACIO']?></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'codEspacio' id = 'codEspacio' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '10' maxlength=10 value = '' onblur="comprobarTexto(this,10)"><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario codEdificio-->
					<label class="col-sm-2 col-form-label"><?php echo $strings['CODEDIFICIO']?></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'codEdificio' id = 'codEdificio' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '10' maxlength=10 onblur="comprobarTexto(this,10)" value = ''><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario codCentro -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['CODCENTRO']?> </label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'codCentro' id = 'codCentro' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '10' maxlength=10 value = '' onblur="comprobarTexto(this,10)"><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<label class="col-sm-2 col-form-label"><?php echo $strings['TIPO']; ?></label>
						<!-- formulario tipo-->
					<div class="form-group">
						<select name="tipo" id ='tipo' class="form-control input-lg">
							<option selected = "true" disabled value=""></option>
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
						<input type = 'number' class="form-control input-lg" name = 'superficieEspacio' id = 'superficieEspacio' placeholder = "<?php echo $strings['Solo numeros'];?>" size=4 max=9999 value = '' onblur="comprobarReal(this,3,0,4)"><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario numInventarioEspacio -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['numInventarioEspacio']?></label>
					<div class="form-group">
						<input type = 'number' class="form-control input-lg" name = 'numInventarioEspacio'  id = 'numInventarioEspacio' placeholder = "<?php echo $strings['Solo numeros']; ?>" value = '' size=8 max=99999999 onblur="comprobarEntero(this,0,8)"><br>
					</div>
				</div>

				<!-- salto -->
				<br>
				<div class="row justify-content-md-center">
					<!-- link -->
					<a href='../Controller/ESPACIO_Controller.php'>  <img src="../View/Icons/volver.png" width="42" height="42" alt="<?php echo $strings['Volver']; ?>"/></a>
					<!-- botón -->
					<button type='submit'   class="button" name='action' value='SEARCH'> <img src="../View/Icons/buscar.jpg" width="42" height="42" alt="<?php echo $strings['Buscar']; ?>"/></button>
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