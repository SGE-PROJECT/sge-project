document.addEventListener("DOMContentLoaded", function () {
    var proyectos = [
        { nombre: "ProjectSync", equipo: "SM53", estado: "Activo", asesor: "Rafael Villegas", carrera: "TI Área Desarrollo de Software Multiplataforma", empresa: "DotNet" },
        { nombre: "Green Garden", equipo: "Dinamita", estado: "En proceso", asesor: "Mayra Fuentes", carrera: "TI Área Desarrollo de Software Multiplataforma", empresa: "Turicun" },
        { nombre: "Blue Sky", equipo: "Alpha", estado: "Activo", asesor: "Juan Perez", carrera: "Mantenimiento Área Instalaciones", empresa: "SkyHigh" },
        { nombre: "Tech Innovations", equipo: "Beta", estado: "En proceso", asesor: "Laura Martinez", carrera: "Mantenimiento Área Naval", empresa: "InnoTech" },
        { nombre: "Data Analytica", equipo: "Gamma", estado: "En espera", asesor: "Pedro Gonzalez", carrera: "Contaduría", empresa: "Data Solutions" },
        { nombre: "Smart Solutions", equipo: "Delta", estado: "Activo", asesor: "Ana Rodriguez", carrera: "Gastronomía", empresa: "TechSolutions" },
        { nombre: "GreenTech", equipo: "Epsilon", estado: "Activo", asesor: "David Sanchez", carrera: "Turismo Área Desarrollo de Productos Alternativos", empresa: "EcoTech" },
        { nombre: "Future Vision", equipo: "Zeta", estado: "En proceso", asesor: "Sofia Ramirez", carrera: "TI Área Infraestructura de Redes Digitales", empresa: "Visionary" },
        { nombre: "CodeCrafters", equipo: "Omega", estado: "Activo", asesor: "Carlos Lopez", carrera: "Turismo Área en Hotelería", empresa: "CodeMasters" },
        { nombre: "Bright Ideas", equipo: "Sigma", estado: "En proceso", asesor: "Maria Hernandez", carrera: "Terapia Física", empresa: "InnovateCorp" }
    ];

    function generarTabla() {
        var tablaHTML = '<thead><tr><th>Proyecto</th><th>Equipo</th><th>Estado</th><th>Asesor A/E</th><th>Carrera</th><th>Empresa</th></tr></thead><tbody>';

        proyectos.forEach(function (proyecto) {
            tablaHTML += '<tr>';
            tablaHTML += '<td>' + proyecto.nombre + '</td>';
            tablaHTML += '<td>' + proyecto.equipo + '</td>';
            tablaHTML += '<td class="estado">' + proyecto.estado + '</td>';
            tablaHTML += '<td>' + proyecto.asesor + '</td>';
            tablaHTML += '<td>' + proyecto.carrera + '</td>';
            tablaHTML += '<td>' + proyecto.empresa + '</td>';
            tablaHTML += '</tr>';
        });

        tablaHTML += '</tbody>';

        document.getElementById('tabla-proyectos').innerHTML = tablaHTML;
    }

    window.onload = function () {
        generarTabla();
    };

    document.getElementById('Search').addEventListener('input', function () {
        var filtro = this.value.toLowerCase(); // Obtener el texto de búsqueda en minúsculas
        filtrarTabla(filtro); // Llamar a la función para filtrar la tabla
    });

    function filtrarTabla(filtro) {
        var tabla = document.getElementById('tabla-proyectos');
        var filas = tabla.getElementsByTagName('tr');

        for (var i = 1; i < filas.length; i++) { // Empezamos desde el índice 1 para omitir la primera fila de encabezados
            var celdas = filas[i].getElementsByTagName('td');
            var coincide = false;

            for (var j = 0; j < celdas.length; j++) {
                var texto = celdas[j].innerText.toLowerCase();

                if (texto.indexOf(filtro) > -1) {
                    coincide = true;
                    break;
                }
            }

            if (coincide) {
                filas[i].style.display = ''; // Mostrar la fila si coincide con el filtro
            } else {
                filas[i].style.display = 'none'; // Ocultar la fila si no coincide con el filtro
            }
        }
    }

    // Selecciona los checkboxes por su ID
    var checkboxActivos = document.getElementById('Option1');
    var checkboxEnProceso = document.getElementById('Option2');
    var checkboxRechazados = document.getElementById('Option3');
    var checkboxAceptados = document.getElementById('Option4');

    // Agrega listeners de evento para los clics en los checkboxes
    checkboxActivos.addEventListener('change', filtrarTablaCheck);
    checkboxEnProceso.addEventListener('change', filtrarTablaCheck);
    checkboxRechazados.addEventListener('change', filtrarTablaCheck);
    checkboxAceptados.addEventListener('change', filtrarTablaCheck);

    // Función para filtrar la tabla según el valor de los checkboxes
    function filtrarTablaCheck() {
        var filas = document.querySelectorAll('#tabla-proyectos tr');

        filas.forEach(function (fila) {
            // Verifica si la fila tiene una celda con la clase "estado"
            var celdaEstado = fila.querySelector('.estado');
            if (celdaEstado) { // Verifica si la celda de estado existe
                var estado = celdaEstado.textContent.toLowerCase();

                // Verifica si la fila coincide con el estado seleccionado en los checkboxes
                var activos = checkboxActivos.checked && estado.includes('activo');
                var enProceso = checkboxEnProceso.checked && estado.includes('proceso');
                var rechazados = checkboxRechazados.checked && estado.includes('rechazado');
                var aceptados = checkboxAceptados.checked && estado.includes('aceptado');

                // Muestra la fila si coincide con algún estado seleccionado, o si no hay estados seleccionados
                if (activos || enProceso || rechazados || aceptados || (!activos && !enProceso && !rechazados && !aceptados)) {
                    fila.style.display = '';
                } else {
                    fila.style.display = 'none';
                }
            }
        });
    }
});

var ctx = document.getElementById('barChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Label 1', 'Label 2', 'Label 3', 'Label 4', 'Label 5'],
        datasets: [{
            label: 'Progreso de Proyectos',
            data: [12, 19, 3, 5, 2], // Aquí irían los datos de tu gráfica
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});