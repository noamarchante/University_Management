<?php

/*
	Archivo php
	Nombre: USUARIOS_DELETE_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 23/09/2019 
	Función: vista del menú para eliminar
*/
	
	class USUARIOS_DELETE{//clase borrar

		var $tupla; //define variable tupla
		
		//constructor
		function __construct($tupla){	

			//inicialización variable
			$this->tupla = $tupla;

			//inicialización función render
			$this->render();
		
		}//fin constructor

		//función render
		function render(){

			//header necesita los strings
			include '../View/Header.php'; 

?>
	
			<!-- formulario -->
			<form name = 'Form' action='../Controller/USUARIOS_Controller.php' method='post'>
				<!-- texto -->
				<h1 class="tituloFormulario"> <label data-translate="Borrar"></label>   <img width="42" height="42" src="../View/Icons/borrar.png"/></h1>
  				<div class="container">
				  <div class="card-deck mb-3 text-center">
				  	<div class="card mb-4 shadow-sm">
      					<div class="card-header">
							<!--formulario login -->
							<label class="my-0 font-weight-normal" data-translate="login"></label>
						</div>
      					<div class="card-body">
							<input type = 'text' name = 'login' class="form-control-plaintext" id = 'login' size="15" value = '<?php echo $this->tupla['login']; ?>' readonly><br>
						</div>
					</div>

					<div class="card mb-4 shadow-sm">
      					<div class="card-header">
							<!-- formulario contraseña-->
							<label class="my-0 font-weight-normal" data-translate="password"></label> 
						</div>
      					<div class="card-body">
							<input type = 'password' size="20" name = 'password' class="form-control-plaintext" id = 'password' value = '<?php echo $this->tupla['password']; ?>' readonly><br>
						</div>
					</div>

					<div class="card mb-4 shadow-sm">
      					<div class="card-header">
							<!-- formulario dni -->
							<label class="my-0 font-weight-normal" data-translate="DNI"> </label>
						</div>
      					<div class="card-body">
							<input type = 'text' name = 'dni' class="form-control-plaintext" size="9" id = 'dni' value = "<?php echo $this->tupla['DNI']; ?>" readonly><br>
						</div>
					</div>

					<div class="card mb-4 shadow-sm">
     					 <div class="card-header">
							<!-- formulario nombre -->
							<label class="my-0 font-weight-normal" data-translate="Nombre"></label>
						</div>
      					<div class="card-body"> 
							<input type = 'text' name = 'nombre' class="form-control-plaintext" id = 'nombre' size="30" value = '<?php echo $this->tupla['nombre']; ?>' readonly><br>
						</div>
					</div>

					<div class="card mb-4 shadow-sm">
      					<div class="card-header">
							<!-- formulario apellidos-->
							<label class="my-0 font-weight-normal" data-translate="Apellidos"></label>
						</div>
     					<div class="card-body">
							<input type = 'text' size="50" class="form-control-plaintext" name = 'apellidos' id = 'apellidos' value = '<?php echo $this->tupla['apellidos']; ?>' readonly><br>
						</div>
					</div>
				</div>
	
				<div class="container">
					<div class="card-deck mb-3 text-center">
						<div class="card mb-4 shadow-sm">
     						<div class="card-header">
								<!-- formulario telefono -->
								<label class="my-0 font-weight-normal" data-translate="Telefono"> </label>
							</div>
      						<div class="card-body">
								<input type = 'telf' size="11" class="form-control-plaintext" name = 'telefono' value = "<?php echo $this->tupla['telefono']; ?>" readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
      						<div class="card-header">
								<!-- formulario email -->
								<label class="my-0 font-weight-normal" data-translate="email"></label>
							</div>
     						<div class="card-body">
								<input type = 'email' class="form-control-plaintext" name = 'email' id = 'email' size="60" value = '<?php echo $this->tupla['email']; ?>' readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
      						<div class="card-header">
								<!-- formulario cumpleaños -->
								<label class="my-0 font-weight-normal" data-translate="Fecha de nacimiento"> </label>
							</div>
      						<div class="card-body">
								<input type = 'date' class="form-control-plaintext" name = 'fechaNacimiento' id = 'fechaNacimiento' value= "<?php echo $this->tupla['FechaNacimiento']; ?>" readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
     						 <div class="card-header">
								<!-- formulario foto-->
								<label class="my-0 font-weight-normal" data-translate="Foto personal"></label>
							</div>
      						<div class="card-body">
							  <img src="<?php echo $this->tupla['fotopersonal'];?>" name='fotoPersonal' id='fotoPersonal' width="150" height="150"/>
							  <input type = 'text' class="form-control-plaintext" name = 'fotoPersonal' id = 'fotoPersonal'  style="visibility:hidden" size=50 value="<?php echo $this->tupla['fotopersonal'];?>">
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
     						<div class="card-header">
								<!-- formulario sexo-->
								<label class="my-0 font-weight-normal" data-translate="sexo"></label>
							</div>
      						<div class="card-body">
								<input type = 'text' class="form-control-plaintext" name = 'sexo' id = 'sexo'  <?php if($this->tupla['sexo']=='mujer'){ ?> data-translate="Mujer" value = "<?php $this->tupla['sexo'] ?>" <?php }else{ ?> data-translate="Hombre" value = "<?php $this->tupla['sexo'] ?>" <?php } ?> readonly><br>
							</div>
						</div>
					</div>
				</div>
				
				<div class="container">
					<a href='../Controller/USUARIOS_Controller.php'><img src="../View/Icons/volver.png" width="42" height="42"/> </a>
					<!-- botón -->
					<button type='submit'  class="button" name='action' value='DELETE'><img src="../View/Icons/borrar.png" width="42" height="42"></button>
				</div>
				
			</form><!-- cierre formulario-->

			<!-- saltos -->
			<br>
			<br>
			<br>
		
<!-- ------------------------------------------------------------------------------------------------------------ -->	

		<?php

			//llamada a footer
			include '../View/Footer.php';
			
		} //fin metodo render

	} //fin delete

?>

	