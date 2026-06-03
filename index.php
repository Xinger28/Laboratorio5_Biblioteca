<!DOCTYPE html>
<html lang="en">

<head>
    <script src="fetch.js" type="text/javascript"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Biblioteca</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .contendor {
            display: flex;
            background-color: gray;
            justify-content: center;
        }

        .contendor nav ul {
            list-style: none;
            justify-content: center;
        }
        .contendor nav ul li {
            margin: 5px;
            padding: 5px;
        }
        .contendor nav ul li.titulo {
            background-color: #ddd;
            font-weight: bold;
        }
        .contendor div {
            margin: 10px;
            width: 80%;
        }

        #contenido{
            background-color: #ddd;
        }

        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            visibility: hidden;
            
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

    </style>
</head>

<body>
    <?php
    include "conexion.php";
    ?>

    <nav>
        <h1 style="text-align:center; background-color: blue;">Sistema de Biblioteca</h1>
    </nav>
    <div class="contendor">
        <nav>
            <ul>
                <li class="titulo">Libros</li>
                <li><button onclick="cargarContenido('libros/lista.php')" type="button" class="btn btn-info">Listar Libros</button></li>
                <li><button onclick="cargarContenidoform('libros/registro.php')" type="button" class="btn btn-info">Añadir nuevo libro</button></li>
                <li class="titulo">Usuarios</li>
                <li><button onclick="cargarContenido('usuarios/lista.php')"type="button" class="btn btn-info">Listar Usuarios</button></li>
                <li><button onclick="cargarContenidoform('usuarios/registro.php')"type="button" class="btn btn-info">Añadir nuevo usuario</button></li>
            </ul>
        </nav>
        <div id="contenido">
            &nbsp;
        </div>

    </div>
        <div class="modal">
            <div class="modal-content">
                <label class="form-label">Esta seguro que quiere eliminar este registro?</label>
                <br>
                <button id="btn-confirmar" type="button" class="btn btn-primary" style="margin: 5px;width: 20%;">Confirmar</button>
                <br>
                <button id="btn-cancelar" type="button" class="btn btn-primary" style="margin: 5px;width: 20%;">Cancelar</button>
            </div>
        </div>

<script src="js/bootstrap.min.js"></script>
</body>
</html>
