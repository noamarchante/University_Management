<?php
	
	/*
	Archivo php
	Nombre: USUARIOS_SEARCH_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 24/09/2019 
	Función: vista del menú mostrar datos
	*/
	
	class USUARIOS_SHOWALL{ //clase showall

		//Constructor de la clase
		function __construct($lista,$datos){
			
			//inicialización variables
			$this->datos = $datos;
			$this->lista = $lista;	

			//inicialización método render
			$this->render();
		
		}//fin constructor

//-------------------------------------------------------------------------------------------------------------------

		//función render
		function render(){

			//header necesita los strings
			include '../View/Header.php';
?>
			<!-- muestra un mensaje -->
			<h1><?php echo $strings['Informacion']; ?></h1>	
			<!-- saltos -->
			<br>
			<br>

			<!-- link -->
			<a href='../Controller/USUARIOS_Controller.php?action=ADD'><?php echo $strings['Añadir']; ?></a>

			<!-- salto -->
			<br>

			<!-- link-->
			<a href='../Controller/USUARIOS_Controller.php?action=SEARCH'><?php echo $strings['Buscar']; ?></a>
		
		<!-- tabla -->	
		<table>
			<!-- tupla-->
			<tr>
<?php
				//recorre los elementos de lista
				foreach ($this->lista as $titulo) {
?>
						<!-- crea fila de titulo con los valores de lista-->
						<th> <?php echo $strings[$titulo];?></th>
<?php
				}//fin foreach 
?>
			</tr><!-- cierre tupla -->
<?php
		//recorre las filas de datos
		foreach($this->datos as $fila){
?>
			<tr><!-- crea fila -->
<?php
			//recorre las columnas de datos
			foreach ($this->lista as $columna) {			
?>
				<!-- muestra los datos en las columnas -->
				<td><?php echo $fila[$columna]; ?></td>
<?php
			}//cierre foreach columnas
?>

			<!-- columnas con enlace a cada action -->
			<td>
				<a href='../Controller/USUARIOS_Controller.php?action=EDIT&login=<?php echo $fila['login']; ?>'> <?php echo $strings['Editar']; ?> </a>
				</td>
				<td>
					<a href='
						../Controller/USUARIOS_Controller.php?action=DELETE&login=
							<?php echo $fila['login']; ?>
							'><?php echo $strings['Borrar']; ?> </a>
				</td>
				<td>
					<a href='
						../Controller/USUARIOS_Controller.php?action=SHOWCURRENT&login=
							<?php echo $fila['login']; ?>
							'>  <?php echo $strings['Informacion detallada']; ?> </a>
				</td>
			
			</tr><!-- cierre filas -->

<?php

		}//cierre foreach filas
?>


		</table><!-- cierre tabla -->		
		
					
		<!-- link -->
		<a href='../Controller/Index_Controller.php'> <?php echo $strings['Volver']; ?> </a>

  		<!-- saltos -->
  		<br>
		<br>
		<br>

		<!-- botón -->
		<form name = 'Form' action='../Functions/Desconectar.php' method='post'>

		<input type='submit' name='action' value='<?php echo $strings['Desconectar']; ?>'>

		</form>	
<?php  

		}//fin función render

	}//fin clase

	?>



	