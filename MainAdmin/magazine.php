<?php
session_start();
?>
<!doctype html>
<html lang="en">
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

    <?php  require_once '../include/adds.php' ?>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


    <title>Document</title>
</head>
<body>


<!-- Modal -->
<div class="modal fade" id="addMagModal" tabindex="-1" aria-labelledby="addMagLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMagLabel">Adauga Magazin Nou</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="accesEmail" class="form-label">Email acces</label>
                        <input type="email" class="form-control" id="accesEmail" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Email Persoanei care are acces la magazin.</div>
                    </div>
                    <div class="mb-3">
                        <label for="nameStore" class="form-label">Nume Magazin</label>
                        <input type="text" class="form-control" id="nameStore">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Esi !</button>
                    <button type="button" class="btn btn-primary">Salveaza</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="redactMagModal" tabindex="-1" aria-labelledby="addMagLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
            <div class="modal-header">
                <h5 class="modal-title" id="redactMagLabel">Redacteaza acces, magazin: <?php echo "Name Magazin"?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="redactEmail" class="form-label">Email acces</label>
                        <input type="email" class="form-control" id="accesEmail" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Email Persoanei care are acces la magazin.</div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Esi !</button>
                    <button type="button" class="btn btn-primary">Salveaza</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php require_once 'adminHeader.php' ?>


<div class="row">
    <div class="col-md-1">
        <?php require_once 'adminSidebar.php' ?>
    </div>
    <div class="col-md-11">
        <div class="container-fluid">
            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addMagModal" style="margin: 1em 1em 1em 0em">Adauga magazin</button>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nume</th>
                    <th scope="col">Produse</th>
                    <th scope="col">Adaugat (Persoana)</th>
                    <th scope="col">Setari Acces</th>
                    <th scope="col">#</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Trash IT</td>
                    <td>200</td>
                    <td>Sandu</td>
                    <td><button data-bs-toggle="modal" data-bs-target="#redactMagModal" class="btn btn-warning">Redacteaza</button></td>
                    <td><button class="btn btn-danger">Sterge</button></td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Smart Price</td>
                    <td>15</td>
                    <td>Sandu</td>
                    <td><button data-bs-toggle="modal" data-bs-target="#redactMagModal" class="btn btn-warning">Redacteaza</button></td>
                    <td><button class="btn btn-danger">Sterge</button></td>
                </tr>
                </tbody>
            </table>
        </div>
        <?php  require_once '../include/fadmin.php' ?>
    </div>
</div>


</body>
</html>
