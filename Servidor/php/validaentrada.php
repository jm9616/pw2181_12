<?php
include 'conexiones.php';
function valida(){
	$respuesta= false;
	$usuario=$_POST["usuario"];
	$clave =md5($_POST["clave"]);
	 //conectarnos al server de bd
	$con=conecta();
	$consulta= "select * from usuarios where usuarios= '".$usuario."' and clave= '".$clave."' limit 1";
	$resConsulta=mysql_query($con,$consulta);

	if(mysql_num_rows($resConsulta)>0){
			$respuesta = true;
		}
		$salidaJSON = array('respuesta' => $respuesta );
		print json_encode($salidaJSON);
	}

	

	$opc=$_POST["opc"];
	switch ($opc) {
		case 'validaentrada':
			valida();
			break;
		
		default:
			# code...
			break;
	}
?>