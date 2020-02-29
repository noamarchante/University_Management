<?php

/*
	Archivo php
	Nombre: CENTRO_SEARCH_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 06/10/2019 
	Función: vista del menú buscar
*/

	class CENTRO_SEARCH{//clase buscar

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
			<form name = 'Form' action='../Controller/CENTRO_Controller.php' method='post'>

				<div class="row justify-content-md-left">
					<!-- formulario codCentro -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['CODCENTRO']?></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'codCentro' id = 'codCentro' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '10' maxlength=10 value = '' onblur="comprobarTexto(this,10)"><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario codEdificio-->
					<label class="col-sm-2 col-form-label"><?php echo $strings['CODEDIFICIO']?></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'codEdificio' id = 'codEdificio' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '10' maxlength=10 value = '' onblur="comprobarTexto(this,10)"><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario nombre -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['NOMBRECENTRO']?></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'nombreCentro' id = 'nombreCentro' placeholder = "<?php echo $strings['Solo letras']; ?>" size = '50' maxlength=50 onblur="comprobarAlfabetico(this,50)" value = '' ><br>
					</div>
				</div>
				
				<div class="row justify-content-md-left">
					<!-- formulario direccion -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['DIRECCIONCENTRO']?></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'direccionCentro' id = 'direccionCentro' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '150' maxlength=150 value = '' onblur="comprobarTexto(this,150)"><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario responsable -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['responsable']?></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'responsableCentro' placeholder = "<?php echo $strings['Solo letras']; ?>" id = 'responsableCentro' size = '60' maxlength=60 onblur="comprobarAlfabetico(this,60)" value = '' ><br>
					</div>
				</div>

				<!-- salto -->
				<br>
				<div class="row justify-content-md-center">
					<!-- link -->
					<a href='../Controller/CENTRO_Controller.php'><img src="../View/Icons/volver.png" width="42" height="42" alt="<?php echo $strings['Volver']; ?>"/></a>
					<!-- botón -->
					<button type='submit'  class="button" name='action' value='SEARCH'><img src="../View/Icons/buscar.jpg" width="42" height="42" alt="<?php echo $strings['Buscar']; ?>"/></button>
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