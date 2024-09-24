<div id="modal-add-product">
    <form class="form-group" action="../../controllers/productsController.php" method="POST" autocomplete="off" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="POST">
        <legend class="login-title"> Agregar Producto </legend>
        <label for="productName">Nombre:</label>
        <input type="text" class="form-control" id="productName1" name="productName" placeholder="Product Name" required>
        <label for="productCategory">Categoría:</label>
        <select class="form-control" id="productCategory1" name="productCategory" >
            <option value="1">Aperitivo</option>
            <option value="2">Plato Fuerte</option>
            <option value="3">Postre</option>
            <option value="4">Bebida</option>
        </select>
        <label for="productDescription">Descripción:</label>
        <textarea class="form-control" id="productDescription1" name="productDescription" rows="3" required></textarea>
        <label for="productPrice">Precio:</label>
        <input type="number" class="form-control" id="productPrice1" name="productPrice" placeholder="Product Price" required>
        <label for="photo">Foto: </label>
        <input type="file" name="photo" required>
        <div class="buttons">
            <button type="button" class="cancelar" data-dismiss="modal" onclick = controlModalAddProduct()>Cancelar</button>
            <button type="submit" class="agregar">Agregar</button>
        </div>
    </form>
</div>