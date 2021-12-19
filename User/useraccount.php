<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Chorme, FireFox, Opera -->
        <meta name="theme-color" content="#36A26B">
        <!-- Windows Phone -->
        <meta name="msapplication-navbutton-color" content="#36A26B">
        <!-- Safari -->
        <meta name="apple-mobile-web-app-status-bar-style" content="#36A26B">

        <?php require_once '../include/adds.php' ?>

        <style>
            .sb-category {
                display: none;
            }
        </style>

        <title>Shop GO - Marketplace</title>
</head>
<body>
    <?php require_once '../include/generaltopnav.php' ?>

    <section class="user-info">
        <div class="container">
                    <div class="container">
                        <h2>Informatii personale:</h2>
                        <hr />
                        <div class="avatar-info">
                            <p class="font-weight-light h6">Avatarul dvs actual:</p>
                            <img class="img-responsive avatar-info img-thumbnail" id="user-avatar" width="150px" src="https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png" >
                            <form>
                                <input type="file" class="form-control-file" id="changeavatar">
                            </form>
                        </div>
                        <hr />
                        <div class="user-general-info">
                            <fieldset disabled>
                            <form>
                                <label for="name" class="form-label">Nume actual:</label><input class="form-control form-control-sm" type="text" id="name" placeholder="Introduce-ti un nume, va rog !" value="<?php echo $_SESSION['username']; ?>">
                        </div>
                                <label for="name" class="phone">Numarul actual:</label><input class="form-control form-control-sm" type="text" id="phone" placeholder="Introduce-ti numarul dvs !" value="+37368203045">
                                <label for="email" class="form-label">Email actual:</label><input class="form-control form-control-sm" type="email" id="email" placeholder="Introduce-ti un email !" value="eu@mail.com">
                            <hr />
                                <h6>Informatii livrare: </h6>
                                <label for="address" class="form-label">Adresa actuala:</label><input class="form-control form-control-sm" type="text" id="address" placeholder="Introduce-ti adresa dvs !" value="or. Chisinau, str.Ion Creanga 121">
                                <label for="p-index" class="form-label">Cod Postal:</label><input class="form-control form-control-sm" type="text" id="p-index" placeholder="Introduce-ti un cod postal !" value="M2029">
                                <hr />
                                <button id="submit" class="btn btn-secondary">Actualizeaza informatie</button>
                            </form>
                    </fieldset>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php require_once '../include/generalfooter.php' ?>
</body>
</html>
