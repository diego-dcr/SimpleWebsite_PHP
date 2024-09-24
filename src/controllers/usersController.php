<?php 
    include("../models/DB.php");
    include("../models/Usuario.php");

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
    
                $query = $connection->prepare('SELECT * FROM usuarios WHERE id = :id');
                $query->bindParam(':id', $id, PDO::PARAM_INT);
                $query->execute();

                if ($query->rowCount() === 0) {
                    echo "Usuario no encontrado";
                    exit();
                }
        
                $user;
        
                while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    $user = new Usuario($row['id'], $row['nombre'], $row['telefono'], $row['mail'], $row['password'], $row['tipo'], $row['activo'], $row['foto']);
                }
        
                echo json_encode($user->getArray());
            }
            catch(PDOException $e) {
                echo $e;
            }
        } else {
            try {
                $query = $connection->prepare('SELECT * FROM usuarios WHERE activo = 1');
                $query->execute();

                if ($query->rowCount() === 0) {
                    echo "Usuario no encontrado";
                    exit();
                }

                $users = array();
                while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    $user = new Usuario($row['id'], $row['nombre'], $row['telefono'], $row['mail'], $row['password'], $row['tipo'], $row['activo'], $row['foto']);
                    $users[] = $user->getArray();
                }

                echo json_encode($users);

            } catch(PDOException $e) {
                error_log("Error de consulta - " . $e, 0);
            }
        }
    } else if($_SERVER["REQUEST_METHOD"] === "POST") {
        $username = trim($_POST["userName"]);
        $password = trim($_POST["userPassword"]);

        $password = password_hash($password, PASSWORD_DEFAULT);

        if (sizeof($_FILES) > 0) {
            $tmp_name = $_FILES["photo"]["tmp_name"];
            $photo = file_get_contents($tmp_name);
        }else{
            echo $_FILES;
        }

        if(array_key_exists("userName", $_POST)) {
            postUser($username, $_POST["userPhone"], $_POST["userMail"], $password, $photo);
        }else if (array_key_exists("id", $_POST)) {
            if ($_POST["_method"] === "DELETE") {
                deleteUser($_POST["id"]);
            }
        }
    }

    function postUser($uName, $uPhone, $uMail, $uPassword, $uPhoto) {
        global $connection;

        $type = "user";

        try{
            $query = $connection->prepare('INSERT INTO usuarios VALUES (NULL, :uName, :uPhone, :uMail, :uPassword, :type, 1, :uPhoto)');
            $query->bindParam(':uName', $uName, PDO::PARAM_STR);
            $query->bindParam(':uPhone', $uPhone, PDO::PARAM_STR);
            $query->bindParam(':uMail', $uMail, PDO::PARAM_STR);
            $query->bindParam(':uPassword', $uPassword, PDO::PARAM_STR);
            $query->bindParam(':type', $type, PDO::PARAM_STR);
            $query->bindParam(':uPhoto', $uPhoto, PDO::PARAM_STR);
            $query->execute();
            
            if($query->rowCount() > 0) {
                echo'<script type="text/javascript">
                        window.location.href="../index.php";
                        alert("Cuenta registrada");
                    </script>';
            }
            else {
                echo "Error al agregar usuario";
            }
        }catch(PDOException $e) {
            error_log("Error de conexión - " . $e, 0);
            exit();
        }    
    }

    function deleteUser($pId) {
        global $connection;
    
        try {
            $query = $connection->prepare('UPDATE usuarios SET activo = 0 WHERE id = :id');
            $query->bindParam(':id', $pId, PDO::PARAM_INT);
            $query->execute();
    
            if($query->rowCount() > 0) {
                echo'<script type="text/javascript">
                        window.location.href="../views/admin/users.php";
                        alert("Usuario eliminado");
                    </script>';
            }
            else {
                var_dump($pId);
                echo "Error al eliminar usuario";
            }
        }
        catch(PDOException $e) {
            echo $e;
        }
    }
?>
