<?php session_start();
if (isset($_SESSION['rol'])) {
    $rol = $_SESSION['rol'];
} else {
}   $rol = "leeg";
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Stage | Stage Portaal</title>
</head>

<body>
    <!-- Layout -->
    <?php require 'components/navigation.php';
    // Serve Content
    if (!isset($_SESSION['login'])) { // If user hasn't logged
        require 'components/login.php';
    } else if (isset($_SESSION['login'])) { // If user has logged in
        if ($rol == "student") { // If user is student
            require 'components/dashboard_student.php';
        } else if ($rol == "leraar") { // If user is teacher
            require 'components/dashboard_leraar.php';
        }
    }
    include 'components/footer.php' ?>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
</body>

</html>