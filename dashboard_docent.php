<?php session_start();
require 'php/database.php';
if ($_SESSION['rol'] == "student" || !isset($_SESSION['rol'])) {
    header("location: index.php");
}
$sql = "SELECT userid, bedrijfsnaam, contactpersoon FROM stages ORDER BY bedrijfsnaam DESC;";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Stage | Stage Portaal Docent</title>
</head>

<body>
<?php require('components/navigation.php'); ?>
    <div class="container mt-3">
        <div class="row">
            <?php
            // Leerlingen lijst ophalen
            if (!$result) {
                echo "                
                <div class='col-7'>
                    <a class='nourl' href='#'>
                        <div class='card'>
                            <div class='card-body'>
                                <h3>Studenten konden niet gevonden worden.</h3>
                            </div>
                            <div class='card-footer'>
                                Contacteer u systeembeheerder als u denkt dat dit een fout is.
                            </div>
                        </div>
                    </a>
                </div>";
            } else {
                if ($result->num_rows === 0) {
                    echo "                
                    <div class='col-7'>
                        <a class='nourl' href='#'>
                            <div class='card'>
                                <div class='card-body'>
                                    <h3>Studenten konden niet gevonden worden.</h3>
                                </div>
                                <div class='card-footer'>
                                    Contacteer u systeembeheerder als u denkt dat dit een fout is.
                                </div>
                            </div>
                        </a>
                    </div>";
                } else {
                    foreach ($result as $item) {
                        $stmt = $conn->prepare("SELECT naam FROM users WHERE id = ".$item['userid'].";");
                        $stmt->execute();
                        $stmt->store_result();
                        $stmt->bind_result($naam);
                        $stmt->fetch();
                        echo "
                    <div class='col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3'>
                        <a class='nourl' href='php/student_inzien.php?detail=".$item['userid']."'><div class='card'>
                            <div class='card-body'>
                                <h3>" . $naam . "</h3>
                                <br><p><b>Bedrijf:</b> " . $item['bedrijfsnaam'] . "<br><b>Begeleider:</b> ".$item['contactpersoon'] ."</p>
                            </div>
                        </div></a>
                    </div>
                    ";
                    }
                }
            }
            ?>
        </div>
    </div>
    <!-- Inzien Student door docent -->
    <?php require("components/scripts.php");?>

</body>

</html>