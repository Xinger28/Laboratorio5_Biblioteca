<?php 
$id=$_POST['id'];
$titulo=$_POST['titulo'];
$autor=$_POST['autor'];
$isbn=$_POST['isbn'];
$categoria=$_POST['categoria'];
$stock=$_POST['stock'];
include('../conexion.php');
$sql= "update libros set titulo=?,autor=?,isbn=?,categoria=?,stock=? where id=?";
$stmt=$con->prepare($sql);
$stmt->bind_param("ssssii",$titulo,$autor,$isbn,$categoria,$stock,$id);
if($stmt->execute())
{
    echo "actualización exitosa";
}
?>
