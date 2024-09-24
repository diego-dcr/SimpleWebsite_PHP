const productList = document.getElementById("product-list");
const Price = document.getElementById("price");
const confirmButton = document.getElementById("button-confirm");
const cancelButton = document.getElementById("button-cancel");
const keyPriceCart = "pricecart";

var cost = 0;

document.addEventListener("DOMContentLoaded", function() {
    confirmButton.addEventListener("click", setPrice);
    cancelButton.addEventListener("click", cancelOrder);
    paintProducts();
});

function paintProducts() {
    let list = getList(keyList);

    let html = '';

    for (var i = 0; i < list.length; i++) {
        cost += (parseInt(list[i].price) * parseInt(list[i].amount));
        html +=
            `<div class="product" id=${list[i].id}>
                <span>${list[i].amount}x</span>
                <span>${list[i].name}</span>
                <span>$${list[i].price}</span>
                <button class="close" onclick="deleteProduct(${list[i].id})"> X </button>
            </div>`;
    }

    productList.innerHTML = html;

    Price.innerText = "Total: $" + cost;
}

function getList(key) {
    let list = JSON.parse(localStorage.getItem(key));

    if (list === null) {
        return [];
    } else {
        return list;
    }
}

function setPrice() {
    let price = {
        id: Date.now(),
        totalPrice: cost,
    }

    let list = getList(keyPriceCart);
    list.push(price);
    localStorage.setItem(keyPriceCart, JSON.stringify(list));

    window.location.href = '../../views/cartstore/delivery.php';
}

function cancelOrder() {
    window.location.href = '../../index.php';
}

function deleteProduct(id) {
    let list = getList(keyList);

    list = list.filter(i => i.id !== id);

    cost = 0;

    for (var i = 0; i < list.length; i++) {
        cost += (parseInt(list[i].price) * parseInt(list[i].amount));
    }

    Price.innerText = "Total: $" + cost;

    localStorage.setItem(keyList, JSON.stringify(list));

    let product = document.getElementById(id);

    product.className += ' hide';

    setTimeout(() => {
        product.remove();
    }, 300);

    controlBadge();
    controlBadgeSlid();
}