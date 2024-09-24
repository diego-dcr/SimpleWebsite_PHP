<!DOCTYPE>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/styles/header.css">
    <link rel="stylesheet" href="../../assets/styles/slidingMenu.css">
    <link rel="stylesheet" href="../../assets/styles/contacts.css">
    <link rel="stylesheet" href="../../assets/styles/login.css">
    <link rel="stylesheet" href="../../assets/styles/signUp.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title> Esquina 1015 Restaurant </title>
</head>

<body>
    <?php
        include ("../layouts/header.php");
    ?>
    <h1> Contacta con nosotros </h1>
    <div class="contact-container">
        <p class="contact-container-desc"> Únete a nosotros en las redes sociales para obtener inspiración culinaria, receras deliciosas y las últimas noticias y actualizaciones </p>
        <div class="social-medias">
            <a href="https://twitter.com" target="_blank"><img class="social-medias-img" src="../../assets/images/Social_Medias/twitter.png"></a>
            <a href="https://facebook.com" target="_blank"><img class="social-medias-img" src="../../assets/images/Social_Medias/facebook.png"></a>
            <a href="https://instagram.com" target="_blank"><img class="social-medias-img" src="../../assets/images/Social_Medias/instagram.png"></a>
        </div>
        <form class="comment-form" action="../../controllers/opinionController.php" method="POST">
            <input type="hidden" name="_method" value="POST">
            <legend class="comment-title"> Déjanos tu opinión </legend>
            <input type="text" value="Nombre" name="commentName" id="commentName" required />
            <textarea maxlength="80" name="commentArea" id="commentArea" required> Comentarios </textarea>
            <div class="comment-form-buttons">
                <input type="submit" value="Enviar" />
                <input type="reset" value="Limpiar" />
            </div>
        </form>
        <div id="space"></div>
    </div>
    <?php
        include ("../../assets/components/opinionControl.php");
    ?>
    <script src="../../assets/components/slidingMenu.js"></script>
</body>

</html>