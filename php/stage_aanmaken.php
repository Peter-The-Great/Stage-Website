<?php
    $stmt = $conn->prepare("INSERT INTO Bedrijven (ID, User, Bedrijf, Begin) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sss", $_SESSION['userid'], $_POST['Bedrijf'], $_POST['Begin']);
    // set parameters and execute
    $stmt->execute();
    $stmt->close();
    $conn->close();
?>
<?php
    require ('database.php');
    
    $username = $_SESSION['userid'];
    $bedrijfsnaam = $_POST['bedrijfsnaam'];
    $plaats = $_POST['plaats'];
    $websitelink = $_POST['websitelink'];
    $contactpersoon = $_POST['contactpersoon'];
    $contractdatum = $_POST['contractdatum'];


    
     

    $query = "INSERT INTO `stages` (`id`, `userid`, `bedrijfsnaam`, `plaats`, `websitelink`, `contactpersoon`, `contractdatum`)
    VALUES ('NULL', '$username', '$bedrijfsnaam', '$plaats', '$websitelink', '$contactpersoon', '$contractdatum')";

    
?>
<!-- 
- ID (NIET NEERZETTEN - AUTO INCREASE)
- userid 1
- bedrijfsnaam 2
- plaats 3
- weblink 4
- contactpersoon 5
- contactdatum 6
 -->