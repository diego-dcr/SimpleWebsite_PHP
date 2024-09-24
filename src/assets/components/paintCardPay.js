const cardList = document.getElementsByClassName('card-list')[0];
const idDelete = document.getElementById("form-delete-id");
var deliveryCard = document.getElementById("deliveryCard");
var ctrlSelect = true;
var payCard = "";

document.addEventListener('DOMContentLoaded', () => {
    getCards();
});

function getCards() {
    let xhttp = new XMLHttpRequest();
    xhttp.open("GET", "../../controllers/cardsController.php", true);
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            let list = JSON.parse(this.responseText);
            paintCards(list);
        }
    };
    xhttp.send();
    return [];
}

function paintCards(list) {
    let html = '';
    for (var i = 0; i < list.length; i++) {
        html += `
            <div class="card" id="${list[i].id}">
                <div class="card-icons" onclick="selectCard(${list[i].id}, '${arrStyle(list[i].Notarjeta)}')">
                    <i class="fa fa-credit-card" id="card-icon" aria-hidden="true"></i>
                    <i class="fa fa-chevron-right" id="card-arrow" aria-hidden="true"></i>                               
                </div>
                <div class="card-info" onclick="selectCard(${list[i].id}, '${arrStyle(list[i].Notarjeta)}')">
                    <div> ${list[i].nombre} </div>
                    <div> ${arrStyle(list[i].Notarjeta)} </div>
                </div>
                <button type="button" onclick="deleteCard(${list[i].id})">X</button>
            </div>
        `;
    }
    cardList.innerHTML += html;
}

function selectCard(id, count) {
    var select = document.getElementById(id);
    if (ctrlSelect) {
        select.style.border = "2px solid #FF6800";
        ctrlSelect = false;
        payment.innerHTML = count;
        deliveryCard.value = id;
    } else {
        select.style.border = "1px solid black";
        ctrlSelect = true;
        payment.innerHTML = "<i class='fa fa-credit-card' aria-hidden='true'></i> Metodo de pago";
    }
}

function deleteCard(id) {
    idDelete.value = id;
    controlModalDelete();
}

function arrStyle(cardN) {
    var i, cont = 0,
        str = "";
    for (i = 0; i < cardN.length; i++) {
        if ((i + 1) % 4 == 0 && cont < 3) {
            str += (cardN[i] + "-");
            cont++;
        } else {
            str += cardN[i];
        }
    }

    return str;
}