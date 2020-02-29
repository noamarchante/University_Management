<?php
	
/*
	Archivo php
	Nombre: ESPACIO_SHOWALL_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 07/10/2019 
	Función: vista del menú mostrar datos 
*/

	class ESPACIO_SHOWALL{//clase showall

		var $datos; //define la variable datos
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
			<h1 class="tituloFormulario"><label data-translate="Informacion espacio"></label>   <img src="../View/img/espacio.png" width="42" height="42"></h1>	
			
			<!-- saltos -->
			<br>
			<br>

			<!-- link -->
			<a href='../Controller/ESPACIO_Controller.php?action=ADD'> <img src="../View/Icons/añadir.png" width="42" height="42" alt="<?php echo $strings['Añadir']; ?>"/></a>
			<!-- link-->
			<a href='../Controller/ESPACIO_Controller.php?action=SEARCH'> <img src="../View/Icons/buscar.png" width="42" height="42" alt="<?php echo $strings['Buscar']; ?>"/></a>
		
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
						<th  scope="col" data-translate="<?php echo $titulo?>"> </th>
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
							<a href='../Controller/ESPACIO_Controller.php?action=EDIT&CODESPACIO=<?php echo $fila['CODESPACIO']; ?>'>  <img src="../View/Icons/modificar.png" width="42" height="42" alt="<?php echo $strings['Editar']; ?>"/> </a>
							<a href='../Controller/ESPACIO_Controller.php?action=DELETE&CODESPACIO=<?php echo $fila['CODESPACIO']; ?>'> <img src="../View/Icons/borrar.png" width="42" height="42" alt="<?php echo $strings['Borrar']; ?>"/> </a>
							<a href='../Controller/ESPACIO_Controller.php?action=SHOWCURRENT&CODESPACIO=<?php echo $fila['CODESPACIO']; ?>'> <img src="../View/Icons/info.png" width="42" height="42" alt="<?php echo $strings['Informacion detallada']; ?>"/> </a>
							<form style="display:inline" action="../Controller/CENTRO_Controller.php" method='post'>
								<input type="hidden" name="codCentro" value="<?php echo $fila['CODCENTRO'];?>">
								<input type="hidden" name="codEdificio" value="">
								<input type="hidden" name="nombreCentro" value="">
								<input type="hidden" name="direccionCentro" value="">
								<input type="hidden" name="responsableCentro" value="">
								<button class="button" style="border-left:1px #dee2e6 solid;margin-left: 1.5em" type='submit' name="action" value="SEARCH" ><img src="../View/img/centro.png" alt="<?php echo $strings['Informacion centro'];?>" width="42" height="42"/></button>
							</form>
							<form style="display:inline" action="../Controller/EDIFICIO_Controller.php" method='post'>
								<input type="hidden" name="codEdificio" value="<?php echo $fila['CODEDIFICIO'];?>">
								<input type="hidden" name="nombreEdificio" value="">
								<input type="hidden" name="direccionEdificio" value="">
								<input type="hidden" name="nombreEdificio" value="">
								<button class="button" type='submit' name="action" value="SEARCH" ><img src="../View/img/edificio.png" alt="<?php echo $strings['Informacion edificio'];?>" width="42" height="42"/></button>
							</form>
						</td>
			
					</tr><!-- cierre filas -->

<?php

				}//cierre foreach filas
?>

			</tbody>
		</table><!-- cierre tabla -->		
		
					
		<!-- link -->
		<a href='../Controller/Index_Controller.php'> <img src="../View/Icons/volver.png" width="42" height="42" alt="<?php echo $strings['Volver']; ?>"/></a>

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



	