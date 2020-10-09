<!-- Login Page -->
<div class="container">
    <div class="row mt-4">
        <div class="login-box shadow p-3 mb-5 mx-auto">
            <h4 class="card-title mb-4 mt-1">Log in om verder te gaan!</h4>
            <form action="php/auth.php" method="POST">
                <div class="form-group">
                    <label for="email">E-Mail adres</label>
                    <input type="email" class="form-control" placeholder="student@glr.nl" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Wachtwoord</label>
                    <input type="password" placeholder="*****" class="form-control" id="password" name="password">
                </div>
                <?php
                if (isset($_GET['message'])) {
                    echo "<span style='color: #e81e1e;'>" . $_GET['message'] . "</span><br>";
                }
                ?>
                <button type="submit" class="btn btn-danger">Inloggen</button>
            </form>
        </div>
    </div>
    <div class="row mt-3 mx-auto">
        <!-- Bedrijven Logos -->
        <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
            <div class="card-body shadow h-100">
                <a href="https://www.indeed.nl/"><img src="images/indeed.png" style="max-width: 150px;" alt="" class="img-fluid mx-auto d-block pt-2"></a>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
            <div class="card-body shadow h-100">
            <a href="https://stageplaza.nl"><img src="images/stage.png" style="max-width: 150px;" alt="" class="img-fluid mx-auto d-block"></a>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
            <div class="card-body shadow h-100">
            <a href="https://www.studentenbureau.nl/tips"><img src="images/sb.png" style="max-width: 150px; max-height: 50px;" alt="" class="img-fluid mx-auto d-block"></a>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
            <div class="card-body shadow h-100">
            <a href="https://www.ictergezocht.nl"><img src="images/ict.jpg" style="max-width: 150px;" alt="" class="img-fluid mx-auto d-block pt-3"></a>
            </div>
        </div>
    </div>
</div>