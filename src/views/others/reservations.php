<!DOCTYPE>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/styles/header.css">
    <link rel="stylesheet" href="../../assets/styles/slidingMenu.css">
    <link rel="stylesheet" href="../../assets/styles/reservations.css">
    <link rel="stylesheet" href="../../assets/styles/login.css">
    <link rel="stylesheet" href="../../assets/styles/signUp.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title> Esquina 1015 Restaurant </title>
</head>

<body>
    <?php
        include ("../layouts/header.php");
    ?>
    <form class="reservation-form" action="../../controllers/reservsController.php" method="POST" autocomplete="off" enctype="multipart/form-data">
        <legend class="login-title"> Reservaciones </legend>
        <input type="text" value="Nombre" class="form-reservation" name="reservName" id="reservName" required/>
        <input type="text" value="Teléfono" class="form-reservation" name="reservPhone" id="reservPhone" required/>
        <input type="text" value="Fecha" class="form-reservation" name="reservDate" id="reservDate" required/>
        <div class="branches-form">
            <label for="reservBranches">Sucursales: </label>
            <select id="branches" name="reservBranches" required>
                <option value="QRoo_PC">Playa del Carmen</option>
                <option value="SLP_CG">Calz. de Guadalupe</option>
                <option value="CDMX_LR">La Roma</option>
            </select>
        </div>
        <div class="special-info-form">
            <div class="persons-form">
                <label for="reservNoPersons"> No. Personas: </label>
                <input type="number" min="1" max="12" name="reservNoPersons" class="form-reservation" required>
            </div>
            <div class="schedules-form">
                <label for="reservSchedules">Horarios: </label>
                <select name="reservSchedules" id="schedules" required>
                    <option value="12:00pm">12:00pm</option>
                    <option value="1:00pm">1:00pm</option>
                    <option value="2:00pm">2:00pm</option>
                    <option value="3:00pm">3:00pm</option>
                    <option value="4:00pm">4:00pm</option>
                    <option value="5:00pm">5:00pm</option>
                    <option value="6:00pm">6:00pm</option>
                    <option value="7:00pm">7:00pm</option>
                    <option value="8:00pm">8:00pm</option>
                    <option value="9:00pm">9:00pm</option>
                </select>
            </div>
        </div>
        <div class="reserv-form-buttons">
            <input type="submit" value="Reservar" onclick="setDate()"/>
            <input type="button" value="Cancelar" />
        </div>
    </form>
    <?php
        include ("../../assets/components/reservStyle.php");
    ?>
    <script src="../../assets/components/slidingMenu.js"></script>
</body>

</html>