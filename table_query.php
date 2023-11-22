<?php 
include('./conexion.php');


$sql = "SELECT * FROM productos";
$resultado = $conexion->prepare($sql);
$resultado->execute();


while($datos=$resultado->fetch(PDO::FETCH_ASSOC)){
$json[] = array(
    'nombre'=> $datos['nombre_producto'],
    'categoria'=> $datos['categoria'],
    'precio_base'=> $datos['precio_base'],
    'descuento'=> $datos['descuento'].'%',
    'subtotal'=> calcularSubtotal($datos['precio_base'],($datos['descuento']/100),0.16),
);
}

echo json_encode($json,JSON_UNESCAPED_UNICODE);

$impuesto = 0.16;
function calcularSubtotal($precio_base, $descuento, $impuesto) {

$subtotal = $precio_base;
if ($descuento) {
  $subtotal = $subtotal * 0.9; 
}
$subtotal = $subtotal * (1 + $impuesto);
return $subtotal;

}


?>