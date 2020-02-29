<?php

/*
	Archivo php
	Nombre: PROFESOR_SEARCH_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 5/10/2019 
	Función: vista del menú buscar
*/

	class PROFESOR_SEARCH{ //clase buscar

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
			<form name = 'Form' action='../Controller/PROFESOR_Controller.php' method='post'>

				<div class="row justify-content-md-left">
					<!-- formulario dni -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['DNI']?></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'dni' id = 'dni' placeholder = "<?php echo $strings['Utiliza tu Dni']; ?>" size = '9' maxlength=9 value = '' onblur="comprobarTexto(this,9)" ><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario nombre -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['NOMBREPROFESOR']?></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'nombre' id = 'nombre' placeholder = "<?php echo $strings['Solo letras']; ?>" size = '15' maxlength=15 onblur="comprobarAlfabetico(this,15)" value = ''><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario apellidos-->
					<label class="col-sm-2 col-form-label"><?php echo $strings['APELLIDOSPROFESOR']?></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'apellidos' id = 'apellidos' placeholder = "<?php echo $strings['Solo letras']; ?>" size = '30' maxlength=30 onblur="comprobarAlfabetico(this,30)" value = ''><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario area -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['AREAPROFESOR']?></label>
					<div class="form-group">
						<input type = 'number' class="form-control input-lg" name = 'area' id = 'area' placeholder = "<?php echo $strings['Solo numeros']; ?>" size = '60' maxlength=60 onblur="comprobarReal(this,3,0,60)" value = ''><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario departamento -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['departamento']?></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'departamento' id = 'departamento' size = '60' maxlength=60 value = '' placeholder="<?php echo $strings['Solo letras'];?>" onblur="comprobarAlfabetico(this,60)"><br>
					</div>
				</div>

				<div class="row justify-content-md-center">
					<a href='../Controller/PROFESOR_Controller.php'><img src="../View/Icons/volver.png" width="42" height="42" alt="<?php echo $strings['Volver']; ?>"/> </a>
					<!-- botón -->
					<button type='submit'  class="button" name='action' value='SEARCH'><img src="../View/Icons/buscar.jpg" width="42" height="42" alt="<?php echo $strings['Buscar'];?>"/></button>
				</div>
				
			</form> <!-- cierre formulario-->
		
		<br>
		<br>
<!-- ------------------------------------------------------------------------------------------------------------ -->	

		<?php

			//llamada a footer
			include '../View/Footer.php';
			
		} //fin metodo render

	} //fin search

?>