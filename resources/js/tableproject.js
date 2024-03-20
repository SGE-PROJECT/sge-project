document.addEventListener("DOMContentLoaded", function () {

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

});

$(document).ready(function () {
    $('input[type="checkbox"]').click(function () {
        var estado = [];
        $('input[type="checkbox"]:checked').each(function () {
            estado.push($(this).val());
        });

        if (estado.length > 0) {
            $('#tabla-proyectos tbody tr').hide();
            $.each(estado, function (index, value) {
                $('#tabla-proyectos tbody tr').each(function () {
                    if ($(this).find('td:nth-child(3)').text() === value) {
                        $(this).show();
                    }
                });
            });
        } else {
            $('#tabla-proyectos tbody tr').show();
        }
    });
});


var ctx = document.getElementById('barChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['En desarrollo', 'Reprobados', 'Completados',],
        datasets: [{
            label: 'Estado del proyecto',
            data: [$enDesarrolloCount, 4, 10], 
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