<<<<<<< HEAD
    <?php
    include "../conexion.php";
    $sql = "select id,nombre,carnet,telefono,correo from usuarios";
    $consulta = mysqli_query($con, $sql);
    $arreglo = array();
    while ($usuario = mysqli_fetch_array($consulta)) {
        $arreglo[] = $usuario;
    }
    $con->close();
    echo json_encode($arreglo);
    ?>
=======
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
>>>>>>> 6c7d07695fff3c438f4cba3d0ef972f51a5b3086
