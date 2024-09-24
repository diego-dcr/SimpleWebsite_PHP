var error = document.getElementById('error');

function errorMail() {
    error.innerHTML = 'Usuario incorrecto';
    error.style.display = 'block';
}

function errorPassword() {
    error.innerHTML = 'Contraseña incorrecta';
    error.style.display = 'block';
}