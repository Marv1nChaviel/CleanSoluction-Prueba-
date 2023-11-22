<?php 
include('./conexion.php');

$sql = "SELECT * FROM clientes";
$resultado = $conexion->prepare($sql);
$resultado->execute();


while($datos=$resultado->fetch(PDO::FETCH_ASSOC)){
$json[] = array(
    'id'=> $datos['id_cliente'],
    'nombre'=> $datos['nombre_cliente'],
);
}

echo json_encode($json,JSON_UNESCAPED_UNICODE);
?>