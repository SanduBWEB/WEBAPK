<?php

require_once "generalConfig.php";
echo "".$_GET['cat']."";
$cat_id = $_GET['id'];
$sql = "SELECT * FROM `market_data` WHERE category_id = ".$_GET['id']."";
$markets = mysqli_query($link,$sql);
$rows = mysqli_num_rows($markets); //nr de inscrieri;

if (!$markets)
{
    die('Error in cautare' . mysqli_error($link));
} 
// else if ( $rows === 0) {
//     echo "Nu a fost găsit nici un rezultat";
//     die();
// } 

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
    <style>
        .sb-category {
            display: none;
        }
    </style>

    <title>Shop GO - Marketplace</title>
</head>
<body>
    <?php require_once 'include/generaltopnav.php'; ?>
        <section class="markets">
            <div class="container px-4 py-5" id="custom-cards">
                <?php if ($rows===0): ?>
                    <h2 class="pb-2 border-bottom">Nu a fost găsit nici un magazin</h2>
                <?php else: ?>
                    <h2 class="pb-2 border-bottom"><?php echo "".$_GET['cat'].""; ?></h2>

                    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">

                        <?php for ($i=0; $i < $rows ; $i++):
                            # code...$row = mysqli_fetch_assoc($query);
                            $market = mysqli_fetch_assoc($markets);
                        ?>
                            <!-- single market -->
                            <div class="col">
                                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('markets/<?php echo $market['id'] ?>/banner.jpg');">
                                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                                        <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold"><?php echo $market['market_name'] ?></h2>
                                        <ul class="d-flex list-unstyled mt-auto">
                                            <li class="me-auto">
                                                <a href="store-page?mid=<?php echo $market['id'] ?>&cid=<?php echo $cat_id ?>"> <button class="btn btn-info">Mergi la magazin >>></button></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>                        

                        
                        <?php endfor; ?>
                        

                        <!-- <div class="col">
                            <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('https://img.gazeta.ru/files3/452/13530452/Bez-imeni-1-pic330-330x220-49220.jpg');">
                                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                                    <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Woow Shoes</h2>
                                    <ul class="d-flex list-unstyled mt-auto">
                                        <li class="me-auto">
                                            <button class="btn btn-info">Mergi la magazin >>></button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('https://s3-symbol-logo.tradingview.com/nike--600.png');">
                                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                                    <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Nike Moldova</h2>
                                    <ul class="d-flex list-unstyled mt-auto">
                                        <li class="me-auto">
                                            <button class="btn btn-info">Mergi la magazin >>></button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->

                    </div>

                <?php endif ?>
            </div>
            
        </section>


    <?php require_once 'include/generalfooter.php' ?>
</body>
</html>
