<?php
include "../conexion.php";
$sql = "SELECT nombre, carnet, telefono, correo FROM usuarios";
$consulta = mysqli_query($con, $sql);
$resultado = array();
while ($fila = mysqli_fetch_array($consulta)){
    $resultado[] = $fila;
}

echo json_encode($resultado);
?>
