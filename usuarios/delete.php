<?php
include "../conexion.php";
$id=$_GET['id'];
$sql= "delete from usuarios where id=?";
$stmt=$con->prepare($sql);
$stmt->bind_param("i",$id);
if($stmt->execute())
{
    echo "Se elimino el registro";
}
?>
