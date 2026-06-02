<?php
// ============================================================
// libros/registro.php  —  Formulario de alta de libros
// ============================================================
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrar Libro | BiblioSystem</title>
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
        <li class="nav-item"><a class="nav-link-bib activo" href="lista.php">📖 Libros</a></li>
        <li class="nav-item"><a class="nav-link-bib" href="../usuarios/lista.php">👤 Usuarios</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="contenido-principal" style="max-width:620px;">

  <div class="d-flex align-items-center gap-2 mb-3">
    <a href="lista.php" style="color:var(--verde);text-decoration:none;">← Volver al catálogo</a>
  </div>

  <div class="card-seccion">
    <div class="encabezado">📖 Registrar nuevo libro</div>
    <div class="cuerpo">

      <div id="alerta-feedback" class="alerta"></div>

      <div class="row g-3">
        <div class="col-12">
          <label class="form-label">Título <span class="text-danger">*</span></label>
          <input type="text" id="titulo" class="form-control" placeholder="Ej: Introducción a los Algoritmos">
        </div>
        <div class="col-12">
          <label class="form-label">Autor <span class="text-danger">*</span></label>
          <input type="text" id="autor" class="form-control" placeholder="Ej: Thomas H. Cormen">
        </div>
        <div class="col-md-6">
          <label class="form-label">ISBN</label>
          <input type="text" id="isbn" class="form-control" placeholder="978-0-000-00000-0">
        </div>
        <div class="col-md-6">
          <label class="form-label">Categoría</label>
          <select id="categoria" class="form-select">
            <option value="">— Seleccionar —</option>
            <option>Informática</option>
            <option>Matemáticas</option>
            <option>Literatura</option>
            <option>Ciencias</option>
            <option>Historia</option>
            <option>Filosofía</option>
            <option>Clásicos</option>
            <option>Fantasía</option>
            <option>Otro</option>
          </select>
        </div>
        <div class="col-md-4">
          <label class="form-label">Stock inicial</label>
          <input type="number" id="stock" class="form-control" value="1" min="0">
        </div>
        <div class="col-12 pt-1">
          <button class="btn-verde w-100" id="btn-guardar" data-btn-submit data-texto-original="Guardar libro"
                  onclick="guardarLibro()">
            Guardar libro
          </button>
        </div>
      </div>

    </div>
  </div>
</div>

<script src="../assets/js/biblioteca.js"></script>
<script>
async function guardarLibro() {
  const datos = {
    titulo:    document.getElementById('titulo').value.trim(),
    autor:     document.getElementById('autor').value.trim(),
    isbn:      document.getElementById('isbn').value.trim(),
    categoria: document.getElementById('categoria').value,
    stock:     parseInt(document.getElementById('stock').value) || 1
  };

  if (!datos.titulo || !datos.autor) {
    mostrarAlerta('Título y autor son obligatorios.', 'error');
    return;
  }

  await enviarFetch('create.php', datos, () => {
    // Limpiar formulario tras éxito
    ['titulo','autor','isbn','stock'].forEach(id => {
      document.getElementById(id).value = id === 'stock' ? '1' : '';
    });
    document.getElementById('categoria').value = '';
  });
}

// Enviar con Enter
document.addEventListener('keydown', e => {
  if (e.key === 'Enter' && e.target.tagName !== 'SELECT') guardarLibro();
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
