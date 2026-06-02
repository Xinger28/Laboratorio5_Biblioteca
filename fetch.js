// ── Carga contenido genérico en el div#contenido ──────────
function cargarContenido(abrir) {
	const contenedor = document.getElementById('contenido');
	if (!contenedor) return;

	fetch(abrir)
		.then(response => response.json())
		.then(datos => {
			if (!Array.isArray(datos) || datos.length === 0) {
				contenedor.innerHTML = '<p>No hay registros para mostrar.</p>';
				return;
			}

			if (abrir.includes('libros/')) {
				let html = `<table>
					<tr>
						<th>Título</th>
						<th>Autor</th>
						<th>Stock</th>
						<th>Operaciones</th>
					</tr>`;

				datos.forEach(libro => {
					html += `
						<tr>
							<td>${libro.titulo}</td>
							<td>${libro.autor}</td>
							<td>${libro.stock}</td>
							<td>
								<button onclick="cargarEditarLibro(${libro.id})">Editar</button>
								<button><a href="libros/delete.php?id=${libro.id}">Eliminar</a></button>
							</td>
						</tr>
					`;
				});

				html += `</table>`;
				contenedor.innerHTML = html;
				return;
			}

			if (abrir.includes('usuarios/')) {
				let html = `<table>
					<tr>
						<th>Nombre</th>
						<th>Carnet</th>
						<th>Teléfono</th>
						<th>Correo</th>
						<th>Operaciones</th>
					</tr>`;

				datos.forEach(usuario => {
					html += `
						<tr>
							<td>${usuario.nombre}</td>
							<td>${usuario.carnet}</td>
							<td>${usuario.telefono ?? ''}</td>
							<td>${usuario.correo ?? ''}</td>
							<td>
								<button onclick="cargarEditarUsuario(${usuario.id})">Editar</button>
								<button><a href="usuarios/delete.php?id=${usuario.id}">Eliminar</a></button>
							</td>
						</tr>
					`;
				});

				html += `</table>`;
				contenedor.innerHTML = html;
				return;
			}

			contenedor.innerHTML = '<p>Tipo de contenido no soportado.</p>';
		})
		.catch(() => {
			contenedor.innerHTML = '<p>Error al cargar el contenido.</p>';
		});
}

function cargarContenidoform(abrir) {
	var contenedor;
	contenedor = document.getElementById('contenido');
	fetch(abrir)
		.then(response => response.text())
		.then(data => contenedor.innerHTML=data);
}


// ════════════════════════════════════════════════════════
//  LIBROS
// ════════════════════════════════════════════════════════

function createLibro() {
	var contenedor;
	contenedor = document.getElementById('contenido');
	forminsertar = document.getElementById('forminsertar');
	var datos = new FormData(forminsertar);
	fetch("libros/create.php",
		{method:"POST",
		body:datos})
		.then(response => response.text())
		.then(data => contenedor.innerHTML=data);
}

function cargarEditarLibro(id) {
	var contenedor;
	contenedor = document.getElementById('contenido');
	fetch('libros/form-editar.php?id='+id)
		.then(response => response.text())
		.then(data => contenedor.innerHTML=data);
}

function updateLibro() {
	var contenedor;
	contenedor = document.getElementById('contenido');
	formeditar = document.getElementById('form-editar');
	var datos = new FormData(formeditar);
	fetch("libros/update.php",
		{method:"POST",
		body:datos})
		.then(response => response.text())
		.then(data => contenedor.innerHTML=data);
}


// ════════════════════════════════════════════════════════
//  USUARIOS
// ════════════════════════════════════════════════════════

function createUsuario() {
	var contenedor;
	contenedor = document.getElementById('contenido');
	forminsertar = document.getElementById('forminsertar');
	var datos = new FormData(forminsertar);
	fetch("usuarios/create.php",
		{method:"POST",
		body:datos})
		.then(response => response.text())
		.then(data => contenedor.innerHTML=data);
}

function cargarEditarUsuario(id) {
	var contenedor;
	contenedor = document.getElementById('contenido');
	fetch('usuarios/form-editar.php?id='+id)
		.then(response => response.text())
		.then(data => contenedor.innerHTML=data);
}

function updateUsuario() {
	var contenedor;
	contenedor = document.getElementById('contenido');
	formeditar = document.getElementById('form-editar');
	var datos = new FormData(formeditar);
	fetch("usuarios/update.php",
		{method:"POST",
		body:datos})
		.then(response => response.text())
		.then(data => contenedor.innerHTML=data);
}
