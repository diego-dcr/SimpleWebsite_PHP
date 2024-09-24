<script>
    const modalDelete = document.getElementById('modal-delete');
    const reserv = document.getElementById("reserv-controller");
    const idDelete = document.getElementById('form-delete-id');
    const addButton = document.getElementsByClassName('agregar')[0];

    document.addEventListener('DOMContentLoaded', () => {
        controlModalDelete();
        getReservs();
    });

    function controlModalDelete() {
        if (modalDelete.style.display != "none") {
            modalDelete.style.display = "none";
        } else { 
            modalDelete.style.display = "flex";
        }
    }

    function getReservs() {
        let xhttp = new XMLHttpRequest();
        xhttp.open("GET", "../../controllers/reservsController.php", true);
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                let list = JSON.parse(this.responseText);
                paintReservs(list);
            }
        };
        xhttp.send();
        return [];
    }

    function phoneWStyle(phone) {
        var i, cont = 0, str = "";
        for(i = 0; i < phone.length; i++){
            if((i+1) % 3 == 0 && cont < 2) {
                str += (phone[i] + "-");
                cont++;
            }else {
                str += phone[i];
            }
            
        }

        return str;
    }

    function paintReservs(list) {
        let html = '';
        for(var i = 0; i < list.length; i++) {
            html += `
                <div class="reserv-info" id = "${list[i].id}">
                    <div class="reserv-name">
                        ${list[i].nombre}
                    </div>
                    <div class="reserv-suc">
                        ${list[i].sucursal}
                    </div>
                    <div class="reserv-date">
                        ${list[i].fecha}
                    </div>
                    <div class="reserv-cantPerson">
                        ${list[i].NoPersonas}
                    </div>
                    <div class="reserv-schedule">
                        ${list[i].horario}
                    </div>
                    <div class="options">
                        <button id="delete" onclick="deleteReserv(${list[i].id})"> X </button>
                    </div>
                </div>
            `;
        }
        reserv.innerHTML += html;
    }

    function deleteReserv(id) {
        idDelete.value = id;
        controlModalDelete();
    }

</script>