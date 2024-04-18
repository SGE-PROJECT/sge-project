const publishButton = document.getElementById('publishButton');
const confirmButton = document.getElementById('confirmButton');
const modal = document.getElementById('modal');

publishButton.addEventListener('click', function() {
    // Abrir el modal de confirmación
    modal.classList.remove('hidden');
});

confirmButton.addEventListener('click', function() {
    // Cambiar el valor del campo "is_project" a 1
    document.querySelector('input[name="is_project"]').value = 1;
    // Cambiar el valor del campo "status" a "Publicado"
    document.querySelector('input[name="status"]').value = 'Publicado';
    // Enviar el formulario
    document.getElementById('projectForm').submit();
});
