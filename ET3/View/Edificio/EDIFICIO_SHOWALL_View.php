<?php

/*
	Archivo php
	Nombre: EDIFICIO_SHOWALL_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 06/10/2019 
	Función: vista del menú mostrar todo
*/

	class EDIFICIO_SHOWALL{//clase showall

		var $datos; //define la variable tupla
		var $lista; //define la variable lista
		
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
			<h1 class="tituloFormulario"><label data-translate="Informacion edificio"></label>   <img src="../View/img/edificio.png" width="52" height="52"></h1>	
			<!-- saltos -->
			<br>
			<br>

			<!-- link -->
			<a href='../Controller/EDIFICIO_Controller.php?action=ADD'><img src="../View/Icons/añadir.png" alt="<?php echo $strings['Añadir'];?>" width="42" height="42"/></a>

			<!-- link-->
			<a href='../Controller/EDIFICIO_Controller.php?action=SEARCH'><img src="../View/Icons/buscar.png" alt="<?php echo $strings['Buscar'];?>" width="42" height="42"/></a>
		
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
						<th scope="col" data-translate="<?php echo $titulo ?>"> </th>
					
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
						<td style="border-left:1px #dee2e6 solid">
							<a href='../Controller/EDIFICIO_Controller.php?action=EDIT&CODEDIFICIO=<?php echo $fila['CODEDIFICIO']; ?>'> <img src="../View/Icons/modificar.png" alt="<?php echo $strings['Editar'];?>" width="42" height="42"/></a>
							<a href='../Controller/EDIFICIO_Controller.php?action=DELETE&CODEDIFICIO=<?php echo $fila['CODEDIFICIO']; ?>'><img src="../View/Icons/borrar.png" alt="<?php echo $strings['Borrar'];?>" width="42" height="42"/> </a>
							<a href='../Controller/EDIFICIO_Controller.php?action=SHOWCURRENT&CODEDIFICIO=<?php echo $fila['CODEDIFICIO']; ?>'>  <img src="../View/Icons/info.png" alt="<?php echo $strings['Informacion detallada'];?>" width="42" height="42"/> </a>
						
							<form style="display:inline" action="../Controller/CENTRO_Controller.php" method='post'>
								<input type="hidden" name="codCentro" value="">
								<input type="hidden" name="codEdificio" value="<?php echo $fila['CODEDIFICIO'];?>">
								<input type="hidden" name="nombreCentro" value="">
								<input type="hidden" name="direccionCentro" value="">
								<input type="hidden" name="responsableCentro" value="">
								<button class="button" type='submit' style="border-left:1px #dee2e6 solid;margin-left: 1.5em" name="action" value="SEARCH" ><img src="../View/img/centro.png" alt="<?php echo $strings['Informacion centro'];?>" width="42" height="42"/></button>
							</form>
							<form style="display:inline" action="../Controller/ESPACIO_Controller.php" method='post'>
								<input type="hidden" name="codEspacio" value="">
								<input type="hidden" name="codEdificio" value="<?php echo $fila['CODEDIFICIO'];?>">
								<input type="hidden" name="codCentro" value="">
								<input type="hidden" name="tipo" value="">
								<input type="hidden" name="superficieEspacio" value="">
								<input type="hidden" name="numInventarioEspacio" value="">
								<button class="button" type='submit' name="action" value="SEARCH" ><img src="../View/img/espacio.png" alt="<?php echo $strings['Informacion espacio'];?>" width="42" height="42"/></button>
							</form>
						</td>
			
					</tr><!-- cierre filas -->

<?php

				}//cierre foreach filas
?>
			</tbody>

		</table><!-- cierre tabla -->		
		
					
		<!-- link -->
		<a href='../Controller/Index_Controller.php'> <img src="../View/Icons/volver.png" alt="<?php echo $strings['Volver'];?>" width="42" height="42"/></a>

  		<!-- saltos -->
  		<br>
		<br>
		<br>
		<?php
			//llamada al pie
			include '../View/Footer.php'; 

?>
<?php  

		}//fin función render

	}//fin clase

	?>



	