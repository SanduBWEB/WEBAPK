<?php

session_start();

function query($queryString) {
    require $_SERVER['DOCUMENT_ROOT'] . "/generalConfig.php";

    //echo $queryString . "\n";
    $query = mysqli_query($link,$queryString);
    if (!$query)
    {
        die('Database querry error( tableData.php:8 ): ' . mysqli_error($link));
    } 

    return $query;
}


$orderRequests = query("SELECT b.id, b.request_date, b.total_price
FROM order_requests b
WHERE b.user_id = ".$_SESSION['user_id']."
ORDER BY b.id");

$ordersList = mysqli_fetch_all($orderRequests, MYSQLI_ASSOC);
//print_r($ordersData);

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

                    <?php 
                    foreach ($ordersList as $order):
                        # code...
                        $sql = query("SELECT a.id, a.state, a.product_quantity, b.id AS order_id, b.request_date, b.total_price, c.product_name, c.product_code 
                        FROM order_data a 
                        JOIN order_requests b ON a.order_id = b.id 
                        JOIN product_data c ON a.product_id = c.id
                        WHERE b.id = ".$order['id']." 
                        ORDER BY a.id");
                        $rows = mysqli_num_rows($sql); // total orders user requested
                        $orderData = mysqli_fetch_all($sql, MYSQLI_ASSOC);

                    ?>
                        <tr class="order-row">
                            <th scope="row" class="order-id" class="align-middle"><?php echo $order['id']; ?></th>
                            <td>

                                <ul class="list-group">

                                    <?php 
                                    foreach ($orderData as $orderProducts):
                                    ?>

                                        <li class="list-group-item">

                                            <div class="row">
  
                                                <div class="col">
                                                    <span><?php echo $orderProducts['product_name']; ?></span>
                                                </div>
                                                <div class="col">
                                                    <span><?php echo $orderProducts['product_code']; ?></span>
                                                </div>

                                            </div>

                                        </li>

                                    <?php endforeach ?>

                                    <!-- <li class="list-group-item">
                                        <div class="row">
                                            <div class="col">
                                                <span>Microunda</span>
                                            </div>
                                            <div class="col">
                                                <span>IM834113</span>
                                            </div>
                                        </div>
                                    </li>  -->

                                </ul>

                            </td>
                            <td>

                                <ul  class="list-group">
                                    
                                    <?php 
                                    foreach ($orderData as $orderStatus):
                                    ?>

                                        <?php if($orderStatus['state'] == 0):?>

                                            <li class="align-middle">
                                                <img src="https://litva.lt/gen/icons_site/wait_animation_order_2.gif" width="50px" alt="processing">
                                            </li>

                                        <?php elseif($orderStatus['state'] == 1):?> 

                                            <li class="align-middle">
                                                <p class="text-success">Verificat</p>
                                            </li>
                                        
                                        <?php endif ?>

                                    <?php endforeach ?>

                                </ul>

                            </td>
                            <td data-field="total-price"><?php echo $order['total_price']; ?> lei</td>
                        </tr>
                    <?php endforeach ?>
                    



                    <!-- <tr>
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

                            </ul>
                        </td>
                        <td>1000 lei</td>
                    </tr> -->

                </tbody>

            </table>
        </div>
    </section>

<?php  require_once 'include/generalfooter.php' ?>
</body>
</html>
