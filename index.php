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



$setaccauth = 1;
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
    <?php  require_once 'include/adds.php' ?>
    
    
    <title>Shop GO - Marketplace</title>
    <style>
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


       .hovereffect {
           width: 100%;
           height: 94%;
           float: left;
           overflow: hidden;
           position: relative;
           text-align: center;
           cursor: default;
       }

       .hovereffect .overlay {
           position: absolute;
           overflow: hidden;
           width: 80%;
           height: 50%;
           left: 10%;
           top: 10%;
           border-bottom: 1px solid #FFF;
           border-top: 1px solid #FFF;
           -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
           transition: opacity 0.35s, transform 0.35s;
           -webkit-transform: scale(0,1);
           -ms-transform: scale(0,1);
           transform: scale(0,1);
       }

       .hovereffect:hover .overlay {
           opacity: 1;
           filter: alpha(opacity=100);
           -webkit-transform: scale(1);
           -ms-transform: scale(1);
           transform: scale(1);
       }

       .hovereffect img {
           display: block;
           position: relative;
           -webkit-transition: all 0.35s;
           transition: all 0.35s;
       }

       .hovereffect:hover img {
           filter: brightness(0.6);
           -webkit-filter: brightness(0.6);
       }

       .hovereffect h2 {
           text-transform: uppercase;
           text-align: center;
           position: relative;
           font-size: 17px;
           background-color: transparent;
           color: #FFF;
           padding: 1em 0;
           opacity: 0;
           filter: alpha(opacity=0);
           -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
           transition: opacity 0.35s, transform 0.35s;
           -webkit-transform: translate3d(0,-100%,0);
           transform: translate3d(0,-100%,0);
       }

       .hovereffect a {
           color: #FFF;
           padding: 1em 0;
           opacity: 0;
           filter: alpha(opacity=0);
           -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
           transition: opacity 0.35s, transform 0.35s;
           -webkit-transform: translate3d(0,100%,0);
           transform: translate3d(0,100%,0);
       }

       .hovereffect:hover a, .hovereffect:hover h2 {
           opacity: 1;
           filter: alpha(opacity=100);
           -webkit-transform: translate3d(0,0,0);
           transform: translate3d(0,0,0);
       }
       footer {
           margin-top: 5em;
       }
       .m-pmenu {
           font-family: SansSerif, sans-serif;
       }
       .slick-arrow {
           margin-top: -10%;
       }
       .slick-prev:before, .slick-next:before {
           color: #3d0b0b;
       }

    </style>
</head>
<body>


<!-- Login/ Reg forms -->
<section id="login-reg-platform">
    
    <div id="login">
        <span id="close-form">X</span>
        <h3 class="text-center text-white pt-5" style="color: black!important;">Forma de autorizare</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">

                        <form id="login-form" class="form" action="" method="post">

                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Log-In:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
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

</section>
<!-- Login/ Reg forms -->


<?php  require_once 'include/generaltopnav.php' ?>


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
                    <img src="include/images/b-category-1.png" class="d-block w-100" alt="Market Gata">
                </div>
                <div class="carousel-item">
                    <img src="include/images/b-category-2.png" class="d-block w-100" alt="Solutii individuale">
                </div>
                <div class="carousel-item">
                    <img src="include/images/b-category-3.png" class="d-block w-100" alt="Rapid si Sigur">
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
    <p class="text-center fs-2">
        Categorii:
    </p>
    <div class="items">
        <!--Ciclu-->
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="hovereffect">
                <img class="img-responsive" src="include/images/bc-category-1.png" alt="Imbracaminte">
                <div class="overlay">
                    <h2>Imbracaminte</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="hovereffect">
                <img class="img-responsive" src="include/images/bc-category-2.png" alt="Calculatoare si accesorii">
                <div class="overlay">
                    <h2>Calculatoare si accesorii</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="hovereffect">
                <img class="img-responsive" src="include/images/bc-category-3.png" alt="Calculatoare si accesorii">
                <div class="overlay">
                    <h2>Electrocasnice</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="hovereffect">
                <img class="img-responsive" src="include/images/bc-category-4.png" alt="Mobila">
                <div class="overlay">
                    <h2>Mobila</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="hovereffect">
                <img class="img-responsive" src="include/images/bc-category-5.png" alt="Gradina">
                <div class="overlay">
                    <h2>Gradina</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="hovereffect">
                <img class="img-responsive" src="include/images/bc-category-5.png" alt="Constructii">
                <div class="overlay">
                    <h2>Constructii</h2>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="content">
    <div class="container">
        <div class="inner_content">
            <h2>Descrierea proeictului</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
    </div>
</section>

<?php  require_once 'include/generalfooter.php' ?>
</body>


<!-- Js scripts -->
<script>


$("#close-form").click(function(e) {

console.log("clicked close form");
console.log($(this).closest("section"));
//$("#login-reg-platform").css("opacity", 1);
});


$("#login-button").click(function(e) {

    console.log("clicked login");
    $("#login-reg-platform").css("display", "block");
    //$("#login-reg-platform").css("opacity", 1);
});

$("#register-button").click(function(e) {


    console.log("clicked register");
    $("#login-reg-platform").css("display", "block");
    //$("#login-reg-platform").css("opacity", 1);
});

$("#login-form").submit(function(e) {

    e.preventDefault();
    var form = $(this).serialize();

    $.ajax({
        url: 'login_register.php',   //answ='+str+"q_a.php?an2="+str,
        dataType: 'text',
        type:'POST',
        data: {
            formData: form, 
            type: "login"
        },
        success: function (returndata) {  // if the request was done with success
        //
        console.log(returndata);

        }
    }).done(function(returndata){ // after the request is done
        if ($.trim(returndata) == 'Login cu success') {
            window.location.href = "index.php" ;         
        }
        else console.log("Eroare la login");
        //$("#error-message-login").html(returndata);

    });  

})

</script>
<!-- Js scripts -->


</html>