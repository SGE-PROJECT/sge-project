
document.addEventListener("DOMContentLoaded", function() {
    const editPermissionsBtns = document.querySelectorAll(".edit-permissions-btn");
    const permissionsContainer = document.querySelectorAll(".permissions-container");
    const cancelBtns = document.querySelectorAll(".cancel-btn");
    const cardsContainer = document.querySelector(".cards-container");

    editPermissionsBtns.forEach((btn, index) => {
        btn.addEventListener("click", function(event) {
            event.preventDefault();
            const cardId = btn.dataset.card;
            const selectedCard = document.getElementById(cardId);
            const selectedPermissionsContainer = permissionsContainer[index];

            // Ocultar todas las tarjetas excepto la seleccionada
            cardsContainer.querySelectorAll(".card").forEach(card => {
                if (card !== selectedCard) {
                    card.style.display = "none";
                }
            });

            // Ocultar el botón de editar permisos dentro de la tarjeta seleccionada
            selectedCard.querySelector(".edit-permissions-btn").style.display = "none";
            // Ocultar el título
            document.querySelector("h1").style.visibility = "hidden";
            // Mostrar la lista de permisos correspondiente a la tarjeta seleccionada
            selectedPermissionsContainer.classList.remove("hidden");
        });
    });

    cancelBtns.forEach(cancelBtn => {
        cancelBtn.addEventListener("click", function(event) {
            event.preventDefault();
            // Mostrar el título
            document.querySelector("h1").style.visibility = "visible";
            // Mostrar todas las tarjetas
            cardsContainer.querySelectorAll(".card").forEach(card => {
                card.style.display = "flex";
            });
            // Mostrar todos los botones de editar permisos
            editPermissionsBtns.forEach(btn => {
                btn.style.display = "block";
            });

            // Ocultar todas las secciones de permisos
            permissionsContainer.forEach(container => {
                container.classList.add("hidden");
            });
        });
    });
});
