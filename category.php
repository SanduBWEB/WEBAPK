<?php
?>
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

    <link rel="stylesheet" type="text/css" href="css/general.css" />
    <?php  require_once 'include/adds.php' ?>
    <style>
        .sb-category {
            display: none;
        }
    </style>

    <title>Shop GO - Marketplace</title>
</head>
<body>
    <?php  require_once 'include/generaltopnav.php' ?>
        <section class="markets">
            <div class="container px-4 py-5" id="custom-cards">
                <h2 class="pb-2 border-bottom">Imbracaminte</h2>

                <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
                    <div class="col">
                        <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('https://static.independent.co.uk/s3fs-public/thumbnails/image/2019/04/10/16/online-clothes-shops-hero.jpg');">
                            <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                                <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Turum Clothes</h2>
                                <ul class="d-flex list-unstyled mt-auto">
                                    <li class="me-auto">
                                        <a href="store-page.php"> <button class="btn btn-info">Mergi la magazin >>></button></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('https://img.gazeta.ru/files3/452/13530452/Bez-imeni-1-pic330-330x220-49220.jpg');">
                            <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                                <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Woow Shoes</h2>
                                <ul class="d-flex list-unstyled mt-auto">
                                    <li class="me-auto">
                                        <button class="btn btn-info">Mergi la magazin >>></button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('https://s3-symbol-logo.tradingview.com/nike--600.png');">
                            <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                                <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Nike Moldova</h2>
                                <ul class="d-flex list-unstyled mt-auto">
                                    <li class="me-auto">
                                        <button class="btn btn-info">Mergi la magazin >>></button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    <?php require_once 'include/generalfooter.php' ?>
</body>
</html>
