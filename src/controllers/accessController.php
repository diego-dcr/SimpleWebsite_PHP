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

    if($_SERVER["REQUEST_METHOD"] === "POST") {
        if($_POST["_method"] === "POST"){
            $mail = trim($_POST["userMail"]);
            $password = trim($_POST["userPassword"]);

            try {

                $query = $connection->prepare('SELECT * FROM usuarios WHERE mail = :mail AND activo = 1');
                $query->bindParam(':mail', $mail, PDO::PARAM_STR);
                $query->execute();


                if ($query->rowCount() === 0) {
                    echo'<script type="text/javascript">
                            window.location.href="../index.php";
                            alert("Usuario no encontrado");
                        </script>';
                }

                $user;
                while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    $user = new Usuario($row['id'], $row['nombre'], $row['telefono'], $row['mail'], $row['password'], $row['tipo'], $row['activo'], $row['foto']);
                }

                if(!password_verify($password, $user->getPassword())) {
                    echo'<script type="text/javascript">
                        window.location.href="../index.php";
                        alert("Contraseña incorrecta");
                    </script>';
                    exit();
                }

                session_start();

                $_SESSION["id"] = $user->getId();
                $_SESSION["nombre"] = $user->getNombre();
                $_SESSION["telefono"] = $user->getTelefono();
                $_SESSION["mail"] = $user->getMail();
                $_SESSION["password"] = $user->getPassword();
                $_SESSION["tipo"] = $user->getTipo();
                $_SESSION["activo"] = $user->getActivo();
                $_SESSION["foto"] = $user->getFoto();

                echo'<script type="text/javascript">
                        window.location.href="../index.php";
                        alert("Bienvenido ' . $user->getNombre() . '");
                    </script>';

            }catch(PDOException $e) {
                echo $e;
            }
        } else if($_POST["_method"] === "DELETE") {
            session_start();
            session_destroy();
            echo'<script type="text/javascript">
                        window.location.href="../index.php";
                        localStorage.clear();
                    </script>';
            exit();
        }
    }
?>