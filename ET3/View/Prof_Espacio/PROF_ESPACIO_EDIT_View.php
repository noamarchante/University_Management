<?php

/*
	Archivo php
	Nombre: PROF_ESPACIO_EDIT_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 09/10/2019 
	Función: vista del menú editar
*/
	
	class PROF_ESPACIO_EDIT{//clase editar

		var $tupla; //define la variable tupla
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
			<h1 class="tituloFormulario"><label data-translate="Editar"></label>   <img src="../View/Icons/modificar.png" width="42" height="42"></h1>	

			<!-- formulario -->
			<form name = 'Form' action='../Controller/PROF_ESPACIO_Controller.php' method='post' onsubmit="return comprobarAddProf_Espacio()">
			
				<div class="row justify-content-md-left">
					<!-- formulario dni-->
					<label class="col-sm-2 col-form-label" data-translate="DNI"></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'dni' id = 'dni' value = '<?php echo $this->tupla['DNI']; ?>' size=9 readonly ><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!--formulario codEspacio -->
					<label class="col-sm-2 col-form-label" data-translate="CODESPACIO"></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'codEspacio' id = 'codEspacio' size=10 value = '<?php echo $this->tupla['CODESPACIO']; ?>'readonly><br>
					</div>
				</div>
				<!-- salto -->
				<br>

				<div class="row justify-content-md-center">
					<!-- link -->
					<a href='../Controller/PROF_ESPACIO_Controller.php'> <img src="../View/Icons/volver.png" width="42" height="42" alt="<?php echo $strings['Volver']; ?>"/></a>
					<!-- botón -->
					<button type='submit'  class="button" name='action' value='EDIT'><img src="../View/Icons/modificar.png" width="42" height="42" alt="<?php echo $strings['Editar']; ?>"/></button>
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