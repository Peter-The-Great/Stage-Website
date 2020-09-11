<?php
    session_start();
    require("database.php");
    if(!isset($_POST["email"], $_POST["password"]) ) {
        header("Location: index.php?message=Je hebt niet alle velden correct ingevuld!");
    }
    if($stmt = $conn->prepare("SELECT email,password,rol FROM users WHERE email = ?")) {
        $stmt->bind_param("s", $_POST["email"]);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($email, $password, $rol);
            $stmt->fetch();
            
            $pswrd = $_POST["password"];
            if (md5($pswrd) === $password) {
                $_SESSION["email"] = $email;
                $_SESSION['rol'] = $rol;
                header("Location: ../index.php");
            } else {
                session_destroy();
                header("Location: ../index.php?message=Het wachtwoord komt niet overeen.");
            }
        } else {
            session_destroy();
            header("Location: ../index.php?nessage=We konden geen account vinden met dit E-Mail address.");
        }
        $stmt->close();
    }
?>