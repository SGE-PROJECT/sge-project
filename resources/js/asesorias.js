var idEvento = 1;
var idFecha = "";
var eliminarId = 1;
var diaSemana = "", diaMes = "", Mes = "", año = "", numeroMes = "";

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById("contador").textContent = 0 + "/250";
    document.getElementById("editContador").textContent = 0 + "/250";
    document.querySelector('.close').addEventListener('click', closeModal);
    document.querySelector('.close2').addEventListener('click', closeModal2);
    document.querySelector('.close4').addEventListener('click', closeModal4);
    document.getElementById('nombre').addEventListener('change', matricula);
    document.getElementById('month').addEventListener('change', updateCalendar);
    document.getElementById('year').addEventListener('change', updateCalendar);
    document.getElementById('volverButton').addEventListener('click', volver);
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
        contador.textContent = document.getElementById('editContador').value.length + "/250";
    });
    document.getElementById('fecha').addEventListener('click', function () {
        var dateInput = document.getElementById('fecha');
        dateInput.click();
    });
    const form = document.getElementById("asesorias-formulario");
    form.addEventListener("submit", function(e) {
        e.preventDefault();
        agregarEvento();
    });
});
function matricula() {
    let selectedProyectoId = document.getElementById('nombre').value;
    if (selectedProyectoId == "0") {
        return;
    }
    let proyectoIdNumero = parseInt(selectedProyectoId);
    document.getElementById('matricula').value = proyectoIdNumero;
    closeModal();
}
function solicitar() {
    document.getElementById("solitAsunto").value = "";
    document.getElementById("solitMensaje").value = "";
    document.getElementById("myModal3").style.display = "none";
}
function cambiar() {
    document.getElementById("myModal3").style.display = "flex";
}

function desactivar () {
    var formularios = document.querySelectorAll("form");
    formularios.forEach(function(formulario) {
        var botones = formulario.querySelectorAll("button");
        botones.forEach(function(boton) {
            boton.disabled = true;
        });
    });
}

function agregarEvento() {
    document.getElementById("agregarEventoButton").disabled = true;
    let error = document.getElementById("error");
    let form = document.getElementById("asesorias-formulario");
    error.style.display = "none";
    let fecha = document.getElementById('fecha').value.trim();
    let hora = document.getElementById('horas').value.trim();
    let proyectoId = document.getElementById('matricula').value.trim();
    let motivo = document.getElementById('motivo').value.trim();
    if (!fecha || !hora || proyectoId == 0 || !motivo) {
        error.style.display = "block";
        error.innerHTML = "Por favor, complete todos los campos.";
        document.getElementById("agregarEventoButton").disabled = false;
        return;
    }
    if (!/^\d{4}-\d{2}-\d{2}$/.test(fecha)) {
        error.style.display = "block";
        error.innerHTML = "Por favor, ingrese una fecha válida en formato AAAA-MM-DD.";
        document.getElementById("agregarEventoButton").disabled = false;
        return;
    }
    if (!/^\d{2}:\d{2}$/.test(hora)) {
        error.style.display = "block";
        error.innerHTML = "Por favor, ingrese una hora válida en formato HH:MM.";
        document.getElementById("agregarEventoButton").disabled = false;
        return;
    }
    let horaPartes = hora.split(":");
    let horaNum = parseInt(horaPartes[0]);
    let minutoNum = parseInt(horaPartes[1]);

    if (horaNum < 7 || horaNum > 20 || (horaNum === 20 && minutoNum > 0)) {
        error.style.display = "block";
        error.innerHTML = "Por favor, seleccione una hora entre las 7:00 a.m. y las 8:00 p.m.";
        document.getElementById("agregarEventoButton").disabled = false;
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
        document.getElementById("agregarEventoButton").disabled = false;
        return;
    }
    if (eventYear === currentYear && eventMonth === currentMonth && eventDay === (currentDay - 1)) {
        let eventHour = parseInt(hora.split(':')[0]);
        let eventMinute = parseInt(hora.split(':')[1]);
        if (eventHour < currentHour || (eventHour === currentHour && eventMinute <= currentMinute)) {
            error.style.display = "block";
            error.innerHTML = "La hora de la cita debe ser posterior a la hora actual más una hora.";
            document.getElementById("agregarEventoButton").disabled = false;
            return;
        }
    }
    let idEvento = fecha + ' ' + hora;
    if (idEvento in eventos) {
        error.style.display = "block";
        error.innerHTML = "La cita ya existe.";
        document.getElementById("agregarEventoButton").disabled = false;
        return;
    }
    form.submit();
    desactivar();
}

