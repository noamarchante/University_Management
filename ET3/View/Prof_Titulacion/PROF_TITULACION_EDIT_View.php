<?php

/*
	Archivo php
	Nombre: TITULACION_EDIT_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 09/10/2019 
	Función: vista del menú editar
*/

	class PROF_TITULACION_EDIT{//clase editar

		var $tupla; //definir la variable tupla
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
			<h1 class="tituloFormulario"><label data-translate="Editar"> </label>   <img src="../View/Icons/modificar.png" width="42" height="42"></h1>	
			<br>
			<!-- formulario -->
			<form name = 'Form' action='../Controller/PROF_TITULACION_Controller.php' method='post' onsubmit="return comprobarAddProf_Titulacion()">

				<div class="row justify-content-md-left">
					<!-- formulario DNI-->
					<label class="col-sm-2 col-form-label" data-translate="DNI"></label>
					<div class="form-group">
						<input type = 'text' name = 'dni' class="form-control input-lg" size=9 id = 'dni' value = '<?php echo $this->tupla['DNI']; ?>' readonly><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario codTitulacion -->
					<label class="col-sm-2 col-form-label" data-translate="CODTITULACION"></label>
					<div class="form-group">
						<input type = 'text'size=10 name = 'codTitulacion' class="form-control input-lg" id = 'codTitulacion' value = "<?php echo $this->tupla['CODTITULACION']; ?>" readonly><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario anhoAcademico -->
					<label class="col-sm-2 col-form-label" data-translate="anhoAcademico"></label>
					<div class="form-group">
						<input type = 'text' name = 'anhoAcademico' class="form-control input-lg" id = 'anhoAcademico' placeholder="yyyy-yyyy" size = '9' maxlength=9 value = '<?php echo $this->tupla['ANHOACADEMICO']; ?>' onblur="comprobarVacio(this) && comprobarEntero(this,1,999999999)"><br>
					</div>
				</div>
				<!-- salto -->
				<br>
				<div class="row justify-content-md-center">
					<a href='../Controller/PROF_TITULACION_Controller.php'><img src="../View/Icons/volver.png" width="42" height="42" alt="<?php echo $strings['Volver']; ?>"/> </a>
					<!-- botón -->
					<button type='submit'  class="button" name='action' value='EDIT'><img src="../View/Icons/modificar.png" width="42" height="42" alt="<?php echo $strings['Editar'];?>"/></button>
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

	} //fin editar

?>