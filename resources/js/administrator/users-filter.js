document.addEventListener("DOMContentLoaded", function () {
    document.getElementById('Search').addEventListener('input', function () {
        var filtro = this.value.toLowerCase().trim(); // Añadir trim() para eliminar espacios en blanco
        filtrarTabla(filtro);
    });

    function filtrarTabla(filtro) {
        var tabla = document.getElementById('tabla-usuarios'); // Asegúrate de que este es el ID correcto
        var filas = tabla.getElementsByTagName('tr');
        var visible = false;

        for (var i = 1; i < filas.length; i++) { // Empezamos desde el índice 1 para omitir la fila de encabezado
            var celdas = filas[i].getElementsByTagName('td');
            var coincide = false;

            for (var j = 0; j < celdas.length; j++) {
                var texto = celdas[j].innerText.toLowerCase();
                if (texto.includes(filtro)) {
                    coincide = true;
                    break;
                }
            }

            if (coincide) {
                filas[i].style.display = ''; // Mostrar la fila si coincide con el filtro
                visible = true;
            } else {
                filas[i].style.display = 'none'; // Ocultar la fila si no coincide con el filtro
            }
        }

        // Manejar la visibilidad del mensaje 'No se encontraron resultados'
        var noResults = document.getElementById('no-results'); // Asegúrate de tener un elemento con este ID
        if (!visible && noResults) {
            noResults.style.display = ''; // Mostrar el mensaje si no hay filas visibles
        } else if (noResults) {
            noResults.style.display = 'none'; // Ocultar el mensaje si hay filas visibles
        }
    }
});
