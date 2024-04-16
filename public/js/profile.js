function openModal() {
    document.getElementById("myModal").style.display = "block";
}

function closeModal() {
    document.getElementById("myModal").style.display = "none";
}

window.onclick = function(event) {
    var modal = document.getElementById("myModal");
    if (event.target == modal) {
        closeModal();
    }
}

const photoInput = document.getElementById('photoInput');
const guardarFotoBtn = document.getElementById('guardarFotoBtn');
const cancelarBtn = document.getElementById('cancelarBtn');
const profilePicture = document.getElementById('profilePicture');

let perfilEditado = true;

const profilePictureOverlayLabel = document.querySelector('.profile-picture-overlay label');
if (profilePictureOverlayLabel) {
    profilePictureOverlayLabel.addEventListener('click', function(event) {
        event.stopPropagation();
    });
}

photoInput.addEventListener('change', () => {
    console.log('Cambio detectado en el input de la foto');
    if (perfilEditado) {
        mostrarFotoSeleccionada();
        mostrarBotonGuardar();
    }
});

function mostrarFotoSeleccionada() {
    try {
        console.log('Mostrando foto seleccionada');
        const file = photoInput.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            profilePicture.src = e.target.result;
        }

        reader.readAsDataURL(file);
    } catch (error) {
        console.error('Error al mostrar la foto seleccionada:', error);
    }
}


function mostrarBotonGuardar() {
    guardarFotoBtn.style.display = 'block';
    cancelarBtn.style.display = 'block';
}

guardarFotoBtn.addEventListener('click', () => {
    localStorage.setItem('fotoGuardada', true);
    guardarFotoBtn.style.display = 'none'; // Ocultar el botón después de guardar la foto
    cancelarBtn.style.display = 'none'; // Ocultar el botón después de guardar la foto
});

window.addEventListener('load', () => {
    const fotoGuardada = localStorage.getItem('fotoGuardada');
    if (fotoGuardada) {
        guardarFotoBtn.style.display = 'none';
        cancelarBtn.style.display = 'none';
    }
});

document.getElementById('editarPerfilBtn').addEventListener('click', () => {
    perfilEditado = true;
    openModal();
});


function cancelUpdate() {
    window.history.back();
}
