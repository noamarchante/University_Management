<?php

/*
	Archivo php
	Nombre: EDIFICIO_EDIT_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 06/10/2019 
	Función: vista del menú editar
*/

	class EDIFICIO_EDIT{//clase editar

		//constructor
		function __construct($tupla){

			//inicialización de variables
			$this->tupla = $tupla;

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
			<h1 class="tituloFormulario"><?php echo $strings['Editar']; ?>   <img src="../View/Icons/modificar.png" width="42" height="42"></h1>

			<!-- formulario -->
			<form name = 'Form' action='../Controller/EDIFICIO_Controller.php' method='post' onsubmit="return comprobarAddEdificio()">

				<div class="row justify-content-md-left">
					<!-- formulario codEdificio-->
					<label class="col-sm-2 col-form-label"><?php echo $strings['CODEDIFICIO']?></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'codEdificio' size=10  id = 'codEdificio' value = '<?php echo $this->tupla['CODEDIFICIO']; ?>' readonly><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario nombre -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['NOMBREEDIFICIO']?></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'nombreEdificio' maxlength=50 size=50 id = 'nombreEdificio' placeholder = "<?php echo $strings['Solo letras']; ?>" value = '<?php echo $this->tupla['NOMBREEDIFICIO']; ?>' onblur="comprobarVacio(this) && comprobarAlfabetico(this,50)" required><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario direccion -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['direccion']?></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'direccionEdificio' maxlength=150 size=150 id = 'direccionEdificio' placeholder = "<?php echo $strings['Letras y numeros']; ?>" value = "<?php echo $this->tupla['DIRECCIONEDIFICIO']; ?>" onblur="comprobarVacio(this) && comprobarTexto(this,150)" required><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario campus -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['CAMPUSEDIFICIO']?></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'campusEdificio' maxlength=10 size=10 id = 'campusEdificio' placeholder = "<?php echo $strings['Solo letras']; ?>" value = '<?php echo $this->tupla['CAMPUSEDIFICIO']; ?>' onblur="comprobarVacio(this) && comprobarAlfabetico(this,10)" required><br>
					</div>
				</div>

				<!-- salto -->
				<br>
				<div class="row justify-content-md-center">
					<!-- link -->
					<a href='../Controller/EDIFICIO_Controller.php'><img src="../View/Icons/volver.png" width="42" height="42" alt="<?php echo $strings['Volver']; ?>"/> </a>
					<!-- botón -->
					<button type='submit'  class="button" name='action' value='EDIT'><img src="../View/Icons/modificar.png" width="42" height="42" alt="<?php echo $strings['Editar']; ?>"/> </button>

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

	} //fin editar

?>