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
				let html = `<table class="table table-striped">
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
								<button onclick="cargarEditarLibro(${libro.id})" type="button" class="btn btn-success">Editar</button>
								<button onclick="eliminarLibro(${libro.id})" type="button" class="btn btn-danger">Eliminar</button>
							</td>
						</tr>
					`;
				});

				html += `</table>`;
				contenedor.innerHTML = html;
				return;
			}

			if (abrir.includes('usuarios/')) {
				let html = `<table class="table table-striped">
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
								<button onclick="cargarEditarUsuario(${usuario.id})" type="button" class="btn btn-success">Editar</button>
								<button onclick="eliminarUsuario(${usuario.id})" type="button" class="btn btn-danger">Eliminar</button>
							</td>
						</tr>
					`;
				});

				html += `</table>`;
				contenedor.innerHTML = html;
				return;
			}

			if (abrir.includes('prestamos/')) {
				let html = `<table class="table table-striped">
					<tr>
						<th>Libro</th>
						<th>Usuario</th>
						<th>Fecha Préstamo</th>
						<th>Fecha Devolución</th>
						<th>Estado</th>
						<th>Observaciones</th>
						<th>Operaciones</th>
					</tr>`;

				datos.forEach(p => {
					var hoy = new Date().toISOString().split('T')[0];
					var vencido = p.estado === 'Activo' && p.fecha_devolucion < hoy;
					var fila = vencido ? ' style="background-color:#f8d7da;"' : '';
					html += `
						<tr${fila}>
							<td>${p.titulo}</td>
							<td>${p.nombre}</td>
							<td>${p.fecha_prestamo}</td>
							<td>${p.fecha_devolucion ?? ''}</td>
							<td>${p.estado}</td>
							<td>${p.observaciones ?? ''}</td>
							<td>
								<button onclick="cambiarEstado(${p.id},'Devuelto')" type="button" class="btn btn-success btn-sm">Devuelto</button>
								<button onclick="cambiarEstado(${p.id},'Vencido')" type="button" class="btn btn-warning btn-sm">Vencido</button>
								<button onclick="eliminarPrestamo(${p.id})" type="button" class="btn btn-danger btn-sm">Eliminar</button>
							</td>
						</tr>
					`;
				});

				html += `</table>`;
				contenedor.innerHTML = html;
				return;
			}

		})

}

function cargarContenidoform(abrir) {
	var contenedor;
	contenedor = document.getElementById('contenido');
	fetch(abrir)
		.then(response => response.text())
		.then(data => contenedor.innerHTML=data);
}


//  LIBROS

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
	fetch('libros/editar.php?id='+id)
		.then(response => response.text())
		.then(data => contenedor.innerHTML=data);
}

function updateLibro() {
	var contenedor;
	contenedor = document.getElementById('contenido');
	formeditar = document.getElementById('editar');
	var datos = new FormData(formeditar);
	fetch("libros/update.php",
		{method:"POST",
		body:datos})
		.then(response => response.text())
		.then(data => contenedor.innerHTML=data);
}

function eliminarLibro(id) {
	var modal = document.querySelector('.modal');
	modal.style.visibility = 'visible';
	var btnConfirmar = document.getElementById('btn-confirmar');
	var btnCancelar = document.getElementById('btn-cancelar');
	btnConfirmar.onclick = function() {
		var contenedor;
		contenedor = document.getElementById('contenido');
		var ajax = new XMLHttpRequest() //crea el objetov ajax 
		ajax.open("get", 'libros/delete.php?id='+id, true);
		ajax.onreadystatechange = function () {
			if (ajax.readyState == 4) {
				modal.style.visibility = 'hidden';
				contenedor.innerHTML = ajax.responseText;
			}
		}
		ajax.send();
	}
	btnCancelar.onclick = function() {
		modal.style.visibility = 'hidden';
	}
}

//  USUARIOS

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
	fetch('usuarios/editar.php?id='+id)
		.then(response => response.text())
		.then(data => contenedor.innerHTML=data);
}

function updateUsuario() {
	var contenedor;
	contenedor = document.getElementById('contenido');
	formeditar = document.getElementById('editar');
	var datos = new FormData(formeditar);
	fetch("usuarios/update.php",
		{method:"POST",
		body:datos})
		.then(response => response.text())
		.then(data => contenedor.innerHTML=data);
}

function eliminarUsuario(id) {
	var modal = document.querySelector('.modal');
	modal.style.visibility = 'visible';
	var btnConfirmar = document.getElementById('btn-confirmar');
	var btnCancelar = document.getElementById('btn-cancelar');
	btnConfirmar.onclick = function() {
		var contenedor;
		contenedor = document.getElementById('contenido');
		var ajax = new XMLHttpRequest() //crea el objetov ajax 
		ajax.open("get", 'usuarios/delete.php?id='+id, true);
		ajax.onreadystatechange = function () {
			if (ajax.readyState == 4) {
				modal.style.visibility = 'hidden';
				contenedor.innerHTML = ajax.responseText;
			}
		}
		ajax.send();
	}
	btnCancelar.onclick = function() {
		modal.style.visibility = 'hidden';
	}
}

//  PRÉSTAMOS

function createPrestamo() {
	var contenedor;
	contenedor = document.getElementById('contenido');
	forminsertar = document.getElementById('forminsertar');
	var datos = new FormData(forminsertar);
	fetch("prestamos/create.php",
		{method:"POST",
		body:datos})
		.then(response => response.text())
		.then(data => contenedor.innerHTML=data);
}

function cambiarEstado(id, estado) {
	var contenedor;
	contenedor = document.getElementById('contenido');
	var datos = new FormData();
	datos.append('id', id);
	datos.append('estado', estado);
	fetch("prestamos/update.php",
		{method:"POST",
		body:datos})
		.then(response => response.text())
		.then(data => cargarContenido('prestamos/lista.php'));
}

function eliminarPrestamo(id) {
	var modal = document.querySelector('.modal');
	modal.style.visibility = 'visible';
	var btnConfirmar = document.getElementById('btn-confirmar');
	var btnCancelar = document.getElementById('btn-cancelar');
	btnConfirmar.onclick = function() {
		var contenedor;
		contenedor = document.getElementById('contenido');
		var ajax = new XMLHttpRequest()
		ajax.open("get", 'prestamos/delete.php?id='+id, true);
		ajax.onreadystatechange = function () {
			if (ajax.readyState == 4) {
				modal.style.visibility = 'hidden';
				contenedor.innerHTML = ajax.responseText;
			}
		}
		ajax.send();
	}
	btnCancelar.onclick = function() {
		modal.style.visibility = 'hidden';
	}
}
