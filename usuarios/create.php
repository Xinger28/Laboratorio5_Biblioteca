<?php
$nombre=$_POST['nombre'];
$carnet=$_POST['carnet'];
$telefono=$_POST['telefono'];
$correo=$_POST['correo'];
include('../conexion.php');
$sql= "insert into usuarios (nombre,carnet,telefono,correo)
values (?,?,?,?)";
$stmt=$con->prepare($sql);
$stmt->bind_param("ssss",$nombre,$carnet,$telefono,$correo);
if($stmt->execute())
{
    echo "registro exitoso";
}
?>
