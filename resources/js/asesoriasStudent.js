var idEvento = 1;
var eliminarId = 1;

document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('.close3').addEventListener('click', solicitar);
    document.getElementById('student-month').addEventListener('change', updateCalendar);
    document.getElementById('student-year').addEventListener('change', updateCalendar);
    document.getElementById('student-volverButton').addEventListener('click', volver);
    document.getElementById('student-cambiarCita').addEventListener('click', cambiar);
    document.getElementById("editContador").textContent = 0 + "/250";
    document.getElementById('student-solitMensaje').addEventListener('input', function () {
        this.value = this.value.replace(/^[\W_]+|^ <>/, '');
        var contador = document.getElementById("editContador");
        if (this.value.length > 250) {
            this.value = this.value.slice(0, 250);
        }
        contador.textContent = document.getElementById('student-solitMensaje').value.length + "/250";
    });
});
function solicitar() {
    document.getElementById("editContador").textContent="0/250"
    document.getElementById("student-solitMensaje").value = "";
    document.getElementById("student-myModal3").style.display = "none";
    var error = document.getElementById("error2");
    error.style.display = "none";
}

function cambiar() {
    document.getElementById("student-myModal3").style.display = "flex";
}
function populateYears() {
    let yearSelect = document.getElementById('student-year');
    let monthSelect = document.getElementById('student-month');
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
                <img src="/images/${proyecto.imagen}" alt="${proyecto.nombre}" class="img_estudiante img_proyecto">
                <p class="nombre">${proyecto.nombre}</p>`;
            eventoDiv2.appendChild(eventoDiv);
        }
    });
}
function llenarHorasConEventos() {
    let tablaHoras = document.querySelector("#student-dia2 table tbody");
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
                        let eventoDiv = document.createElement('div');
                        eventoDiv.classList.add("etiqueta");
                        eventoDiv.innerHTML = `
                            <p class="info">${evento.motivo}</p>
                            <p class="hora"> ${evento.hora}</p>`;
                        eventoDiv2.appendChild(eventoDiv);
                        eventoDiv.classList.add("verde");
                    });
                });
                td.onclick = null;
            }
        });
    });
}

var diaSemana = "", diaMes = "", Mes = "", año = "", numeroMes = "";

function volver() {
    document.getElementById("student-eventosContainer").classList.remove("ocultar");
    document.getElementById('student-dia').classList.add('ocultar');
    document.getElementById('student-calendario').classList.remove('ocultar');
    document.querySelector(".hora-asesorias").classList.add("ocultar");
    document.querySelector(".fechas-asesorias").classList.remove("ocultar");
}
function onDayClick(year, month, dayOfWeek, dayOfMonth) {
    document.getElementById("student-eventosContainer").classList.add("ocultar");
    document.querySelector(".hora-asesorias").classList.remove("ocultar");
    document.querySelector(".fechas-asesorias").classList.add("ocultar");
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
    console.log(formattedDate);
    document.getElementById('student-dia').classList.remove('ocultar');
    document.getElementById('student-calendario').classList.add('ocultar');
    document.getElementById('student-hora').innerHTML = `${diaSemana}, ${diaMes} de ${Mes}`;
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
    let selectedYear = document.getElementById('student-year').value;
    let selectedMonth = document.getElementById('student-month').value;
    let calendar = createCalendar(selectedYear, parseInt(selectedMonth));
    let calendarContainer = document.getElementById('student-calendar');
    calendarContainer.innerHTML = '';
    calendarContainer.appendChild(calendar);
}

populateYears();
updateCalendar();
