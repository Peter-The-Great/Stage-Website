<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <a class="navbar-brand" href="#">Stage</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home</span></a>
            </li>
            <?php
            if ($rol == "student") { // If user is student
                echo "<li class='nav-item'>
                <a class='nav-link' href='stages.php'>Stages</a>
                </li>
                <li class='nav-item'>
                <a class='nav-link' href='inschrijven.php'>Inschrijven</a>
                </li>";
            }
            else if($rol == "leraar"){
                echo "<li class='nav-item'>
                <a class='nav-link' href='stages.php'>Leerlingen</a>
                </li>
                <li class='nav-item'>
                <a class='nav-link' href='Stages.php'>Bedrijven</a>
                </li>";
            }
            ?>
        </ul>
    </div>
</nav>