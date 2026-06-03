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
    <form action="javascript:updateLibro()" method="post" id='editar' style="width: 400px; margin: auto; padding: 20px; border: 3px solid #1cb0eb; border-radius: 5px;">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" name="titulo" value="<?php echo $libro['titulo'];?>" class="form-control" id="validationCustom01" required>

        <br>

        <label for="autor" class="form-label">Autor</label>
        <input type="text" name="autor" value="<?php echo $libro['autor'];?>" class="form-control" id="validationCustom02" required>

        <br>

        <label for="isbn" class="form-label">ISBN</label>
        <input type="text" name="isbn" value="<?php echo $libro['isbn'];?>" class="form-control" id="validationCustom03" required>

        <br>

        <label for="categoria" class="form-label">Categoría</label>
        <select name="categoria" class="form-control" id="validationCustom04" required>
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

        <label for="stock" class="form-label">Stock</label>
        <input type="number" name="stock" value="<?php echo $libro['stock'];?>" class="form-control" id="validationCustom05" min="0" required>

        <input type="hidden" name="id" value="<?php echo $libro['id']?>">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</body>
</html>
