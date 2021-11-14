<?php
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
                <img class="bi me-2" width="80em" src="include/goto.png" aria-label="Bootstrap" alt="logo marketplace">
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <!--Ciclu-->
                <li><a href="MainAdmin/dash.php" class="nav-link px-2 text-black">Imbracaminte</a></li>
                <li><a href="#" class="nav-link px-2 text-black">Calculatoare si accesorii</a></li>
                <li><a href="#" class="nav-link px-2 text-black">Electorcasnice</a></li>
                <li><a href="#" class="nav-link px-2 text-black">Mobila</a></li>
                <li><a href="#" class="nav-link px-2 text-black">Gradina</a></li>
                <li><a href="#" class="nav-link px-2 text-black">Constructii</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input type="search" class="form-control form-control-dark" placeholder="Cauta" aria-label="Search">
            </form>
            <?php if ($setaccauth = 0): ?>
                <div class="text-end">
                    <button type="button" class="btn btn-outline-dark">Sandu</button>
                    <a href="#">
                    <img src="include/icons/cart-icon.png" id="cart-icon">
                    </a>
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
                    <form id="login-form" class="form" action="" method="post">

                        <h3 class="text-center text-info">Login</h3>
                        <div class="form-group">
                            <label for="email" class="text-info">Log-In:</label><br>
                            <input type="email" name="email" id="email" class="form-control">
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
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Forma de inregistrare !</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="login-form" class="form" action="" method="post">

                        <h3 class="text-center text-info">Introduceti datele:</h3>
                        <div class="form-group">
                            <label for="email" class="text-info">Email:</label><br>
                            <input type="email" name="email" id="email" class="form-control">
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
                            <label for="password" class="text-info">Parola:</label><br>
                            <input type="password" name="password" id="password" class="form-control">
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
<!-- Login/ Reg forms -->
