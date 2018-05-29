<?php
include 'conexiones.php';
function listado(){
    $respuesta = false;
    //Conectarnos al servidor de la BD.
    $con=conecta();
    // $consulta="select usuario from usuarios where usuario= '".$usuario."' limit 1";
    $consulta = sprintf("select * from usuarios order by nombre");
    $resConsulta = mysqli_query($con,$consulta);
    $tabla = "";
    //Si ya existe en la tabla usuarios 
    if(mysqli_num_rows($resConsulta) > 0){
        $respuesta= true;
        $tabla.= "<thead>";
        $tabla.= "<tr>";
        $tabla.= "<th>No.</th><th>Usuario</th><th>Nombre</th>";
        $tabla.= "</tr>";
        $tabla.= "</thead>";
        $tabla.= "<tbody>";
        $cuenta = 0;
        //Registros de la tabla
        while ($registro=mysqli_fetch_array($resConsulta)) {
            $cuenta = $cuenta + 1; 
            $tabla.= "<tr>";
            $tabla.= "<td>".$cuenta."</td>";
            $tabla.= "<td>".$registro["usuario"]."</td>";
            $tabla.= "<td>".$registro["nombre"]."</td>";
            $tabla.= "</tr>";
            
        }
        $tabla.= "</tbody>";


    }

    //Array asociativo
    $salidaJSON = array('respuesta' => $respuesta,'tabla' => $tabla);
    //var_dump($salidaJSON);
    print json_encode($salidaJSON);
}
$opc=$_POST["opc"];
switch ($opc) {
    case 'listado':
         listado();
        break;
        
    default:
         # code...
        break;
}
?>