<?php 
include('./conexion.php');

$nombre = $_POST['nombre_vendedor'];
$correo_electronico = $_POST['email'];
$contraseña = $_POST['password'];


$ejecutar = $conexion->prepare("INSERT INTO vendedores (nombre_vendedor, correo_electronico, contraseña) 
VALUES (?, ?, ?)");
// Bind

$ejecutar->bindParam(1,$nombre);
$ejecutar->bindParam(2,$correo_electronico);
$ejecutar->bindParam(3,$contraseña);


// Excecute
if($ejecutar->execute()){
    echo "Ejecutado";
}else{
    echo "Error";
}






?>