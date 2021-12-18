<?php
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
</head>
<body>
<?php  require_once 'include/generaltopnav.php' ?>

<section class="order-info">
    <div class="container">
        <h2 class="text-center">Creeaza o comanda:</h2>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h4>Informatii de contact:</h4>
                    <form>
                        <div class="mb-3">
                            <label for="costumerName" class="form-label">Nume</label>
                            <input type="text" class="form-control" id="name" aria-describedby="Numele complet">
                            <div id="nameHelp" class="form-text">Spatiul este obligatoriu pentru completare</div>
                        </div>
                        <div class="mb-3">
                            <label for="costumerSurname" class="form-label">Prenume</label>
                            <input type="text" class="form-control" id="surname">
                            <div id="surnameHelp" class="form-text">Spatiul este obligatoriu pentru completare</div>
                        </div>
                        <div class="mb-3">
                            <label for="costumerPhone" class="form-label">Telefon de contact</label>
                            <input type="tel" class="form-control" id="phone">
                            <div id="surnameHelp" class="form-text">Spatiul este obligatoriu pentru completare</div>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="acceptdata">
                            <label class="form-check-label" for="acceptdata">Sunt de acord cu prelucrarea datelor cu caracter personal !</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Trimite o comanda</button>
                    </form>
                </div>
                <div class="col">
                    <h4>Produsele selectate:</h4>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Cod Produs</th>
                            <th scope="col">Nume</th>
                            <th scope="col">Cantitate</th>
                            <th scope="col">Pret total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>CCDD</td>
                            <td>Parchet</td>
                            <td>8</td>
                            <td>900</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>




            </table>
        </div>
    </div>
</section>

<?php  require_once 'include/generalfooter.php' ?>
</body>
</html>