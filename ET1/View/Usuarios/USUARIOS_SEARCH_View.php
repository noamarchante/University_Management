 <?php

/*
	Archivo php
	Nombre: USUARIOS_SEARCH_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 24/09/2019 
	Función: vista del menú de búsqueda
*/
 	
	class USUARIOS_SEARCH{//clase buscar

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
			<h1><?php echo $strings['Buscar']; ?></h1>	
			<!-- formulario -->
			<form name = 'Form' action='../Controller/USUARIOS_Controller.php' method='post' onsubmit="return comprobar_registro();">
			
				<!--formulario login -->
				<?php echo $strings['login'] . ':' ?><input type = 'text' name = 'login' id = 'login' placeholder = "<?php echo $strings['Utiliza tu Dni']; ?>" size = '9' value = '' onblur="esNoVacio('login')  && comprobarDni('login')" ><br>


				<!-- formulario contraseña-->
				<?php echo $strings['password'] . ':' ?><input type = 'text' name = 'password' id = 'password' placeholder ="<?php echo $strings['Letras y numeros']; ?>" size = '15' value = '' onblur="esNoVacio('password')  && comprobarLetrasNumeros('password',15)" ><br>

				<!-- formulario dni -->
				<?php echo $strings['DNI'] . ':' ?> <input type = 'text' name = 'dni' id = 'dni' placeholder = "<?php echo $strings['Utiliza tu Dni']; ?>" size = '9' value = '' onblur="esNoVacio('dni') && comprobarDni('dni')" ><br>

				<!-- formulario nombre -->
				<?php echo $strings['Nombre'] . ':' ?><input type = 'text' name = 'nombre' id = 'nombre' placeholder = "<?php echo $strings['Solo letras']; ?>" size = '30' value = '' onblur="esNoVacio('nombre')  && comprobarSoloLetras('nombre',30)" ><br>

				<!-- formulario apellidos-->
				<?php echo $strings['Apellidos'] . ':' ?><input type = 'text' name = 'apellidos' id = 'apellidos' placeholder = "<?php echo $strings['Solo letras']; ?>" size = '50' value = '' onblur="esNoVacio('apellidos')  && comprobarSoloLetras('apellidos',50)" ><br>

				<!-- formulario telefono -->
				<?php echo $strings['Telefono'] . ':' ?> <input type = 'number' name = 'telefono' min='0' max='999999999' id = 'telefono' placeholder = "<?php echo $strings['Solo numeros']; ?>" size = '9' value = '' onblur="esNoVacio('telefono')"><br>

				<!-- formulario email -->
				<?php echo $strings['email'] . ':' ?><input type = 'text' name = 'email' id = 'email' size = '40' value = '' onblur="esNoVacio('email')  && comprobarEmail('email')" ><br>
				
				<!-- formulario contraseña -->
				<?php echo $strings['Fecha de nacimiento'] . ':' ?> <input type = 'date' name = 'fechaNacimiento' id = 'fechaNacimiento'><br>

				<!-- formulario foto-->
				<?php echo $strings['Foto personal'] . ':' ?> <input type = 'file' name = 'fotoPersonal' id = 'fotoPersonal' placeholder = "<?php echo $strings['Foto personal']; ?>" onblur="esNoVacio('fotoPersonal') && comprobarFoto('fotoPersonal')"><br>

				<!-- formulario sexo-->
				<select name="sexo">
					<option selected="true"></option>
					<option value="Hombre"><?php echo $strings['Hombre']; ?></option>
		        	<option value="Mujer"><?php echo $strings['Mujer']; ?></option>
				</select> 

				<!-- salto -->
				<br>

				<!-- botón -->
				<button type='submit' name='action' value='SEARCH'><?php echo $strings['Buscar']; ?></button>

			</form> <!-- cierre formulario-->
				
		
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

	} //fin search

?>