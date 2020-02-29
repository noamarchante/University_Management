<?php
	
/*
	Archivo php
	Nombre: TITULACION_SHOWALL_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 08/10/2019 
	Función: vista del menú mostrar todos
*/
	
	class TITULACION_SHOWALL{//clase showall

		var $datos; //definir variable datos
		var $lista; //definir variable lista
		
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
			<h1 class="tituloFormulario"><label data-translate="Informacion titulacion"></label>   <img src="../View/img/titulacion.png" width="42" height="42"/></h1>	
			<!-- saltos -->
			<br>
			<br>

			<!-- link -->
			<a href='../Controller/TITULACION_Controller.php?action=ADD'><img src="../View/Icons/añadir.png" width="42" height="42"/></a>
			<!-- link-->
			<a href='../Controller/TITULACION_Controller.php?action=SEARCH'><img src="../View/Icons/buscar.png" width="42" height="42"/></a>
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
						<th scope="col" data-translate='<?php echo $titulo?>'> </th>	
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
							<a href='../Controller/TITULACION_Controller.php?action=EDIT&CODTITULACION=<?php echo $fila['CODTITULACION']; ?>'> <img src="../View/Icons/modificar.png" width="42" height="42"/>  </a>
							<a href='../Controller/TITULACION_Controller.php?action=DELETE&CODTITULACION=<?php echo $fila['CODTITULACION']; ?>'><img src="../View/Icons/borrar.png" width="42" height="42"/></a>
							<a href='../Controller/TITULACION_Controller.php?action=SHOWCURRENT&CODTITULACION=<?php echo $fila['CODTITULACION']; ?>'> <img src="../View/Icons/info.png" width="42" height="42"/></a>
							<form style="display:inline" action="../Controller/CENTRO_Controller.php" method='post'>
								<input type="hidden" name="codCentro" value="<?php echo $fila['CODCENTRO'];?>">
								<input type="hidden" name="codEdificio" value="">
								<input type="hidden" name="nombreCentro" value="">
								<input type="hidden" name="direccionCentro" value="">
								<input type="hidden" name="responsableCentro" value="">
								<button class="button" style="border-left:1px #dee2e6 solid;margin-left: 1.5em" type='submit' name="action" value="SEARCH" onclick="aviso()"><img src="../View/img/centro.png" width="42" height="42"/></button>
							</form>
						</td>
			
					</tr><!-- cierre filas -->

<?php

				}//cierre foreach filas
?>

			</tbody>
		</table><!-- cierre tabla -->		
		
					
		<!-- link -->
		<a href='../Controller/Index_Controller.php'><img src="../View/Icons/volver.png" width="42" height="42"/></a>

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



	