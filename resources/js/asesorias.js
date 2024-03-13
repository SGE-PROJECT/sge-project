const url = window.location.pathname;
const segments = url.split('/');
const id = segments.pop() || segments.pop();

function asignarColorAlumnos(estudiantes, colores) {
    var resultado = {};
    var keys = Object.keys(estudiantes);
    for (var i = 0; i < keys.length; i++) {
        var key = keys[i];
        var estudiante = estudiantes[key];
        var color = colores[i % colores.length];
        estudiante.color = color;
        resultado[key] = estudiante;
    }
    return resultado;
}

const proyectos = {};

fetch('http://127.0.0.1:8000/all-projects')
    .then(response => response.json())
    .then(data => {
        data.forEach(proyecto => {
            proyectos[proyecto.id] = {
                id: proyecto.id,
                nombre: proyecto.name,
                descripcion: proyecto.general_information.detail || 'Descripción no disponible',
                alumnos: proyecto.student_ids,
                imagen: proyecto.image
            };
        });
        populateStudentSelect();
    })
    .catch(error => {
        console.error('Error fetching the projects:', error);
    });

var estudiantes = {};
fetch('http://127.0.0.1:8000/users')
    .then(response => response.json())
    .then(data => {

        data.forEach(usuario => {
            estudiantes[usuario.id] = {
                nombre: `${usuario.first_name} ${usuario.last_name}`,
                imagen: usuario.avatar
            };
        });

        estudiantes = asignarColorAlumnos(estudiantes, colores);
    })
    .catch(error => {
        console.error('Error fetching the users:', error);
    });


var colores = ["verde", "amarillo", "morado", "azul", "rosa"];
var eventoSeleccionado = {};

var eventos = {

};
fetch('http://127.0.0.1:8000/datos-citas')
    .then(response => response.json())
    .then(data => {

        data.forEach(cita => {
            let [fecha, hora] = cita.session_date.split(' ');
            hora = hora.substring(0, 5);
            let idEvento = `${fecha} ${hora}`;
            eventos[idEvento] = {
                id:cita.id,
                fecha: fecha,
                hora: hora,
                proyectoId: cita.id_project_id,
                motivo: cita.description
            };
        });
        mostrarTodosLosEventos();
        populateYears();
        updateCalendar();
    })
    .catch(error => console.error('Error fetching data:', error));

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById("contador").textContent = 0 + "/250";
    document.getElementById("editContador").textContent = 0 + "/250";
    document.querySelector('.close').addEventListener('click', closeModal);
    document.querySelector('.close2').addEventListener('click', closeModal2);
    document.querySelector('.close3').addEventListener('click', solicitar);
    document.querySelector('.close4').addEventListener('click', closeModal4);
    document.getElementById('nombre').addEventListener('change', matricula);
    document.getElementById('month').addEventListener('change', updateCalendar);
    document.getElementById('year').addEventListener('change', updateCalendar);
    document.getElementById('volverButton').addEventListener('click', volver);
    document.getElementById('botonCitas').addEventListener('click', mostrarTodo);
    document.getElementById('botonCitas2').addEventListener('click', ocultarTodo);
    document.getElementById('solicitar').addEventListener('click', solicitar);
    document.getElementById('cambiarCita').addEventListener('click', cambiar);
    document.getElementById("guardarEventoButton").addEventListener('click', editarGuardar);
    document.getElementById("borrarEventoBoton").addEventListener('click', eliminarEvento2);
    document.querySelectorAll('td[data-hora]').forEach(td => {
        if (!td.textContent.trim()) {
            td.addEventListener('click', function () {
                tiempo(this, this.getAttribute('data-hora'));
            });
        }
    });
    document.getElementById('agregarEventoButton').addEventListener('click', agregarEvento);
    document.getElementById('matricula').addEventListener('input', function () {
        if (this.value.length > 10) {
            this.value = this.value.slice(0, 10);
        }
    })
    document.getElementById('motivo').addEventListener('input', function () {
        this.value = this.value.replace(/^[\W_]+|^ <>/, '');
        var contador = document.getElementById("contador");
        if (this.value.length > 250) {
            this.value = this.value.slice(0, 250);
        }
        contador.textContent = document.getElementById('motivo').value.length + "/250";
    });
    document.getElementById('editMotivo').addEventListener('input', function () {
        this.value = this.value.replace(/^[\W_]+|^ <>/, '');
        var contador = document.getElementById("editContador");
        if (this.value.length > 250) {
            this.value = this.value.slice(0, 250);
        }
        contador.textContent = document.getElementById('editMotivo').value.length + "/250";
    });
    document.getElementById('fecha').addEventListener('click', function () {
        var dateInput = document.getElementById('fecha');
        dateInput.click();
    });
});
function solicitar() {
    document.getElementById("solitAsunto").value = "";
    document.getElementById("solitMensaje").value = "";
    document.getElementById("myModal3").style.display = "none";
}
function cambiar() {
    document.getElementById("myModal3").style.display = "flex";
}
function populateStudentSelect() {
    var select = document.getElementById('nombre');
    select.innerHTML = '';
    var option = document.createElement('option');
    option.value = 0;
    option.textContent = "-- Escoge un proyecto --";
    select.appendChild(option);
    for (var proyectoId in proyectos) {
        var option = document.createElement('option');
        option.value = proyectos[proyectoId].id;
        option.textContent = proyectos[proyectoId].nombre;
        select.appendChild(option);
    }
    var select = document.getElementById('matricula');
    select.innerHTML = '';
    var option = document.createElement('option');
    option.value = 0;
    option.textContent = "-- Escoge un proyecto --";
    select.appendChild(option);
    for (var proyectoId in proyectos) {
        var option = document.createElement('option');
        option.value = proyectos[proyectoId].id;
        option.textContent = proyectos[proyectoId].nombre;
        select.appendChild(option);
    }
}

