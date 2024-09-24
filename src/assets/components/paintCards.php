<script>
    var cardsContainer = document.getElementsByClassName("cards-container")[0];
    var cant = 1;

    document.addEventListener('DOMContentLoaded', () => {
        getProducts();
        console.log(cardsContainer);
    });

    function getProducts() {
        let xhttp = new XMLHttpRequest();
        xhttp.open("GET", "../../controllers/productsController.php", true);
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                let list = JSON.parse(this.responseText);
                list = list.filter(product => product.categoria === cardsContainer.id);
                paintProducts(list);

            }
        };
        xhttp.send();
        return [];
    }

    function paintProducts(list) {
        let html = '';
        for (var i = 0; i < list.length; i++) {
            html += `
            <div class="card" id="${list[i].id}">
                <div class="card-information">
                    <h2 class="card-title"> ${list[i].nombre} </h2>
                    <p class="card-description"> ${list[i].descripcion} </p>
                    <div class="buy-container">
                        <button class=\"card-button\" onclick="addToCart('${list[i].nombre}', '${list[i].precio}')">Agregar al carrito</button>
                        <div class="units">
                            <select name="unidades" id="unidades" onchange="setAmount(value)"required>
                                <option value="1">x1</option>
                                <option value="2">x2</option>
                                <option value="3">x3</option>
                                <option value="4">x4</option>
                                <option value="5">x5</option>
                                <option value="6">x6</option>
                                <option value="7">x7</option>
                                <option value="8">x8</option>
                                <option value="9">x9</option>
                            </select>
                        </div>
                        <div class="cost"> $${list[i].precio} </div>
                    </div>
                </div>
                <img class="card-img" id="${list[i].id}" src="data:image/jpeg;base64,${list[i].foto}">
            </div>
            `;
        }
        cardsContainer.innerHTML += html;
    }

    function setAmount(value) {
        cant = value;
        console.log(cant);
    }

    function addToCart(pName, cost) {

        console.log(pName);

        let product = {
            id: Date.now(),
            name: pName,
            amount: cant.toString(),
            price: cost,
        };

        let list = getJSONProducts();
        list.push(product);
        localStorage.setItem(keyList, JSON.stringify(list));

        badge.innerHTML = list.length;
        badgeSlid.innerHTML = list.length;
    }

    function getJSONProducts() {
        let list = JSON.parse(localStorage.getItem(keyList));

        if (list === null) {
            return [];
        } else {
            return list;
        }
    }
</script>