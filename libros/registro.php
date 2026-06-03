<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="javascript:createLibro()" method="post" id="forminsertar" style="width: 400px; margin: auto; padding: 20px; border: 3px solid #1cb0eb; border-radius: 5px;">
        <label for="titulo" for="validationCustom03" class="form-label">Título</label>
        <input type="text" name="titulo"class="form-control" id="validationCustom03" required>

        <br>

        <label for="autor" for="validationCustom03" class="form-label">Autor</label>
        <input type="text" name="autor"class="form-control" id="validationCustom04" required>

        <br>

        <label for="isbn" for="validationCustom03" class="form-label">ISBN</label>
        <input type="text" name="isbn"class="form-control" id="validationCustom05" required>

        <br>

        <label for="categoria" class="form-label">Categoría</label>
        <select name="categoria"class="form-select" aria-label="Default select example" style="width: 200px;" id="validationCustom06" required>
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

        <label for="stock" class="form-label">Stock</label>
        <input type="number" name="stock" value="1" min="0" class="form-control" id="validationCustom06" required>

        <br>

        <button type="submit" class="btn btn-primary" type="button">Enviar</button>
    </form>
</body>
</html>
