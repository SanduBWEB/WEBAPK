<?php
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


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

<div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <div class="border-end bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading border-bottom bg-light"><img src="/include/goto.png" style="max-width: 100px;" alt="site-logo"> </div>
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dash.php">Dashboard</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="general.php">General</a>
            <a class="list-group-item list-group-item-action list-group-item-success p-3" href="magazine.php">Magazine</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="integrari.php">Integrari</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="setari.php">Setari</a>
        </div>
    </div>
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
        <!-- Top navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0"><li class="nav-item active">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">User-Name</a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Log-Out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
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
                    <td><button class="btn btn-warning">Redacteaza</button></td>
                    <td><button class="btn btn-danger">Sterge</button></td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Smart Price</td>
                    <td>15</td>
                    <td>Sandu</td>
                    <td><button class="btn btn-warning">Redacteaza</button></td>
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
