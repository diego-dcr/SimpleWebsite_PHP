<?php
    include("../models/DB.php");
    include("../models/Tarjeta.php");

    try {
        $connection = DBConnection::getConnection();
    }
    catch(PDOException $e) {
        error_log("Error de conexión - " . $e, 0);
        exit();
    }

    if($_SERVER["REQUEST_METHOD"] === "GET") {

        session_start();
        $userID = $_SESSION["id"];

        if (array_key_exists("id", $_GET)) {
            try {
                $id = $_GET["id"];
                $query = $connection->prepare('SELECT * FROM metodospago WHERE id = :id AND userID = :userID');
                $query->bindParam(':id', $id, PDO::PARAM_INT);
                $query->bindParam(':id', $userID, PDO::PARAM_INT);
                $query->execute();
        
                $card;
        
                while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    $card = new Tarjeta($row['id'], $row['nombre'], $row['numeroTarjeta'], $row['fecha'], $row['cvv'], $row['pais'], $row['activo'], $row['userID']);
                }
        
                echo json_encode($card->getArray());
            }
            catch(PDOException $e) {
                echo $e;
            }
        }else {
            try {
                $query = $connection->prepare('SELECT * FROM metodospago WHERE activo = 1 AND userID = :userID');
                $query->bindParam(':userID', $userID, PDO::PARAM_INT);
                $query->execute();

                $cards = array();
                while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    $card = new Tarjeta($row['id'], $row['nombre'], $row['numeroTarjeta'], $row['fecha'], $row['cvv'], $row['pais'], $row['activo'], $row['userID']);
                    $cards[] = $card->getArray();
                }

                echo json_encode($cards);

            } catch(PDOException $e) {
                error_log("Error de consulta - " . $e, 0);
            }
        }
    } else if($_SERVER["REQUEST_METHOD"] === "POST") {

        session_start();
        $userID = $_SESSION["id"];

        if(array_key_exists("cardName", $_POST)) {
            if($_POST["_method"] === "POST") {
                postCard($_POST["cardName"], $_POST["cardNumber"], $_POST["cardDate"], $_POST["cardCvv"], $_POST["cardCountry"], $userID);
            } else if($_POST["_method"] === "PUT") {
                putCard($_POST["id"], $_POST["cardName"] , $_POST["cardNumber"], $_POST["cardDate"], $_POST["cardCvv"], $_POST["cardCountry"]);
            }
        } else if (array_key_exists("id", $_POST)) {
            if ($_POST["_method"] === "DELETE") {
                deleteCard($_POST["id"]);
            }
        }else {
            $data = json_decode(file_get_contents("php://input"));
    
            if ($data->_method === "POST") {
                postCard($data->cardName, $data->cardNumber, $data->cardDate, $data->cardCvv, $data->cardCountry, $data->userID);
            }
            else if($data->_method === "PUT") {
                putCard($data->id, $data->cardName, $data->cardNumber, $data->cardDate, $data->cardCvv, $data->cardCountry);
            }
        }
    }

    function postCard($nombre, $Notarjeta, $fecha, $cvv, $pais, $userID) {
        global $connection;

        try{
            $query = $connection->prepare('INSERT INTO metodospago VALUES (NULL, :nombre, :Notarjeta, :fecha, :cvv, :pais, 1, :userID)');
            $query->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $query->bindParam(':Notarjeta', $Notarjeta, PDO::PARAM_STR);
            $query->bindParam(':cvv', $cvv, PDO::PARAM_INT);
            $query->bindParam(':pais', $pais, PDO::PARAM_STR);
            $query->bindParam(':fecha', $fecha, PDO::PARAM_STR);
            $query->bindParam(':userID', $userID, PDO::PARAM_INT);
            $query->execute();
            
            if($query->rowCount() > 0) {
                echo'<script type="text/javascript">
                        window.location.href="../views/cartstore/delivery.php";
                        alert("Tarjeta agregada correctamente");
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

    function putCard($id, $nombre, $numero, $fecha, $cvv, $pais) {
        global $connection;
        try{
            $query = $connection->prepare('UPDATE metodospago SET nombre = :nombre, numeroTarjeta = :numero, fecha = :fecha, cvv = :cvv, pais = :pais WHERE id = :id');
            $query->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $query->bindParam(":numero", $numero, PDO::PARAM_STR);
            $query->bindParam(":fecha", $fecha, PDO::PARAM_STR);
            $query->bindParam(":cvv", $cvv, PDO::PARAM_INT);
            $query->bindParam(":pais", $pais, PDO::PARAM_STR);
            $query->bindParam(":id", $id, PDO::PARAM_INT);
            $query->execute();
            
            if($query->rowCount() > 0) {
                echo '<script type="text/javascript">
                        window.location.href="../views/cartstore/delivery.php";
                        alert("Tarjeta actualizada correctamente");
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

    function deleteCard($pId) {
        global $connection;
    
        try {
            $query = $connection->prepare('UPDATE metodospago SET activo = 0 WHERE id = :id');
            $query->bindParam(':id', $pId, PDO::PARAM_INT);
            $query->execute();
    
            if($query->rowCount() > 0) {
                echo'<script type="text/javascript">
                        window.location.href="../views/cartstore/delivery.php";
                        alert("Tarjeta eliminada correctamente");
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