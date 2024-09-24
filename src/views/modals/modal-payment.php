<div id="payment-container">
    <form class="payment-form" action="../../controllers/cardsController.php" method="POST" autocomplete="off" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="POST"> 
        <legend class="payment-title"> Método de pago </legend>
        <input type="text" value="Nombre del dueño" class="payment-control" name="cardName" id="cardName" required />
        <input type="text" value="Numero de la tarjeta" class="payment-control" name="cardNumber" id="cardNumber" minlength="16" maxlength="16" required />
        <div class="payment-cart-info">
            <input type="text" value="Fecha(MM/AA)" class="payment-cart" name="cardDate" id="cardDate" required />
            <input type="text" value="CVV" class="payment-cart" name="cardCvv" id="cardCvv" required />
        </div>
        <input type="text" value="País de la tarjeta" class="payment-control" name="cardCountry" id="cardCountry" required />
        <div class="payment-buttons">
            <input type="submit" value="Registrar" class="payment-button" />
            <input type="button" value="Cancelar" class="payment-button" />
        </div>
    </form>
</div>