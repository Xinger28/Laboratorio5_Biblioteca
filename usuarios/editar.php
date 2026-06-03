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
    <form action="javascript:updateUsuario()" method="post" id='editar' style="width: 400px; margin: auto; padding: 20px; border: 3px solid #1cb0eb; border-radius: 5px;">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $usuario['nombre'];?>" class="form-control" id="validationCustom01" required>

        <br>

        <label for="carnet" class="form-label">Carnet:</label>
        <input type="text" name="carnet" value="<?php echo $usuario['carnet'];?>" class="form-control" id="validationCustom02" required>

        <br>

        <label for="telefono" class="form-label">Teléfono:</label>
        <input type="number" name="telefono" value="<?php echo $usuario['telefono'];?>" class="form-control" id="validationCustom03" required>

        <br>

        <label for="correo" class="form-label">Correo electrónico:</label>
        <input type="text" name="correo" value="<?php echo $usuario['correo'];?>" class="form-control" id="validationCustom04" required>

        <input type="hidden" name="id" value="<?php echo $usuario['id']?>">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</body>
</html>
