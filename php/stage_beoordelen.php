<?php
session_start();
require('database.php');

if (empty($_POST['begeleiding'])) {
    header('location: ../dashboard_student.php?error=Velden waren niet correct.');
    return false;
}

if (empty($_POST['technieken'])) {
    header("location: ../dashboard_student.php?error=Velden waren niet correct.");
    return false;
}

if (empty($_POST['algemeen'])) {
    header("location: ../dashboard_student.php?error=Velden waren niet correct.");
    return false;
}

if (empty($_POST['opmerking'])) {
    header("location: ../dashboard_student.php?error=Velden waren niet correct.");
    return false;
}

if(strlen($_POST['opmerking']) < 1 || strlen($_POST['opmerking']) > 10){ 
    header('location: ../dashboard_student.php?error=Stringfout.');
    return false;
}
if(strlen($_POST['begeleiding']) < 1 || strlen($_POST['begeleiding'])  > 10){
    header('location: ../dashboard_student.php?error=Stringfout.');
    return false;
}
if(strlen($_POST['technieken']) > 10 || strlen($_POST['technieken']) < 1){
    header('location: ../dashboard_student.php?error=Stringfout.');
    return false;
}
if(strlen($_POST['algemeen']) > 10 || strlen($_POST['algemeen']) < 1){
    header('location: ../dashboard_student.php?error=Stringfout.');
    return false;
}

$stmt = $conn->prepare("INSERT INTO `beoordeling` (`Cijfer_Begeleiding`, 'userid', `Cijfer_Geleerde_Technieken`, `Cijfer_Bedrijf_Algemeen`, `Overige_Opmerkingen`) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("iiiis", $_POST['begeleiding'], $_SESSION['userid'], $_POST['technieken'], $_POST['algemeen'], $_POST['opmerking']);
$stmt->execute();
$stmt->close();

header('location: location: ../dashboard_student.php');