function eliminarEvento2() {
    let id = eliminarId;
    var formulario = document.getElementById('borrarCita');
    var actionUrl = actionDeleteUrlTemplate.replace(':id', id);
    formulario.action = actionUrl;
    document.getElementById("myModal4").style.display = "none";
    formulario.submit();
    desactivar();
}
function eliminarEvento(id) {
    eliminarId = id;
    document.getElementById("myModal4").style.display = "flex";
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
                <img src="/${proyecto.imagen}" alt="${proyecto.nombre}" class="img_estudiante img_proyecto">
                <p class="nombre">${proyecto.nombre}</p>`;
            eventoDiv2.appendChild(eventoDiv);
        }
    });
}

function showModal() { document.getElementById("myModal").style.display = "flex"; }

function llenarHorasConEventos(año, numeroMes, diaMes) {
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

            if (!eventosSinMinutos[horaSinMinutos] || eventosSinMinutos[horaSinMinutos].length === 0) {
                td.classList.remove("verde");
                td.onclick = function () { tiempo(this, horaCelda); };
            } else {
                eventosSinMinutos[horaSinMinutos].forEach(evento => {
                    let proyecto = proyectos[evento.proyectoId];
                    proyecto.alumnos.forEach(matricula => {
                        let estudiante = estudiantes[matricula];
                        let eventoDiv = document.createElement('div');
                        eventoDiv.classList.add("etiqueta");
                        eventoDiv.innerHTML = `
                            <img src="/${estudiante.imagen}" alt="${estudiante.nombre}" class="img_estudiante">
                            <p class="info">${estudiante.nombre} - ${proyecto.nombre}</p>
                            <p class="hora"> ${evento.hora}</p>
                            <i class="nf nf-md-pencil hover:text-blue-500 evento"></i>
                            <i class="nf nf-fa-trash hover:text-red-500 evento"></i>`;
                        eventoDiv2.appendChild(eventoDiv);
                        eventoDiv.classList.add(estudiante.color);
                        let iconos = eventoDiv.querySelectorAll('i');
                        iconos.forEach((icono, index) => {
                            if (index === 0) {
                                icono.addEventListener('click', function () {
                                    editarEvento(evento.id, evento.fecha, evento.hora, evento.motivo);
                                });
                            } else if (index === 1) {
                                icono.addEventListener('click', function () {
                                    eliminarEvento(evento.id);
                                });
                            }
                        });
                    });
                });
                td.onclick = null;
            }
        });
    });
}

function closeModal() {
    document.getElementById("myModal").style.display = "none";
    document.getElementById("nombre").value = "0";
    let error = document.getElementById("error2");
    error.style.display = "none";
}
function closeModal2() {
    document.getElementById("myModal2").style.display = "none";
    let error = document.getElementById("error2");
    error.style.display = "none";

}
function closeModal4() {
    document.getElementById("myModal4").style.display = "none";
    let error = document.getElementById("error2");
    error.style.display = "none";
}


function tiempo(td, tiem) {
    let div = td.querySelector('div');
    if (div && div.innerHTML.trim() !== '') {
        return;
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
    document.querySelector(".hora-asesorias").classList.add("ocultar");
    document.getElementById("eventosContainer").classList.remove("ocultar");
    document.querySelector(".fechas-asesorias").classList.remove("ocultar");
    document.getElementById('dia').classList.add('ocultar');
    document.getElementById('calendario').classList.remove('ocultar');
    document.getElementById('fecha').value = "";
    document.getElementById('horas').value = "";
    document.getElementById('matricula').value = "0";
    document.getElementById("contador").textContent = 0 + "/250";
    document.getElementById('motivo').value = "";
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
    llenarHorasConEventos(año, numeroMes, diaMes);
    document.getElementById("asesorias-formulario").classList.remove("ocultar");
    document.querySelector(".hora-asesorias").classList.remove("ocultar");
    document.getElementById("eventosContainer").classList.add("ocultar");
    document.querySelector(".fechas-asesorias").classList.add("ocultar");
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
                    cell.classList.add('desactivado');
                } else {
                    let date2 = date;
                    cell.onclick = function () { onDayClick(year, month, dayOfWeek, date2); };
                    let date3 = new Date(year, month, date2);
                    mostrarEventos(cell, date3);;
                }
                date++;
            }
        }
    }

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
function updateCalendar() {
    let selectedYear = document.getElementById('year').value;
    let selectedMonth = document.getElementById('month').value;
    let calendar = createCalendar(selectedYear, parseInt(selectedMonth));
    let calendarContainer = document.getElementById('calendar');
    calendarContainer.innerHTML = '';
    calendarContainer.appendChild(calendar);
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
function editarGuardar() {
    let id = idEvento;
    let idFech = idFecha;
    var fechaInput = document.getElementById("editFecha");
    var horasInput = document.getElementById("editHora");
    var motivoInput = document.getElementById("editMotivo");
    var error = document.getElementById("error2");
    error.style.display = "none";
    var nuevaFecha = fechaInput.value.trim();
    var nuevaHora = horasInput.value.trim();
    var nuevoMotivo = motivoInput.value.trim();
    var fechaActual = new Date();
    var fechaActualFormateada = fechaActual.toISOString().split('T')[0];

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
    if (nuevaFecha < fechaActualFormateada) {
        error.style.display = "block";
        error.innerHTML = "No se pueden agregar eventos antes de la fecha actual.";
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
    let idEventos = nuevaFecha + ' ' + nuevaHora;
    if(idFech!==idEventos){
        if (idEventos in eventos) {
            error.style.display = "block";
            error.innerHTML = "La cita ya existe.";
            return;
        }
    }
    if(idFech==idEventos && eventos[idFech].motivo == nuevoMotivo){
        error.style.display = "block";
            error.innerHTML = "Los datos de la cita son identicos.";
            return;
    }

    var formulario = document.getElementById('editarCita');
    var actionUrl = actionUrlTemplate.replace(':id', id);
    formulario.action = actionUrl;
    document.getElementById("myModal2").style.display = "none";
    formulario.submit();
    desactivar();
}
function editarEvento(id, fecha, hora, motivo) {
    idEvento = id;
    idFecha = fecha + ' ' + hora;
    var fechaInput = document.getElementById("editFecha");
    var horasInput = document.getElementById("editHora");
    var motivoInput = document.getElementById("editMotivo");
    fechaInput.value = fecha;
    horasInput.value = hora;
    motivoInput.value = motivo;
    let cantidad = motivo.length;
    document.getElementById("editContador").textContent = cantidad + "/250";
    document.getElementById("myModal2").style.display = "flex";
}
populateYears();
updateCalendar();
