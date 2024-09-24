
<?php
    include("../models/DB.php");
    include("../models/Pedido.php");

    try {
        $connection = DBConnection::getConnection();
    }
    catch(PDOException $e) {
        error_log("Error en la conexión a la base de datos");
        exit();
    }

    $time = date("Y-m-d H:i:s", $_SERVER['REQUEST_TIME']);

    if($_SERVER["REQUEST_METHOD"] === "GET") {
        session_start();
        $userID = $_SESSION["id"];
        $fecha = date("Y-m-d H:i:s", $_SERVER['REQUEST_TIME']);
        
        if (array_key_exists("id", $_GET)) {
            try {
                $id = $_GET["id"];
                $query = $connection->prepare('SELECT * FROM pedidos WHERE id = :id AND userID = :userID');
                $query->bindParam(':id', $id, PDO::PARAM_INT);
                $query->bindParam(':id', $userID, PDO::PARAM_INT);
                $query->execute();
        
                $order;
        
                while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    $order = new Pedido($row['id'], $row['userID'], $row['direccion'], $row['nota'], $row['costo'], $row['tarjeta'], $row['fecha'], $row['activo']);
                }
        
                echo json_encode($order->getArray());
            }
            catch(PDOException $e) {
                echo $e;
            }
        }else {
            try {
                $tam = intval($_GET["tam"]);
                $fecha = $_GET["fecha"];
                $pedidoID;

                $query = $connection->prepare('SELECT * FROM pedidos WHERE fecha = :fecha');
                $query->bindParam(':fecha', $fecha, PDO::PARAM_STR);
                $query->execute();
                if($query->rowCount() > 0) {
                    while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                        $pedidoID = $row['id'];
                    }
                } 

                for($i = 0; $i < $tam; $i+=1) {
                    $prod = $_GET["producto$i"];
                    $cant = intval($_GET["cantidad$i"]);

                    $state = $connection->prepare('INSERT INTO productosPedido VALUES (NULL, :producto, :cantidad, :pedidoID)');
                    $state->bindParam(':pedidoID', $pedidoID, PDO::PARAM_INT);
                    $state->bindParam(':producto', $prod, PDO::PARAM_STR);
                    $state->bindParam(':cantidad', $cant, PDO::PARAM_INT);
                    $state->execute();
                }

                echo '<script type="text/javascript">
                        window.location.href="../index.php";
                        alert("Pedido realizado");
                        localStorage.clear();
                    </script>';

            } catch(PDOException $e) {
                error_log("Error de consulta - " . $e, 0);
            }
        }
    } else if($_SERVER["REQUEST_METHOD"] === "POST") {
        session_start();
        
        $userID = $_SESSION["id"];
        $fecha = "" . $time . "";

        if(array_key_exists("deliveryDirection", $_POST)) {
            if($_POST["_method"] === "POST") {
                postDelivery($userID, $_POST["deliveryDirection"], $_POST["deliveryNote"], intval($_POST["deliveryPrice"]), intval($_POST["deliveryCard"]), $fecha);
            }
        } else if (array_key_exists("id", $_POST)) {
            if ($_POST["_method"] === "DELETE") {
                deleteDelivery($_POST["id"]);
            }
        }else {
            $data = json_decode(file_get_contents("php://input"));
            if ($data->_method === "POST") {
                postDelivery($userID, $data->deliveryDirection, $data->deliveryNote, intval($data->deliveryPrice), intval($data->deliveryCard), $fecha);
            }
        }
    }

    function postDelivery($userID, $dDirection, $dNote, $dCost, $dCard, $fecha) {
        global $connection;
        $keyList = "productList" . $userID;
        try{
            $query = $connection->prepare('INSERT INTO pedidos VALUES (NULL, :dDirection, :dNote, :dCost, :dCard, :fecha, :userID, 1)');
            $query->bindParam(':userID', $userID, PDO::PARAM_INT);
            $query->bindParam(':dDirection', $dDirection, PDO::PARAM_STR);
            $query->bindParam(':dNote', $dNote, PDO::PARAM_STR);
            $query->bindParam(':dCost', $dCost, PDO::PARAM_INT);
            $query->bindParam(':dCard', $dCard, PDO::PARAM_INT);
            $query->bindParam(':fecha', $fecha, PDO::PARAM_STR);
            $query->execute();

            $state = $connection->prepare('SELECT * FROM pedidos WHERE fecha = :fecha');
            $state->bindParam(':fecha', $fecha, PDO::PARAM_STR);
            $state->execute();

            $id = $state->fetch(PDO::FETCH_ASSOC)["id"];
            
            if($query->rowCount() > 0) {
                echo'<script type="text/javascript">
                        //window.location.href="../views/cartstore/delivery.php";
                        alert("Pedido realizado con éxito");
                        if(window.location.href === "http://127.0.0.1/ProyectoWeb/src/controllers/deliveryController.php") {
                            link = window.location.href;
                            str = "";
                            let list = JSON.parse(localStorage.getItem("' . $keyList . '"));    
                            str = "?tam=" + list.length;
                            link += str;
                            str = "&fecha=" + "' . $fecha . '";
                            link += str;
                            for (var i = 0; i < list.length; i++) {
                                str = "&producto" + i + "=" + list[i].name.split(" ").join("");
                                link += str;
                                str = "&cantidad" + i + "=" + list[i].amount;
                                link += str;
                            }
                            window.location.href = link;
                        }
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

    function deleteDelivery($pId) {
        global $connection;
    
        try {
            $query = $connection->prepare('UPDATE pedidos SET activo = 0 WHERE id = :id');
            $query->bindParam(':id', $pId, PDO::PARAM_INT);
            $query->execute();
    
            if($query->rowCount() > 0) {
                echo'<script type="text/javascript">
                        //window.location.href="../views/cartstore/delivery.php";
                        //alert("Pedido eliminado con éxito");
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