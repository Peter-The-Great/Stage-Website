<?php session_start();
require('database.php');
if ($_SESSION['rol'] == "student" || !isset($_SESSION['rol'])) {
    header("location: index.php");
}
$id = $_GET['detail'];
if ($stmt1 = $conn->prepare("SELECT `naam`, `email` FROM users  WHERE id = ?")) {
    $stmt1->bind_param("i", $id);
    $stmt1->execute();
    $stmt1->store_result();
    if ($stmt1->num_rows > 0) {
        $stmt1->bind_result($naam, $email);
        $stmt1->fetch();
    }
    $stmt1->close();
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