populateStudentSelect();

function agregarEvento() {
    let error = document.getElementById("error");
    error.style.display = "none";
    let fecha = document.getElementById('fecha').value.trim();
    let hora = document.getElementById('horas').value.trim();
    let proyectoId = document.getElementById('matricula').value.trim(); // Cambio de matricula a proyectoId
    let motivo = document.getElementById('motivo').value.trim();
    if (!fecha || !hora || proyectoId == 0 || !motivo) { // Cambio de matricula a proyectoId
        error.style.display = "block";
        error.innerHTML = "Por favor, complete todos los campos.";
        return;
    }
    if (!/^\d{4}-\d{2}-\d{2}$/.test(fecha)) {
        error.style.display = "block";
        error.innerHTML = "Por favor, ingrese una fecha válida en formato AAAA-MM-DD.";
        return;
    }
    if (!/^\d{2}:\d{2}$/.test(hora)) {
        error.style.display = "block";
        error.innerHTML = "Por favor, ingrese una hora válida en formato HH:MM.";
        return;
    }
    // Agrega esta parte para validar la hora
    let horaPartes = hora.split(":");
    let horaNum = parseInt(horaPartes[0]);
    let minutoNum = parseInt(horaPartes[1]);

    // 7:00 a.m. es igual a 07:00 en formato 24 horas, y 8:00 p.m. es igual a 20:00
    if (horaNum < 7 || horaNum > 20 || (horaNum === 20 && minutoNum > 0)) {
        error.style.display = "block";
        error.innerHTML = "Por favor, seleccione una hora entre las 7:00 a.m. y las 8:00 p.m.";
        return;
    }
    let now = new Date();
    let currentYear = now.getFullYear();
    let currentMonth = now.getMonth() + 1;
    let currentDay = now.getDate();
    let currentHour = now.getHours();
    let currentMinute = now.getMinutes();
    let eventDate = new Date(fecha);
    let eventYear = eventDate.getFullYear();
    let eventMonth = eventDate.getMonth() + 1;
    let eventDay = eventDate.getDate();
    if (eventYear < currentYear || (eventYear === currentYear && eventMonth < currentMonth) ||
        (eventYear === currentYear && eventMonth === currentMonth && eventDay < currentDay)) {
        error.style.display = "block";
        error.innerHTML = "La fecha de la cita no puede ser anterior a la fecha actual.";
        return;
    }
    if (eventYear === currentYear && eventMonth === currentMonth && eventDay === (currentDay - 1)) {
        let eventHour = parseInt(hora.split(':')[0]);
        let eventMinute = parseInt(hora.split(':')[1]);
        if (eventHour < currentHour || (eventHour === currentHour && eventMinute <= currentMinute)) {
            error.style.display = "block";
            error.innerHTML = "La hora de la cita debe ser posterior a la hora actual más una hora.";
            return;
        }
    }
    let idEvento = fecha + ' ' + hora;
    if (idEvento in eventos) {
        error.style.display = "block";
        error.innerHTML = "La cita ya existe.";
        return;
    }

    if (!(proyectoId in proyectos)) { // Cambio de matricula a proyectoId
        error.style.display = "block";
        error.innerHTML = "El proyecto seleccionado no es válido."; // Cambio de mensaje
        return;
    }

    // Formato de fecha y hora para cumplir con el estándar ISO 8601
    let sessionDateTime = `${fecha}T${hora}:00`;

    // Creación del objeto de datos para enviar
    let advisorySessionData = {
        session_date: sessionDateTime,
        description: motivo,
        id_project_id: proyectoId,
        id_advisor_id: 1 // Asumiendo un advisor_id por defecto como 1, ajusta según tu necesidad
    };

    // Envío de la solicitud fetch al servidor
    fetch('http://127.0.0.1:8000/advisory-sessions', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify(advisorySessionData)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        window.location.href = 'http://127.0.0.1:8000/Asesorias';
    })
    .catch(error => {
        console.error('Error:', error);
        error.style.display = "block";
        error.innerHTML = "Ha ocurrido un error al intentar crear la cita.";
    });

    eventos[idEvento] = {
        fecha: fecha,
        hora: hora,
        proyectoId: proyectoId, // Cambio de matricula a proyectoId
        motivo: motivo
    };


    mostrarEventosSemanales();
    mostrarTodosLosEventos();
    updateCalendar();
    llenarHorasConEventos();
    document.getElementById('fecha').value = "";
    document.getElementById('horas').value = "";
    document.getElementById("contador").textContent = 0 + "/250";
    document.getElementById('motivo').value = "";
    document.getElementById('matricula').value = "0";
    document.getElementById('dia').classList.add('ocultar');
    document.getElementById('calendario').classList.remove('ocultar');
    document.getElementById("asesorias-formulario").classList.add("ocultar");
    document.getElementById("eventosContainer").classList.remove("ocultar");
}

