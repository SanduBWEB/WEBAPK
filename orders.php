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
<?php require_once 'include/generaltopnav.php' ?>

    <section class="orders-user">
        <div class="container">
            <p class="text-center">Comenzile mele:</p>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID Comanda:</th>
                    <th scope="col">Produse comandate:</th>
                    <th scope="col">Statut:</th>
                    <th scope="col">Total pret</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row" class="align-middle">1</th>
                    <td>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col">
                                        <span>Televizor</span>
                                    </div>
                                    <div class="col">
                                        <span>ID24131</span>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col">
                                        <span>Smartphone</span>
                                    </div>
                                    <div class="col">
                                        <span>SMRT2190</span>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col">
                                        <span>Microunda</span>
                                    </div>
                                    <div class="col">
                                        <span>IM834113</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </td>
                    <td>
                        <ul class="list-group">
                            <li class="align-middle">
                                <img src="https://litva.lt/gen/icons_site/wait_animation_order_2.gif" width="50px" alt="processing">
                            </li>
                            <li class="align-middle">
                                <img src="https://litva.lt/gen/icons_site/wait_animation_order_2.gif" width="50px" alt="processing">
                            </li>
                            <li class="align-middle">
                                <p class="text-success">Verificat</p>
                            </li>
                    </td>
                    <td>15000 lei</td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle">2</th>
                    <td>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col">
                                        <span>Nike Air 350</span>
                                    </div>
                                    <div class="col">
                                        <span>N212051</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </td>
                    <td>
                        <ul class="list-group">
                            <li class="align-middle">
                                <img src="https://litva.lt/gen/icons_site/wait_animation_order_2.gif" width="50px" alt="processing">
                            </li>
                    </td>
                    <td>1000 lei</td>
                </tr>
                </tbody>
            </table>
        </div>
    </section>

<?php  require_once 'include/generalfooter.php' ?>
</body>
</html>
