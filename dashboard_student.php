<?php session_start();
require 'php/database.php';
if ($_SESSION['rol'] == "leraar" || !isset($_SESSION['rol'])) {
    header("location: index.php");
}

$stmt = $conn->prepare("SELECT bedrijfsnaam, plaats, websitelink, contactpersoon, contractdatum FROM stages WHERE userid = " . $_SESSION["userid"]);
$stmt->execute();
$stmt->bind_result($stage, $plaats, $weblink, $contactpersoon, $contractdatum);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Stage | Stage Portaal</title>
</head>

<body>
    <?php require('components/navigation.php'); ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-body text-center mt-3">
                    <h4>Welkom op GLR Stages</h4>
                    <p class="p-0 m-0"><?php
                                        if (isset($stage)) {
                                            echo "Je hebt op dit moment een stage bij <b>" . $stage . "</b>.<br><div class='text-center px-3'><button type='button' data-toggle='modal' data-target='#exampleModal2' class='btn btn-warning'>Wijzig Stage</button>
                            <button type='button' data-toggle='modal' data-target='#exampleModal3' class='btn btn-danger'>Verwijder Stage</button></div>";
                                        } else {
                                            echo "Het lijkt erop dat je momenteel nog geen stage hebt toegevoegd.<br><button type='button' data-toggle='modal' data-target='#exampleModal' class='btn btn-success'>Stage Inschrijven</button>";
                                        }
                                        if (isset($_GET['error'])) {
                                            echo "<span style='color: #e81e1e;'>" . $_GET['error'] . "</span><br>";
                                        }
                                        ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if (isset($stage)) { ?>
                <div class="col-sm-6">
                    <div class="card card-body mt-3 h-100">
                        <h3>Stage Informatie</h3>
                        <table>
                            <tr>
                                <th>Bedrijfsnaam:</th>
                                <td><?php echo $stage ?></td>
                            </tr>
                            <tr>
                                <th>Plaats:</th>
                                <td><?php echo $plaats ?></td>
                            </tr>
                            <tr>
                                <th>Contractdatum:</th>
                                <td><?php echo $contractdatum ?></td>
                            </tr>
                            <tr>
                                <th>Begeleider:</th>
                                <td><?php echo $contactpersoon ?></td>
                            </tr>
                        </table>
                        <a target="_blank" href="<?php echo $weblink ?>"><button style='margin-top: 1em;' class="btn btn-success">Bekijk Website</button></a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card card-body mt-3 h-100">
                        <form>
                            <h3>Stage Beoordeling</h3>
                            <div class="form-row">
                                <div class="form-group col-4">
                                    <label>Begeleiding</label>
                                    <select class="custom-select" required>
                                        <option selected value="">1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                    </select>
                                </div>
                                <div class="form-group col-4">
                                    <label>Technieken</label>
                                    <select class="custom-select" required>
                                        <option selected value="">1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                    </select>
                                </div>
                                <div class="form-group col-4">
                                    <label>Algemeen</label>
                                    <select class="custom-select" required>
                                        <option selected value="">1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Opmerking</label>
                                <textarea class="form-control">

                                </textarea>
                            </div>
                            <input type="submit" class="btn btn-success m-0" value="Beoordeel">
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php include('components/footer.php'); ?>
    <!-- Inschrijven -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Stage Inschrijven</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method='post' action='php/stage_aanmaken.php'>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Bedrijfsnaam</label>
                            <input class="form-control" type='text' name='bedrijfsnaam' minlength='3' maxlength='50' required>
                        </div>
                        <div class="form-group">
                            <label>Bedrijfsplaats</label>
                            <input class="form-control" type='text' name='plaats' required>
                        </div>
                        <div class="form-group">
                            <label>Link naar website</label>
                            <input class="form-control" type='text' name='websitelink' minlength='10' maxlength='255' required>
                        </div>
                        <div class="form-group">
                            <label>Contactpersoon</label>
                            <input class="form-control" type='text' name='contactpersoon' minlength='3' maxlength='50' required>
                        </div>
                        <div class="form-group">
                            <label>Contractdatum</label>
                            <input class="form-control" type='date' name='contractdatum' max='8' value='DD-MM-YYYY' required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Annuleren</button>
                        <button type="submit" class="btn btn-primary">Inschrijven</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Wijzigen -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Stage Wijzigen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method='post' action='php/stage_wijzigen.php'>
                    <div class="modal-body">
                        <div class="form-group">
                            <label><b>Bedrijfsnaam</label>
                            <input class="form-control" type='text' value="<?php echo $stage ?>" name='bedrijfsnaam' minlength='3' maxlength='50' required>
                        </div>
                        <div class="form-group">
                            <label>Bedrijfsplaats</label>
                            <input class="form-control" type='text' value="<?php echo $plaats ?>" name='plaats' required>
                        </div>
                        <div class="form-group">
                            <label>Link naar website</label>
                            <input class="form-control" type='text' value="<?php echo $weblink ?>" name='websitelink' minlength='10' maxlength='255' required>
                        </div>
                        <div class="form-group">
                            <label>Contactpersoon</label>
                            <input class="form-control" type='text' value="<?php echo $contactpersoon ?>" name='contactpersoon' minlength='3' maxlength='50' required>
                        </div>
                        <div class="form-group">
                            <label>Contractdatum</label>
                            <input class="form-control" type='date' value="<?php echo $contractdatum ?>" name='contractdatum' max='8' value='DD-MM-YYYY' required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Annuleren</button>
                        <button type="submit" class="btn btn-warning">Wijzigen</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Verwijderen -->
    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Stage Verwijderen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" class="mt-2 mb-2">
                    <form method='post' action='php/stage_verwijderen.php'>
                        <h5>Weet je zeker dat je deze stage wilt verwijderen?</h5><br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Annuleren</button>
                            <button type="submit" class="btn btn-danger">Verwijderen</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    require("components/scripts.php");
    ?>

</body>

</html>