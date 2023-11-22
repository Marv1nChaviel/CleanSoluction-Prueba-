<?php 
include('./conexion.php');


$sql = "SELECT * FROM productos";
$resultado = $conexion->prepare($sql);
$resultado->execute();


while($datos=$resultado->fetch(PDO::FETCH_ASSOC)){
$json[] = array(
    'id'=> $datos['id_producto'],
    'nombre'=> $datos['nombre_producto'],
);
}

echo json_encode($json,JSON_UNESCAPED_UNICODE);
?>