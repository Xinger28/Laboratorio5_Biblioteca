<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <?php 
    $id=$_GET['id'];
    include('../conexion.php');
    $sql="select id,nombre,carnet,telefono,correo from usuarios
    where id=$id";
    $consulta=mysqli_query($con,$sql);
    $usuario = mysqli_fetch_array($consulta)
    ?>
    <form action="javascript:updateUsuario()" method="post" id='form-editar'>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $usuario['nombre'];?>">

        <br>

        <label for="carnet">Carnet:</label>
        <input type="text" name="carnet" value="<?php echo $usuario['carnet'];?>">

        <br>

        <label for="telefono">Teléfono:</label>
        <input type="number" name="telefono" value="<?php echo $usuario['telefono'];?>">

        <br>

        <label for="correo">Correo electrónico:</label>
        <input type="text" name="correo" value="<?php echo $usuario['correo'];?>">

        <input type="hidden" name="id" value="<?php echo $usuario['id']?>">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
