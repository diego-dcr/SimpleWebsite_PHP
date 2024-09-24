<!DOCTYPE>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/styles/header.css">
    <link rel="stylesheet" href="../../assets/styles/slidingMenu.css">
    <link rel="stylesheet" href="../../assets/styles/adminMenu.css">
    <link rel="stylesheet" href="../../assets/styles/products.css">
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
    <div class="to-add">
        <button id="add-product" onclick = controlModalAddProduct()>
            Agregar producto
        </button>
    </div>
    <div id="products-controller">
        <div class="product-info-title">
            <div class="name-title">
                Nombre
            </div>
            <div class="category-title">
                Categoria
            </div>
            <div class="description-title">
                Descripción
            </div>
            <div class="price-title">
                Precio
            </div>
            <div class="options-title"> Opciones </div>
        </div>
    </div>
    <?php 
        include("../modals/modal-add-product.php");
        include("../modals/modal-edit-product.php"); 
        include("../modals/modal-delete-products.php");
        include("../../assets/components/prodControl.php");
    ?>
    <script src="../../assets/components/slidingMenu.js"></script>
</body>

</html>