<?php
include 'conexiones.php';
function valida(){
    $respuesta = false;
    $usuario=$_POST["usuario"];
    $clave =md5($_POST['clave']);
    //Conectarnos al servidor de la BD.
    $con=conecta();
    $consulta="select usuario,clave from usuarios where usuario= '".$usuario."' and clave='".$clave."' limit 1";
    $resConsulta=mysqli_query($con,$consulta);
    if(mysqli_num_rows($resConsulta) > 0){
        $respuesta = true;
    }
    //Array asociativo
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