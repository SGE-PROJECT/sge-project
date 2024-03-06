const modal = document.getElementById('modal');
const openModalButton = document.getElementById('openModalButton');
const closeModalButton = document.getElementById('closeModalButton');
const cancelButton = document.getElementById('cancelButton');

function openModal() {
    modal.classList.remove('hidden');
}

function closeModal() {
    modal.classList.add('hidden');
}

openModalButton.addEventListener('click', function(event){
    event.preventDefault(); 
    openModal();
});

cancelButton.addEventListener('click', closeModal);
closeModalButton.addEventListener('click', closeModal);
