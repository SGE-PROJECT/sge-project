var estudiantes = {
    '22393172': { nombre: 'Alonso', imagen: 'avatar.jpg' },
    '22393173': { nombre: 'Juan', imagen: 'avatar.jpg' },
    '22393174': { nombre: 'Emma', imagen: 'avatar.jpg' },
    '22393175': { nombre: 'Cochi', imagen: 'avatar.jpg' },
    '22393176': { nombre: 'Leyva', imagen: 'avatar.jpg' },
    '22393177': { nombre: 'Emma2', imagen: 'avatar.jpg' },
    '22393178': { nombre: 'Cochi2', imagen: 'avatar.jpg' },
    '22393179': { nombre: 'Leyva2', imagen: 'avatar.jpg' }
};
var colores = ["verde", "amarillo", "morado", "azul", "rosa"];
function asignarColorAlumnos(estudiantes, colores) {
    var resultado = {};
    var keys = Object.keys(estudiantes);
    for (var i = 0; i < keys.length; i++) {
        var key = keys[i];
        var estudiante = estudiantes[key];
        var color = colores[i % colores.length]; // Para manejar ciclicidad de colores
        estudiante.color = color;
        resultado[key] = estudiante;
    }
    return resultado;
}
estudiantes = asignarColorAlumnos(estudiantes, colores);
var eventos = {};

document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('.close').addEventListener('click', closeModal);
    document.getElementById('nombre').addEventListener('change', matricula);
    document.getElementById('month').addEventListener('change', updateCalendar);
    document.getElementById('year').addEventListener('change', updateCalendar);
    document.getElementById('volverButton').addEventListener('click', volver);
    document.querySelectorAll('td[data-hora]').forEach(td => {
        td.addEventListener('click', function() {
            tiempo(this.getAttribute('data-hora'));
        });
    });
    document.getElementById('agregarEventoButton').addEventListener('click', agregarEvento);
    document.getElementById('matricula').addEventListener('input', function() {
        if (this.value.length > 10) {
            this.value = this.value.slice(0, 10);
        }
    })
    document.getElementById('motivo').addEventListener('input', function() {
        this.value = this.value.replace(/^[\W_]+|^ <>/, '');
        if (this.value.length > 250) {
            this.value = this.value.slice(0, 250);
        }
    });
});

function populateStudentSelect() {
    var select = document.getElementById('nombre');
    select.innerHTML = '';
    for (var matricula in estudiantes) {
        var option = document.createElement('option');
        option.value = matricula;
        option.textContent = estudiantes[matricula].nombre;
        select.appendChild(option);
    }
}

populateStudentSelect();

function agregarEvento() {
    let error = document.getElementById("error");
    error.style.display="none";
    let fecha = document.getElementById('fecha').value.trim();
    let hora = document.getElementById('horas').value.trim();
    let matricula = document.getElementById('matricula').value.trim();
    let motivo = document.getElementById('motivo').value.trim();
    if (!fecha || !hora || !matricula || !motivo) {
        error.style.display="block";
        error.innerHTML="Por favor, complete todos los campos.";
        return;
    }
    if (!/^\d{4}-\d{2}-\d{2}$/.test(fecha)) {
        error.style.display="block";
        error.innerHTML="Por favor, ingrese una fecha válida en formato AAAA-MM-DD.";
        return;
    }
    if (!/^\d{2}:\d{2}$/.test(hora)) {
        error.style.display="block";
        error.innerHTML="Por favor, ingrese una hora válida en formato HH:MM.";
        return;
    }
    // Agrega esta parte para validar la hora
    let horaPartes = hora.split(":");
    let horaNum = parseInt(horaPartes[0]);
    let minutoNum = parseInt(horaPartes[1]);

    // 7:00 a.m. es igual a 07:00 en formato 24 horas, y 8:00 p.m. es igual a 20:00
    if (horaNum < 7 || horaNum > 20 || (horaNum === 20 && minutoNum > 0)) {
        error.style.display="block";
        error.innerHTML="Por favor, seleccione una hora entre las 7:00 a.m. y las 8:00 p.m.";
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
        error.style.display="block";
        error.innerHTML="La fecha del evento no puede ser anterior a la fecha actual.";
        return;
    }
    if (eventYear === currentYear && eventMonth === currentMonth && eventDay === (currentDay + 1)) {
        let eventHour = parseInt(hora.split(':')[0]);
        let eventMinute = parseInt(hora.split(':')[1]);
        if (eventHour < currentHour || (eventHour === currentHour && eventMinute <= currentMinute)) {
            error.style.display="block";
            error.innerHTML="La hora del evento debe ser posterior a la hora actual más una hora.";
            return;
        }
    }
    let idEvento = fecha + ' ' + hora;
    if (idEvento in eventos) {
        error.style.display="block";
        error.innerHTML="El evento ya existe.";
        return;
    }

    if (!(matricula in estudiantes)) {
        error.style.display="block";
        error.innerHTML="La matrícula ingresada no es válida.";
        return;
    }

    eventos[idEvento] = {
        fecha: fecha,
        hora: hora,
        matricula: matricula,
        motivo:motivo
    };
    mostrarTodosLosEventos();
    updateCalendar();
    llenarHorasConEventos();
    document.getElementById('fecha').value = "";
    document.getElementById('horas').value = "";
    document.getElementById('matricula').value = "";
    document.getElementById('motivo').value = "";
    document.getElementById('dia').classList.add('ocultar');
    document.getElementById('calendario').classList.remove('ocultar');
}

