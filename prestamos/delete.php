<?php
include "../conexion.php";
$id = $_GET['id'];

$sql_check = "SELECT estado FROM prestamos WHERE id=?";
$stmt_check = $con->prepare($sql_check);
$stmt_check->bind_param("i", $id);
$stmt_check->execute();
$resultado = $stmt_check->get_result();
$prestamo = $resultado->fetch_array();

if ($prestamo['estado'] === 'Activo') {
    echo "No se puede eliminar un préstamo Activo";
    exit;
}

$sql = "DELETE FROM prestamos WHERE id=?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
if ($stmt->execute()) {
    echo "Se elimino el registro";
} else {
    echo "Error al eliminar";
}
?>
