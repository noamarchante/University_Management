<?php
	
	/*
	Archivo php
	Nombre: PROFESOR_SHOWALL_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 5/10/2019 
	Función: vista del menú mostrar datos 
*/
	
	class PROFESOR_SHOWALL{ //clase showall

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
			<h1 class="tituloFormulario"><?php echo $strings['Informacion profesor']; ?>   <img src="../View/img/profesor.png" width="42" height="42"></h1>	
			<!-- saltos -->
			<br>
			<br>

			<!-- link -->
			<a href='../Controller/PROFESOR_Controller.php?action=ADD'><img src="../View/Icons/añadir.png" alt="<?php echo $strings['Añadir'];?>" width="42" height="42"/></a>
			<!-- link-->
			<a href='../Controller/PROFESOR_Controller.php?action=SEARCH'><img src="../View/Icons/buscar.jpg" alt="<?php echo $strings['Buscar'];?>" width="42" height="42"/></a>
		<br>
		<!-- tabla -->	
		<table class="table">
			<thead class="thead-dark">
				<!-- tupla-->
				<tr>
<?php
					//recorre los elementos de lista
					foreach ($this->lista as $titulo) {
?>
						<!-- crea fila de titulo con los valores de lista-->
						<th scope="col"> <?php echo $strings[$titulo]; ?> </th>
<?php
					
					}//fin foreach 
?>
				</tr><!-- cierre tupla -->
			</thead>
			<tbody>
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
							<a href='../Controller/PROFESOR_Controller.php?action=EDIT&DNI=<?php echo $fila['DNI']; ?>'> <img src="../View/Icons/modificar.png" alt="<?php echo $strings['Editar'];?>" width="42" height="42"/></a>
							<a href='../Controller/PROFESOR_Controller.php?action=DELETE&DNI=<?php echo $fila['DNI']; ?>'><img src="../View/Icons/borrar.png" alt="<?php echo $strings['Borrar'];?>" width="42" height="42"/></a>
							<a href='../Controller/PROFESOR_Controller.php?action=SHOWCURRENT&DNI=<?php echo $fila['DNI']; ?>'> <img src="../View/Icons/info.png" alt="<?php echo $strings['Informacion detallada'];?>" width="42" height="42"/></a>
						</td>
			
					</tr><!-- cierre filas -->

<?php

				}//cierre foreach filas
?>

			</tbody>
		</table><!-- cierre tabla -->		
		
					
		<!-- link -->
		<a href='../Controller/Index_Controller.php'> <img src="../View/Icons/volver.png" width="42" height="42" alt="<?php echo $strings['Volver']; ?>"/> </a>

  		<!-- saltos -->
  		<br>
		<br>
		<br>
<?php  

		}//fin función render

	}//fin clase

	?>



	