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
    $sql="select id,titulo,autor,isbn,categoria,stock from libros
    where id=$id";
    $consulta=mysqli_query($con,$sql);
    $libro = mysqli_fetch_array($consulta)
    ?>
    <form action="javascript:updateLibro()" method="post" id='form-editar'>
        <label for="titulo">Título</label>
        <input type="text" name="titulo" value="<?php echo $libro['titulo'];?>">

        <br>

        <label for="autor">Autor</label>
        <input type="text" name="autor" value="<?php echo $libro['autor'];?>">

        <br>

        <label for="isbn">ISBN</label>
        <input type="text" name="isbn" value="<?php echo $libro['isbn'];?>">

        <br>

        <label for="categoria">Categoría</label>
        <select name="categoria">
            <option value="Informática" <?php echo $libro['categoria']=='Informática'?'selected':'';?>>Informática</option>
            <option value="Matemáticas" <?php echo $libro['categoria']=='Matemáticas'?'selected':'';?>>Matemáticas</option>
            <option value="Literatura"  <?php echo $libro['categoria']=='Literatura'?'selected':'';?>>Literatura</option>
            <option value="Ciencias"    <?php echo $libro['categoria']=='Ciencias'?'selected':'';?>>Ciencias</option>
            <option value="Historia"    <?php echo $libro['categoria']=='Historia'?'selected':'';?>>Historia</option>
            <option value="Filosofía"   <?php echo $libro['categoria']=='Filosofía'?'selected':'';?>>Filosofía</option>
            <option value="Clásicos"    <?php echo $libro['categoria']=='Clásicos'?'selected':'';?>>Clásicos</option>
            <option value="Fantasía"    <?php echo $libro['categoria']=='Fantasía'?'selected':'';?>>Fantasía</option>
            <option value="Otro"        <?php echo $libro['categoria']=='Otro'?'selected':'';?>>Otro</option>
        </select>

        <br>

        <label for="stock">Stock</label>
        <input type="number" name="stock" value="<?php echo $libro['stock'];?>" min="0">

        <input type="hidden" name="id" value="<?php echo $libro['id']?>">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
