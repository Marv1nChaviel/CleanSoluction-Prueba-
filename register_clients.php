<?php 
include('./conexion.php');

$nombre = $_POST['nombre_cliente'];
$cedula_rif = $_POST['cedula_rif'];
$telefono = $_POST['Telefono'];
$direccion = $_POST['direccion'];



$ejecutar = $conexion->prepare("INSERT INTO clientes (nombre_cliente, cedula_rif, telefono, direccion) 
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






?>