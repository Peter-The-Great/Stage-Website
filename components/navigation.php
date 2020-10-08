<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <a class="navbar-brand mx-auto">GLR Stages</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">
            <?php
            if (isset($_SESSION['rol']) && $_SESSION['rol'] == "student") { // If user is studentt
                echo "
                <li class='nav-item'>
                <a class='nav-link' href='dashboard_student.php'>Home</span></a>
                </li>
                <li class='nav-item'>
                <a class='nav-link' href='logout.php'>Uitloggen</a>
                </li>
                ";
            }
            else if(isset($_SESSION['rol']) && $_SERVER['SCRIPT_NAME']=="/Stage-Website/php/student_inzien.php" && $_SESSION['rol'] == "leraar"){
                echo "<li class='nav-item'>
                <a class='nav-link' href='../dashboard_docent.php'>Home</span></a>
                </li>
                <li class='nav-item'>
                <a class='nav-link' href='../logout.php'>Uitloggen</a>
                </li>";
            }
            else if(isset($_SESSION['rol']) && $_SESSION['rol'] == "leraar"){
                echo "<li class='nav-item'>
                <a class='nav-link' href='dashboard_docent.php'>Home</span></a>
                </li>
                <li class='nav-item'>
                <a class='nav-link' href='logout.php'>Uitloggen</a>
                </li>";
            }
            ?>
        </ul>
    </div>
</nav>