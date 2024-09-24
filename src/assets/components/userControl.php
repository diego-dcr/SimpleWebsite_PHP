<script>
    const modalDelete = document.getElementById('modal-delete');
    const user = document.getElementById("users-controller");
    const idDelete = document.getElementById('form-delete-id');
    const addButton = document.getElementsByClassName('agregar')[0];

    document.addEventListener('DOMContentLoaded', () => {
        controlModalDelete();
        getUsers();
    });

    function controlModalDelete() {
        if (modalDelete.style.display != "none") {
            modalDelete.style.display = "none";
        } else { 
            modalDelete.style.display = "flex";
        }
    }

    function getUsers() {
        let xhttp = new XMLHttpRequest();
        xhttp.open("GET", "../../controllers/usersController.php", true);
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                let list = JSON.parse(this.responseText);
                paintUsers(list);
                identifyAdmin(list);
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

    function paintUsers(list) {
        let html = '';
        for(var i = 0; i < list.length; i++) {
            html += `
                <div class="user-info" id="${list[i].id}">
                    <div class="user-name">
                        ${list[i].nombre}
                    </div>
                    <div class="user-mail">
                        ${list[i].mail}
                    </div>
                    <div class="user-phone">
                        ${phoneWStyle(list[i].telefono)}
                    </div>
                    <div class="options">
                        <button id="delete" onclick = "deleteUser(${list[i].id})"> X </button>
                    </div>
                </div>
            `;
        }
        user.innerHTML += html;
    }

    function deleteUser(id) {
        idDelete.value = id;
        controlModalDelete();
    }

    function identifyAdmin(list) {
        const userInfo = document.getElementsByClassName('user-info');
        for(var i = 0; i < userInfo.length; i++) {
            if(userInfo[i].id == list[i].id && list[i].tipo == "admin") {
                userInfo[i].style.border = "3px solid #FF0049";
            }
        }
    }

</script>