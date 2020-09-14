<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Student stage toevoeg</title>
    </head>
    <body>
        <?php
            require ('database.php');

            echo "<form method='post' action='student_stage_toevoeg_verwerk.php'>";
            echo    "<table>";
            echo        "<tr><td>naam bedrijf:</td>";
            echo        "<td><input type='text' name='bedrijfsnaam' minlength='3' maxlength='50' required></td></tr>";
            echo        "<tr><td>plaats:</td>";
            echo        "<td><input type='text' name=''></td></tr>";
            echo        "<tr><td>link naar website:</td>";
            echo        "<td><input type='text' name='websitelink' minlength='10' maxlength='255' required></td></tr>";
            echo        "<tr><td>contactpersoon:</td>";
            echo        "<td><input type='text' name='contactpersoon' minlength='3' maxlength='50' required></td></tr>";
            echo        "<tr><td>datum contract getekend:</td>";
            echo        "<td><input type='date' name='contractdatum' max='8' value='DD-MM-YYYY' required></td></tr>";
            echo        "<tr><td>verstuur formulier:</td>";
            echo        "<td><input type='submit' name='formulierversturen' value='verzenden'></td></tr>";
            echo    "</table>";
            echo "</form>";
        ?>
    </body>
</html>