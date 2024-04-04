// Función para abrir el modal
function openModal() {
    document.getElementById("myModal").style.display = "block";
}

// Función para cerrar el modal
function closeModal() {
    document.getElementById("myModal").style.display = "none";
}

// Cerrar el modal si se hace clic fuera de él
window.onclick = function(event) {
    var modal = document.getElementById("myModal");
    if (event.target == modal) {
        closeModal();
    }
}

// Evitar la propagación del evento clic en el overlay de la imagen
document.querySelector('.profile-picture-overlay label').addEventListener('click', function(event) {
    event.stopPropagation();
});

// Obtener elementos del DOM
const photoInput = document.getElementById('photoInput');
const guardarFotoBtn = document.getElementById('guardarFotoBtn');
const profilePicture = document.getElementById('profilePicture');

// Variable para controlar si el perfil ha sido editado
let perfilEditado = false;

// Mostrar el botón de guardar foto después de seleccionar un archivo, solo si el perfil ha sido editado
photoInput.addEventListener('change', () => {
    if (perfilEditado) {
        mostrarFotoSeleccionada();
        mostrarBotonGuardar();
    }
});

// Función para mostrar la foto seleccionada en la vista
function mostrarFotoSeleccionada() {
    const file = photoInput.files[0];
    const reader = new FileReader();

    reader.onload = function(e) {
        profilePicture.src = e.target.result; // Mostrar la imagen seleccionada en la vista
    }

    reader.readAsDataURL(file);
}

// Función para mostrar el botón de guardar foto
function mostrarBotonGuardar() {
    guardarFotoBtn.style.display = 'block';
}

// Almacenar en sessionStorage cuando se haya guardado la foto
guardarFotoBtn.addEventListener('click', () => {
    sessionStorage.setItem('fotoGuardada', true);
    guardarFotoBtn.style.display = 'none'; // Ocultar el botón después de guardar la foto
});

// Ocultar el botón de guardar foto si la foto ya ha sido guardada
window.addEventListener('load', () => {
    const fotoGuardada = sessionStorage.getItem('fotoGuardada');
    if (fotoGuardada) {
        guardarFotoBtn.style.display = 'none';
    }
});

// Agregar evento de clic al botón "Editar perfil"
document.getElementById('editarPerfilBtn').addEventListener('click', () => {
    perfilEditado = true; // Marcar el perfil como editado
    openModal(); // Abrir el modal de edición de perfil
});
