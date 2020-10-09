<?php
session_start();
require 'database.php';


$begeleiding = $_POST['begeleiding'];
$technieken = $_POST['technieken'];
$algemeen = $_POST['algemeen'];
$opmerkingen = $_POST['opmerking'];

if (empty($begeleiding)) {
    header('location: ../dashboard_student.php?error=Begeleiding Velden waren niet correct.');
    return false;
}

if (empty($technieken)) {
    header("location: ../dashboard_student.php?error=Technieken Velden waren niet correct.");
    return false;
}

if (empty($algemeen)) {
    header("location: ../dashboard_student.php?error=Algemeen Velden waren niet correct.");
    return false;
}

if (empty($opmerkingen)) {
    header("location: ../dashboard_student.php?error=Opmerking Velden waren niet correct.");
    return false;
}

if(strlen($begeleiding) < 1 || strlen($begeleiding)  > 10){
    header('location: ../dashboard_student.php?error=Begeleiding Stringfout.');
    return false;
}
if(strlen($technieken) > 10 || strlen($technieken) < 1){
    header('location: ../dashboard_student.php?error=Technieken Stringfout.');
    return false;
}
if(strlen($algemeen) > 10 || strlen($algemeen) < 1){
    header('location: ../dashboard_student.php?error=Algemeen Stringfout.');
    return false;
}

// $stmt = $conn->prepare("INSERT INTO beoordeling(Stage_ID, userid, Cijfer_Begeleiding, Cijfer_Geleerde_Technieken, Cijfer_Bedrijf_Algemeen, Overige_Opmerkingen) VALUES (NULL, $session, $begeleiding, $technieken, $algemeen, $opmerkingen);");
// $stmt->execute();
// $stmt->close();


$session = $_SESSION['userid'];

$sql = "INSERT INTO beoordeling (stage_id, userid, begeleiding, technieken, algemeen, opmerking)
VALUES (NULL, '$session', '$begeleiding', '$technieken', '$algemeen', '$opmerkingen')";
$conn->query($sql);
header('location: ../dashboard_student.php'); 

?>