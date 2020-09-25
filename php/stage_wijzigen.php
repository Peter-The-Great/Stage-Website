<?php session_start();
require('database.php');

if ($_SESSION['rol'] == "leraar" || !isset($_SESSION['rol'])) {
    header("location: index.php");
}

$userid = $_SESSION['userid'];
$bedrijfsnaam = mysqli_real_escape_string($conn, $_POST['bedrijfsnaam']);
$plaats = mysqli_real_escape_string($conn, $_POST['plaats']);
$websitelink = mysqli_real_escape_string($conn, $_POST['websitelink']);
$contactpersoon = mysqli_real_escape_string($conn, $_POST['contactpersoon']);
$contractdatum = mysqli_real_escape_string($conn, $_POST['contractdatum']);

if (empty($bedrijfsnaam) || empty($plaats) || empty($websitelink) || empty($contactpersoon) || empty($contractdatum)) {
    header('location: ../dashboard_student.php?error=Velden waren niet correct.');
    return false;
}

$query = "UPDATE `stages` SET `bedrijfsnaam`='".$bedrijfsnaam."', `plaats`='".$plaats."' , `websitelink` = '".$websitelink."', `contactpersoon` = '".$contactpersoon."', `contractdatum` = '".$contractdatum."' WHERE `userid` = ".$userid;

if($conn->query($query)) {
    header('location: ../dashboard_student.php');
    return false;   
}

else {
    header('location: ../dashboard_student.php?error=Velden waren niet correct.');
    return false; 
}  

?>