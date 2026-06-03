<?php
include "../conexion.php";
$id = $_GET['id'];

$sql_check = "SELECT COUNT(*) as total FROM prestamos WHERE id_libro = ?";
$stmt_check = $con->prepare($sql_check);
$stmt_check->bind_param("i", $id);
$stmt_check->execute();
$resultado = $stmt_check->get_result();
$fila = $resultado->fetch_array();

if ($fila['total'] > 0) {
    echo "No se puede eliminar: el libro tiene {$fila['total']} préstamo(s) registrado(s)";
    exit;
}

$sql = "DELETE FROM libros WHERE id=?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
if ($stmt->execute()) {
    echo "Se elimino el registro";
}
?>
