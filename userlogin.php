<?php

session_start();

if (isset($_SESSION['user_id'])) {
    echo ' <script>console.log("User is logged in");</script>';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <title>Log-in</title>
</head>
<!--Login Form-->
<body>
<div id="login">
    <h3 class="text-center text-white pt-5">Forma de autorizare</h3>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">

                    <form id="login-form" class="form" action="" method="post">

                        <h3 class="text-center text-info">Login</h3>
                        <div class="form-group">
                            <label for="email" class="text-info">Mail:</label><br>
                            <input type="email" name="email" id="email" class="form-control">
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
</body>
<!--Login Form END-->


<!-- Js scripts -->
<script>

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
 <!-- Test
 -->