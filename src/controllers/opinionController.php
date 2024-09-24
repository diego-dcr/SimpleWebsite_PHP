<?php
    include("../models/DB.php");
    include("../models/Opinion.php");

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

                $query = $connection->prepare('SELECT * FROM opinion WHERE id = :id');
                $query->bindParam(':id', $id, PDO::PARAM_INT);
                $query->execute();

                $opinion;

                while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    $userID = $row['userID'];
                    $query2 = $connection->prepare('SELECT * FROM usuarios WHERE id = :id');
                    $query2->bindParam(':id', $userID, PDO::PARAM_INT);
                    $query2->execute();

                    while($row2 = $query2->fetch(PDO::FETCH_ASSOC)) {
                        $opinion = new Opinion($row['id'], $row['comentario'], $row['nombre'], $userID, $row2['foto']);
                    }

                }

                echo json_encode($opinion->getArray());
            }
            catch(PDOException $e) {
                echo $e;
            }
        } else {
            try {
                $query = $connection->prepare('SELECT * FROM opinion WHERE activo = 1');
                $query->execute();

                $opinions = array();
                
                while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    $userID = $row['userID'];

                    $query2 = $connection->prepare('SELECT * FROM usuarios WHERE id = :id');
                    $query2->bindParam(':id', $userID, PDO::PARAM_INT);
                    $query2->execute();

                    while($row2 = $query2->fetch(PDO::FETCH_ASSOC)) {
                        $opinion = new Opinion($row['id'], $row['comentario'], $row['nombre'], $userID, $row2['foto']);
                        $opinions[] = $opinion->getArray();
                    }

                }

                echo json_encode($opinions);

            } catch(PDOException $e) {
                error_log("Error de consulta - " . $e, 0);
            }
        }

    } else if($_SERVER["REQUEST_METHOD"] === "POST") {
        session_start();
        $userID = $_SESSION['id'];
        if(array_key_exists("commentName", $_POST)) {
            if($_POST["_method"] === "POST") {
                postOpinion($_POST["commentName"], $_POST["commentArea"], $userID);
            }
        } else if(array_key_exists("id", $_POST)) {
            if($_POST["_method"] === "DELETE") {
                deleteOpinion($_POST["id"]);
            }
        } else {
            $data = json_decode(file_get_contents("php://input"));
            if ($data->_method === "POST") {
                postOpinion($data->commentName, $data->commentArea, $userID);
            }
        }
    }

    function postOpinion($name, $comment, $id) {
        try {
            $connection = DBConnection::getConnection();

            $query = $connection->prepare('INSERT INTO opinion VALUES (NULL, :nombre, :comentario, :userID, 1)');
            $query->bindParam(':comentario', $comment, PDO::PARAM_STR);
            $query->bindParam(':nombre', $name, PDO::PARAM_STR);
            $query->bindParam(':userID', $id, PDO::PARAM_INT);
            $query->execute();

            if($query->rowCount() > 0) {
                echo'<script type="text/javascript">
                        window.location.href="../index.php";
                        alert("Gracias por tu opinión");
                    </script>';
            } else {
                echo '<script type="text/javascript">
                        window.location.href="../views/others/error.php";
                    </script>';
            }
        } catch(PDOException $e) {
            echo $e;
        }
    }

    function deleteOpinion($id) {
        try {
            $connection = DBConnection::getConnection();

            $query = $connection->prepare('UPDATE opinion SET activo = 0 WHERE id = :id');
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();

            if($query->rowCount() > 0) {
                echo'<script type="text/javascript">
                        window.location.href="../index.php";
                        alert("Opinion eliminada");
                    </script>';
            } else {
                echo '<script type="text/javascript">
                        window.location.href="../views/others/error.php";
                    </script>';
            }
        } catch(PDOException $e) {
            echo $e;
        }
    }
?>