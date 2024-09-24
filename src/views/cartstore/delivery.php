<!DOCTYPE>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/styles/header.css">
    <link rel="stylesheet" href="../../assets/styles/slidingMenu.css">
    <link rel="stylesheet" href="../../assets/styles/delivery.css">
    <link rel="stylesheet" href="../../assets/styles/login.css">
    <link rel="stylesheet" href="../../assets/styles/signUp.css">
    <link rel="stylesheet" href="../../assets/styles/payment.css">
    <link rel="stylesheet" href="../../assets/styles/modal-add-product.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title> Esquina 1015 Restaurant </title>
</head>

<body>
    <?php
        include ("../layouts/header.php");
    ?>
    <form class="delivery-form"  action="../../controllers/deliveryController.php" method="POST" autocomplete="off" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="POST">
        <input type="text" value="Dirección" class="delivery-info" name="deliveryDirection" id="deliveryDirection"/>
        <input type="hidden" name="deliveryPrice" value="" id="deliveryPrice">
        <div class="special-info">
            <input type="text" value="Agregar una nota" class="delivery-info" name="deliveryNote" id="deliveryNote"/>
            <a id="payment-button">
                <i class="fa fa-credit-card" aria-hidden="true"></i> Método de pago
            </a>
            <input type="hidden" name="deliveryCard" value="" id="deliveryCard">
            <div id="cards-container">
                <div class="card-list-form">
                    <div class="card-list"></div>
                    <div class="card-form-buttons">
                        <button type="button" class="card-form-button" id="agregarC"> Agregar Tarjeta </button>
                        <button type="button" class="card-form-button" id="aceptarC"> Aceptar </button>
                        <button type="button" class="card-form-button" id="cancelarC"> Cancelar </button>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="deliveryCant" value="" id="deliveryCant">
        <input type="hidden" name="deliveryDescription" value="" id="deliveryDescription">
        <div id="delivery-resume"> </div>
        <div class="buttons-resume">
            <button id="button-confirm" type="submit"> Confirmar </button>
            <button id="button-cancel" type="button"> Cancelar </button>
        </div>
    </form>
    <?php
        include ("../modals/modal-payment.php");
        include ("../modals/modal-delete-cardPay.php");
    ?>
    <div class="message-container">
        <div class="message">
            <p>
                Hemos confirmado exitosamente tu pedido.
                <br> El tiempo de espera promedio es de 45 minutos.
                <br> Una vez, el repartidor se encuentre cerca de su dirección se pondrá en contacto.
            </p>
        </div>
    </div>
    <script src="../../assets/components/payment.js"></script>
    <script src="../../assets/components/paintCardPay.js"></script>
    <script src="../../assets/components/showFinalPrice.js"></script>
    <script src="../../assets/components/slidingMenu.js"></script>
</body>

</html>