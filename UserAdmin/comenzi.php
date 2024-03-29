<?php

session_start();
if(!isset($_SESSION['user_id'])){ //if login in session is not set$_SESSION['role'] == "superadmin"
    header("Location: /404.php");
}
$role = $_SESSION['role'];
if($role=="superadmin"){header("location: /404.php");}
elseif($role=="user"){header("location: /404.php");}

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


$orderRequests = query("SELECT a.market_id, b.id, b.request_date, b.total_price, c.surname, c.name
FROM order_requests b
JOIN order_data a ON a.order_id = b.id
JOIN users c ON b.user_id = c.id
WHERE a.market_id = ".$_SESSION['market_id']."
GROUP BY b.id
ORDER BY b.id");

//$_SESSION['market_id']
$ordersList = mysqli_fetch_all($orderRequests, MYSQLI_ASSOC);
//print_r($ordersData);
//GROUP BY b.id


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <?php // require_once '../include/adds.php' ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Admin</title>
</head>
<body>
<nav class="py-2 bg-light border-bottom">
    <div class="container d-flex flex-wrap">

        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-decoration-none">
            <img class="bi me-2" width="80em" src="../assets/goto.png" aria-label="Bootstrap" alt="logo marketplace">
        </a>

        <ul class="nav me-auto">
            <li class="nav-item"><a href="comenzi" class="nav-link link-dark px-2">Comenzi</a></li>
            <li class="nav-item"><a href="product" class="nav-link link-dark px-2">Produse</a></li>
        </ul>
        <ul class="nav">
            <li class="nav-item"><a href="#" class="nav-link link-dark px-2"><?php echo $_SESSION['username']; ?></a></li>
            <li class="nav-item"><a href="/" id="logout-button" class="nav-link link-dark px-2">Ieșire</a></li>
        </ul>
    </div>
</nav>
<header class="py-3 mb-4 border-bottom">
    <div class="container d-flex flex-wrap justify-content-center">
        <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
            <span class="fs-4">Comenzi: </span>
        </a>
    </div>
</header>
<section class="comenzi">
    <div class="container">
        <table class="table table-info">
            <thead>
            <tr>
                <th scope="col">ID Comanda</th>
                <th scope="col">Produs comandat</th>
                <th scope="col">Client</th>
                <th scope="col">Statut</th>
            </tr>
            </thead>
            <tbody>

                <?php 
                foreach ($ordersList as $order):
                    # code...
                    $sql = query("SELECT a.id, a.order_id, a.product_id, a.market_id, a.state, a.product_quantity, a.state, b.id AS order_id, b.request_date, b.total_price, c.product_name, c.product_code 
                    FROM order_data a 
                    JOIN order_requests b ON a.order_id = b.id 
                    JOIN product_data c ON a.product_id = c.id
                    WHERE c.market_id = ".$order['market_id']." AND a.order_id = ".$order['id']."
                    ORDER BY a.id");
                    $rows = mysqli_num_rows($sql); // total orders user requested
                    $orderData = mysqli_fetch_all($sql, MYSQLI_ASSOC);

                ?>
                    <tr>
                        <th scope="row"><?php echo $order['id']; ?></th>
                        <td>
                            <div class="card" style="width: 23rem;">
                                
                                <ul class="list-group list-group-flush">
                                    
                                    <?php foreach ($orderData as $orderProducts):?>
                                        
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col">
                                                    <span><?php echo $orderProducts['product_name'] ?></span>
                                                </div>
                                                <div class="col">
                                                    <span><?php echo $orderProducts['product_code'] ?></span>
                                                </div>
                                                <div class="col">
                                                    <span><?php echo $orderProducts['product_quantity'] ?> buc.</span>
                                                </div>
                                            </div>
                                        </li>
                                        
                                        <!-- <li class="list-group-item">
                                            <div class="row">
                                                <div class="col">
                                                    <span>Iphone 11x</span>
                                                </div>
                                                <div class="col">
                                                    <span>pq34232</span>
                                                </div>
                                            </div>
                                        </li> -->
                                        
                                    <?php endforeach ?>

                                </ul>
                            </div>
                        </td>
                        <td><?php echo $order['surname'] . " " . $order['name']; ?></td>
                        <td>
                            <select data-mId="<?php echo $orderProducts['market_id']; ?>" data-oId="<?php echo $orderProducts['order_id']; ?>" data-pId="<?php echo $orderProducts['product_id']; ?>" class="stock-select" aria-label="Stock status">
                                <!-- <option >Alege o optiune</option> -->
                                <option data-mId="<?php echo $orderProducts['market_id']; ?>" data-oId="<?php echo $orderProducts['order_id']; ?>" data-pId="<?php echo $orderProducts['product_id']; ?>" value="0">Fara stock</option>
                                
                                <?php if( $orderProducts['state'] == 1 ): ?>
                                    <option data-mId="<?php echo $orderProducts['market_id']; ?>" data-oId="<?php echo $orderProducts['order_id']; ?>" data-pId="<?php echo $orderProducts['product_id']; ?>" value="1" selected>In stock</option>
                                <?php else: ?>
                                    <option data-mId="<?php echo $orderProducts['market_id']; ?>" data-oId="<?php echo $orderProducts['order_id']; ?>" data-pId="<?php echo $orderProducts['product_id']; ?>" value="1">In stock</option>
                                <?php endif ?>

                            </select>
                        </td>
                    </tr>

                <?php endforeach ?>

                <!-- <tr>
                    <th scope="row">2</th>
                    <td>
                        <div class="card" style="width: 18rem;">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">ID2122</li>
                            </ul>
                        </div>
                    </td>
                    <td><?php echo "Nicu" ?></td>
                    <td>
                        <select class="form-select" aria-label="Stock status">
                            <option selected>Alege o optiune</option>
                            <option value="1">In stock</option>
                            <option value="2">Fara stock</option>
                        </select>
                    </td>
                </tr> -->

            </tbody>
        </table>
    </div>
</section>
</body>
<script>
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
        });
        
    });
            

    $(document).ready(function() {

        $(".stock-select").on('change', function() 
        {
            var option = this.value;
            console.log(option);
            var oId = $(this).attr('data-oId');
            var pId = $(this).attr('data-pId');
            var mId = $(this).attr('data-mId');
            $.ajax({   /// request update on the db
                url: '../MainAdmin/requests.php',
                dataType: 'text',
                type:'POST',
                data: {
                    formData: null, 
                    table: "orders",
                    type: "update",
                    orderId: oId,
                    productId: pId,
                    marketId: mId,
                    state: option
                },
                success: function (returndata) {  // if the request was done with success
                //
                console.log(returndata);
                }
            });
        })

    });

</script>
</html>