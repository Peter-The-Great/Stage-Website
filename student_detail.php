    <div class="container">
        <!DOCTYPE html>
        <?php
        require("php/database.php");
        ?>
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
            <?php
            $ID = $_GET['id'];

            $query = "SELECT * FROM `users` WHERE `id` = '$ID'";
            $result = mysqli_query($mysqli, $query);

            
            ?>
            <div class="card card-body text-center mt-3">
                <tr>
                    <th scope="col">userid</th>
                    <th scope="col">bedrijfsnaam</th>
                    <th scope="col">plaats</th>
                    <th scope="col">websitelink</th>>
                    <th scope="col">contract</th>>
                    <th scope="col">websitelink</th>
                    <th scope="col">contractdatum</th>
                    <th scope="col">contactpersoon</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th></th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                    </tr>
                </tbody>
                </table>

            </div>
    </div>
    </div>
    <?php
    require('components/footer.php');
    rquire('components/footer.php');
    ?>
    </body>

    </html>