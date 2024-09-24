const payment = document.getElementById("payment-button");
const paymentButton = document.getElementsByClassName("payment-button");
const sendConfirm = document.getElementById("button-confirm");
const buttonsCardForm = document.getElementsByClassName("card-form-button");
const modalDelete = document.getElementById('modal-delete');
var messageContainer = document.getElementsByClassName("message-container");
var paymentContainer = document.getElementById("payment-container");
var cardsContainer = document.getElementById("cards-container");
var cardName = document.getElementById("cardName");
var cardNumber = document.getElementById("cardNumber");
var cardDate = document.getElementById("cardDate");
var cardCvv = document.getElementById("cardCvv");
var cardCountry = document.getElementById("cardCountry");
var deliveryDirection = document.getElementById("deliveryDirection");
var deliveryNote = document.getElementById("deliveryNote");
var deliveryForm = document.getElementsByClassName("delivery-form")[0];

document.addEventListener("DOMContentLoaded", function() {

    //deliveryForm.action = addProductsOrder(deliveryForm.action);

    controlPaymentForm();
    controlShowMessage();
    controlCardsList();
    controlModalDelete();

    payment.addEventListener("click", controlCardsList);
    buttonsCardForm[0].addEventListener("click", controlPaymentForm);
    buttonsCardForm[1].addEventListener("click", controlCardsList);
    buttonsCardForm[2].addEventListener("click", controlCardsListCancel);
    paymentButton[0].addEventListener("click", controlPaymentForm); // Mientras no se pueda registrar la tarjeta, solo cierra la ventana.
    paymentButton[1].addEventListener("click", controlPaymentForm);
    sendConfirm.addEventListener("click", controlShowMessage);
    messageContainer[0].addEventListener("click", controlShowMessage);
    cardName.addEventListener("click", controlCardName);
    cardNumber.addEventListener("click", controlCardNumber);
    cardDate.addEventListener("click", controlCardDate);
    cardCvv.addEventListener("click", controlCardCvv);
    cardCountry.addEventListener("click", controlCardCountry);
    deliveryDirection.addEventListener("click", controlDeliveryDirection);
    deliveryNote.addEventListener("click", controlDeliveryNote);

});

function addProductsOrder(link) {
    str = "";
    let list = JSON.parse(localStorage.getItem(keyList));
    for (var i = 0; i < list.length; i++) {
        str = "?producto" + i + 1 + "=" + list[i].name.split(" ").join("");
        link += str;
        str = "?cantidad" + i + 1 + "=" + list[i].amount;
        link += str;
    }
    return link;
}

function controlShowMessage() {
    if (messageContainer[0].style.display != "none") {
        messageContainer[0].style.display = "none";
    } else {
        messageContainer[0].style.display = "flex";
    }
}

function controlPaymentForm() {
    if (paymentContainer.style.display != "none") {
        paymentContainer.style.display = "none";
    } else {
        paymentContainer.style.display = "flex";
    }
}

function controlCardsList() {
    if (cardsContainer.style.display != "none") {
        cardsContainer.style.display = "none";
    } else {
        cardsContainer.style.display = "flex";
    }
}

function controlCardsListCancel() {
    if (cardsContainer.style.display != "none") {
        cardsContainer.style.display = "none";
        payment.innerHTML = "<i class='fa fa-credit-card' aria-hidden='true'></i> Metodo de pago";
        let cards = cardList.getElementsByClassName('card');
        for (let i = 0; i < cards.length; i++) {
            cards[i].style.border = "1px solid black";
        }
    } else {
        cardsContainer.style.display = "flex";
    }
}

function controlCardName() {
    cardName.value = "";
}

function controlCardNumber() {
    cardNumber.value = "";
}

function controlCardDate() {
    cardDate.value = "";
}

function controlCardCvv() {
    cardCvv.value = "";
}

function controlCardCountry() {
    cardCountry.value = "";
}

function controlDeliveryDirection() {
    deliveryDirection.value = "";
}

function controlDeliveryNote() {
    deliveryNote.value = "";
}

function controlModalDelete() {
    if (modalDelete.style.display != "none") {
        modalDelete.style.display = "none";
    } else {
        modalDelete.style.display = "flex";
    }
}