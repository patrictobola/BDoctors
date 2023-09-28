// Variabile d'appoggio per tenere traccia del modulo attivo
let activeForm = null;

// Raccogliamo la modale
const modal = document.getElementById('modal');
const modalBody = modal.querySelector('.modal-body');
const modalTitle = modal.querySelector('.modal-title');
const modalConfirmButton = modal.querySelector('.confirmation-button');

// Selezionamo tutti i form con classe "delete-form"
const deleteForms = document.querySelectorAll('.delete-form');
deleteForms.forEach(form => {
    form.addEventListener('submit', e => {
        // Impediamo l'invio automatico del modulo
        e.preventDefault();

        // Compiliamo i dati della modale
        modalConfirmButton.innerText = 'Conferma';
        modalConfirmButton.classList.add('btn-danger');
        modalTitle.innerText = 'Eliminazione Profilo';
        modalBody.innerText = 'Sei sicuro di voler cancellare questo Profilo?';

        // Memorizziamo il form attivo
        activeForm = form;

        // Apriamo la modale
        new bootstrap.Modal(modal).show();
    });
});

modalConfirmButton.addEventListener('click', () => {
    if (activeForm) {
        // Inviamo il modulo solo quando l'utente conferma
        activeForm.submit();
    }
});

// Resettiamo la variabile activeForm quando la modale viene chiusa
modal.addEventListener('hidden.bs.modal', () => {
    activeForm = null;
});