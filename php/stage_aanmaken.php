<?php
    session_start();
    require 'database.php';

    $username = $_SESSION['userid'];
    $bedrijfsnaam = mysqli_real_escape_string($conn, $_POST['bedrijfsnaam']);
    $plaats = mysqli_real_escape_string($conn, $_POST['plaats']);
    $websitelink = mysqli_real_escape_string($conn, $_POST['websitelink']);
    $contactpersoon = mysqli_real_escape_string($conn, $_POST['contactpersoon']);
    $contractdatum = mysqli_real_escape_string($conn, $_POST['contractdatum']);

    if (empty($bedrijfsnaam) || empty($plaats) || empty($websitelink) || empty($contactpersoon) || empty($contractdatum)) {
        header('location: ../dashboard_student.php?error=Velden waren niet correct.');
        return false;
    }

    $query = "INSERT INTO `stages` (`id`, `userid`, `bedrijfsnaam`, `plaats`, `websitelink`, `contactpersoon`, `contractdatum`)
    VALUES ('NULL', '$username', '$bedrijfsnaam', '$plaats', '$websitelink', '$contactpersoon', '$contractdatum')";
    if($conn->query($query)) {
        header('location: ../dashboard_student.php');
        return false;   
    }
    else {
        header('location: ../dashboard_student.php?error=Velden waren niet correct.');
        return false; 
    }  
?>