function mostrarTodosLosEventos() {
    let tablaEventos = document.getElementById('tablaEventos').getElementsByTagName('tbody')[0];
    tablaEventos.innerHTML = '';
    let eventosOrdenados = Object.values(eventos).sort((a, b) => a.matricula - b.matricula);
    for (let i = 0; i < eventosOrdenados.length; i++) {
        console.log(eventosOrdenados[i])
        let evento = eventosOrdenados[i];
        let fila = tablaEventos.insertRow();
        let celdaMatricula = fila.insertCell();
        celdaMatricula.textContent = evento.matricula;
        let nombreAlumno = estudiantes[evento.matricula].nombre;
        let celdaNombre = fila.insertCell();
        celdaNombre.textContent = nombreAlumno;
        let motivoAlumno = evento.motivo;
        let celdaMotivo = fila.insertCell();
        celdaMotivo.classList.add("limitar");
        celdaMotivo.textContent = motivoAlumno;
        let celdaHora = fila.insertCell();
        let horaEvento = formato12Horas(evento.hora);
        celdaHora.textContent = horaEvento;
        let celdaFecha = fila.insertCell();
        let fechaEvento = new Date(evento.fecha + "T00:00:00");
        fechaEvento = new Date(fechaEvento.getTime() + fechaEvento.getTimezoneOffset() * 60000);
        let options = { year: 'numeric', month: 'long', day: 'numeric' };
        celdaFecha.textContent = fechaEvento.toLocaleDateString('es-ES', options);
        let celdaAccion = fila.insertCell();
        let botonEliminar = document.createElement('button');
        botonEliminar.innerHTML = `<i class="nf nf-cod-trash"></i>`;
        botonEliminar.addEventListener('click', function () { eliminarEvento(evento); });
        celdaAccion.appendChild(botonEliminar);
    }
}

function eliminarEvento(evento) {
    let idEvento = evento.fecha + ' ' + evento.hora;
    delete eventos[idEvento];
    mostrarTodosLosEventos();
    updateCalendar();
    llenarHorasConEventos();
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
    eventoDiv2.classList.add("etiquetas2")
    cell.appendChild(eventoDiv2);
    eventosDelDia.forEach(idEvento => {
        cell.classList.add("verde")
        let estudiante = estudiantes[eventos[idEvento].matricula];
        let eventoDiv = document.createElement('div');
        eventoDiv.classList.add("etiqueta2")
        eventoDiv.innerHTML = `
                <img src="images/${estudiante.imagen}" alt="${estudiante.nombre}" class="img_estudiante">
                <p class="nombre">${estudiante.nombre}</p>`;
        eventoDiv2.appendChild(eventoDiv);
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
            td.onclick = eventosSinMinutos[horaSinMinutos] ? null : function () { tiempo(horaCelda); };
            let eventoDiv2 = document.createElement('div');
            eventoDiv2.classList.add("etiquetas")
            td.appendChild(eventoDiv2);

            // Verificar si el td tiene contenido
            if (!eventosSinMinutos[horaSinMinutos] || eventosSinMinutos[horaSinMinutos].length === 0) {
                td.classList.remove("verde"); // Quitar la clase verde si no hay eventos
                td.onclick = function () { tiempo(horaCelda); }; // Volver a asignar el evento onclick
            } else {
                eventosSinMinutos[horaSinMinutos].forEach(evento => {
                    let estudiante = estudiantes[evento.matricula];
                    let eventoDiv = document.createElement('div');
                    eventoDiv.classList.add("etiqueta")
                    eventoDiv.innerHTML = `
                        <img src="images/${estudiante.imagen}" alt="${estudiante.nombre}" class="img_estudiante">
                        <p class="nombre">${estudiante.nombre} ${evento.hora}</p>
                        <p class="info">${evento.motivo}</p>`;
                    eventoDiv2.appendChild(eventoDiv);
                    eventoDiv.classList.add(estudiante.color);
                }); // Agregar la clase verde si hay eventos
                td.onclick = null; // Quitar el evento onclick si hay eventos
            }
        });
    });
}

function closeModal() {
    document.getElementById("myModal").style.display = "none";
}

var diaSemana = "", diaMes = "", Mes = "", año = "", numeroMes = "";

function tiempo(tiem) {
    let selectedDate = new Date(año, numeroMes, diaMes);
    let currentDate = new Date();
    selectedDate.setHours(0, 0, 0, 0);
    currentDate.setHours(0, 0, 0, 0);
    if (selectedDate <= currentDate) {
        let selectedTime = new Date().getHours() + 1;
        let selectedHour = parseInt(tiem.slice(0, 2));
        if (selectedHour < selectedTime) {
            error.style.display="block";
            error.innerHTML="No puedes seleccionar horas anteriores a la hora actual.";
            return;
        }
    }
    document.getElementById("horas").value = tiem;
    showModal();
}

function volver() {
    document.getElementById('dia').classList.add('ocultar');
    document.getElementById('calendario').classList.remove('ocultar');
    document.getElementById('fecha').value = "";
    document.getElementById('horas').value = "";
    document.getElementById('matricula').value = "";
}

function onDayClick(year, month, dayOfWeek, dayOfMonth) {
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
        cell.textContent = day;
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
                cell.innerHTML =`<p class="numero">${date}</p>`;
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
    let selected = document.getElementById('nombre').value;
    let matricula = parseInt(selected)
    document.getElementById('matricula').value = matricula;
    closeModal();
}

function updateCalendar() {
    let selectedYear = document.getElementById('year').value;
    let selectedMonth = document.getElementById('month').value;
    let calendar = createCalendar(selectedYear, parseInt(selectedMonth));
    let calendarContainer = document.getElementById('calendar');
    calendarContainer.innerHTML = '';
    calendarContainer.appendChild(calendar);
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

populateYears();
updateCalendar();