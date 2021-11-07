<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php  require_once 'include/adds.php' ?>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <title>Log-in</title>
</head>
<body>
<div id="login">
    <h3 class="text-center text-white pt-5">Forma de inregistrare</h3>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">

                    <form id="register-form" class="form" action="" method="post">

                        <h3 class="text-center text-info">Register</h3>
                        <div class="form-group">
                            <label for="username" class="text-info">Nume:</label><br>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-info">Mail:</label><br>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="number" class="text-info">Numar de telefon:</label><br>
                            <input type="number" name="number" id="number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">Parola:</label><br>
                            <input type="text" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="remember-me" class="text-info"><span>Plaseaza-ma autentificat</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>

                            <br><input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                        </div>
                        <br>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
<!--PRIVET KOLEA-->




</html>
<!-- Test

