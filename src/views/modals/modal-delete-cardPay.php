<div id="modal-delete"> 
    <form class="form-group" action="../../controllers/cardsController.php" method="POST" autocomplete="off" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="id" value="" id="form-delete-id">
        <p>¿Estas seguro?</p>
        <div class="buttons">
            <button type="button" class="cancelar" data-dismiss="modal" onclick="controlModalDelete()">Cancelar</button>
            <button type="submit" class="agregar">Aceptar</button>
        </div>
    </form>
</div>