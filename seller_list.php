<?php 
include('./conexion.php');


$sql = "SELECT * FROM vendedores";
$resultado = $conexion->prepare($sql);
$resultado->execute();


while($datos=$resultado->fetch(PDO::FETCH_ASSOC)){
$json[] = array(
    'id'=> $datos['id_vendedor'],
    'nombre'=> $datos['nombre_vendedor'],
);
}

echo json_encode($json,JSON_UNESCAPED_UNICODE);
?>