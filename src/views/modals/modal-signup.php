<div class="signUp-container">
    <form class="signUp" action="controllers/usersController.php" method="POST" autocomplete="off" enctype="multipart/form-data">
        <legend class="signUp-title"> Registrarse </legend>
        <div class="signUp-personal-info">
            <input type="text" value="Nombre" name="userName" id="sign-name" class="form-control" required />
            <input type="text" value="Teléfono" name="userPhone" id="sign-phone" class="form-control" required />
        </div>
        <input type="email" value="Correo Electrónico" name="userMail" id="sign-mail" class="form-control" required />
        <input type="password" value="Contraseña" name="userPassword" id="sign-password" class="form-control" required />
        <input type="password" value="Contraseña" name="confirmPassword" id="sign-password2" class="form-control" required />
        <div class="toPhoto">
            <label for="photo">Foto: </label>
            <input type="file" name="photo" required>
        </div>
        <div class="signUp-buttons">
            <input type="submit" value="Registrarse" class="signUp-button" />
            <input type="button" value="Cancelar" class="signUp-button" />
        </div>
    </form>
</div>