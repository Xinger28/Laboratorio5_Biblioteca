<?php
include "../conexion.php";
$sql = "SELECT p.id, l.titulo, u.nombre, p.fecha_prestamo, p.fecha_devolucion, p.estado, p.observaciones
        FROM prestamos p
        JOIN libros l ON p.id_libro = l.id
        JOIN usuarios u ON p.id_usuario = u.id";
$consulta = mysqli_query($con, $sql);
$arreglo = array();
while ($fila = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
    $arreglo[] = $fila;
}
$con->close();
echo json_encode($arreglo);
?>
