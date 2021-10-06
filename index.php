<?php
    "require_once 'include/db.php'"
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


    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/adaptive.css">
    <title>Shop GO - Marketplace</title>
    <style>
       body { overflow-x: hidden; }
       html { background-color: #fff; }
       section { margin-top: 0.5em }
       .img-fluid { margin-top: 1em}
       .d-grid { margin-top: 0.5em }
    </style>
</head>
<body>

<div class="container">
    <nav class="navbar navbar-expand-sm navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="include/goto.png" alt="Avatar Logo" style="width:80px;" class="rounded-pill">
            </a>
        </div>
        <div class="container-fluid justify-content-end">
            <!-- Links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Link 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link 3</a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<!--    <div class="container">
    <a href="#" class="logo"> <img src="include/goto.png" alt=""> </a>
    <ul class="menu_top">
        <li><a href="#">Imbracaminte</a> </li>
        <li><a href="#">Calculatoare si accesorii</a> </li>
        <li><a href="#">Electrocasnice</a> </li>
        <li><a href="#">Mobila</a> </li>
        <li><a href="#">Gradina</a> </li>
        <li><a href="#">Constructii</a> </li>
    </ul>
    </div>
    <div class="topnav">
        <a href="#" class="active"><img src="https://d.radikal.ru/d43/2108/08/8c9b77d73bf4.png" alt="logomobile"></a>
        <div id="myLinks">
            <a href="#">Imbracaminte</a>
            <a href="#">Calculatoare si accesorii</a>
            <a href="#">Electrocasnice</a>
            <a href="#">Mobila</a>
            <a href="#">Gradina</a>
            <a href="#">Constructii</a>
        </div>
        <a href="javascript:void(0);" class="icon" onclick="phoneNav()">
            <img src="https://static.thenounproject.com/png/592441-200.png" alt="mobilemenu">
        </a>
    </div>
    -->


<section class="main-option">
    <div class="container">
        <div class="m-option">

        </div>
    </div>
</section>
<!--
<section class="c-image">
    <div class="container justify-content-center">
        <div class="row">
            <div class="col-lg">
                <img class="img-fluid" src="include/images/1-600x600.jpg" alt="New York" style="max-width: 100%;">
                <div class="d-grid">
                    <button type="button" class="btn btn-primary btn-block">Categorie 1</button>
                </div>
            </div>
            <div class="col-lg">
                <img class="img-fluid" src="include/images/1-600x600.jpg" alt="New York" style="max-width: 100%;">
                <div class="d-grid">
                    <button type="button" class="btn btn-primary btn-block">Categorie 2</button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg">
                <img class="img-fluid" src="include/images/1-600x600.jpg" alt="New York" style="max-width: 100%;">
                <div class="d-grid">
                    <button type="button" class="btn btn-primary btn-block">Categorie 3</button>
                </div>
            </div>
            <div class="col-lg">
                <img class="img-fluid" src="include/images/1-600x600.jpg" alt="New York" style="max-width: 100%;">
                <div class="d-grid">
                    <button type="button" class="btn btn-primary btn-block">Categorie 4</button>
                </div>
        </div>

        <div class="row">
            <div class="col-lg">
                <img class="img-fluid" src="include/images/1-600x600.jpg" alt="New York" style="max-width: 100%;">
                <div class="d-grid">
                    <button type="button" class="btn btn-primary btn-block">Categorie 5</button>
                </div>
            </div>
            <div class="col-lg">
                <img class="img-fluid" src="include/images/1-600x600.jpg" alt="New York" style="max-width: 100%;">
                <div class="d-grid">
                    <button type="button" class="btn btn-primary btn-block">Categorie 6</button>
                </div>
            </div>
        </div>
    </div>
</section>

-->

<div class="items">
    <div><img data-lazy="include/images/1-600x600.jpg"></div>
    <div><img data-lazy="include/images/1-600x600.jpg"></div>
    <div><img data-lazy="include/images/1-600x600.jpg"></div>
    <div><img data-lazy="include/images/1-600x600.jpg"></div>
    <div><img data-lazy="include/images/1-600x600.jpg"></div>
    <div><img data-lazy="include/images/1-600x600.jpg"></div>
    <div><img data-lazy="include/images/1-600x600.jpg"></div>
</div>


<section id="content">
    <div class="container">
        <div class="inner_content">
            <h2>Descrierea obtiunilor</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
    </div>
</section>

<div class="container">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Item 1</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Item 2</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Item 3</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Item 4</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Item 5</a></li>
        </ul>
        <p class="text-center text-muted">Powered BY. Nicu & Sandu © <?php echo date("Y"); ?></p>
</div>
<script>
    function phoneNav() {
        const x = document.getElementById("myLinks");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    $(document).ready(function(){



        $('.items').slick({
            infinite: true,
            lazyLoad: 'ondemand',
            slidesToShow: 3,
            slidesToScroll: 3
        });






    });
</script>
</body>
</html>