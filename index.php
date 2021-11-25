<?php

// session_start();

// if (isset($_SESSION['user_id'])) {
//     echo ' <script>console.log("User is logged in");</script>';
//     echo '<script>console.log("Username - '.$_SESSION['username'].'");</script>';
//     echo '<script>console.log("Username - '.$_SESSION['user_id'].'");</script>';
// }
// else {
// 	$_SESSION['username'] = 0; //not logged in
//     $_SESSION['logged'] = 0;
//     echo ' <script>console.log("User is not logged in");</script>';
// }



// $setaccauth = 1;
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
                                <a href="/category?id=1&cat=Îmbrăcăminte"> <img class="img-responsive" style="max-width: 300px" src="include/images/bc-category-1.png" alt="Imbracaminte"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card mb-4 rounded-3">
                            <div class="card-body">
                                <a href="/category?id=4&cat=Calculatoare și accesorii"><img class="img-responsive" style="max-width: 300px" src="include/images/bc-category-2.png" alt="Calculatoare si accesorii"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card mb-4 rounded-3">
                            <div class="card-body">
                                <a href="/category?id=6&cat=Electrocasnice"> <img class="img-responsive" style="max-width: 300px" src="include/images/bc-category-3.png" alt="Calculatoare si accesorii"> </a>
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
                            <a href="/category?id=5&cat=Mobilă"><img class="img-responsive" style="max-width: 300px" src="include/images/bc-category-4.png" alt="Mobila"></a>
                        </div>
                    </div>
                </div>
                    <div class="col">
                    <div class="card mb-4 rounded-3">
                        <div class="card-body">
                            <a href="/category?id=2&cat=Grădină"><img class="img-responsive" style="max-width: 300px" src="include/images/bc-category-5.png" alt="Gradina"></a>
                        </div>
                    </div>
                </div>
                    <div class="col">
                    <div class="card mb-4 rounded-3">
                        <div class="card-body">
                            <a href="/category?id=3&cat=Construcții"><img class="img-responsive" style="max-width: 300px" src="include/images/bc-category-6.png" alt="Constructii"></a>
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


// $("#close-form").click(function(e) {

// console.log("clicked close form");
// console.log($(this).closest("section"));
// $(this).closest("section").css("display","none");
// //$("#login-reg-platform").css("opacity", 1);
// });


// $("#login-button").click(function(e) {

//     console.log("clicked login");
//     $("#login-reg-platform").css("display", "block");
//     //$("#login-reg-platform").css("opacity", 1);
// });

// $("#register-button").click(function(e) {


//     console.log("clicked register");
//     $("#login-reg-platform").css("display", "block");
//     //$("#login-reg-platform").css("opacity", 1);
// });


// $("#logout-button").click(function(e) {


//     $.ajax({
//         url: 'login_register.php',   //answ='+str+"q_a.php?an2="+str,
//         dataType: 'text',
//         type:'POST',
//         data: {
//             formData: false, 
//             type: "logout"
//         },
//         success: function (returndata) {  // if the request was done with success
//         //
//         console.log(returndata);

//         }
//     }).done(function(returndata){ // after the request is done
//         if ($.trim(returndata) == 'destroyed') {
//             window.location.href = "index.php" ;         
//         }
//         else console.log("Eroare la login");
        
//         $("#login-message-test").html(returndata);

//     });  


// });

// $("#login-form").submit(function(e) {

//     e.preventDefault();
//     var form = $(this).serialize();

//     $.ajax({
//         url: 'login_register.php',   //answ='+str+"q_a.php?an2="+str,
//         dataType: 'text',
//         type:'POST',
//         data: {
//             formData: form, 
//             type: "login"
//         },
//         success: function (returndata) {  // if the request was done with success
//         //
//         console.log(returndata);

//         }
//     }).done(function(returndata){ // after the request is done
//         if ($.trim(returndata) == 'Login cu success') {
//             window.location.href = "index.php" ;         
//         }
//         else console.log("Eroare la login");
        
//         $("#login-message-test").html(returndata);

//     });  

// })

</script>
<!-- Js scripts -->


</html>