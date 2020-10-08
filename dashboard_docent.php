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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Student Informatie</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                    <div class="form-group">
                            <label>Studentnaam</label>
                            <input class="form-control" type='text' name='studentnaam' minlength='3' maxlength='50' readonly>
                        </div>
                        <div class="form-group">
                            <label>Bedrijfsnaam</label>
                            <input class="form-control" type='text' name='bedrijfsnaam' minlength='3' maxlength='50' readonly>
                        </div>
                        <div class="form-group">
                            <label>Bedrijfsplaats</label>
                            <input class="form-control" type='text' name='bedrijfsplaats' minLength='3' maxlength='5' readonly>
                        </div>
                        <div class="form-group">
                            <label>Link naar website</label>
                            <input class="form-control" type='text' name='websitelink' minlength='10' maxlength='255' readonly>
                        </div>
                        <div class="form-group">
                            <label>Contactpersoon</label>
                            <input class="form-control" type='text' name='contactpersoon' minlength='3' maxlength='50' readonly>
                        </div>
                        <div class="form-group">
                            <label>Contractdatum</label>
                            <input class="form-control" type='date' name='contractdatum' max='8' placeholder='YYYY-MM-DD' readonly>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Begeleidingscijfer</label>
                            <input class="form-control" type='text' name='begeleidingscijfer' max='8' readonly>
                        </div>
                        <div class="form-group">
                            <label>Technisch cijfer</label>
                            <input class="form-control" type='text' name='Technischcijfer' max='8' readonly>
                        </div>
                        <div class="form-group">
                            <label>Stagecijfer</label>
                            <input class="form-control" type='text' name='Stagecijfer' max='8' readonly>
                        </div>
                        <div class="form-group">
                            <label>Opmerking</label>
                            <input class="form-control" type='date' name='opmerking' max='8' readonly>
                        </div>                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php require("components/scripts.php");?>

</body>

</html>