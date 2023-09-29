const formField = document.getElementById('registration-form');
const nameField = document.getElementById('name');
const lastnameField = document.getElementById('last_name');
const addressField = document.getElementById('address');
const specializationsField = document.querySelectorAll('.specializations');
const emailField = document.getElementById('email');
const passwordField = document.getElementById('password');
const confirmPasswordField = document.getElementById('password-confirm');

// ErrorField 
const nameErrorField = document.getElementById('name-errorField')
const lastNameErrorField = document.getElementById('last-name-errorField')
const specErrorField = document.getElementById('spec-errorField')
const pswErrorField = document.getElementById('psw-errorField')
const confirmPswErrorField = document.getElementById('confirmPsw-errorField')

const avaibleLetters = /^[A-Za-z\s]*$/;

const clearErrors = {};
let errors = {};
let selected_specializations = []

// Controllo se il nome è valido
nameField.addEventListener('keyup', e =>{
    if(!nameField.value.match(avaibleLetters)) {
        Object.assign(errors, {name:"Puoi inserire solo lettere"})
        nameErrorField.classList.remove('d-none')
        nameErrorField.classList.add('d-block')
        nameErrorField.innerHTML = `<span class="text-danger">${errors.name}</span>`
    }
    else {
        delete errors.name
        nameErrorField.classList.add('d-none')
    }
})
// Controllo se il cognome è valido
lastnameField.addEventListener('keyup', e =>{
    if(!lastnameField.value.match(avaibleLetters)) {
        Object.assign(errors, {last_name:"Puoi inserire solo lettere"})
        lastNameErrorField.classList.remove('d-none')
        lastNameErrorField.classList.add('d-block')
        lastNameErrorField.innerHTML = `<span class="text-danger">${errors.last_name}</span>`
    }
    else {
        delete errors.name
        lastNameErrorField.classList.add('d-none')

    }
})

// specializationsField.addEventListener('click', e => {
//         console.log("yo")
// })
selected_specializations =
    Array.from(specializationsField) // Converto i checkbox in un array per usare filter.
    .filter(i => i.checked) // Uso il filter per rimuovere tutti i checkbox non selezionati.
    .map(i => i.value);

// Validation specializations 
if (selected_specializations.length === 0){
    Object.assign(errors, {specializations:"Devi aver selezionato almeno una specializzazione"})
}



specializationsField.forEach(spec => {
    spec.addEventListener('change', e => {
        selected_specializations = 
            Array.from(specializationsField) // Converto i checkbox in un array per usare filter.
            .filter(i => i.checked) // Uso il filter per rimuovere tutti i checkbox non selezionati.
            .map(i => i.value)
            
            
        
        if (selected_specializations.length === 0){
            for (const spec of specializationsField) {
                spec.classList.add('is-invalid');
            }
            Object.assign(errors, {specializations:"Devi aver selezionato almeno una specializzazione"})
            specErrorField.classList.remove('d-none')
            specErrorField.classList.add('d-block')
            specErrorField.innerHTML = `<span class="text-danger">${errors.specializations}</span>`
        }
        if (selected_specializations.length) {
            for (const spec of specializationsField) {
                spec.classList.remove('is-invalid');
            }
            specErrorField.classList.add('d-none')
            specErrorField.classList.remove('d-block')
            delete errors.specializations;
        }
    })
})


// Timeout function for error in psw 



// Password validation
passwordField.addEventListener('keyup', e => {
    if(passwordField.value.length < 8){
        Object.assign(errors, {psw_characters:"La password deve contenere almeno 8 caratteri"});
    }
    const errorTimeout = setTimeout(() => {
        if(passwordField.value.length < 8) {
            passwordField.classList.add('is-invalid')
            pswErrorField.classList.remove('d-none')
            pswErrorField.classList.add('d-block')
            pswErrorField.innerHTML = `<span class="text-danger">${errors.psw_characters}</span>`      
        }}, "1500");
    
        if(passwordField.value.length >= 8) {
            clearTimeout(errorTimeout);
            delete errors.psw_characters;
            passwordField.classList.remove('is-invalid')
            pswErrorField.classList.add('d-none')
            pswErrorField.classList.remove('d-block')
        }  
})
confirmPasswordField.addEventListener('keyup', e => {
    
    if(!(passwordField.value === confirmPasswordField.value)) {
        Object.assign(errors, {psw_typo:"Le due password devono essere uguali"});
        confirmPasswordField.classList.add('is-invalid');
        confirmPswErrorField.classList.remove('d-none')
        confirmPswErrorField.classList.add('d-block')
        confirmPswErrorField.innerHTML = `<span class="text-danger">${errors.psw_typo}</span>`
    }
     else if (passwordField.value == confirmPasswordField.value){
        confirmPasswordField.classList.remove('is-invalid');
        delete errors.psw_typo;
        confirmPswErrorField.classList.add('d-none')
        confirmPswErrorField.classList.remove('d-block')
    }
    })


// Button prevent to submit if he founds errors 
formField.addEventListener('submit', e => {
    e.preventDefault();
    // Aggiungo la classe is invalid se non viene compilato nessun campo 
    if (selected_specializations.length === 0){
        for (const spec of specializationsField) {
            spec.classList.add('is-invalid');
        }
        specErrorField.classList.remove('d-none')
        specErrorField.classList.add('d-block')
        specErrorField.innerHTML = `<span class="text-danger">${errors.specializations}</span>`
    }

    // Se è tutto ok mando il form 
    if (Object.keys(errors).length === 0) formField.submit();
})