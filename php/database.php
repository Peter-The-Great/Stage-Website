<?php
    $user = 'u1367_pRuvRhdivc';
    $pass = '.CKtpkB6xx0=kxDZh6RE!rVJ';
    $db = 's1367_website';
    $host = '94.130.165.25:3306';
    
    //Create connection
    $conn = new mysqli($host, $user, $pass, $db) or die("Unable to connect");
    
    //Check connection
    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
?>
