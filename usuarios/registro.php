<?php
// ============================================================
// usuarios/registro.php  —  Formulario de alta de usuarios
// ============================================================
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrar Usuario | BiblioSystem</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/estilos.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-biblioteca navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand-bib" href="../index.php"><span class="icono">📚</span> BiblioSystem</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto gap-1">
        <li class="nav-item"><a class="nav-link-bib" href="../index.php">🏠 Dashboard</a></li>
        <li class="nav-item"><a class="nav-link-bib" href="../libros/lista.php">📖 Libros</a></li>
        <li class="nav-item"><a class="nav-link-bib activo" href="lista.php">👤 Usuarios</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="contenido-principal" style="max-width:620px;">

  <div class="mb-3">
    <a href="lista.php" style="color:var(--verde);text-decoration:none;">← Volver al listado</a>
  </div>

  <div class="card-seccion">
    <div class="encabezado">👤 Registrar nuevo usuario</div>
    <div class="cuerpo">

      <div id="alerta-feedback" class="alerta"></div>

      <div class="row g-3">
        <div class="col-12">
          <label class="form-label">Nombre completo <span class="text-danger">*</span></label>
          <input type="text" id="nombre" class="form-control" placeholder="Ej: Ana María López Flores">
        </div>
        <div class="col-md-6">
          <label class="form-label">Carnet / Código <span class="text-danger">*</span></label>
          <input type="text" id="carnet" class="form-control" placeholder="Ej: 2024-12345">
        </div>
        <div class="col-md-6">
          <label class="form-label">Teléfono</label>
          <input type="tel" id="telefono" class="form-control" placeholder="Ej: 70012345">
        </div>
        <div class="col-12">
          <label class="form-label">Correo electrónico</label>
          <input type="email" id="correo" class="form-control" placeholder="usuario@usfx.bo">
        </div>
        <div class="col-12 pt-1">
          <button class="btn-verde w-100" id="btn-guardar" data-btn-submit data-texto-original="Guardar usuario"
                  onclick="guardarUsuario()">
            Guardar usuario
          </button>
        </div>
      </div>

    </div>
  </div>
</div>

<script src="../assets/js/biblioteca.js"></script>
<script>
async function guardarUsuario() {
  const datos = {
    nombre:   document.getElementById('nombre').value.trim(),
    carnet:   document.getElementById('carnet').value.trim(),
    telefono: document.getElementById('telefono').value.trim(),
    correo:   document.getElementById('correo').value.trim()
  };

  if (!datos.nombre || !datos.carnet) {
    mostrarAlerta('Nombre y carnet son obligatorios.', 'error');
    return;
  }

  await enviarFetch('create.php', datos, () => {
    ['nombre','carnet','telefono','correo'].forEach(id => {
      document.getElementById(id).value = '';
    });
  });
}

document.addEventListener('keydown', e => {
  if (e.key === 'Enter') guardarUsuario();
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
