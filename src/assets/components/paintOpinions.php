<script>
    var opContainer = document.getElementById('opinion-container');
    
    document.addEventListener("DOMContentLoaded", function() {
        getOpinions();
    });
    
    function getOpinions() {
        let xhttp = new XMLHttpRequest();
        xhttp.open("GET", "controllers/opinionController.php", true);
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
                `<div class="opinion-card" id="${list[i].id}">
                    <img class="opinion-card-img" id="${list[i].id}" src="data:image/jpeg;base64,${list[i].foto}">
                    <div class="opinion-card-info">
                        <h3 class="opinion-card-title"> ${list[i].nombre} </h3>
                        <p class="opinion-card-op"> ${list[i].comentario} </p>
                    </div>
                </div>
            `;
        }

        html += `<div id="space"></div>`;
    
        opContainer.innerHTML += html;
    }

</script>