<script>
    var commentsController = document.getElementById('comments-controller');
    const modalDelete = document.getElementById('modal-delete');
    const idDelete = document.getElementById('form-delete-id');
    
    document.addEventListener("DOMContentLoaded", function() {
        controlModalDelete();
        getOpinions();
    });
    
    function getOpinions() {
        let xhttp = new XMLHttpRequest();
        xhttp.open("GET", "../../controllers/opinionController.php", true);
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                let list = JSON.parse(this.responseText);
                paintOpinion(list);
            }
        };
        xhttp.send();
        return [];
    }
    
    function paintOpinion(list) {
        let html = '';

        for (var i = 0; i < list.length; i++) {
            html +=
                `<div class="comment-info" id="${list[i].id}">
                    <div class="comment-name">
                        ${list[i].nombre}
                    </div>
                    <div class="comment-area">
                        ${list[i].comentario}
                    </div>
                    <div class="options">
                        <button id="delete" onclick = "deleteComment(${list[i].id})"> X </button>
                    </div>
                </div>
            `;
        }
    
        commentsController.innerHTML += html;
    }

    function deleteComment(id) {
        idDelete.value = id;
        controlModalDelete();
    }

    function controlModalDelete() {
        if (modalDelete.style.display != "none") {
            modalDelete.style.display = "none";
        } else { 
            modalDelete.style.display = "flex";
        }
    }
</script>