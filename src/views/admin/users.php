<!DOCTYPE>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/styles/header.css">
    <link rel="stylesheet" href="../../assets/styles/slidingMenu.css">
    <link rel="stylesheet" href="../../assets/styles/adminMenu.css">
    <link rel="stylesheet" href="../../assets/styles/users.css">
    <link rel="stylesheet" href="../../assets/styles/login.css">
    <link rel="stylesheet" href="../../assets/styles/signUp.css">
    <link rel="stylesheet" href="../../assets/styles/modal-add-product.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title> Esquina 1015 Restaurant </title>
</head>

<body>
    <?php
        include ("../layouts/header.php");
        include ("../layouts/headerAdmin.php");
    ?>
    <div id="users-controller">
        <div class="user-info-title">
            <div class="name-title">
                Nombre
            </div>
            <div class="mail-title">
                Correo Electrónico
            </div>
            <div class="phone-title">
                Teléfono
            </div>
            <div class="options-title"> Bloquear </div>
        </div>
    </div>
    <?php 
        include("../modals/modal-delete-users.php");
        include("../../assets/components/userControl.php");
    ?>
    <script src="../../assets/components/controlRegister.js"></script>
    <script src="../../assets/components/slidingMenu.js"></script>
</body>

</html>