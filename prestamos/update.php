<?php
$id     = $_POST['id'];
$estado = $_POST['estado'];
include('../conexion.php');

$sql_actual = "SELECT estado, id_libro FROM prestamos WHERE id=?";
$stmt_actual = $con->prepare($sql_actual);
$stmt_actual->bind_param("i", $id);
$stmt_actual->execute();
$resultado = $stmt_actual->get_result();
$prestamo = $resultado->fetch_array();

$sql = "UPDATE prestamos SET estado=? WHERE id=?";
$stmt = $con->prepare($sql);
$stmt->bind_param("si", $estado, $id);

if ($stmt->execute()) {
    if ($estado === 'Devuelto' && $prestamo['estado'] === 'Activo') {
        $sql_stock = "UPDATE libros SET stock = stock + 1 WHERE id = ?";
        $stmt2 = $con->prepare($sql_stock);
        $stmt2->bind_param("i", $prestamo['id_libro']);
        $stmt2->execute();
    }
    echo "actualización exitosa";
} else {
    echo "Error al actualizar";
}
?>
