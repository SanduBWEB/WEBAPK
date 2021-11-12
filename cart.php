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
    <style>
        .cart-image {
            width: 100px;
        }
        .cart-table{
            background-color: rgba(22, 114, 114, 0.3);
            margin-top: 2em;
        }
        .c-generate {
            margin: 1em 1em 2em 1em;
        }
    </style>

<body>
<?php  require_once 'include/generaltopnav.php' ?>

<section class="cart-content">
    <div class="container cart-table">
        <div class="c-table">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Produs</th>
                    <th scope="col">Nume</th>
                    <th scope="col">Cod Produs</th>
                    <th scope="col">Magazin</th>
                    <th scope="col">Cantitate(buc)</th>
                    <th scope="col">Pret</th>
                    <th scope="col">Actiuni</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <img src="https://i.insider.com/60117b551d2df20018b71117?width=1136&format=jpeg" class="cart-image" alt="Produs Selectat">
                    </td>
                    <td class="align-middle">HP DP-Pro Book</td>
                    <td class="align-middle">ID251646</td>
                    <td class="align-middle">Trash IT</td>
                    <td class="align-middle">5</td>
                    <td class="align-middle">5000 lei</td>
                    <td class="align-middle"><button class="btn btn-danger" id="delete-cart-id1">Sterge produs</button></td>
                </tr>
                <tr>
                    <td>
                        <img src="https://i.simpalsmedia.com/999.md/BoardImages/320x240/c67a2172e4289e2b9f3405dba018596b.jpg" class="cart-image" alt="Produs Selectat">
                    </td>
                    <td class="align-middle">Scandura</td>
                    <td class="align-middle">ID251646</td>
                    <td class="align-middle">Lemn MD</td>
                    <td class="align-middle">1000</td>
                    <td class="align-middle">12000 lei</td>
                    <td class="align-middle"qd><button class="btn btn-danger" id="delete-cart-id2">Sterge produs</button></td>
                </tr>
                </tbody>
            </table>
            <div class="add-command-button">
                <button class="btn btn-success c-generate">Trimite o comanda</button>
            </div>
        </div>
    </div>
</section>

<?php  require_once 'include/generalfooter.php' ?>
</body>
</html>