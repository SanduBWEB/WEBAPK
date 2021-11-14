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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="JS/general.js"></script>
    <link rel="stylesheet" type="text/css" href="css/general.css" />
    <link href="css/general.css">
    
    
    <title>Shop GO - Marketplace</title>
</head>
<body>





<?php  require_once 'include/generaltopnav.php' ?>

<!-- Login/ Reg forms -->
<section id="login-reg-platform" style="padding-top: 0; padding-bottom: 0;">
    <!-- Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bine ai venit !</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                        <div class="modal-footer">
                            <label for="remember-me" class="text-info"><span>Plaseaza-ma autentificat</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>

                            <br><input type="submit" name="submit" class="btn btn-info btn-md" value="Intra in cont">
                        </div>
                        <br>

                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- Login/ Reg forms -->


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

    <div id="categoryCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                    <div class="col">
                        <div class="card mb-4 rounded-3">
                            <div class="card-body">
                                <img class="img-responsive" style="max-width: 300px" src="include/images/bc-category-1.png" alt="Imbracaminte">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card mb-4 rounded-3">
                            <div class="card-body">
                                <img class="img-responsive" style="max-width: 300px" src="include/images/bc-category-2.png" alt="Calculatoare si accesorii">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card mb-4 rounded-3">
                            <div class="card-body">
                                <img class="img-responsive" style="max-width: 300px" src="include/images/bc-category-3.png" alt="Calculatoare si accesorii">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                    <div class="col">
                    <div class="card mb-4 rounded-3">
                        <div class="card-body">
                            <img class="img-responsive" style="max-width: 300px" src="include/images/bc-category-4.png" alt="Mobila">
                        </div>
                    </div>
                </div>
                    <div class="col">
                    <div class="card mb-4 rounded-3">
                        <div class="card-body">
                            <img class="img-responsive" style="max-width: 300px" src="include/images/bc-category-5.png" alt="Gradina">
                        </div>
                    </div>
                </div>
                    <div class="col">
                    <div class="card mb-4 rounded-3">
                        <div class="card-body">
                            <img class="img-responsive" style="max-width: 300px" src="include/images/bc-category-6.png" alt="Constructii">
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#categoryCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#categoryCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>


<section class="project-description">
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
$(this).closest("section").css("display","none");
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