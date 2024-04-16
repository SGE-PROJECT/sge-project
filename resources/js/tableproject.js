document.addEventListener("DOMContentLoaded", function () {

    document.getElementById('Search').addEventListener('input', function () {
        var filtro = this.value.toLowerCase().trim(); // Añadir trim() para eliminar espacios en blanco
        filtrarTabla(filtro);
    });

    function filtrarTabla(filtro) {
        var tabla = document.getElementById('tabla-proyectos');
        var filas = tabla.getElementsByTagName('tr');
        var visible = false; // Para rastrear si alguna fila es visible

        for (var i = 1; i < filas.length; i++) {
            var celdas = filas[i].getElementsByTagName('td');
            var coincide = false;

            for (var j = 0; j < celdas.length; j++) {
                var texto = celdas[j].innerText.toLowerCase();
                if (texto.includes(filtro)) {
                    coincide = true;
                    // Opcional: Resaltar texto coincidente
                    celdas[j].innerHTML = celdas[j].innerText.replace(new RegExp(filtro, 'gi'), (match) => `<span class="highlight">${match}</span>`);
                } else {
                    // Remover resaltado si ya no coincide
                    celdas[j].innerHTML = celdas[j].innerText;
                }
            }

            if (coincide) {
                filas[i].style.display = '';
                visible = true;
            } else {
                filas[i].style.display = 'none';
            }
        }

        // Mostrar un mensaje si no hay filas visibles
        var noResults = document.getElementById('no-results');
        if (!visible) {
            noResults.style.display = '';
        } else {
            noResults.style.display = 'none';
        }
    }

});
