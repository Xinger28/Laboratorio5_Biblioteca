<?php
$titulo=$_POST['titulo'];
$autor=$_POST['autor'];
$isbn=$_POST['isbn'];
$categoria=$_POST['categoria'];
$stock=$_POST['stock'];
include('../conexion.php');
$sql= "insert into libros (titulo,autor,isbn,categoria,stock)
values (?,?,?,?,?)";
$stmt=$con->prepare($sql);
$stmt->bind_param("ssssi",$titulo,$autor,$isbn,$categoria,$stock);
if($stmt->execute())
{
    echo "registro exitoso";
}
?>
