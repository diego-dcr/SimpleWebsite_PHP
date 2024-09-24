<div id="modal-edit-product">
    <form class="form-group" action="../../controllers/productsController.php" method="POST" autocomplete="off" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="id" value="" id="form-edit-id">
        <legend class="login-title"> Editar Producto </legend>
        <label for="productName">Nombre:</label>
        <input type="text" class="form-control" id="productName" name="productName" placeholder="Product Name">
        <label for="productCategory">Categoría:</label>
        <select class="form-control" id="productCategory" name="productCategory">
            <option value="1">Aperitivo</option>
            <option value="2">Plato Fuerte</option>
            <option value="3">Postre</option>
            <option value="4">Bebida</option>
        </select>
        <label for="productDescription">Descripción:</label>
        <textarea class="form-control" id="productDescription" name="productDescription" rows="3"></textarea>
        <label for="productPrice">Precio:</label>
        <input type="number" class="form-control" id="productPrice" name="productPrice" placeholder="Product Price">
        <label for="photo">Foto: </label>
        <input type="file" name="photo">
        <div class="buttons">
            <button type="button" class="cancelar" data-dismiss="modal" onclick = controlModalEditProduct()>Cancelar</button>
            <button type="submit" class="agregar">Actualizar</button>
        </div>
    </form>
</div>