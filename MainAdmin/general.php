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

    <?php  require_once '../include/adds.php' ?>

    <style>
        .c-gen-info {
            background-color: rgba(12, 84, 96, 0.11);
        }
        form {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            width: 50%;
            height: 80%;
            border: 20px solid transparent;
            margin-left: 1em;
            margin-bottom: 3em;

        }
        form input {
            margin: 1em 1em 1em 0;
        }

        .divider
        {
            position: relative;
            margin-top: 90px;
            height: 1px;
        }

        .div-transparent:before
        {
            content: "";
            position: absolute;
            top: 0;
            left: 5%;
            right: 5%;
            width: 90%;
            height: 1px;
            background-image: linear-gradient(to right, transparent, rgb(48,49,51), transparent);
        }
        .l-ex-ad img{
            max-width: 10em;
            margin: 1em 1em 1em 0;
        }
        input {
            padding:5px;
            border:2px solid #ccc;
            -webkit-border-radius: 5px;
            border-radius: 5px;
        }
    </style>


    <title>Document</title>
</head>
<body>



<div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <div class="border-end bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading border-bottom bg-light"><img src="/include/goto.png" style="max-width: 100px;" alt="site-logo"> </div>
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dash.php">Dashboard</a>
            <a class="list-group-item list-group-item-action list-group-item-success p-3" href="general.php">General</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="magazine.php">Magazine</a>
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
        <div class="container-fluid c-gen-info">
            <p class="text-center">Logotip: </p>
            <form class="form-logo">
                <div class="form-group">
                    <label>Logotipul actual:</label>
                </div>
                <div class="grid">
                    <div class="g-col-6 g-col-md-4">
                        <img style="width: 150px;" src="../include/goto.png" alt="logo">
                        <input type="file" class="form-control-file" id="changelogo">
                    </div>
                </div>
            </form>

            <div class="divider div-transparent"></div>
            <p class="text-center">Bannere principale: </p>
            <form class="form-logo">
                <div class="form-group">
                    <label>Bannerele actuale:</label>
                </div>
                <div class="form-group l-ex-ad">
                    <div class="grid">
                        <div class="g-col-6 g-col-md-4">
                            <img src="../include/images/b-category-1.png" alt="b1">
                            <input type="file" class="form-control-file" id="changebanner1">
                        </div>
                        <div class="g-col-6 g-col-md-4">
                            <img src="../include/images/b-category-2.png" alt="b2">
                            <input type="file" class="form-control-file" id="changebanner2">
                        </div>
                        <div class="g-col-6 g-col-md-4">
                            <img src="../include/images/b-category-3.png" alt="b3">
                            <input type="file" class="form-control-file" id="changebanner3">
                        </div>
                    </div>
                </div>
            </form>

            <div class="divider div-transparent"></div>
            <p class="text-center">Bannere categorii: </p>
            <form class="form-logo">
                <div class="form-group">
                    <label>Bannerele actuale:</label>
                </div>
                <div class="form-group l-ex-ad">
                    <div class="grid">
                        <div class="g-col-6 g-col-md-4">
                            <img src="../include/images/bc-category-1.png" alt="logo">
                            <input type="file" class="form-control-file" id="changecbanner1">
                        </div>
                        <div class="g-col-6 g-col-md-4">
                            <img src="../include/images/bc-category-2.png" alt="logo">
                            <input type="file" class="form-control-file" id="changecbanner2">
                        </div>
                        <div class="g-col-6 g-col-md-4">
                            <img src="../include/images/bc-category-3.png" alt="logo">
                            <input type="file" class="form-control-file" id="changecbanner3">
                        </div>
                        <div class="g-col-6 g-col-md-4">
                            <img src="../include/images/bc-category-4.png" alt="logo">
                            <input type="file" class="form-control-file" id="changecbanner4">
                        </div>
                        <div class="g-col-6 g-col-md-4">
                            <img src="../include/images/bc-category-5.png" alt="logo">
                            <input type="file" class="form-control-file" id="changecbanner5">
                        </div>
                        <div class="g-col-6 g-col-md-4">
                            <img src="../include/images/bc-category-6.png" alt="logo">
                            <input type="file" class="form-control-file" id="changecbanner6">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <?php  require_once '../include/fadmin.php' ?>
    </div>
</div>


</body>
</html>