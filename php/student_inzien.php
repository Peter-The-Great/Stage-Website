<?php session_start();
require('database.php');
if ($_SESSION['rol'] == "student" || !isset($_SESSION['rol'])) {
    header("location: index.php");
}
$id = $_GET['detail'];
if ($stmt1 = $conn->prepare("SELECT `naam` FROM users  WHERE id = ?")) {
if ($stmt1 = $conn->prepare("SELECT `naam`, `email` FROM users  WHERE id = ?")) {
    $stmt1->bind_param("i", $id);
    $stmt1->execute();
    $stmt1->store_result();
    if ($stmt1->num_rows > 0) {
        $stmt1->bind_result($naam);
        $stmt1->bind_result($naam, $email);
        $stmt1->fetch();
    }
    $stmt1->close();
}
if ($stmt2 = $conn->prepare("SELECT bedrijfsnaam, plaats, websitelink, contactpersoon, contractdatum FROM stages WHERE userid = ?")) {
    $stmt2->bind_param("i", $id);
    $stmt2->execute();
    $stmt2->store_result();
    if ($stmt2->num_rows > 0) {
        $stmt2->bind_result($bedrijf, $plaats, $websitelink, $contactpersoon, $contractdatum);
        $stmt2->fetch();
    }
    $stmt2->close();
}

if ($stmt3 = $conn->prepare("SELECT begeleiding, technieken, algemeen, opmerking FROM beoordeling WHERE userid = ?")) {
    $stmt3->bind_param("i", $id);
    $stmt3->execute();
    $stmt3->store_result();
    if ($stmt3->num_rows > 0) {
        $stmt3->bind_result($begeleiding, $technieken, $algemeen, $opmerkingen);
        $stmt3->fetch();
    }
    $stmt3->close();
}

if(empty($algemeen)) {
    $algemeen = "Niet Beoordeeld";
}
if(empty($technieken)) {
    $technieken = "Niet Beoordeeld";   
}
if(empty($begeleiding)) {
    $begeleiding = "Niet Beoordeeld";   
}
if (empty($opmerkingen)) {
    $opmerkingen= "Geen Opmerking";   
}


$sli = "SELECT bedrijfsnaam, plaats, websitelink, contactpersoon, contractdatum FROM stages WHERE userid = " . $id . " ORDER BY contractdatum DESC;";
$done = $conn->query($sli);
?>
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Stage | Stage Portaal Docent</title>
</head>

<body>
    <?php require('../components/navigation.php'); ?>
    <!-- Docent - Student en beoordeling inzien -->
    <div class="container">
        <div class="row">
            <div class="card card-body mt-3">
                <form>
                    <div class="form-group">
                        <label>Student</label>
                        <input type="text" value='<?php echo $naam; ?>' class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Bedrijfnaam</label>
                        <input type="text" value='<?php echo $bedrijf ?>' class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Plaats</label>
                        <input type="text" value='<?php echo $plaats ?>' class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Website</label>
                        <input type="text" value='<?php echo $websitelink ?>' class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Contactpersoon</label>
                        <input type="text" value='<?php echo $contactpersoon ?>' class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Contractdatum</label>
                        <input type="date" value='<?php echo $contractdatum ?>' class="form-control" readonly>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-4">
                            <label>Begeleiding</label>
                            <input type="text" value='<?php echo $begeleiding ?>' class="form-control" readonly>
                        </div>
                        <div class="form-group col-4">
                            <label>Technieken</label>
                            <input type="text" value='<?php echo $technieken ?>' class="form-control" readonly>
                        </div>
                        <div class="form-group col-4">
                            <label>Algemeen</label>
                            <input type="text" value='<?php echo $algemeen ?>' class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Opmerking</label>
                        <textarea name="overige_opmerkingen" class="form-control" readonly><?php echo $opmerkingen ?></textarea>
                    </div>
                    <a href="../dashboard_docent.php" class='btn btn-primary'>Ga Terug</a>
                </form>
            </div>
        </div>
    </div>
    <!-- <?php require('../components/scripts.php'); ?> -->
</body>

<body>
<?php require('../components/navigation.php');?>
<div class="container">
    <div class="row">
        <div class="card card-body">
            <form>
                <div class="form-group">
                    <label>Student</label>
                    <input type="" class="form-cotrol">
                </div>
                <div class="form-group">
                    <label>Bedrijfnaam</label>
                    <input type="" class="form-cotrol">
                </div>
                <div class="form-group">
                    <label>Plaats</label>
                    <input type="" class="form-cotrol">
                </div>
                <div class="form-group">
                    <label>Contactpersoon</label>
                    <input type="" class="form-cotrol">
                </div>
                <div class="form-group">
                    <label>Contractdatum</label>
                    <input type="" class="form-cotrol">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary">
                </div>    
            </form>
        </div>
    </div>
</div>
<!-- <?php require('../components/scripts.php');?> -->
</body>
</html>