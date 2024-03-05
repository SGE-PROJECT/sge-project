// Este evento se dispara cuando todo el contenido del DOM ha sido cargado
document.addEventListener('DOMContentLoaded', function () {
    // Obtén los elementos del DOM necesarios
    var commentModal = document.getElementById('commentModal');
    var commentBtn = document.getElementById('comment-btn');
    var closeCommentBtn = document.querySelector('.modal .close');
    
    var starModal = document.getElementById('starModal');
    var starBtn = document.getElementById('star-btn');
    var closeStarBtn = document.querySelector('.star-modal .close-star');

    var likeBtn = document.getElementById('like-btn');

    // Eventos para abrir los modales
    commentBtn.onclick = function() {
        commentModal.style.display = 'block';
    };

    starBtn.onclick = function() {
        starModal.style.display = 'flex'; // Usar flex para centrar el modal
    };

    // Eventos para cerrar los modales
    closeCommentBtn.onclick = function(event) {
        event.stopPropagation(); // Esto evita que el evento se propague al `window`
        commentModal.style.display = 'none';
    };

    closeStarBtn.onclick = function(event) {
        event.stopPropagation(); // Esto evita que el evento se propague al `window`
        starModal.style.display = 'none';
    };

    // Evento para cerrar los modales si se hace clic fuera de ellos
    window.onclick = function(event) {
        if (event.target === commentModal) {
            commentModal.style.display = 'none';
        }
        if (event.target === starModal) {
            starModal.style.display = 'none';
        }
    };

    // Manejar la selección de estrellas
    var stars = document.querySelectorAll('.star');
    stars.forEach(function(star) {
        star.onclick = function() {
            stars.forEach(function(s) {
                s.classList.remove('selected'); // Remover la clase 'selected' de todas las estrellas
            });
            this.classList.add('selected'); // Añadir la clase 'selected' a la estrella clickeada
            var value = this.getAttribute('data-value'); // Obtener el valor de la estrella
            console.log('Calificación seleccionada: ' + value); // Puedes enviar este valor al servidor si es necesario
        };
    });

    // Manejar el clic en el botón del corazón
    likeBtn.onclick = function() {
        this.classList.toggle('filled'); // Alternar la clase 'filled' al hacer clic
        this.classList.toggle('unfilled'); // Alternar la clase 'unfilled' al hacer clic
    };
});
