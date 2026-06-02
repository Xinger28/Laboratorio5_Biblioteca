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
