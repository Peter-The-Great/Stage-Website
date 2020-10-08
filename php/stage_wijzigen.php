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

if(strlen($bedrijfsnaam) < 2 || strlen($bedrijfsnaam) > 50){ 
    header('location: ../dashboard_student.php?error=Stringfout.');
    return false;
}
if(strlen($contactpersoon) < 3 || strlen($contactpersoon)  > 50){
    header('location: ../dashboard_student.php?error=Stringfout.');
    return false;
}
if(strlen($websitelink) > 255 || strlen($websitelink) < 10){
    header('location: ../dashboard_student.php?error=Stringfout.');
    return false;
}
if(strlen($plaats) > 50 || strlen($contactpersoon) < 3){
    header('location: ../dashboard_student.php?error=Stringfout.');
    return false;
}

if(empty($bedrijfsnaam) || empty($plaats) || empty($websitelink) || empty($contactpersoon) || empty($contractdatum)) {
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