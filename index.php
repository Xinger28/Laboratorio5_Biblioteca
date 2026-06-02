<!DOCTYPE html>
<html lang="en">

<head>
    <script src="fetch.js" type="text/javascript"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Biblioteca</title>
    <style>
        .contendor {
            display: flex;
            background-color: gray;
        }

        .contendor nav {
            margin: 10px;
            width: 25%;
            border: 1px solid black;
        }
        .contendor nav ul {
            list-style: none;
        }
        .contendor nav ul li {
            border: 1px solid black;
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
        .table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        .button{
            text-align: center;
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
                <li><button onclick="cargarContenido('libros/lista.php')">Listar Libros</button></li>
                <li><button onclick="cargarContenidoform('libros/form-insertar.php')">Añadir nuevo libro</button></li>
                <li class="titulo">Usuarios</li>
                <li><button onclick="cargarContenido('usuarios/lista.php')">Listar Usuarios</button></li>
                <li><button onclick="cargarContenidoform('usuarios/form-insertar.php')">Añadir nuevo usuario</button></li>
            </ul>
        </nav>
        <div id="contenido">
            &nbsp;
        </div>

    </div>

</body>

</html>
