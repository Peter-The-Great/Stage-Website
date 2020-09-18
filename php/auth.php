<?php
    session_start();
    require_once("database.php");
    if(!isset($_POST["email"], $_POST["password"]) ) {
        header("Location: index.php?message=Je hebt niet alle velden correct ingevuld!");
    }
    if($stmt = $conn->prepare("SELECT id, email,password,rol FROM users WHERE email = ?")) {
        $stmt->bind_param("s", $_POST["email"]);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $email, $password, $rol);
            $stmt->fetch();
            
            $pswrd = $_POST["password"];
            if (md5($pswrd) == $password) {
                $_SESSION["email"] = $email;
                $_SESSION['userid'] = $id;
                $_SESSION['rol'] = $rol;
                if ($rol == "student") { // If user is student
                     header('location: ../dashboard_student.php');
                } else if ($rol == "leraar") { // If user is teacher
                     header('location: ../dashboard_docent.php');
                }
                else {
                    session_destroy();
                    header("Location: ../index.php?message=Je account is inactief gezet.");                    
                }
            } else {
                session_destroy();
                header("Location: ../index.php?message=Het wachtwoord komt niet overeen.");
            }
        } else {
            session_destroy();
            header("Location: ../index.php?message=We konden geen account vinden met dit E-Mail address.");
        }
        $stmt->close();
    }
?>