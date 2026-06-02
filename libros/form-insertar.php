<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="javascript:createLibro()" method="post" id="forminsertar">
        <label for="titulo">Título</label>
        <input type="text" name="titulo">

        <br>

        <label for="autor">Autor</label>
        <input type="text" name="autor">

        <br>

        <label for="isbn">ISBN</label>
        <input type="text" name="isbn">

        <br>

        <label for="categoria">Categoría</label>
        <select name="categoria">
            <option value="Informática">Informática</option>
            <option value="Matemáticas">Matemáticas</option>
            <option value="Literatura">Literatura</option>
            <option value="Ciencias">Ciencias</option>
            <option value="Historia">Historia</option>
            <option value="Filosofía">Filosofía</option>
            <option value="Clásicos">Clásicos</option>
            <option value="Fantasía">Fantasía</option>
            <option value="Otro">Otro</option>
        </select>

        <br>

        <label for="stock">Stock</label>
        <input type="number" name="stock" value="1" min="0">

        <br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
