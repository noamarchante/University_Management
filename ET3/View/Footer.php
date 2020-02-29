
<!--
	Archivo php
	Nombre: Footer.php
	Autor: 	Noa López Marchante
	Fecha de creación: 21-09-2019
	Función: pie de página
-->

</article> <!-- cierre sindicación -->
			</main> <!-- cierre agrupación -->


			<div id="capaVentana" style="visibility: hidden;">
				<table  width="300px" style="border:1px solid red;padding:0px;">
					<tr>
						<td colspan="2" style="background-color:red;text-align:center" width="300px">
								<font style="font-size:24px;color:white"><label data-translate="Alerta"></label></font>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="background-color:white;" >
							<div id="miDiv" style="color:black;padding:10px" class="error" data-translate="hola"></div>
						</td>
					</tr>
					<tr style="background-color:white">
						<td >		
							<form name="formError" style="text-align:center">
								<button type="button" style="background:white;border:white" name="bAceptar"  value="Aceptar" onclick="cerrarVentana()" >
								<img src="../View/Icons/confirmacion.png" height="42" width="42"/></button>	
							</form>
						</td>
					</tr>	
				</table>
			</div>
			<div id="capaFondo1"></div>
			<footer style="text-align:center"> <!-- apertura cuadro inferior -->
							<label class="col-form-label" data-translate="Hoy es"></label><label class="col-form-label">&nbsp;  <?php echo  date("d-M-Y", time()) ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><label class="col-form-label"  data-translate="Autor"></label><label class="col-form-label">: su6bf5</label>
			</footer> <!-- cierre cuadro inferior -->
			
		</body> <!-- cierre cuadro central -->

	</html> <!-- cierre estructura html -->