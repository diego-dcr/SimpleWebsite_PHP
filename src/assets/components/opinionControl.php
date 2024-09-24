<script>
    var commentName = document.getElementById('commentName');
    var commentArea = document.getElementById('commentArea');

    document.addEventListener("DOMContentLoaded", function() {
        controlName();
        commentArea.addEventListener("click", controlComment);
    });

    function controlComment() {
        commentArea.value = "";
    }

    function controlName() {
        <?php
            if (isset($_SESSION['nombre'])) {
                echo "commentName.value = '" . $_SESSION['nombre'] . "';";
            } else {
                echo "commentName.value = '';";
            }    
        ?>
    }
</script>