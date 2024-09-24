<!DOCTYPE>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/header.css">
    <link rel="stylesheet" href="assets/styles/slidingMenu.css">
    <link rel="stylesheet" href="assets/styles/container.css">
    <link rel="stylesheet" href="assets/styles/login.css">
    <link rel="stylesheet" href="assets/styles/signUp.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title> Esquina 1015 Restaurant </title>
</head>

<body>
    <?php
        session_start();
    ?>
    <header class="Encabezado">
        <a href="index.php"><img src="assets/images/Logo.png" id="Logo"></a>
        <div class="header-menu">
            <div class="Nav-bar">
                <ul class="Nav">
                    <li class="Nav-li"><a class="Nav-a" href="#!">Productos</a></li>
                    <ul class="sub-Nav-bar">
                        <li class="sub-Nav-li"><a class="sub-Nav-a" href="views/products/appetizers.php">Entradas</a></li>
                        <li class="sub-Nav-li"><a class="sub-Nav-a" href="views/products/main_food.php">Platos fuertes</a></li>
                        <li class="sub-Nav-li"><a class="sub-Nav-a" href="views/products/desserts.php">Postres</a></li>
                        <li class="sub-Nav-li"><a class="sub-Nav-a" href="views/products/beverages.php">Bebidas</a></li>
                    </ul>
                    <li class="Nav-li"><a class="Nav-a" href="views/others/branches.php">Sucursales</a></li>
                    <li class="Nav-li"><a class="Nav-a" href="views/others/contacts.php">Contactanos</a></li>
                    <li class="Nav-li"><a class="Nav-a" href="#!">Mas</a></li>
                    <ul class="sub-Nav-extra">
                        <li class="sub-Nav-extra-li"><a class="sub-Nav-extra-a" href="views/others/reservations.php">Reservaciones</a></li>
                        <li class="sub-Nav-extra-li"><a class="sub-Nav-extra-a">Menú Digital</a></li>
                    </ul>
                </ul>
            </div>
            <div class="Nav-buttons">
                <a href="views/cartstore/productlist.php" id="Cart">
                    <i class="fa fa-shopping-cart"></i>
                    <span id="badge">0</span>
                </a>
                <a href="#!" id="Login-icon"><i class="fas fa-sign-in-alt"></i></a>
                <ul class="login-menu">
                    <li class="login-menu-li"><a class="login-menu-a" href="#!">Registrarse</a></li>
                    <li class="login-menu-li"><a class="login-menu-a" href="#!">Iniciar Sesión</a></li>
                </ul>
                <a href="views/admin/users.php" id="admin-icon"><i class="fa fa-cogs" aria-hidden="true"></i></a>
            </div>
        </div>
        <?php
            echo "<img src = data:image/jpeg;base64," . $_SESSION['foto'] . " id = 'User-photo'>";
        ?>
        <a href="#!" id="Menu-bars"><i class="fa fa-bars" aria-hidden="true"></i></a>
        <ul class="photo-menu">
            <!--li class="photo-menu-li"><a class="photo-menu-a" href="#!">Mi cuenta</a></li-->
            <?php
                include ("views/modals/modal-delete-session-index.php");
            ?>
        </ul>
    </header>
    <div class="sliding-menu-container">
        <div class="sliding-menu">
            <i id="close-sliding-menu" class="fa fa-window-close" aria-hidden="true"></i>
            <div class="sliding-menu-nav-bar">
                <ul class="nav-list">
                    <li class="nav-item"><a class="nav-item-a" href="#!">Productos</a></li>
                    <ul class="sub-nav-list">
                        <li class="sub-nav-item"><a class="sub-nav-item-a" href="views/products/appetizers.php">Entradas</a></li>
                        <li class="sub-nav-item"><a class="sub-nav-item-a" href="views/products/main_food.php">Platos fuertes</a></li>
                        <li class="sub-nav-item"><a class="sub-nav-item-a" href="views/products/desserts.php">Postres</a></li>
                        <li class="sub-nav-item"><a class="sub-nav-item-a" href="views/products/beverages.php">Bebidas</a></li>
                    </ul>
                    <li class="nav-item"><a class="nav-item-a" href="views/others/branches.php">Sucursales</a></li>
                    <li class="nav-item"><a class="nav-item-a" href="views/others/contacts.php">Contactanos</a></li>
                    <li class="nav-item"><a class="nav-item-a" href="#!">Mas</a></li>
                    <ul class="sub-nav-more">
                        <li class="sub-nav-more-li"><a class="sub-nav-more-a" href="views/others/reservations.php">Reservaciones</a></li>
                        <li class="sub-nav-more-li"><a class="sub-nav-more-a">Menú Digital</a></li>
                    </ul>
                </ul>
            </div>
            <div class="sliding-menu-buttons">
                <a href="views/cartstore/productlist.php" id="cart-sliding">
                    <i class="fa fa-shopping-cart"></i>
                    <span id="badge-slid">0</span>
                </a>
                <a href="#!" id="login-sliding"><i class="fas fa-sign-in-alt"></i></a>
                <ul class="login-sliding-menu">
                    <li class="login-sliding-menu-li"><a class="login-sliding-menu-a" href="#!">Registrarse</a></li>
                    <li class="login-sliding-menu-li"><a class="login-sliding-menu-a" href="#!">Iniciar Sesión</a></li>
                </ul>
                <a href="views/admin/users.php" id="admin-icon-slid"><i class="fa fa-cogs" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <div class="container">
        <img src="assets/images/Restaurant_Images/ImgPrincipal.webp" id="Princ-img">
        <p class="date-fund">
            Fundado desde 1975 con el apoyo y el cariño familiar.
        </p>
        <p class="rest-info">
            Con un alto nivel culinario, en el que todas personas pueden satisfacer su paladar al suave danzón de la gastronomía mexicana.
            <br> Alberga una gran variedad de platillos que van desde las frondosas tierras del sur hasta el árido norte de la república mexicana.
            <br> Esquina 1015 siempre se esmera por crear experiencias culinarias inolvidables entre sus clientes, mejorar los momentos familiares y llevar el sazón de México a cada hogar.
        </p>
        <div class="img-container">
            <img id="scroll-img" src="assets/images/Restaurant_Images/pCom1.jpeg">
            <img id="scroll-img" src="assets/images/Restaurant_Images/diseñoHuasteco.jpg">
            <img id="scroll-img" src="assets/images/Restaurant_Images/pCom2.jpg">
            <img id="scroll-img" src="assets/images/Restaurant_Images/pCom3.webp">
            <img id="scroll-img" src="assets/images/Restaurant_Images/pCom4.jpg">
        </div>
        <div id="opinion-container"></div>
    </div>
    
    <?php
        if(array_key_exists("mail", $_SESSION)) {
            include ("assets/components/ctrlUserphoto.php");
        }
        include("views/modals/modal-login.php");
        include("views/modals/modal-signup.php");
        include("assets/components/header.php");
        include("assets/components/paintOpinions.php");
    ?>
    <script src="assets/components/errorLogins.js"></script>
    <script src="assets/components/controlRegister.js"></script>
    <script src="assets/components/slidingMenu.js"></script>
</body>

</html>