function mostrarEventosSemanales() {
    let tablaEventos = document.getElementById('tablaEventos').getElementsByTagName('tbody')[0];
    tablaEventos.innerHTML = '';

    let eventosSemanales = filtrarEventosSemanales();

    if (eventosSemanales.length === 0) {
        let fila = tablaEventos.insertRow();
        let celdaMensaje = fila.insertCell();
        celdaMensaje.textContent = 'No hay eventos para la semana.';
        celdaMensaje.colSpan = 6;
        celdaMensaje.classList.add('text-center');
    } else {
        eventosSemanales.forEach(evento => {
            let fila = tablaEventos.insertRow();
            let celdaProyecto = fila.insertCell();
            celdaProyecto.textContent = proyectos[evento.proyectoId].nombre;
            let celdaFecha = fila.insertCell();
            let fechaEvento = new Date(evento.fecha + "T00:00:00");
            fechaEvento = new Date(fechaEvento.getTime() + fechaEvento.getTimezoneOffset() * 60000);
            let options = { year: 'numeric', month: 'long', day: 'numeric' };
            celdaFecha.textContent = fechaEvento.toLocaleDateString('es-ES', options);
        });
    }
}

function filtrarEventosSemanales() {
    let now = new Date();
    let startOfWeek = new Date(now.setDate(now.getDate() - now.getDay()));
    let endOfWeek = new Date(now.setDate(now.getDate() - now.getDay() + 6));

    let eventosSemanales = Object.values(eventos).filter(evento => {
        let eventDate = new Date(evento.fecha);
        return eventDate >= startOfWeek && eventDate <= endOfWeek;
    });

    return eventosSemanales;
}
function eliminarEvento2() {
    fetch(`http://127.0.0.1:8000/advisory-sessions/${eventoSeleccionado.id}`, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        
    })
    .catch((error) => {
        console.error('Error:', error);
        // Maneja cualquier error aquí
    });
    let idEvento = eventoSeleccionado.fecha + ' ' + eventoSeleccionado.hora;
    delete eventos[idEvento];
    document.getElementById("myModal4").style.display = "none";
    mostrarEventosSemanales();
    mostrarTodosLosEventos();
    updateCalendar();
    llenarHorasConEventos();
}
function eliminarEvento(evento) {
    document.getElementById("myModal4").style.display = "flex";
    eventoSeleccionado = evento
}

