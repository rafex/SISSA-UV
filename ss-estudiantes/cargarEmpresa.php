<div id="datos">

<h3>Datos de la empresa</h3>


<p>
<strong>Nombre:</strong> <input type="text" id="NombreEmp" size="40"  />
<br /><br /> 
<strong>Correo electronico:</strong> <input type="text" id="EmailEmp" size="30"  />  
<br /><br />
<strong>Teléfono 1:</strong> <input type="text" id="TelefonoEmp" size="15" />
<br /><br />
<strong>Teléfono 2:</strong> <input type="text" id="Telefono2Emp" size="15" />
<br /><br />
<strong>Clasificación:</strong> <input type="text" id="ClasificacionEmp" size="10" />   
<strong> Sector:</strong>
	<select id="SectorEmp" name="SectorEmp" >
			<option value="primario" >Primario</option>
			<option value="secundario" >Secundario</option>
			<option value="terciario" >Terciario</option>		
			
		
		</select> 
<strong> Giro:</strong> <input type="text" id="GiroEmp" size="10" />
<br /><br />
<strong>Acuerdo:</strong>
	<select id="AcuerdoEmp" name="AcuerdoEmp" >
			<option value="se tiene y se desea mantener" >Se tiene y se desea mantener</option>
			<option value="se tiene y NO se desea mantener" >Se tiene y NO se desea mantener</option>
			<option value="no se tiene y se desea firmar" >No se tiene y se desea firmar</option>
			<option value="no se tiene y NO se desea firmar" >No se tiene y NO se desea firmar</option>
	</select>
<strong>Tipo empresa:</strong>	
	<select id="TipoEmp" name="TipoEmp" tabindex="27">
			<option value="publica" >Pública</option>
			<option value="privada" >Privada</option>
			<option value="uv" >UV</option>
			
	</select>  
</p> 

<h3>Dirección</h3>

<p>
<strong>Dirección:</strong> <input type="text" id="DireccionEmp" size="45" />
<br /><br />
<strong>Estado:</strong> <input type="text" id="EstadoEmp" size="10"  /> 
<strong> Municipio:</strong> <input type="text" id="MunicipioEmp" size="10"  />
<strong> Localidad:</strong> <input type="text" id="LocalidadEmp" size="10"  />
</p>
<input name="modificar" id="modificar" type="button" value="Cancelar" onclick="javascript:cargarContenido('empresa.php');" />
<input name="modificar" id="modificar" type="button" value="Guardar" onclick="javascript:realizarOperacionConMensajeAccion2('nuevaEmpresa.php','NombreEmp,EmailEmp,TelefonoEmp,Telefono2Emp,ClasificacionEmp,SectorEmp,GiroEmp,AcuerdoEmp,DireccionEmp,EstadoEmp,MunicipioEmp,LocalidadEmp,TipoEmp','Datos cargados de la empresa exitosamente.','index.php')" />
</div>
