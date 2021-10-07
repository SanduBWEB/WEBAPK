<?php

session_start();

if (isset($_SESSION['user_id'])) {
    echo ' <script>console.log("User is logged in");</script>';
    echo '<script>console.log("Username - '.$_SESSION['username'].'");</script>';
    echo '<script>console.log("Username - '.$_SESSION['user_id'].'");</script>';
}
else {
	$_SESSION['username'] = 0; //not logged in
    echo ' <script>console.log("User is not logged in");</script>';
}

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
    <script src="JS/general.js"></script>
    
    
    <title>Shop GO - Marketplace</title>
    <style>
       body { overflow-x: hidden; }
       html { background-color: #fff; }
       section { margin-top: 1em }
       .items {
           width: 90%;
           margin: 100px auto 0;
       }

       .slick-slide {
           margin: 10px
       }

       .slick-slide img {
           width: 100%;
           border: 0 solid #0a0a0a
       }
    </style>
</head>
<body>


<header class="p-3 text-white" style="background-color: rgba(218,218,218,0.18)">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <img class="bi me-2" width="80em" src="include/goto.png" aria-label="Bootstrap" alt="logo marketplace">
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 text-black">Imbracaminte</a></li>
                <li><a href="#" class="nav-link px-2 text-black">Calculatoare si accesorii</a></li>
                <li><a href="#" class="nav-link px-2 text-black">Electorcasnice</a></li>
                <li><a href="#" class="nav-link px-2 text-black">Mobila</a></li>
                <li><a href="#" class="nav-link px-2 text-black">Gradina</a></li>
                <li><a href="#" class="nav-link px-2 text-black">Constructii</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input type="search" class="form-control form-control-dark" placeholder="Cauta" aria-label="Search">
            </form>

            <div class="text-end">
                <button type="button" class="btn btn-outline-dark me-2">Intra in cont</button>
                <button type="button" class="btn btn-warning">Inregistreaza-te</button>
            </div>
        </div>
    </div>
</header>


<section class="info-marketplace">
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="include/images/b-category-1.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>

<section class="c-banner-info">
    <div class="d-block justify-content-center">
        <h1>Categorii:</h1>
    </div>
    <div class="items">
        <div><img src="include/images/1-600x600.jpg" alt="Imbracaminte"></div>
        <div><img src="include/images/1-600x600.jpg" alt="Calculatoare si accesorii"></div>
        <div><img src="include/images/1-600x600.jpg" alt="Electrocasnice"></div>
        <div><img src="include/images/1-600x600.jpg" alt="Mobila"></div>
        <div><img src="include/images/1-600x600.jpg" alt="Gradina"></div>
        <div><img src="include/images/1-600x600.jpg" alt="Constructii"></div>
    </div>
</section>


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