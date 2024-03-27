
const botonSeguir = document.getElementById('boton-seguir');

// Agrega un evento de clic al botón de seguir
botonSeguir.addEventListener('click', function() {
    // Verifica si el botón ya tiene la clase 'siguiendo'
    if (botonSeguir.classList.contains('siguiendo')) {
        // Si ya tiene la clase, la eliminamos
        botonSeguir.classList.remove('siguiendo');
        // Restauramos el texto original del botón
        botonSeguir.textContent = 'Seguir';
    } else {
        // Si no tiene la clase, la agregamos
        botonSeguir.classList.add('siguiendo');
        // Cambiamos el texto del botón
        botonSeguir.textContent = 'Siguiendo';
    }
});
// Función para abrir el modal
function openModal() {
    document.getElementById("myModal").style.display = "block";
}

// Función para cerrar el modal
function closeModal() {
    document.getElementById("myModal").style.display = "none";
}

// Cierra el modal si se hace clic fuera del contenido
window.onclick = function(event) {
    var modal = document.getElementById("myModal");
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

