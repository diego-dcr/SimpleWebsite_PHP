<script>
    <?php
        session_start();
        echo "const keyList = 'productList" . $_SESSION['id'] . "';";
    ?>
    const nav = document.getElementsByClassName("Nav-a");
    const cart = document.getElementById("Cart");
    var subnav = document.getElementsByClassName("sub-Nav-bar");
    var subnavEx = document.getElementsByClassName("sub-Nav-extra");
    var photoMenu = document.getElementsByClassName("photo-menu")[0];
    var userPhoto = document.getElementById("User-photo");
    var badge = document.getElementById("badge");
    var badgeSlid = document.getElementById("badge-slid");

    
    function dropdownMenu() {
        if (subnav[0].style.display == "none") {
            nav[0] = setNavStyle(nav[0], 1);
        } else {
            nav[0] = setNavStyle(nav[0], 0);
        }
        subnav[0] = setSubNavStyle(subnav[0], nav[0]);
    }
    
    //Mas
    function dropdownMenuExtra() {
        var subnavEx = document.getElementsByClassName("sub-Nav-extra");
        if (subnavEx[0].style.display == "none") {
            nav[nav.length - 1] = setNavStyle(nav[nav.length - 1], 1);
        } else {
            nav[nav.length - 1] = setNavStyle(nav[nav.length - 1], 0);
        }
        subnavEx[0] = setSubNavExtraStyle(subnavEx[0], nav[nav.length - 1]);
    }
    
    function setNavStyle(nav, op) {
        nav.style.borderRadius = "3px 3px 0 0";
        if (op != 0) {
            nav.style.color = "#131313";
            nav.style.backgroundColor = "#E7BD70";
            nav.style.border = "1px solid black";
            nav.style.padding = "3px 3px 15px 3px";
        } else {
            nav.style.color = "#E7BD70";
            nav.style.backgroundColor = "#131313";
            nav.style.borderColor = "transparent";
        }
        return nav;
    }
    
    function hoverStyle() {
        if (subnav[0].style.display != "flex") {
            nav[0].style.color = "#131313";
            nav[0].style.backgroundColor = "#E7BD70";
            nav[0].style.borderColor = "#E7BD70";
            nav[0].style.padding = "3px"
        }
    }
    
    function hoverStyleExtra() {
        if (subnavEx[0].style.display != "flex") {
            nav[nav.length - 1].style.color = "#131313";
            nav[nav.length - 1].style.backgroundColor = "#E7BD70";
            nav[nav.length - 1].style.borderColor = "#E7BD70";
            nav[nav.length - 1].style.padding = "3px"
        }
    }
    
    function resetHoverStyle() {
        if (subnav[0].style.display != "flex") {
            nav[0] = setNavStyle(nav[0], 0);
        }
    }
    
    function resetHoverStyleExtra() {
        if (subnavEx[0].style.display != "flex") {
            nav[nav.length - 1] = setNavStyle(nav[nav.length - 1], 0);
        }
    }
    
    function setSubNavStyle(subNav, nav) {
        subNav.style.backgroundColor = "#E7BD70";
        subNav.style.borderRadius = "0 3px 3px 3px";
        subNav.style.left = nav.getBoundingClientRect().left + 1; //crea el submenu 'productos' en la posicion justa
        controlSubMenu();
        return subNav;
    }
    
    function setSubNavExtraStyle(subNav, nav) {
        subNav.style.backgroundColor = "#E7BD70";
        subNav.style.borderRadius = "0 3px 3px 3px";
        subNav.style.left = nav.getBoundingClientRect().left + 1; //crea el submenu 'productos' en la posicion justa
        controlSubMenuExtra();
        return subNav;
    }
    
    function hoverStyleCart() {
        cart.style.color = "#FF0046";
    }
    
    function resethoverStyleCart() {
        cart.style.color = "whitesmoke";
    }
    
    function controlSubMenu() {
        if (subnav[0].style.display != "none") {
            subnav[0].style.display = "none";
        } else {
            subnav[0].style.display = "flex";
        }
    }
    
    function controlSubMenuExtra() {
        if (subnavEx[0].style.display != "none") {
            subnavEx[0].style.display = "none";
        } else {
            subnavEx[0].style.display = "flex";
        }
    }
    
    function controlPhotoMenu() {
        if (photoMenu.style.display != "none") {
            photoMenu.style.display = "none";
        } else {
            photoMenu.style.display = "flex";
        }
    }
    
    function controlBadge() {
        let list = JSON.parse(localStorage.getItem(keyList));
    
        if (list !== null) {
            badge.innerHTML = list.length;
        }
    }

    function controlBadgeSlid() {
        let list = JSON.parse(localStorage.getItem(keyList));
    
        if (list !== null) {
            badgeSlid.innerHTML = list.length;
        }
    }
    
    function modifyMenu() {
    
        controlSubMenu();
        controlSubMenuExtra();
        controlPhotoMenu();
        controlBadge();
        controlBadgeSlid();
    
        nav[0].addEventListener("click", dropdownMenu);
        nav[0].addEventListener("mouseover", hoverStyle);
        nav[0].addEventListener("mouseout", resetHoverStyle);
    
        nav[nav.length - 1].addEventListener("click", dropdownMenuExtra);
        nav[nav.length - 1].addEventListener("mouseover", hoverStyleExtra);
        nav[nav.length - 1].addEventListener("mouseout", resetHoverStyleExtra);
    
        cart.addEventListener("mouseover", hoverStyleCart);
        cart.addEventListener("mouseout", resethoverStyleCart);
    }
    
    document.addEventListener("DOMContentLoaded", function() {
        modifyMenu();
    });

</script>