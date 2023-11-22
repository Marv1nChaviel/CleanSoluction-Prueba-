<?php
include('./conexion.php');
    

function add_clientdb($nombre,$cedula_rif,$telefono,$direccion){
include('./conexion.php');
$ejecutar = $conexion->prepare("INSERT INTO cliente (nombre, cedula_rif, telefono, direccion) 
VALUES (?, ?, ?, ?)");
// Bind
$ejecutar->bindParam(1,$nombre);
$ejecutar->bindParam(2,$cedula_rif);
$ejecutar->bindParam(3,$telefono);
$ejecutar->bindParam(4,$direccion);


// Excecute
if($ejecutar->execute()){
    echo "Ejecutado";
}else{
    echo "Error";
}
}

function add_productsdb($nombre,$categoria,$precio_base,$descuento,$vendedor_id){
include('./conexion.php');
$ejecutar = $conexion->prepare("INSERT INTO productos (nombre, categoria, precio_base, descuento,vendedor_id) 
VALUES (?, ?, ?, ?, ?)");
// Bind

$ejecutar->bindParam(1,$nombre);
$ejecutar->bindParam(2,$categoria);
$ejecutar->bindParam(3,$precio_base);
$ejecutar->bindParam(4,$descuento);
$ejecutar->bindParam(5,$vendedor_id);

// Excecute
if($ejecutar->execute()){
    echo "Ejecutado";
}else{
    echo "Error";
}
}

function add_sellerdb($nombre,$email,$password){
include('./conexion.php');
$ejecutar = $conexion->prepare("INSERT INTO vendedores (nombre, categoria, precio_base) 
VALUES (?, ?, ?)");
// Bind

$ejecutar->bindParam(1,$nombre);
$ejecutar->bindParam(2,$email);
$ejecutar->bindParam(3,$password);


// Excecute
if($ejecutar->execute()){
    echo "Ejecutado";
}else{
    echo "Error";
}
}
?> 