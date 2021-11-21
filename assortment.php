<?php

require_once "generalConfig.php";
//echo "".$_GET['cat']."";

$mid = $_GET['mid']; // market_id
$sid = $_GET['sid']; // subcategory_id
$cn = $_GET['cn']; // categoy name ( the subcategory)

$sql = "SELECT * FROM `product_data` WHERE market_id = $mid AND subcategory_id = $sid";
$products = mysqli_query($link,$sql);
$rows = mysqli_num_rows($products); //nr de inscrieri;

if (!$products)
{
    die('Error in cautare' . mysqli_error($link));
} 
// else if ( $rows === 0) {
//     echo "Nu a fost găsit nici un rezultat";
//     die();
// } 
//$rows = 0;
?>
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

    <link rel="stylesheet" type="text/css" href="css/general.css" />
    <?php  require_once 'include/adds.php' ?>

    <title>Shop GO - Marketplace</title>
</head>
<body>
<?php  require_once 'include/generaltopnav.php' ?>

<section class="assortment-list">
    <div class="container">

        <?php if ($rows===0): ?>
            <h2 class="text-center">Nu a fost găsit nici un produs</h2>
        <?php else: ?>
            <h2 class="text-center"><?php echo $cn?></h2>
        
            <div class="row">

                <?php for ($i=0; $i < $rows ; $i++):
                    # code...$row = mysqli_fetch_assoc($query);
                    $product = mysqli_fetch_assoc($products);
                ?>

                    <div class="assortment-p col">
                        <div class="card" style="width: 20em;">
                            <img src="https://assets.swappie.com/iPhone-11-Pro-midnight-green-back.png" class="card-img-top img-thumbnail" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $product['product_name']; ?></h5>
                                <a href="product?pid=<?php echo $product['id']; ?>" class="btn btn-primary">Vezi produs ></a>
                            </div>
                        </div>
                    </div>

                <?php endfor ?>


                <!-- <div class="assortment-p col">
                    <div class="card" style="width: 20em;">
                        <img src="https://assets.swappie.com/iPhone-11-Pro-midnight-green-back.png" class="card-img-top img-thumbnail" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">iPhone</h5>
                            <a href="product.php" class="btn btn-primary">Vezi produs ></a>
                        </div>
                    </div>
                </div>
                <div class="assortment-p col">
                    <div class="card" style="width: 20em;">
                        <img src="https://assets.swappie.com/iPhone-11-Pro-midnight-green-back.png" class="card-img-top img-thumbnail" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">iPhone</h5>
                            <a href="product.php" class="btn btn-primary">Vezi produs ></a>
                        </div>
                    </div>
                </div> -->


            </div>

            <!-- <div class="container" style="margin-top: 2em">
                <nav aria-label="Paginare">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link text-black " href="#">1</a></li>
                        <li class="page-item"><a class="page-link text-black" href="#">2</a></li>
                        <li class="page-item"><a class="page-link text-black" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div> -->

        <?php endif ?>

    </div>
</section>

<?php  require_once 'include/generalfooter.php' ?>
</body>
</html>
