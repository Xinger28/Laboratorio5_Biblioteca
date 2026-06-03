<?php
$id_libro        = $_POST['id_libro'];
$id_usuario      = $_POST['id_usuario'];
$fecha_prestamo  = $_POST['fecha_prestamo'];
$fecha_devolucion = $_POST['fecha_devolucion'];
$observaciones   = $_POST['observaciones'];
include('../conexion.php');

$stock_sql = "SELECT stock FROM libros WHERE id=?";
$stmt_stock = $con->prepare($stock_sql);
$stmt_stock->bind_param("i", $id_libro);
$stmt_stock->execute();
$resultado = $stmt_stock->get_result();
$libro = $resultado->fetch_array();

if (!$libro || $libro['stock'] <= 0) {
    echo "Sin stock disponible para ese libro";
    exit;
}

$sql = "INSERT INTO prestamos (id_libro, id_usuario, fecha_prestamo, fecha_devolucion, estado, observaciones)
        VALUES (?, ?, ?, ?, 'Activo', ?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("iisss", $id_libro, $id_usuario, $fecha_prestamo, $fecha_devolucion, $observaciones);

if ($stmt->execute()) {
    $sql_stock = "UPDATE libros SET stock = stock - 1 WHERE id = ?";
    $stmt2 = $con->prepare($sql_stock);
    $stmt2->bind_param("i", $id_libro);
    $stmt2->execute();
    echo "registro exitoso";
} else {
    echo "Error al registrar el préstamo";
}
?>
