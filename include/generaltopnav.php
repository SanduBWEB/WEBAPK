<?php


session_start();

if (isset($_SESSION['user_id'])) {
    echo ' <script>console.log("User is logged in");</script>';
    echo '<script>console.log("Username - '.$_SESSION['username'].'");</script>';
    echo '<script>console.log("Username - '.$_SESSION['user_id'].'");</script>';
}
else {
	$_SESSION['username'] = 0; //not logged in
    $_SESSION['logged'] = 0;
    echo ' <script>console.log("User is not logged in");</script>';
}


?>

<style>
    #cart-icon {
        max-width: 45px;
    }
</style>
<header class="p-3 text-white navbar-fixed-top">
    <div class="container">
        <div class="d-flex m-pmenu flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-decoration-none">
                <img class="bi me-2" width="80em" src="../include/goto.png" aria-label="Bootstrap" alt="logo marketplace">
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <!--Ciclu-->
                <!--<li><a href="MainAdmin/dash" class="nav-link px-2 text-black">Imbracaminte</a></li>  viewFilm?id='.$row['id'].'"-->
                <li><a href="../category?id=1&cat=Îmbrăcăminte" class="nav-link px-2 text-black">Imbracaminte</a></li>
                <li><a href="../category?id=4&cat=Calculatoare și accesorii" class="nav-link px-2 text-black">Calculatoare si accesorii</a></li>
                <li><a href="../category?id=6&cat=Electrocasnice" class="nav-link px-2 text-black">Electorcasnice</a></li>
                <li><a href="../category?id=5&cat=Mobilă" class="nav-link px-2 text-black">Mobila</a></li>
                <li><a href="../category?id=2&cat=Grădină" class="nav-link px-2 text-black">Gradina</a></li>
                <li><a href="../category?id=3&cat=Construcții" class="nav-link px-2 text-black">Constructii</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input type="search" class="form-control form-control-dark" placeholder="Cauta" aria-label="Search">
            </form>
            <?php if ($_SESSION['logged'] == 1): ?>
                <div class="text-end">
                    <div class="dropdown">

                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['username']; ?></button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="padding: 1em">
                    <?php if($_SESSION['role'] == "admin"): ?>
                        <li><a href="../UserAdmin/comenzi" style="text-decoration:none; font-size: 0.9em;">Administrare magazin</a></li>
                    <?php elseif($_SESSION['role'] == "superadmin"): ?>
                        <li><a href="../MainAdmin/general" style="text-decoration:none;">Administrare site</a></li>
                    <?php else: ?>
                        <li><a href="../User/useraccount.php" style="text-decoration:none;">Profil</a></li>
                    <?php endif ?>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a href="#" id="logout-button">Ieșire</a></li>
                    </ul>
                    </div>



                </div>
            <?php else: ?>
                <div class="text-end">
                    <button type="button" class="btn btn-outline-dark me-2" id="login-button" data-bs-toggle="modal" data-bs-target="#loginModal">Intra in cont</button>
                    <button type="button" class="btn btn-warning" data-bs-target="#registerModal" data-bs-toggle="modal" id="register-button">Inregistreaza-te</button>
                </div>
            <?php endif ?>

        </div>
    </div>
</header>
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
                    <form data-form="login-form" data-type="login" class="form" action="" method="post">

                        <h3 class="text-center text-info">Login</h3>
                        <div class="form-group">
                            <label for="username" class="text-info">Log-In/E-mail:</label><br>
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
                        <span id="login-message-test"> </span>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Forma de inregistrare !</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form data-form="login-form" data-type="register" class="form" action="" method="post">

                        <h3 class="text-center text-info">Introduceti datele:</h3>

                        <div class="form-group">
                            <label for="username" class="text-info">Username-ul:</label><br>
                            <input type="text" name="username" id="username" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="email" class="text-info">Email:</label><br>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="name" class="text-info">Nume:</label><br>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="surname" class="text-info">Prenume:</label><br>
                            <input type="text" name="surname" id="surname" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="phone" class="text-info">Nr. Telefon:</label><br>
                            <input type="phone" name="phone" id="phone" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="password" class="text-info">Parola:</label><br>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>

                        <div class="modal-footer">
                            <br><input type="submit" name="submit" class="btn btn-info btn-md" value="Inregistreaza-ma !">
                        </div>
                        <br>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container sb-category">
    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            <a class="p-2 link-secondary" href="#">Subcategorie 1</a>
            <a class="p-2 link-secondary" href="#">Subcategorie 2</a>
            <a class="p-2 link-secondary" href="#">Subcategorie 3</a>
        </nav>
    </div>
</div>
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


$("#logout-button").click(function(e) {


    $.ajax({
        url: '../login_register.php',   //answ='+str+"q_a.php?an2="+str,
        dataType: 'text',
        type:'POST',
        data: {
            formData: false, 
            type: "logout"
        },
        success: function (returndata) {  // if the request was done with success
        //
        console.log(returndata);

        }
    }).done(function(returndata){ // after the request is done
        if ($.trim(returndata) == 'destroyed') {
            window.location.href = "index.php" ;         
        }
        else console.log("Eroare la login");
        
        $("#login-message-test").html(returndata);

    });  


});
//$("form[data-form='login-form']")
$("form[data-form='login-form']").submit(function(e) {

    e.preventDefault();
    var form = $(this).serialize();

    $.ajax({
        url: '../login_register.php',   //answ='+str+"q_a.php?an2="+str,
        dataType: 'text',
        type:'POST',
        data: {
            formData: form, 
            type: $(this).attr("data-type")
        },
        success: function (returndata) {  // if the request was done with success
        //
        console.log(returndata);

        }
    }).done(function(returndata){ // after the request is done
        if ($.trim(returndata) == 'Operatie cu success') {
            window.location.href = "../index.php" ;         
        }
        else console.log("Eroare la login/reg");
        
        $("#login-message-test").html(returndata);

    });  

})

</script>
<!-- Login/ Reg forms -->