function formato12Horas(hora) {
    let partesHora = hora.split(':');
    let horas = parseInt(partesHora[0]);
    let minutos = partesHora[1];
    let ampm = horas >= 12 ? 'P.M.' : 'A.M.';
    horas = horas % 12;
    horas = horas ? horas : 12;
    return horas + ':' + minutos + ' ' + ampm;
}

function mostrarEventos(cell, date) {
    let formattedDate = date.getFullYear() + '-' + String(date.getMonth() + 1).padStart(2, '0') + '-' + String(date.getDate()).padStart(2, '0');
    let eventosDelDia = Object.keys(eventos).filter(idEvento => idEvento.includes(formattedDate));
    let eventoDiv2 = document.createElement('div');
    eventoDiv2.classList.add("etiquetas2");
    cell.appendChild(eventoDiv2);

    let nombresEventosAgregados = {};
    eventosDelDia.forEach(idEvento => {
        let evento = eventos[idEvento];
        let nombreEvento = proyectos[evento.proyectoId].nombre;
        if (!nombresEventosAgregados[nombreEvento]) {
            nombresEventosAgregados[nombreEvento] = true;
            cell.classList.add("verde");
            let proyecto = proyectos[evento.proyectoId];
            let eventoDiv = document.createElement('div');
            eventoDiv.classList.add("etiqueta2");
            eventoDiv.innerHTML = `
                <img src="images/${proyecto.imagen}" alt="${proyecto.nombre}" class="img_estudiante img_proyecto">
                <p class="nombre">${proyecto.nombre}</p>`;
            eventoDiv2.appendChild(eventoDiv);
        }
    });
}

function showModal() { document.getElementById("myModal").style.display = "flex"; }

function llenarHorasConEventos() {
    let tablaHoras = document.querySelector("#dia2 table tbody");
    let filas = tablaHoras.querySelectorAll("tr");
    let fecha = new Date(año, numeroMes, diaMes);
    let fechaISO = fecha.toISOString().split('T')[0];
    let eventosSinMinutos = {};

    for (let idEvento in eventos) {
        let horaSinMinutos = idEvento.split(' ')[0] + ' ' + idEvento.split(' ')[1].split(':').slice(0, 1).join(':') + ':00';
        if (!eventosSinMinutos[horaSinMinutos]) {
            eventosSinMinutos[horaSinMinutos] = [];
        }
        eventosSinMinutos[horaSinMinutos].push(eventos[idEvento]);
    }

    filas.forEach(fila => {
        fila.querySelectorAll("td").forEach(td => {
            let horaCelda = td.getAttribute("data-hora");
            let horaSinMinutos = fechaISO + ' ' + horaCelda.split(':').slice(0, 1).join(':') + ':00';
            td.textContent = "";
            td.onclick = eventosSinMinutos[horaSinMinutos] ? null : function () { tiempo(this, horaCelda); };
            let eventoDiv2 = document.createElement('div');
            eventoDiv2.classList.add("etiquetas");
            td.appendChild(eventoDiv2);

            // Verificar si el td tiene contenido
            if (!eventosSinMinutos[horaSinMinutos] || eventosSinMinutos[horaSinMinutos].length === 0) {
                td.classList.remove("verde"); // Quitar la clase verde si no hay eventos
                td.onclick = function () { tiempo(this, horaCelda); }; // Volver a asignar el evento onclick
            } else {
                eventosSinMinutos[horaSinMinutos].forEach(evento => {
                    let proyecto = proyectos[evento.proyectoId]; // Cambio de matricula a proyectoId
                    proyecto.alumnos.forEach(matricula => {
                        let estudiante = estudiantes[matricula];
                        let eventoDiv = document.createElement('div');
                        eventoDiv.classList.add("etiqueta");
                        eventoDiv.innerHTML = `
                            <img src="images/${estudiante.imagen}" alt="${estudiante.nombre}" class="img_estudiante">
                            <p class="info">${estudiante.nombre} - ${proyecto.nombre}</p>
                            <p class="hora"> ${evento.hora}</p>
                            <i class="nf nf-md-pencil evento"></i>
                            <i class="nf nf-fa-trash evento"></i>`;
                        eventoDiv2.appendChild(eventoDiv);
                        eventoDiv.classList.add(estudiante.color);
                        let iconos = eventoDiv.querySelectorAll('i');
                        iconos.forEach((icono, index) => {
                            if (index === 0) { // Primer icono (editar)
                                icono.addEventListener('click', function () {
                                    editarEvento(evento);
                                });
                            } else if (index === 1) { // Segundo icono (eliminar)
                                icono.addEventListener('click', function () {
                                    eliminarEvento(evento);
                                });
                            }
                        });
                    });
                }); // Agregar la clase verde si hay eventos
                td.onclick = null; // Quitar el evento onclick si hay eventos
            }
        });
    });
}

