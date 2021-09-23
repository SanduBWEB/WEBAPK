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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/adaptive.css">

    <title>Shop GO - Marketplace</title>
    <style>
       body { overflow-x: hidden; }
       html { background-color: #fff; }
    </style>
</head>
<body>

<header>
    <div class="container">
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
</header>

<section class="main-option">
    <div class="container">
        <div class="m-option">

        </div>
    </div>
</section>


<section class="b-iamge">
    <div class="container">
        <div class="fb-main">
            <div class="c-image">
                <img src="include/images/576-523x523.jpg" alt=""><br>
                <button><span>Imbracaminte >></span></button>
            </div>
            <div class="c-image">
                <img src="include/images/576-523x523.jpg" alt=""><br>
                <button><span>Imbracaminte</span></button>
            </div>
            <div class="c-image">
                <img src="include/images/576-523x523.jpg" alt=""><br>
                <button><span>Salut</span></button>
            </div>
            <div class="c-image">
                <img src="include/images/576-523x523.jpg" alt=""><br>
                <button><span>Salut</span></button>
            </div>
            <div class="c-image">
                <img src="include/images/576-523x523.jpg" alt=""><br>
                <button><span>Salut</span></button>
            </div>
            <div class="c-image">
                <img src="include/images/576-523x523.jpg" alt=""><br>
                <button><span>Salut</span></button>
            </div>
        </div>
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



<footer>
    <div class="container">
        <nav class="m_mooter">
            <ul>
                <li><a href="#">Parametru</a></li>
                <li><a href="#">Parametru</a></li>
                <li><a href="#">Parametru</a></li>
                <li><a href="#">Parametru</a></li>
                <li><a href="#">Parametru</a></li>
                <li><a href="#">Parametru</a></li>
                <li><a href="#">Parametru</a></li>
                <li><a href="#">Parametru</a></li>
            </ul>
        </nav>
        <div class="author">
            <a href="#">Powered BY. Nicu & Sandu © <?php echo date("Y"); ?></a>
        </div>
    </div>
</footer>
<script>
    function phoneNav() {
        const x = document.getElementById("myLinks");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }
</script>
</body>
</html>