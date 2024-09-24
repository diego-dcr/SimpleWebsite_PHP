<?php
    session_start();
    if(!array_key_exists("mail", $_SESSION)) {
        echo "<script>
            window.location.href = '../../index.php';
            alert('No has iniciado sesión');
        </script>";
        exit();
    }
?>
<header class="Encabezado">
    <a href="../../index.php"><img src="../../assets/images/Logo.png" id="Logo"></a>
    <div class="header-menu">
        <div class="Nav-bar">
            <ul class="Nav">
                <li class="Nav-li"><a class="Nav-a" href="#!">Productos</a></li>
                <ul class="sub-Nav-bar">
                    <li class="sub-Nav-li"><a class="sub-Nav-a" href="../products/appetizers.php">Entradas</a></li>
                    <li class="sub-Nav-li"><a class="sub-Nav-a" href="../products/main_food.php">Platos fuertes</a></li>
                    <li class="sub-Nav-li"><a class="sub-Nav-a" href="../products/desserts.php">Postres</a></li>
                    <li class="sub-Nav-li"><a class="sub-Nav-a" href="../products/beverages.php">Bebidas</a></li>
                </ul>
                <li class="Nav-li"><a class="Nav-a" href="../others/branches.php">Sucursales</a></li>
                <li class="Nav-li"><a class="Nav-a" href="../others/contacts.php">Contactanos</a></li>
                <li class="Nav-li"><a class="Nav-a" href="#!">Mas</a></li>
                <ul class="sub-Nav-extra">
                    <li class="sub-Nav-extra-li"><a class="sub-Nav-extra-a" href="../others/reservations.php">Reservaciones</a></li>
                    <li class="sub-Nav-extra-li"><a class="sub-Nav-extra-a">Menú Digital</a></li>
                </ul>
            </ul>
        </div>
        <div class="Nav-buttons">
            <a href="../cartstore/productlist.php" id="Cart">
                <i class="fa fa-shopping-cart"></i>
                <span id="badge">0</span>
            </a>
            <a href="#!" id="Login-icon"><i class="fas fa-sign-in-alt"></i></a>
            <ul class="login-menu">
                <li class="login-menu-li"><a class="login-menu-a" href="#!">Registrarse</a></li>
                <li class="login-menu-li"><a class="login-menu-a" href="#!">Iniciar Sesión</a></li>
            </ul>
            <a href="../admin/users.php" id="admin-icon"><i class="fa fa-cogs" aria-hidden="true"></i> </a>
        </div>
    </div>
    <?php
        echo "<img src = data:image/jpeg;base64," . $_SESSION['foto'] . " id = 'User-photo'>";
    ?>
    <a href="#!" id="Menu-bars"><i class="fa fa-bars" aria-hidden="true"></i></a>
    <ul class="photo-menu">
        <!--li class="photo-menu-li"><a class="photo-menu-a" href="#!">Mi cuenta</a></li-->
        <?php
            include ("../modals/modal-delete-session.php");
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
                    <li class="sub-nav-item"><a class="sub-nav-item-a" href="../products/appetizers.php">Entradas</a></li>
                    <li class="sub-nav-item"><a class="sub-nav-item-a" href="../products/main_food.php">Platos fuertes</a></li>
                    <li class="sub-nav-item"><a class="sub-nav-item-a" href="../products/desserts.php">Postres</a></li>
                    <li class="sub-nav-item"><a class="sub-nav-item-a" href="../products/beverages.php">Bebidas</a></li>
                </ul>
                <li class="nav-item"><a class="nav-item-a" href="../others/branches.php">Sucursales</a></li>
                <li class="nav-item"><a class="nav-item-a" href="../others/contacts.php">Contactanos</a></li>
                <li class="nav-item"><a class="nav-item-a" href="#!">Mas</a></li>
                <ul class="sub-nav-more">
                    <li class="sub-nav-more-li"><a class="sub-nav-more-a" href="../others/reservations.php">Reservaciones</a></li>
                    <li class="sub-nav-more-li"><a class="sub-nav-more-a">Menú Digital</a></li>
                </ul>
            </ul>
        </div>
        <div class="sliding-menu-buttons">
            <a href="../cartstore/productlist.php" id="cart-sliding">
                <i class="fa fa-shopping-cart"></i>
                <span id="badge-slid">0</span>
            </a>
            <a href="#!" id="login-sliding"><i class="fas fa-sign-in-alt"></i></a>
            <ul class="login-sliding-menu">
                <li class="login-sliding-menu-li"><a class="login-sliding-menu-a" href="#!">Registrarse</a></li>
                <li class="login-sliding-menu-li"><a class="login-sliding-menu-a" href="#!">Iniciar Sesión</a></li>
            </ul>
            <a href="../../views/admin/users.php" id="admin-icon-slid"><i class="fa fa-cogs" aria-hidden="true"></i></a>
        </div>
    </div>
</div>

<?php
    if(array_key_exists("mail", $_SESSION)) {
        include("../../assets/components/ctrlUserphoto.php");
    }
    include ("../../assets/components/header.php");
?>
