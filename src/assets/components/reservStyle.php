<script>
    <?php
        echo "const sName = '".$_SESSION['nombre']."';";
        echo "const sPhone = '".$_SESSION['telefono']."';";
    ?>
    var reservName = document.getElementById('reservName');
    var reservPhone = document.getElementById('reservPhone');
    var reservDate = document.getElementById('reservDate');

    document.addEventListener('DOMContentLoaded', function() {
        controlReservation();

    });

    function controlReservation() {
        reservName.value = sName;
        reservPhone.value = phoneWStyle(sPhone);
        reservDate.value = new Date().toDateString();
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

    function setDate() {
        reservPhone.value = sPhone;
    }

</script>