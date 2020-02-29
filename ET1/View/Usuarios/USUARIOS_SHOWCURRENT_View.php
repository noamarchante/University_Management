<?php

/*
	Archivo php
	Nombre: USUARIOS_SHOWCURRENT_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 24/09/2019 
	Función: vista del menú mostrar datos usuario actual
*/

	
	class USUARIOS_SHOWCURRENT{//clase mostrar usuario actual

		//constructor
		function __construct($tupla){

			//inicialización variables	
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
			<h1><?php echo $strings['Informacion detallada']; ?></h1>
			
			<!-- formulario -->
			<form name = 'Form' action='../Controller/USUARIOS_Controller.php' method='post' onsubmit="return comprobar_registro();">
			
				 	<!--formulario login -->
				<?php echo $strings['login'] . ':' ?>
				 <input type = 'text' name = 'login' id = 'login' placeholder ="<?php echo $strings['Usuario'] . ':' ?>" size = '9' value = '<?php echo $this->tupla['login']; ?>' onblur="esNoVacio('login')  && comprobarDni('login')" readonly><br>

				<!-- formulario contraseña-->
				<?php echo $strings['password'] . ':' ?><input type = 'text' name = 'password' id = 'password' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '15' value = '<?php echo $this->tupla['password']; ?>' onblur="esNoVacio('password')  && comprobarLetrasNumeros('password',15)" readonly><br>

				<!-- formulario dni -->
				<?php echo $strings['DNI'] . ':' ?> <input type = 'text' readonly name = 'dni' id = 'dni' size = '9' value = "<?php echo $this->tupla['DNI']; ?>"><br>

				<!-- formulario nombre -->
				<?php echo $strings['Nombre'] . ':' ?>
				<input type = 'text' name = 'nombre' id = 'nombre' placeholder = "<?php echo $strings['Solo letras'] ?>" size = '30' value = '<?php echo $this->tupla['nombre']; ?>' onblur="esNoVacio('nombre')  && comprobarSoloLetras('nombre',30)" readonly><br>

				<!-- formulario apellidos-->
				<?php echo $strings['Apellidos'] . ':' ?><input type = 'text' name = 'apellidos' id = 'apellidos' placeholder = "<?php echo $strings['Solo letras'] ?>" size = '50' value = '<?php echo $this->tupla['apellidos']; ?>' onblur="esNoVacio('apellidos')  && comprobarSoloLetras('apellidos',50)" readonly><br>

				<!-- formulario telefono -->
				<?php echo $strings['Telefono'] . ':' ?> <input type = 'text' readonly name = 'telefono' min='0' max='999999999' id = 'telefono'  size = '9' value = "<?php echo $this->tupla['telefono']; ?>" ><br>

				<!-- formulario email-->
				<?php echo $strings['email'] . ':' ?><input type = 'text' name = 'email' id = 'email' size = '40' value = '<?php echo $this->tupla['email']; ?>' onblur="esNoVacio('email')  && comprobarEmail('email')" readonly><br>

				<!-- formulario cumpleaños -->
				<?php echo $strings['Fecha de nacimiento'] . ':' ?> <input type = 'date' name = 'fechaNacimiento' id = 'fechaNacimiento' value= "<?php echo $this->tupla['FechaNacimiento']; ?>" readonly><br>

				<!-- formulario foto-->
				<?php echo $strings['Foto personal'] . ':'.' ' ?><input type='label' size='40' value = "<?php echo $this->tupla['fotopersonal']. ' '; ?>" readonly><br>

				<!-- formulario sexo-->
				<?php echo $strings['sexo'] . ':' ?> <input type= 'text' id='sexo' name="sexo" value= '<?php if($this->tupla['sexo']=='mujer'){ echo $strings['Mujer']; }else{ echo $strings['Hombre'];} ?>' readonly/>

			</form><!-- cierre formulario-->
				
			<!-- link -->
			<a href='../Controller/USUARIOS_Controller.php'> <?php echo $strings['Volver']; ?> </a>
		
<!-- saltos -->
			<br>
			<br>
			<br>

			<!-- formulario -->
			<form name = 'Form' action='../Functions/Desconectar.php' method='post'>

				<!--botón -->
				<input type='submit' name='action' value='<?php echo $strings['Desconectar']; ?>'>

			</form><!-- cierre formulario -->
		
<!-- ------------------------------------------------------------------------------------------------------------ -->	

		<?php

			//llamada a footer
			include '../View/Footer.php';
			
		} //fin metodo render

	} //fin mostrar actual
