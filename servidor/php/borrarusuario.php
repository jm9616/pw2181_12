<?php
include 'conexiones.php';
function borrarusuario(){
    $respuesta = false;
    $usuario=GetSQLValueString($_POST["usuario"],"text");
    $nombre=GetSQLValueString($_POST["nombre"],"text");
  
    //Conectarnos al servidor de la BD.
    $con=conecta();
    // $consulta="select usuario from usuarios where usuario= '".$usuario."' limit 1";
    $consulta = sprintf("select usuario from usuarios where usuario = %s",$usuario);
    $resConsulta = mysqli_query($con,$consulta);
    $consultaBorra = "";
    //Si ya existe en la tabla usuarios 
    if(mysqli_num_rows($resConsulta) > 0){
       //Actualizamos
        $consultaBorra = sprintf("delete from usuarios where usuario=%s",$usuario);
    }
    mysqli_query($con,$consultaBorra);//ejecuta la consulta
    if (mysqli_affected_rows($con) > 0) {//Cantidad de registros afectados
        $respuesta = true;
    }
    //Array asociativo
    $salidaJSON = array('respuesta' => $respuesta);
    //var_dump($salidaJSON);
    print json_encode($salidaJSON);
}
$opc=$_POST["opc"];
switch ($opc) {
    case 'borrarUsuario':
         borrarusuario();
        break;
        
    default:
         # code...
        break;
}
?>