function closeModal() {
    document.getElementById("myModal").style.display = "none";
    document.getElementById("nombre").value = "0";
}
function closeModal2() {
    document.getElementById("myModal2").style.display = "none";
}
function closeModal4() {
    document.getElementById("myModal4").style.display = "none";
}

var diaSemana = "", diaMes = "", Mes = "", año = "", numeroMes = "";

function tiempo(td, tiem) {
    let div = td.querySelector('div');
    if (div && div.innerHTML.trim() !== '') {
        return; // Salir de la función si el div no está vacío
    }
    let selectedDate = new Date(año, numeroMes, diaMes);
    let currentDate = new Date();
    selectedDate.setHours(0, 0, 0, 0);
    currentDate.setHours(0, 0, 0, 0);
    if (selectedDate <= currentDate) {
        let selectedTime = new Date().getHours() + 1;
        let selectedHour = parseInt(tiem.slice(0, 2));
        if (selectedHour < selectedTime) {
            error.style.display = "block";
            error.innerHTML = "No puedes seleccionar horas anteriores a la hora actual.";
            return;
        }
    }
    document.getElementById("horas").value = tiem;
    showModal();
}

function volver() {
    document.getElementById("contador").textContent = 0 + "/250";
    let error = document.getElementById("error");
    error.style.display = "none";
    document.getElementById("asesorias-formulario").classList.add("ocultar");
    document.getElementById("eventosContainer").classList.remove("ocultar");
    document.getElementById('dia').classList.add('ocultar');
    document.getElementById('calendario').classList.remove('ocultar');
    document.getElementById('fecha').value = "";
    document.getElementById('horas').value = "";
    document.getElementById('matricula').value = "0";
    document.getElementById("contador").textContent = 0 + "/250";
    document.getElementById('motivo').value = "";
}

function onDayClick(year, month, dayOfWeek, dayOfMonth) {
    document.getElementById("asesorias-formulario").classList.remove("ocultar");
    document.getElementById("eventosContainer").classList.add("ocultar");
    let selectedDate = new Date(year, month, dayOfMonth);
    let currentDate = new Date();
    selectedDate.setHours(0, 0, 0, 0);
    currentDate.setHours(0, 0, 0, 0);
    if (selectedDate <= currentDate) {

        return;
    }
    let months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    let days = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
    diaSemana = days[dayOfWeek];
    diaMes = dayOfMonth;
    Mes = months[month];
    numeroMes = month;
    año = year;
    let formattedMonth = String(month + 1).padStart(2, '0');
    let formattedDay = String(dayOfMonth).padStart(2, '0');
    let formattedDate = `${year}-${formattedMonth}-${formattedDay}`;
    document.getElementById('dia').classList.remove('ocultar');
    document.getElementById('calendario').classList.add('ocultar');
    document.getElementById('fecha').value = formattedDate;
    document.getElementById('hora').innerHTML = `${diaSemana}, ${diaMes} de ${Mes}`;
    llenarHorasConEventos();
}

