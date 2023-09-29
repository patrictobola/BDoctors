const formField = document.getElementById('registration-form');
const nameField = document.getElementById('name');
const lastnameField = document.getElementById('last_name');
const addressField = document.getElementById('address');
// TODO verify
const specializationsField = document.getElementById('TODO');

const emailField = document.getElementById('email');
const passwordField = document.getElementById('password');
const confirmPasswordField = document.getElementById('password-confirm');
const clearErrors = {};
let errors = {};

passwordField.addEventListener('keyup', e => {
    
    if(passwordField.value.length < 8) {
        Object.assign(errors, {psw_characters:"La password deve contenere almeno 8 caratteri"});
        setTimeout(() => {
            passwordField.classList.add('is-invalid')
        }, "1500");       
    } else if(passwordField.value.length >= 8) {
        delete errors.psw_characters;
        passwordField.classList.remove('is-invalid')
    }  
    })
confirmPasswordField.addEventListener('keyup', e => {
    
    if(!(passwordField.value === confirmPasswordField.value)) {
        Object.assign(errors, {psw_typo:"Le due password devono essere uguali"});
        confirmPasswordField.classList.add('is-invalid');
    }
     else if (passwordField.value === confirmPasswordField.value)
     confirmPasswordField.classList.remove('is-invalid');
        delete errors.psw_typo;
    })

formField.addEventListener('submit', e => {
    e.preventDefault();
    console.log(Object.keys(errors).length)
    console.log(errors)
    if (Object.keys(errors).length === 0) formField.submit();
})