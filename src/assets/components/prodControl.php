<script>
    const modalAddProduct = document.getElementById('modal-add-product');
    const modalEditProduct = document.getElementById('modal-edit-product');
    const modalDelete = document.getElementById('modal-delete');
    const addButton = document.getElementsByClassName('agregar')[1];
    const idEdit = document.getElementById("form-edit-id");
    const idDelete = document.getElementById("form-delete-id");
    const product = document.getElementById('products-controller');
    const pName = document.getElementById("productName");
    const pCategory = document.getElementById("productCategory");
    const pDescription = document.getElementById("productDescription");
    const pPrice = document.getElementById("productPrice");

    const categories = [
        "Aperitivo",
        "Plato Fuerte",
        "Postre",
        "Bebida"
    ];

    document.addEventListener('DOMContentLoaded', () => {
        controlModalEditProduct();
        controlModalAddProduct();
        controlModalDelete();
        getProducts();
    });

    function controlModalAddProduct() {
        if (modalAddProduct.style.display != "none") {
            modalAddProduct.style.display = "none";
        } else {
            modalAddProduct.style.display = "flex";
        }
    }

    function controlModalEditProduct() {
        if (modalEditProduct.style.display != "none") {
            modalEditProduct.style.display = "none";
        } else {
            modalEditProduct.style.display = "flex";
        }
    }

    function controlModalDelete() {
        if (modalDelete.style.display != "none") {
            modalDelete.style.display = "none";
        } else { 
            modalDelete.style.display = "flex";
        }
    }

    function getProducts() {
        let xhttp = new XMLHttpRequest();
        xhttp.open("GET", "../../controllers/productsController.php", true);
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                let list = JSON.parse(this.responseText);
                list.sort((a, b) => (a.categoria - b.categoria));
                paintProducts(list);
            }
        };
        xhttp.send();
        return [];
    }

    function paintProducts(list) {
        let html = '';
        for(var i = 0; i < list.length; i++) {
            html += `
                <div class="product-info"  id="${list[i].id}">
                    <div class="product-name">
                        ${list[i].nombre}
                    </div>
                    <div class="product-category">
                        ${categories[list[i].categoria - 1]}
                    </div>
                    <div class="product-description">
                        ${list[i].descripcion}
                    </div>
                    <div class="product-price">
                        $${list[i].precio}
                    </div>
                    <div class="options">
                        <button id="delete" onclick="deleteProduct(${list[i].id})"> X </button> 
                        <button id="edit" onclick="editProduct(${list[i].id})"> 📝 </button>
                    </div>
                </div>
            `;
        }
        product.innerHTML += html;
    }

    function editProduct(id){
        let xhttp = new XMLHttpRequest();
        xhttp.open("GET", "../../controllers/productsController.php?id=" + id, true);
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                let product = JSON.parse(this.responseText);
                idEdit.value = product.id;
                pName.value = product.nombre;
                pCategory.value = product.categoria;
                pDescription.value = product.descripcion;
                pPrice.value = product.precio;  
                controlModalEditProduct();
                addButton.setAttribute("onclick", "saveEdit(" + product.id + ")");
            }
        };
        xhttp.send();
    }

    function saveEdit(id) {
        let xhttp = new XMLHttpRequest();
        xhttp.open("POST", "../../controllers/productsController.php", true);
        xhttp.setRequestHeader("Content-type", "application/json");
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                if(this.responseText === "Registro guardado") {
                    getProducts();
                }
            }
        };

        let data = {
            _method: 'PUT',
            id: id,
            nombre: pName.value,
            categoria: pCategory.value,
            descripcion: pDescription.value,
            precio: pPrice.value
        };
        
        xhttp.send(JSON.stringify(data));
    }

    function hideDelete() {
        let btnDelete = document.querySelectorAll("button[onclick^='deleteTweet']");
        btnDelete.forEach(btn => btn.remove());
    }

    function deleteProduct(id) {
        idDelete.value = id;
        controlModalDelete();
    }
</script>