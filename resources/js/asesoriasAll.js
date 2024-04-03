var idEvento = 1;
var idFecha = "";
var eliminarId = 1;
var diaSemana = "", diaMes = "", Mes = "", año = "", numeroMes = "";

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById("contador").textContent = 0 + "/250";
    document.getElementById("editContador").textContent = 0 + "/250";
    document.getElementById("botonCitas3").addEventListener("click",agregar);
    document.querySelector('.close2').addEventListener('click', closeModal2);
    document.querySelector('.close4').addEventListener('click', closeModal4);
    document.querySelector('.close5').addEventListener('click', closeModal5);
    document.getElementById("guardarEventoButton").addEventListener('click', editarGuardar);
    document.getElementById("borrarEventoBoton").addEventListener('click', eliminarEvento2);
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
function agregar(){
    document.getElementById("myModal").style.display = "flex";
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
}

function eliminarEvento2() {
    let id = eliminarId;
    var formulario = document.getElementById('borrarCita');
    var actionUrl = actionDeleteUrlTemplate.replace(':id', id);
    formulario.action = actionUrl;
    document.getElementById("myModal4").style.display = "none";
    formulario.submit();
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

function showModal() { document.getElementById("myModal").style.display = "flex"; }

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
function closeModal5() {
    document.getElementById("myModal").style.display = "none";
    document.getElementById('fecha').value = "";
    document.getElementById('horas').value = "";
    document.getElementById('matricula').value = "0";
    document.getElementById("contador").textContent = 0 + "/250";
    document.getElementById('motivo').value = "";
    let error = document.getElementById("error");
    error.style.display = "none";
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

            let celdaProyecto = fila.insertCell();
            let divNombreProyecto = document.createElement('div');
            divNombreProyecto.textContent = proyectos[evento.proyectoId].nombre;
            celdaProyecto.appendChild(divNombreProyecto);

            let celdaAlumnos = fila.insertCell();
            let alumnosProyecto = proyectos[evento.proyectoId].alumnos.map(matricula => estudiantes[matricula].nombre).join(', ');
            let divAlumnos = document.createElement('div');
            divAlumnos.classList.add("limitar2")
            divAlumnos.textContent = alumnosProyecto;
            celdaAlumnos.appendChild(divAlumnos);

            let celdaMotivo = fila.insertCell();
            let divMotivo = document.createElement('div');
            divMotivo.classList.add("limitar2");
            divMotivo.textContent = evento.motivo;
            celdaMotivo.appendChild(divMotivo);

            let celdaHora = fila.insertCell();
            let horaEvento = formato12Horas(evento.hora);
            let divHora = document.createElement('div');
            divHora.textContent = horaEvento;
            celdaHora.appendChild(divHora);

            let celdaFecha = fila.insertCell();
            let fechaEvento = new Date(evento.fecha + "T00:00:00");
            fechaEvento = new Date(fechaEvento.getTime() + fechaEvento.getTimezoneOffset() * 60000);
            let options = { year: 'numeric', month: 'long', day: 'numeric' };
            let divFecha = document.createElement('div');
            divFecha.textContent = fechaEvento.toLocaleDateString('es-ES', options);
            celdaFecha.appendChild(divFecha);

            let celdaAccion = fila.insertCell();
            let divAcciones = document.createElement('div');
            let botonEditar = document.createElement('button');
            botonEditar.innerHTML = `<i class="nf nf-md-pencil evento"></i>`;
            botonEditar.addEventListener('click', function () { editarEvento(evento.id, evento.fecha, evento.hora, evento.motivo); });
            divAcciones.appendChild(botonEditar);

            let botonEliminar = document.createElement('button');
            botonEliminar.innerHTML = `<i class="nf nf-fa-trash evento"></i>`;
            botonEliminar.addEventListener('click', function () { eliminarEvento(evento.id); });
            divAcciones.appendChild(botonEliminar);

            celdaAccion.appendChild(divAcciones);
        }
    }
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
mostrarTodosLosEventos();
