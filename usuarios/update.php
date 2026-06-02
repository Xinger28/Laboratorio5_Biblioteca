<?php 
$id=$_POST['id'];
$nombre=$_POST['nombre'];
$carnet=$_POST['carnet'];
$telefono=$_POST['telefono'];
$correo=$_POST['correo'];
include('../conexion.php');
$sql= "update usuarios set nombre=?,carnet=?,telefono=?,correo=? where id=?";
$stmt=$con->prepare($sql);
$stmt->bind_param("ssssi",$nombre,$carnet,$telefono,$correo,$id);
if($stmt->execute())
{
    echo "actualización exitosa";
}
?>
