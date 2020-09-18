<?php session_start();
if ($_SESSION['rol'] == "leraar" || !isset($_SESSION['rol'])) {
    header("location: index.php");
}
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
    <?php require 'components/navigation.php'; ?>
    <div class="container">
        <div class="row">
            <div class="card card-body text-center mt-3">
                <h4>Welkom op GLR Stages</h4>
                <p class="p-0 m-0"><?php
                    if (isset($stage)) {
                         echo "Je hebt op dit moment een stage bij <b>" . $stage . "</b>.";
                    } else {
                        echo "Het lijkt erop dat je momenteel nog geen stage hebt toegevoegd.<br><button type='button' data-toggle='modal' data-target='#exampleModal' class='btn btn-success'>Stage Inschrijven</button>";
                    }
                ?></p>
            </div>
        </div>
    </div>
    <?php include 'components/footer.php'; ?>
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
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Annuleren</button>
                    <button type="submit" class="btn btn-success">Inschrijven</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    require_once("components/scripts.php");
    ?>
    
</body>

</html>