<script>
    <?php
        session_start();
        echo "const typeUser =  '" . $_SESSION["tipo"] . "';";
    ?>
    
    var login = document.getElementById("Login-icon");
    var loginSlid = document.getElementById("login-sliding");
    var headerMenu = document.getElementsByClassName("header-menu")[0];
    var userPhoto = document.getElementById("User-photo");
    var adminIcon = document.getElementById("admin-icon");
    var adminIconSlid = document.getElementById("admin-icon-slid");
    
    document.addEventListener("DOMContentLoaded", function() {
        controlUser_img();
        controlAdminIcon();
        userPhoto.addEventListener("click", controlPhotoMenu);
    });
    
    function controlUser_img() {
        if (userPhoto.style.display != "initial") {
            userPhoto.style.display = "initial";
            login.style.display = "none";
            loginSlid.style.display = "none";
            headerMenu.style.justifyContent = "space-evenly";
        } else {
            userPhoto.style.display = "none";
            adminIcon.style.display = "none";
            adminIconSlid.style.display = "none";
        }
    }

    function controlAdminIcon() {
        if (typeUser == "admin") {
            adminIcon.style.display = "initial";
            adminIconSlid.style.display = "initial";
        }
    }
</script>