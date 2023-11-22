<?php 
include('./conexion.php');

$nombre = $_POST['producto'];
$categoria = $_POST['category'];
$precio_base = $_POST['precio_base'];
$descuento = $_POST['Descuento'];


$ejecutar = $conexion->prepare("INSERT INTO productos (nombre_producto, categoria, precio_base, descuento) 
VALUES (?, ?, ?, ?)");
// Bind

$ejecutar->bindParam(1,$nombre);
$ejecutar->bindParam(2,$categoria);
$ejecutar->bindParam(3,$precio_base);
$ejecutar->bindParam(4,$descuento);

// Excecute
if($ejecutar->execute()){
    echo "Ejecutado";
}else{
    echo "Error";
}

