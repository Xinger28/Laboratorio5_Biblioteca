<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include('../conexion.php'); ?>

    <form action="javascript:createPrestamo()" method="post" id="forminsertar" style="width: 400px; margin: auto; padding: 20px; border: 3px solid #1cb0eb; border-radius: 5px;">

        <label for="id_libro" class="form-label">Libro</label>
        <select name="id_libro" class="form-select" id="id_libro" required>
            <option value="">-- Seleccione un libro --</option>
            <?php
            $libros = mysqli_query($con, "SELECT id, titulo, stock FROM libros WHERE stock > 0");
            while ($l = mysqli_fetch_array($libros)) {
                echo "<option value=\"{$l['id']}\">{$l['titulo']} (Stock: {$l['stock']})</option>";
            }
            ?>
        </select>

        <br>

        <label for="id_usuario" class="form-label">Usuario</label>
        <select name="id_usuario" class="form-select" id="id_usuario" required>
            <option value="">-- Seleccione un usuario --</option>
            <?php
            $usuarios = mysqli_query($con, "SELECT id, nombre, carnet FROM usuarios");
            while ($u = mysqli_fetch_array($usuarios)) {
                echo "<option value=\"{$u['id']}\">{$u['nombre']} ({$u['carnet']})</option>";
            }
            ?>
        </select>

        <br>

        <label for="fecha_prestamo" class="form-label">Fecha de préstamo</label>
        <input type="date" name="fecha_prestamo" class="form-control" id="fecha_prestamo" required>

        <br>

        <label for="fecha_devolucion" class="form-label">Fecha de devolución</label>
        <input type="date" name="fecha_devolucion" class="form-control" id="fecha_devolucion" required>

        <br>

        <label for="observaciones" class="form-label">Observaciones</label>
        <input type="text" name="observaciones" class="form-control" id="observaciones">

        <br>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</body>
</html>
