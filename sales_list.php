<?php 


if(isset($_POST['id_vendedor'])){
    $id_vendedor = $_POST['id_vendedor'];
    ObtenerTotalVentas($id_vendedor);
}


function ObtenerTotalVentas($id_vendedor){
include('./conexion.php');

$sql = "SELECT 
productos.nombre_producto,
productos.precio_base,
productos.descuento,
COUNT(ventas.id_venta) AS n_ventas
FROM ventas INNER JOIN productos ON ventas.id_producto = productos.id_producto WHERE ventas.id_vendedor = '$id_vendedor'
GROUP BY productos.nombre_producto ";

$resultado = $conexion->prepare($sql);
$resultado->execute();

while($datos=$resultado->fetch(PDO::FETCH_ASSOC)) {
  $total_venta = calcularSubtotal($datos['precio_base'],$datos['descuento']);
  
    $json[] = array(
        'n_ventas'=> $datos['n_ventas'],
        'total_ventas'=> ($total_venta*$datos['n_ventas'])  ,
        'mas_vendido'=> $datos['nombre_producto'],
    );
  }
    echo json_encode($json,JSON_UNESCAPED_UNICODE);


}
function calcularSubtotal($precio_base, $descuento) {
    $impuesto = 0.16;
    $subtotal = $precio_base;
    if ($descuento) {
      $subtotal = $subtotal * 0.9; 
    }
    $subtotal = $subtotal * (1 + $impuesto);
    return $subtotal;
    
    }






?>