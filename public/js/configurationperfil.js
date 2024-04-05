function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function () {
        var output = document.getElementById('profilePicture');
        output.src = reader.result;
        // Oculta el icono predeterminado
        document.getElementById('defaultProfileIcon').style.opacity = '0';
    };
    reader.readAsDataURL(event.target.files[0]);
}

function togglePassword(inputName, iconId) {
    var input = document.querySelector(`input[name="${inputName}"]`);
    var icon = document.getElementById(iconId);

    if (input.type === "password") {
        input.type = "text";
        icon.innerHTML = '<i class="far fa-eye-slash"></i>'; // Icono de ojo cerrado
    } else {
        input.type = "password";
        icon.innerHTML = '<i class="far fa-eye"></i>'; // Icono de ojo abierto
    }
}

