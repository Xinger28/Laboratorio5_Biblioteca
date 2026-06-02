    <?php
    include "../conexion.php";
    $sql = "select id,titulo,autor,isbn,categoria,stock from libros";
    $consulta = mysqli_query($con, $sql);
    $arreglo = array();
    while ($libro = mysqli_fetch_array($consulta)) {
        $arreglo[] = $libro;
    }
    $con->close();
    echo json_encode($arreglo);
    ?>
