<?php

/*
	Archivo php
	Nombre: Login_View.php
	Autor: 	Noa López Marchante
	Fecha de creación:  21-09-2019
	Función: muestra la vista de login con los campos a cubrir para mandar la información a Login_Controller
*/

	
	class Login{ //clase login

		//constructor de la clase
		function __construct(){	

			//llamada a la función render
			$this->render(); 
		
		}//fin constructor

//-------------------------------------------------------------------------------------------------------------------

		//función render
		function render(){ 

			//llamada a la cabecera
			include '../View/Header.php';  

			?>

<!-- ------------------------------------------------------------------------------------------------------------------ -->

			<!--muestra el nombre de la vista--> 
			<h1><?php echo $strings['Login'];?></h1> 	

			<!--muestra un formulario-->
			<form name = 'Form' action='../Controller/Login_Controller.php' method='post' onsubmit="return comprobar_login();"> 
		
				<!--casilla para el nombre de usuario-->
				 <?php echo $strings['login'] . ':' ?> <input type = 'text' name = 'login' placeholder = "<?php echo $strings['Utiliza tu Dni']; ?>" size = '9' value = '' onblur="javi1();"><br>
				 	
				 <!--casilla para la contraseña-->
				<?php echo $strings['password'] . ':' ?> <input type = 'password' name = 'password' placeholder = "<?php echo $strings['Letras y numeros']; ?>"  size = '15' value = '' onblur="esNoVacio('password')  && comprobarLetrasNumeros('password',15)"  ><br>

				<!-- boton de enviar-->
				<input type='submit' name='action' value=<?php echo $strings['Login']; ?>>

			</form> <!--cierre formulario-->
				
<!-- ----------------------------------------------------------------------------------------------------------------- -->

			<?php
		
			//llamada al pie
			include '../View/Footer.php'; 

		} //fin metodo render

	} //fin Login

?>
