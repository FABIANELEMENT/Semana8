// ======= Objetos (Clases) =======

class Proyecto {
  constructor(id, nombre, descripcion) {
    this.id = id;
    this.nombre = nombre;
    this.descripcion = descripcion;
  }

  mostrarInfo() {
    alert(`Proyecto ${this.id}: ${this.nombre}\nDescripción: ${this.descripcion}`);
  }
}

class Evento {
  constructor(nombre) {
    this.nombre = nombre;
  }

  mostrarAlerta() {
    alert(`Has seleccionado: ${this.nombre}`);
  }
}

class Donacion {
  constructor(nombre, monto) {
    this.nombre = nombre;
    this.monto = monto;
  }

  agradecer() {
    return `${this.nombre}, has donado $${this.monto}. ¡Muchas gracias por tu apoyo!`;
  }
}

// ======= Variables globales =======

const meta = 1000;
let totalRecaudado = 0;

const eventosDisponibles = [
  'Evento 1',
  'Evento 2',
  'Fiesta Cultural',
  'Encuentro Deportivo',
  'Charla de Tecnología'
];

// ======= Funciones de eventos =======

function cargarEventosDesdePHP() {
  const lista = document.getElementById('eventos-lista');

  fetch('mostrar_evento.php')
    .then(response => response.text())
    .then(html => {
      lista.innerHTML = html;
      document.getElementById('results-container').style.display = 'block';
    })
    .catch(error => {
      console.error("Error cargando eventos:", error);
      lista.innerHTML = "<p>No se pudieron cargar los eventos.</p>";
    });
}

// Funcion 
function search() {
  const input = document.getElementById('events').value.toLowerCase().trim();
  const lista = document.getElementById('eventos-lista');
  const contenedor = document.getElementById('results-container');
  lista.innerHTML = '';

  if (input === '') {
    alert('Por favor, ingresa un texto para buscar.');
    contenedor.style.display = 'none';
    return;
  }

  const resultados = eventosDisponibles.filter(evento =>
    evento.toLowerCase().includes(input)
  );

  if (resultados.length > 0) {
    resultados.forEach(nombre => {
      const evento = new Evento(nombre);
      const div = document.createElement('div');
      div.className = 'evento';
      div.textContent = nombre;
      div.onclick = () => evento.mostrarAlerta();
      lista.appendChild(div);
    });
    contenedor.style.display = 'block';
  } else {
    alert('No se encontró ningún evento.');
    contenedor.style.display = 'none';
  }

  document.getElementById('events').value = '';
}

//Función para cerrar el resultado de eventos
function cerrarResultados() {
  document.getElementById('results-container').style.display = 'none';
}

//Función para mostrar el formulario de registro de eventos
function registrarEvento() {
  document.getElementById("registro-evento").style.display = "block";
}

//Función para cerrar el formulario de registro de eventos
function cerrarEventos() {
  document.getElementById('registro-evento').style.display = 'none';
}



// ======= Funciones de proyectos =======

function verProyecto(nombre) {
  const proyecto = new Proyecto(0, nombre, "Te redigirás a la pestaña del proyecto");
  proyecto.mostrarInfo();
}


// ======= Funciones de donaciones =======

//Función para mostrar el formulario de donación
function hacerDonacion() {
  document.getElementById("donacion-formulario").style.display = "block";
}

//Función para cerrar el formulario de donación
function cerrarDonacion() {
  document.getElementById("donacion-formulario").style.display = "none";
}

function validarDonacion() {
  const nombre = document.getElementById("nombre").value.trim();
  const monto = parseInt(document.getElementById("monto").value, 10);

  if (!nombre || isNaN(monto) || monto <= 0) {
    alert("Por favor ingresa tu nombre y un monto válido.");
    return;
  }

  const donacion = new Donacion(nombre, monto);
  totalRecaudado += monto;
  const faltante = Math.max(0, meta - totalRecaudado);

  alert(donacion.agradecer());

  // Actualizar HTML
  document.getElementById("recaudado").textContent = `Recaudado: $${totalRecaudado}`;
  document.getElementById("faltante").textContent = `Faltan: $${faltante}`;

  // Mensaje según progreso
  if (faltante === 0) {
    document.getElementById("mensaje").textContent = "¡Meta alcanzada! 🎉";
    alert("🎉 ¡Felicidades! Se ha alcanzado la meta de donaciones.");
  } else {
    document.getElementById("mensaje").textContent = "";
  }

  // Limpiar campos
  document.getElementById("nombre").value = "";
  document.getElementById("monto").value = "";
  document.getElementById("donacion-formulario").style.display = "none";
}

//Funcion validar donante

function validarDonante() {
  const nombre = document.getElementById("donante-nombre").value.trim();
  const email = document.getElementById("donante-email").value.trim();
  const direccion = document.getElementById("donante-direccion").value.trim();
  const telefono = document.getElementById("donante-telefono").value.trim();

  if (!nombre || !email || !direccion || !telefono) {
    alert("Por favor, completa todos los campos.");
    return false;
  }

  return true;
}

