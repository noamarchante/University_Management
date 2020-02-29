<?php
	
/*
	Archivo php
	Nombre: CENTRO_SHOWALL_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 06/10/2019 
	Función: vista del menú mostrar todos
*/
	
	class CENTRO_SHOWALL{//clase showall

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
			<h1 class="tituloFormulario"><?php echo $strings['Informacion centro']; ?>   <img src="../View/img/centro.jpg" width="42" height="42"></h1>	
			<!-- saltos -->
			<br>
			<br>

			<!-- link -->
			<a href='../Controller/CENTRO_Controller.php?action=ADD'><img src="../View/Icons/añadir.png" alt="<?php echo $strings['Añadir'];?>" width="42" height="42"/></a>
			<a href='../Controller/CENTRO_Controller.php?action=SEARCH'><img src="../View/Icons/buscar.jpg" alt="<?php echo $strings['Buscar'];?>" width="42" height="42"/></a>
		
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
							<a href='../Controller/CENTRO_Controller.php?action=EDIT&CODCENTRO=<?php echo $fila['CODCENTRO']; ?>'> <img src="../View/Icons/modificar.png" alt="<?php echo $strings['Editar'];?>" width="42" height="42"/> </a>
							<a href='../Controller/CENTRO_Controller.php?action=DELETE&CODCENTRO=<?php echo $fila['CODCENTRO']; ?>'><img src="../View/Icons/borrar.png" alt="<?php echo $strings['Borrar'];?>" width="42" height="42"/> </a>
							<a href='../Controller/CENTRO_Controller.php?action=SHOWCURRENT&CODCENTRO=<?php echo $fila['CODCENTRO']; ?>'>  <img src="../View/Icons/info.png" alt="<?php echo $strings['Informacion detallada'];?>" width="42" height="42"/> </a>
							<form style="display:inline" action="../Controller/EDIFICIO_Controller.php" method='post'>
								<input type="hidden" name="codEdificio" value="<?php echo $fila['CODEDIFICIO'];?>">
								<input type="hidden" name="nombreEdificio" value="">
								<input type="hidden" name="direccionEdificio" value="">
								<input type="hidden" name="campusEdificio" value="">
								<button class="button" type='submit' name="action" value="SEARCH" ><img src="../View/img/edificio.png" alt="<?php echo $strings['Informacion edificio'];?>" width="42" height="42"/></button>
							</form>
							<form style="display:inline" action="../Controller/ESPACIO_Controller.php" method='post'>
								<input type="hidden" name="codEspacio" value="">
								<input type="hidden" name="codEdificio" value="">
								<input type="hidden" name="codCentro" value="<?php echo $fila['CODCENTRO'];?>">
								<input type="hidden" name="tipo" value="">
								<input type="hidden" name="superficieEspacio" value="">
								<input type="hidden" name="numInventarioEspacio" value="">
								<button class="button" type='submit' name="action" value="SEARCH" ><img src="../View/img/espacio.jpg" alt="<?php echo $strings['Informacion espacio'];?>" width="42" height="42"/></button>
							</form>
							<form style="display:inline" action="../Controller/TITULACION_Controller.php" method='post'>
								<input type="hidden" name="codTitulacion" value="">
								<input type="hidden" name="codCentro" value="<?php echo $fila['CODCENTRO'];?>">
								<input type="hidden" name="nombreTitulacion" value="">
								<input type="hidden" name="responsableTitulacion" value="">
								<button class="button" type='submit' name="action" value="SEARCH" ><img src="../View/img/titulacion.png" alt="<?php echo $strings['Informacion titulacion'];?>" width="42" height="42"/></button>
							</form>
						</td>
			
					</tr><!-- cierre filas -->

<?php

				}//cierre foreach filas
?>

			</tbody>
		</table><!-- cierre tabla -->		
		
					
		<!-- link -->
		<a href='../Controller/Index_Controller.php'><img src="../View/Icons/volver.png" alt="<?php echo $strings['Volver'];?>" width="42" height="42"/> </a>

  		<!-- saltos -->
  		<br>
		<br>
		<br>
<?php  

		}//fin función render

	}//fin clase

	?>



	