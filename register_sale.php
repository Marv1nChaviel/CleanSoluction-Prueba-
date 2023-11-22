<?php

$producto = $_POST['producto'];
$cliente = $_POST['cliente'];
$vendedor = $_POST['vendedor'];

function Obtenerprecio($producto,$cliente,$vendedor){
    include('./conexion.php');
    #id	nombre	categoria	precio_base	descuento	
    
    $sql = "SELECT * FROM productos WHERE id_producto = '$producto'";
    $resultado = $conexion->prepare($sql);
    $resultado->execute();
    
    
    $datos=$resultado->fetch(PDO::FETCH_ASSOC);
    
    $precio_producto = $datos['precio_base'];
    $descuento = $datos['descuento'];

    $total = calcularSubtotal($precio_producto,$descuento);
    if (isset($total)){
        InsertarVenta($cliente,$vendedor,$producto,$total);
    }else{
        return "error";
    }
 
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

function InsertarVenta($cliente,$vendedor,$producto,$total){
include('./conexion.php');
	
$ejecutar = $conexion->prepare("INSERT INTO ventas (id_cliente, id_vendedor	,id_producto, total) 
VALUES (?, ?, ?, ?)");
// Bind

$ejecutar->bindParam(1,$cliente);
$ejecutar->bindParam(2,$vendedor);
$ejecutar->bindParam(3,$producto);
$ejecutar->bindParam(4,$total);


// Excecute
if($ejecutar->execute()){
    echo "Ejecutado";
}else{
    echo "Error";
}

}
Obtenerprecio($producto,$cliente,$vendedor)

?>
