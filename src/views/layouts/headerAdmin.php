<?php
    session_start();
    if(array_key_exists("tipo", $_SESSION)) {
        if($_SESSION["tipo"] === "user") {
            echo'<script type="text/javascript">
                window.location.href="../../index.php";
                alert("No tienes permisos para acceder a esta página");
            </script>'; 
        }
    }
?>

<div class="admin-container">
    <div class="admin-menu">
        <ul class="admin-menu-list">
            <li><a href="../admin/users.php">Usuarios</a></li>
            <li><a href="../admin/products.php">Productos</a></li>
            <li><a href="../admin/reservationsControl.php">Reservaciones</a></li>
            <li><a href="../admin/opinions.php">Opiniones</a></li>
        </ul>
    </div>
</div>