function createCalendar(year, month) {
    let calendar = document.createElement('table');
    calendar.innerHTML = '';
    let thead = calendar.createTHead();
    let headerRow = thead.insertRow();
    let days = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
    days.forEach(day => {
        let cell = headerRow.insertCell();
        cell.innerHTML = `<p class="hidden sm:block">${day}</p>
        <p class="block sm:hidden">${day[0]}</p>`;
    });
    let tbody = calendar.createTBody();
    let firstDay = new Date(year, month, 1).getDay();
    let daysInMonth = new Date(year, month + 1, 0).getDate();
    let date = 1;
    for (let i = 0; i < 6; i++) {
        let row = tbody.insertRow();
        for (let j = 0; j < 7; j++) {
            if (i === 0 && j < firstDay) {
                let cell0 = row.insertCell();
                cell0.classList.add('desactivado');
            } else if (date > daysInMonth) {
                let cell = row.insertCell();
                cell.classList.add('desactivado');
            } else {
                let cell = row.insertCell();
                let currentDate = new Date();
                currentDate.setHours(0, 0, 0, 0);
                let dayOfWeek = new Date(year, month, date).getDay();
                let cellDate = new Date(year, month, date);
                cell.innerHTML = `<p class="numero">${date}</p>`;
                if (cellDate <= currentDate) {
                    cell.classList.add('desactivado'); // Reemplaza 'tuClase' con el nombre de la clase que quieres agregar
                } else {
                    let date2 = date;
                    cell.onclick = function () { onDayClick(year, month, dayOfWeek, date2); }; // Agregar el evento onclick
                    let date3 = new Date(year, month, date2);
                    mostrarEventos(cell, date3);;
                }
                date++;
            }
        }
    }

    // Eliminar la última fila si está vacía
    let lastRow = tbody.rows[tbody.rows.length - 1];
    let empty = true;
    for (let i = 0; i < lastRow.cells.length; i++) {
        if (lastRow.cells[i].innerHTML.trim() !== '') {
            empty = false;
            break;
        }
    }
    if (empty) {
        tbody.deleteRow(tbody.rows.length - 1);
    }

    return calendar;
}

function matricula() {
    let selectedProyectoId = document.getElementById('nombre').value; // Obtener el ID del proyecto seleccionado
    if (selectedProyectoId == "0") {
        return;
    }
    let proyectoIdNumero = parseInt(selectedProyectoId); // Parsear el ID del proyecto como número
    document.getElementById('matricula').value = proyectoIdNumero; // Llenar el input con el ID del proyecto como número
    closeModal();
}

function updateCalendar() {
    let selectedYear = document.getElementById('year').value;
    let selectedMonth = document.getElementById('month').value;
    let calendar = createCalendar(selectedYear, parseInt(selectedMonth));
    let calendarContainer = document.getElementById('calendar');
    calendarContainer.innerHTML = '';
    calendarContainer.appendChild(calendar);
    mostrarEventosSemanales();
    mostrarTodosLosEventos();
}

function populateYears() {
    let yearSelect = document.getElementById('year');
    let monthSelect = document.getElementById('month');
    let currentDate = new Date();
    let currentYear = currentDate.getFullYear();
    let currentMonth = currentDate.getMonth();
    for (let i = currentYear; i <= currentYear + 1; i++) {
        let option = document.createElement('option');
        option.value = i;
        option.textContent = i;
        yearSelect.appendChild(option);
    }
    yearSelect.value = currentYear;
    monthSelect.value = currentMonth;
}


