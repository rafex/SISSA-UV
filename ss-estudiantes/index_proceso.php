<?php
function validaIngreso($parametro)
{
	// Funcion utilizada para validar el dato a ingresar recibido por GET
	$parametro=trim($parametro);
	
	if(eregi("^[a-zA-Z0-9.@ ]{4,40}$", $parametro)) return TRUE;
	else return FALSE;
}

function validaBusqueda($parametro)
{
	// Funcion para validar la cadena de busqueda de la lista desplegable
	if(eregi("^[a-zA-Z0-9.@ ]{2,40}$", $parametro)) return TRUE;
	else return FALSE;
}

if(isset($_POST["ingreso"]))
{
	$valor=$_POST["ingreso"];
	if(validaIngreso($valor))
	{
		$coneccion=mysql_connect("localhost", "root", "rulo10") or die(mysql_error());
		mysql_select_db("pruebas", $coneccion) or die(mysql_error());
		
		$consulta=mysql_query("SELECT COUNT(*) FROM autocompletador") or die(mysql_error());
		$registro=mysql_fetch_row($consulta);

		if($registro[0]>=600) { echo "Hay demasiados registros en la Base de Datos"; die(); }
		
		$consulta=mysql_query("SELECT * FROM autocompletador WHERE nombre='$valor'") or die(mysql_error());
		$registro=mysql_fetch_row($consulta);
		
		if($registro) { echo "Ya existe tu nombre en la Base de Datos"; }
		else
		{
			mysql_query("INSERT into autocompletador (nombre) VALUES ('$valor')");
			echo "Tu nombre ha sido ingresado";
		}
		mysql_close($coneccion);
	}
}
if(isset($_POST["busqueda"]))
{
	$valor=$_POST["busqueda"];
	if(validaBusqueda($valor))
	{
		$coneccion=mysql_connect("localhost", "root", "rulo10") or die(mysql_error());
		mysql_select_db("serviciosocial_fca_uv", $coneccion) or die(mysql_error());
		
		//$consulta=mysql_query("SELECT nombre FROM autocompletador WHERE MATCH(nombre) AGAINST('".$valor."*' IN BOOLEAN MODE) LIMIT 0, 22") or die(mysql_error());
		$consulta=mysql_query("SELECT nombreemp FROM empresa_ss_fca WHERE nombreemp LIKE '".$valor."%' LIMIT 0, 22");
		
		mysql_close($coneccion);
		
		$cantidad=mysql_num_rows($consulta);
		if($cantidad==0)
		{
			/* 0: no se vuelve por mas resultados
			vacio: cadena a mostrar, en este caso no se muestra nada */
			echo "0&vacio";
		}
		else
		{
			if($cantidad>20) echo "1&"; 
			else echo "0&";
	
			$cantidad=1;
			while(($registro=mysql_fetch_row($consulta)) && $cantidad<=20)
			{
				echo "<div onClick=\"clickLista(this);\" onMouseOver=\"mouseDentro(this);\">".$registro[0]."</div>";
				// Muestro solo 20 resultados de los 22 obtenidos
				$cantidad++;
			}
		}
	}
}
?>