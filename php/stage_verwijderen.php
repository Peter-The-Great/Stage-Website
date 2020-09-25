<?php
session_start();
require('database.php');
if ($_SESSION['rol'] == "leraar" || !isset($_SESSION['rol'])) {
    header("location: index.php");
}

$userid = $_SESSION["userid"];

if(isset($userid)){
    $stmt = $conn->prepare("DELETE FROM `stages` WHERE `userid` = ".$userid);
    $stmt->execute();
    $stmt->close();
    header("location: ../dashboard_student.php");
}
else {
    header("location: ../dashboard_student.php?error=Stage kon niet worden verwijderd.");
}
?>