function mostrarTodosLosEventos() {
    let tablaEventos = document.getElementById('tablaEventos2').getElementsByTagName('tbody')[0];
    tablaEventos.innerHTML = '';
    let eventosOrdenados = Object.values(eventos).sort((a, b) => a.proyectoId - b.proyectoId);
    if (eventosOrdenados.length === 0) {
        let fila = tablaEventos.insertRow();
        let celdaMensaje = fila.insertCell();
        celdaMensaje.textContent = 'No hay eventos registrados.';
        celdaMensaje.colSpan = 6;
        celdaMensaje.classList.add('text-center');
    } else {
        for (let i = 0; i < eventosOrdenados.length; i++) {
            let evento = eventosOrdenados[i];
            let fila = tablaEventos.insertRow();

            // Celda para el nombre del proyecto
            let celdaProyecto = fila.insertCell();
            let divNombreProyecto = document.createElement('div');
            divNombreProyecto.textContent = proyectos[evento.proyectoId].nombre;
            celdaProyecto.appendChild(divNombreProyecto);

            // Celda para los alumnos
            let celdaAlumnos = fila.insertCell();
            let alumnosProyecto = proyectos[evento.proyectoId].alumnos.map(matricula => estudiantes[matricula].nombre).join(', ');
            let divAlumnos = document.createElement('div');
            divAlumnos.classList.add("limitar2")
            divAlumnos.textContent = alumnosProyecto;
            celdaAlumnos.appendChild(divAlumnos);

            // Celda para el motivo
            let celdaMotivo = fila.insertCell();
            let divMotivo = document.createElement('div');
            divMotivo.classList.add("limitar2");
            divMotivo.textContent = evento.motivo;
            celdaMotivo.appendChild(divMotivo);


            // Celda para la hora
            let celdaHora = fila.insertCell();
            let horaEvento = formato12Horas(evento.hora);
            let divHora = document.createElement('div');
            divHora.textContent = horaEvento;
            celdaHora.appendChild(divHora);

            // Celda para la fecha
            let celdaFecha = fila.insertCell();
            let fechaEvento = new Date(evento.fecha + "T00:00:00");
            fechaEvento = new Date(fechaEvento.getTime() + fechaEvento.getTimezoneOffset() * 60000);
            let options = { year: 'numeric', month: 'long', day: 'numeric' };
            let divFecha = document.createElement('div');
            divFecha.textContent = fechaEvento.toLocaleDateString('es-ES', options);
            celdaFecha.appendChild(divFecha);

            // Celda para las acciones (editar y borrar)
            let celdaAccion = fila.insertCell();
            let divAcciones = document.createElement('div');
            let botonEditar = document.createElement('button');
            botonEditar.innerHTML = `<i class="nf nf-md-pencil evento"></i>`;
            botonEditar.addEventListener('click', function () { editarEvento(evento); });
            divAcciones.appendChild(botonEditar);

            let botonEliminar = document.createElement('button');
            botonEliminar.innerHTML = `<i class="nf nf-fa-trash evento"></i>`;
            botonEliminar.addEventListener('click', function () { eliminarEvento(evento); });
            divAcciones.appendChild(botonEliminar);

            celdaAccion.appendChild(divAcciones);
        }
    }
}
function mostrarTodo() {
    document.getElementById("contbtnCitas").classList.add("ocultar");
    document.getElementById("contbtnCitas2").classList.remove("ocultar");
    let error = document.getElementById("error");
    error.style.display = "none";
    document.getElementById('fecha').value = "";
    document.getElementById('horas').value = "";
    document.getElementById("contador").textContent = 0 + "/250";
    document.getElementById('motivo').value = "";
    document.getElementById('matricula').value = "0";
    document.getElementById('dia').classList.add('ocultar');
    document.getElementById('calendario').classList.remove('ocultar');
    document.getElementById("asesorias-formulario").classList.add("ocultar");
    document.getElementById("eventosContainer").classList.add("ocultar");
    document.getElementById("calendario").classList.add("ocultar");
    document.getElementById("eventosContainer2").classList.remove("ocultar");
}
function ocultarTodo() {
    document.getElementById("contbtnCitas").classList.remove("ocultar");
    document.getElementById("contbtnCitas2").classList.add("ocultar");
    document.getElementById("asesorias-formulario").classList.add("ocultar");
    document.getElementById("eventosContainer").classList.remove("ocultar");
    document.getElementById("calendario").classList.remove("ocultar");
    document.getElementById("eventosContainer2").classList.add("ocultar");
}
function editarGuardar() {
    var fechaInput = document.getElementById("editFecha");
    var horasInput = document.getElementById("editHora");
    var motivoInput = document.getElementById("editMotivo");
    var error = document.getElementById("error2");
    error.style.display = "none";
    var nuevaFecha = fechaInput.value.trim();
    var nuevaHora = horasInput.value.trim();
    var nuevoMotivo = motivoInput.value.trim();
    if (!nuevaFecha || !nuevaHora || !nuevoMotivo) {
        error.style.display = "block";
        error.innerHTML = "Por favor, complete todos los campos.";
        return;
    }
    if (!/^\d{4}-\d{2}-\d{2}$/.test(nuevaFecha)) {
        error.style.display = "block";
        error.innerHTML = "Por favor, ingrese una fecha válida en formato AAAA-MM-DD.";
        return;
    }
    if (!/^\d{2}:\d{2}$/.test(nuevaHora)) {
        error.style.display = "block";
        error.innerHTML = "Por favor, ingrese una hora válida en formato HH:MM.";
        return;
    }
    let horaPartes = nuevaHora.split(":");
    let horaNum = parseInt(horaPartes[0]);
    let minutoNum = parseInt(horaPartes[1]);
    if (horaNum < 7 || horaNum > 20 || (horaNum === 20 && minutoNum > 0)) {
        error.style.display = "block";
        error.innerHTML = "Por favor, seleccione una hora entre las 7:00 a.m. y las 8:00 p.m.";
        return;
    }
    var nuevoIdEvento = nuevaFecha + ' ' + nuevaHora;
    var idEvento = eventoSeleccionado.fecha + ' ' + eventoSeleccionado.hora;
    if (eventos[nuevoIdEvento] && nuevoIdEvento !== idEvento) {
        error.style.display = "block";
        error.innerHTML = "Una cita ya existe en esa fecha y hora.";
        return;
    }
    var sessionDateTime = `${nuevaFecha}T${nuevaHora}:00`;

    var advisorySessionData = {
        session_date: sessionDateTime,
        description: nuevoMotivo,
        // Asumiendo que id_project_id e id_advisor_id no cambian, podrías agregarlos aquí si es necesario
    };

    // Asumiendo que eventoSeleccionado.id contiene el ID de la cita que estás editando
    fetch(`http://127.0.0.1:8000/advisory-sessions/${eventoSeleccionado.id}`, {
        method: 'PUT', // o 'PATCH' dependiendo de lo que tu API espere
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify(advisorySessionData)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log('Success:', data);
        // Maneja el éxito aquí, por ejemplo, cerrando el modal y refrescando la lista de eventos
        window.location.reload(); // O alguna función que actualice la lista de eventos sin recargar la página
    })
    .catch((error) => {
        console.error('Error:', error);
        errorElement.style.display = "block";
        errorElement.innerHTML = "Ha ocurrido un error al intentar actualizar la cita.";
    });
    delete eventos[idEvento];
    eventos[nuevoIdEvento] = {
        id:eventoSeleccionado.id,
        fecha: nuevaFecha,
        hora: nuevaHora,
        proyectoId: eventoSeleccionado.proyectoId,
        motivo: nuevoMotivo
    };
    document.getElementById("myModal2").style.display = "none";
    mostrarEventosSemanales();
    mostrarTodosLosEventos();
    updateCalendar();
    llenarHorasConEventos();
}

function editarEvento(evento) {
    var fechaInput = document.getElementById("editFecha");
    var horasInput = document.getElementById("editHora");
    var motivoInput = document.getElementById("editMotivo");
    fechaInput.value = evento.fecha;
    horasInput.value = evento.hora;
    motivoInput.value = evento.motivo;
    eventoSeleccionado = evento;
    let cantidad = evento.motivo.length;
    document.getElementById("editContador").textContent = cantidad + "/250";
    document.getElementById("myModal2").style.display = "flex";
}
mostrarTodosLosEventos();
populateYears();
updateCalendar();
