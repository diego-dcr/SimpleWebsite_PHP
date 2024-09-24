<!DOCTYPE>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/styles/header.css">
    <link rel="stylesheet" href="../../assets/styles/slidingMenu.css">
    <link rel="stylesheet" href="../../assets/styles/branches.css">
    <link rel="stylesheet" href="../../assets/styles/login.css">
    <link rel="stylesheet" href="../../assets/styles/signUp.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title> Esquina 1015 Restaurant </title>
</head>

<body>
    <?php
        include ("../layouts/header.php");
    ?>
    <h1> Sucursales </h1>
    <div class="branches-container">
        <div class="card-branch">
            <img class="card-branch-img" src="../../assets/images/Restaurants/Restaurant1.jpg">
            <div class="card-branch-information">
                <h2 class="card-branch-title"> Esquina 1015 "Playa del Carmen"</h2>
                <p class="card-branch-address"> #1015 en esquina con Av. Ponciano Arriga y Av. Venustiano Carranza, Zona Centro. C.P. 77710. Quintana Roo, Playa del Carmen. </p>
            </div>
        </div>
        <div class="card-branch">
            <img class="card-branch-img" src="../../assets/images/Restaurants/Restaurant2.jpg">
            <div class="card-branch-information">
                <h2 class="card-branch-title"> Esquina 1015 "Calzada Guadalupe" </h2>
                <p class="card-branch-address"> #225, Calzada de Guadalupe a un costado de la Caja del Agua. Barrio de Guadalupe. C.P. 78359. San Luis Potosí, San Luis Potosí </p>
            </div>
        </div>
        <div class="card-branch">
            <img class="card-branch-img" src="../../assets/images/Restaurants/Restaurant3.jpg">
            <div class="card-branch-information">
                <h2 class="card-branch-title"> Esquina 1015 "La Roma" </h2>
                <p class="card-branch-address"> #1087, Av. Paseo de las rosas, Colonia Roma. C.P. 06700. Delegación Benito Juárez, CDMX. </p>
            </div>
        </div>
        <div id="space"></div>
    </div>
    <script src="../../assets/components/slidingMenu.js"></script>
</body>

</html>