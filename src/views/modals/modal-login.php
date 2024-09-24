<div class="login-container">
    <form class="login" action="controllers/accessController.php" method="POST" autocomplete="off" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="POST">
        <img id="img-login" src="assets/images/user.png">
        <legend class="login-title"> Iniciar Sesión </legend>
        <div id="error"> Error </div>
        <input type="email" value="Correo Electrónico" class="form-control" id="login-mail" name="userMail"required />
        <input type="password" value="Contraseña" class="form-control" id="login-password" name="userPassword" required />
        <div class="login-buttons">
            <input type="submit" value="Entrar" class="login-button" />
            <input type="button" value="Cancelar" class="login-button" />
        </div>
    </form>
</div>