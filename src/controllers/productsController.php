<?php 
    include("../models/DB.php");
    include("../models/Producto.php");

    try {
        $connection = DBConnection::getConnection();
    }
    catch(PDOException $e) {
        error_log("Error de conexión - " . $e, 0);
        exit();
    }

    if($_SERVER["REQUEST_METHOD"] === "GET") {
        if (array_key_exists("id", $_GET)) {
            try {
                $id = $_GET["id"];
    
                $query = $connection->prepare('SELECT * FROM productos WHERE id = :id');
                $query->bindParam(':id', $id, PDO::PARAM_INT);
                $query->execute();
        
                $product;
        
                while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    $product = new Producto($row['id'], $row['nombre'], $row['categoria'], $row['descripcion'], $row['precio'], $row['activo'], $row['foto']);
                }
        
                echo json_encode($product->getArray());
            }
            catch(PDOException $e) {
                echo $e;
            }
        }else {
            try {
                $query = $connection->prepare('SELECT * FROM productos WHERE activo = 1');
                $query->execute();

                $products = array();
                while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    $product = new Producto($row['id'], $row['nombre'], $row['categoria'], $row['descripcion'], $row['precio'], $row['activo'], $row['foto']);
                    $products[] = $product->getArray();
                }

                echo json_encode($products);

            } catch(PDOException $e) {
                error_log("Error de consulta - " . $e, 0);
            }
        }
    } else if($_SERVER["REQUEST_METHOD"] === "POST") {
        $photo;

        if($_FILES["photo"]["error"] > 0) {
            $photo = "Sin Foto";    
        } else {
            $tmp_name = $_FILES["photo"]["tmp_name"];
            $photo = file_get_contents($tmp_name);
        }

        if(array_key_exists("productName", $_POST)) {
            if($_POST["_method"] === "POST") {
                postProduct($_POST["productName"], $_POST["productCategory"], $_POST["productDescription"], $_POST["productPrice"], $photo);
            } else if($_POST["_method"] === "PUT") {
                putProduct($_POST["id"], $_POST["productName"], $_POST["productCategory"], $_POST["productDescription"], $_POST["productPrice"], $photo);
            }
        } else if (array_key_exists("id", $_POST)) {
            if ($_POST["_method"] === "DELETE") {
                deleteProduct($_POST["id"]);
            }
        }else {
            $data = json_decode(file_get_contents("php://input"));
    
            if ($data->_method === "POST") {
                postProduct($data->productName, $data->productCategory, $data->productDescription, $data->productPrice, $photo);
            }
            else if($data->_method === "PUT") {
                putProduct($data->id, $data->productName, $data->productCategory, $data->productDescription, $data->productPrice, $photo);
            }
        }
    }

    function postProduct($pName, $pCategory, $pDescription, $pPrice, $pPhoto) {
        global $connection;

        try{
            $query = $connection->prepare('INSERT INTO productos VALUES (NULL, :pName, :pCategory, :pDescription, :pPrice, :pPhoto, 1)');
            $query->bindParam(":pName", $pName, PDO::PARAM_STR);
            $query->bindParam(":pCategory", $pCategory, PDO::PARAM_STR);
            $query->bindParam(":pDescription", $pDescription, PDO::PARAM_STR);
            $query->bindParam(":pPrice", $pPrice, PDO::PARAM_INT);
            $query->bindParam(":pPhoto", $pPhoto, PDO::PARAM_STR);
            $query->execute();
            
            if($query->rowCount() > 0) {
                echo'<script type="text/javascript">
                        window.location.href="../views/admin/products.php";
                        alert("Producto agregado correctamente");
                    </script>';
            }
            else {
                echo '<script type="text/javascript">
                        window.location.href="../views/others/error.php";
                    </script>';
            }
        }catch(PDOException $e) {
            error_log("Error de conexión - " . $e, 0);
            exit();
        }    
    }

    function putProduct($pId, $pName, $pCategory, $pDescription, $pPrice, $pPhoto) {
        global $connection;
        try{
            if($pPhoto === "Sin Foto") {
                $query = $connection->prepare('UPDATE productos SET nombre = :pName, categoria = :pCategory, descripcion = :pDescription, precio = :pPrice WHERE id = :pId');
                $query->bindParam(":pName", $pName, PDO::PARAM_STR);
                $query->bindParam(":pCategory", $pCategory, PDO::PARAM_STR);
                $query->bindParam(":pDescription", $pDescription, PDO::PARAM_STR);
                $query->bindParam(":pPrice", $pPrice, PDO::PARAM_INT);
                $query->bindParam(":pId", $pId, PDO::PARAM_INT);
            } else {
                $query = $connection->prepare('UPDATE productos SET nombre = :pName, categoria = :pCategory, descripcion = :pDescription, precio = :pPrice, foto = :pPhoto WHERE id = :pId');
                $query->bindParam(":pPhoto", $pPhoto, PDO::PARAM_STR);
                $query->bindParam(":pName", $pName, PDO::PARAM_STR);
                $query->bindParam(":pCategory", $pCategory, PDO::PARAM_STR);
                $query->bindParam(":pDescription", $pDescription, PDO::PARAM_STR);
                $query->bindParam(":pPrice", $pPrice, PDO::PARAM_INT);
                $query->bindParam(":pId", $pId, PDO::PARAM_INT);
            }

            $query->execute();
            
            if($query->rowCount() > 0) {
                echo'<script type="text/javascript">
                        window.location.href="../views/admin/products.php";
                        alert("Producto Guardado Correctamente");
                    </script>';
            }
            else {
                echo '<script type="text/javascript">
                        window.location.href="../views/others/error.php";
                    </script>';
            }
        }catch(PDOException $e) {
            error_log("Error de conexión - " . $e, 0);
            exit();
        }    
    }

    function deleteProduct($pId) {
        global $connection;
    
        try {
            $query = $connection->prepare('UPDATE productos SET activo = 0 WHERE id = :id');
            $query->bindParam(':id', $pId, PDO::PARAM_INT);
            $query->execute();
    
            if($query->rowCount() > 0) {
                echo'<script type="text/javascript">
                        window.location.href="../views/admin/products.php";
                        alert("Producto eliminado");
                    </script>';
            }
            else {
                echo '<script type="text/javascript">
                        window.location.href="../views/others/error.php";
                    </script>';
            }
        }
        catch(PDOException $e) {
            echo $e;
        }
    }
        
?>
