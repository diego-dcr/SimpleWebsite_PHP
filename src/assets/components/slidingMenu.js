function controlSlidingMenu() {
    var slidingMenu = document.getElementsByClassName("sliding-menu-container");
    if (slidingMenu[0].style.display != "none") {
        slidingMenu[0].style.display = "none";
    } else {
        slidingMenu[0].style.display = "flex";
    }
}

function controlSlidingMenuProducts() {
    var productMenu = document.getElementsByClassName("sub-nav-list");
    if (productMenu[0].style.display != "none") {
        productMenu[0].style.display = "none";
    } else {
        productMenu[0].style.display = "flex";
    }
}

function controlSlidingMenuMore() {
    var moreMenu = document.getElementsByClassName("sub-nav-more");
    if (moreMenu[0].style.display != "none") {
        moreMenu[0].style.display = "none";
    } else {
        moreMenu[0].style.display = "flex";
    }
}

function controlSlidingMenuLogin() {
    var loginMenu = document.getElementsByClassName("login-sliding-menu");
    if (loginMenu[0].style.display != "none") {
        loginMenu[0].style.display = "none";
    } else {
        loginMenu[0].style.display = "flex";
    }
}

function controlLoginForm() {
    var loginForm = document.getElementsByClassName("login-container");
    if (loginForm[0].style.display != "none") {
        loginForm[0].style.display = "none";
    } else {
        loginForm[0].style.display = "flex";
    }
}

function controlSignUpForm() {
    var SignUp = document.getElementsByClassName("signUp-container");
    if (SignUp[0].style.display != "none") {
        SignUp[0].style.display = "none";
    } else {
        SignUp[0].style.display = "flex";
    }
}

function modifySlidingMenu() {
    var slidingMenu = document.getElementById("Menu-bars");
    var products = document.getElementsByClassName("nav-item");
    var loginButton = document.getElementById("login-sliding");
    var closeSlidingMenu = document.getElementById("close-sliding-menu");
    var loginShow = document.getElementsByClassName("login-sliding-menu-li");

    controlSlidingMenu();
    controlSlidingMenuProducts();
    controlSlidingMenuMore();
    controlSlidingMenuLogin();

    slidingMenu.addEventListener("click", controlSlidingMenu);
    closeSlidingMenu.addEventListener("click", controlSlidingMenu);
    products[0].addEventListener("click", controlSlidingMenuProducts);
    products[products.length - 1].addEventListener("click", controlSlidingMenuMore);
    loginButton.addEventListener("click", controlSlidingMenuLogin);

    loginShow[0].addEventListener("click", controlSignUpForm);
    loginShow[1].addEventListener("click", controlLoginForm);
}

document.addEventListener("DOMContentLoaded", function() {
    modifySlidingMenu();
});