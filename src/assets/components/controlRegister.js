var SignUp = document.getElementsByClassName("signUp-container")[0];
var loginForm = document.getElementsByClassName("login-container")[0];
var login = document.getElementById("Login-icon");
const loginShow = document.getElementsByClassName("login-menu-li");
const loginButtons = document.getElementsByClassName("login-button");
const signUpButtons = document.getElementsByClassName("signUp-button");
const loginInput = document.getElementById("login-mail");
const passwordInput = document.getElementById("login-password");
const signName = document.getElementById("sign-name");
const signMail = document.getElementById("sign-mail");
const signPassword = document.getElementById("sign-password");
const signPassword2 = document.getElementById("sign-password2");
const signPhone = document.getElementById("sign-phone");
var loginMenu = document.getElementsByClassName("login-menu")[0];

document.addEventListener("DOMContentLoaded", function() {
    controlLoginForm();
    controlSignUpForm();

    login.addEventListener("click", controlLogin);
    loginShow[0].addEventListener("click", controlSignUpForm);
    loginShow[1].addEventListener("click", controlLoginForm);
    signUpButtons[1].addEventListener("click", controlSignUpForm);
    loginInput.addEventListener("click", cleanMail);
    passwordInput.addEventListener("click", cleanPassword);
    loginButtons[1].addEventListener("click", controlLoginForm);
    signName.addEventListener("click", cleanName);
    signMail.addEventListener("click", cleanMailSign);
    signPassword.addEventListener("click", cleanPasswordSign);
    signPassword2.addEventListener("click", cleanPassword2Sign);
    signPhone.addEventListener("click", cleanPhoneSign);

});

function controlLoginForm() {
    if (loginForm.style.display != "none") {
        loginForm.style.display = "none";
    } else {
        loginForm.style.display = "flex";
    }
}

function controlSignUpForm() {
    if (SignUp.style.display != "none") {
        SignUp.style.display = "none";
    } else {
        SignUp.style.display = "flex";
    }
}

function controlLogin() {
    if (loginMenu.style.display != "block") {
        loginMenu.style.display = "block";
    } else {
        loginMenu.style.display = "none";
    }
}

function cleanMail() {
    loginInput.value = "";
}

function cleanPassword() {
    passwordInput.value = "";
}

function cleanName() {
    signName.value = "";
}

function cleanMailSign() {
    signMail.value = "";
}

function cleanPasswordSign() {
    signPassword.value = "";
}

function cleanPassword2Sign() {
    signPassword2.value = "";
}

function cleanPhoneSign() {
    signPhone.value = "";
}