<?php


require_once "generalConfig.php";
//echo "".$_GET['cat']."";
$mid = $_GET['mid']; // market_id
$cid = $_GET['cid']; // category_id

$sql = "SELECT * FROM `subcategories` WHERE category_id = $cid AND market_id = $mid";
$subcategories = mysqli_query($link,$sql);
$rows = mysqli_num_rows($subcategories); //nr de inscrieri;

if (!$subcategories)
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

        <title>Shop GO - Marketplace</title>
    </head>
    <body>
        <?php  require_once 'include/generaltopnav.php' ?>
        <section class="store-category-b">
            <div class="row">

                <?php if ($rows===0): ?>
                    <h2 class="pb-2 border-bottom">Nu a fost găsit nici o categorie</h2>
                <?php else: ?>
      
                    <?php for ($i=0; $i < $rows ; $i++):
                        # code...$row = mysqli_fetch_assoc($query);
                        $category = mysqli_fetch_assoc($subcategories);
                    ?>
                        <!-- single category -->        
                        <div class="col">
                            <a href="assortment?mid=<?php echo $mid ?>&sid=<?php echo $category['id'] ?>&cn=<?php echo $category['subcategory_name'] ?>" style="text-decoration: none;">
                            <div class="card shadow-sm" style="max-width: 400px; margin-bottom: 2em; margin-left: 4em">
                                <img style="max-height: 400px; max-width: 350px; align-self: center;" src="markets/<?php echo $mid ?>/categories/<?php echo $category['id'] ?>.jpg">
                                <div class="card-body">
                                    <p class="text-center"><?php echo $category['subcategory_name'] ?></p>
                                </div>
                            </div>
                            </a>
                        </div>                     

                    
                    <?php endfor; ?>    
                    


                    <!-- <div class="col">
                        <a href="assortment.php" style="text-decoration: none;">
                        <div class="card shadow-sm" style="max-width: 400px; margin-bottom: 2em; margin-left: 4em">
                            <img src="https://womensbeautyoffers.com/wp-content/uploads/2020/09/Midi-Dresses-Under-500Rs.jpg">
                                <div class="card-body">
                                    <p class="text-center">Rochii</p>
                                </div>
                        </div>
                        </a>
                    </div>

                    <div class="col">
                        <a href="assortment.php" style="text-decoration: none;">
                        <div class="card shadow-sm" style="max-width: 400px; margin-bottom: 2em; margin-left: 4em">
                            <img src="https://5.imimg.com/data5/RY/NH/QN/SELLER-7779436/men-cotton-pants-500x500.jpeg">
                            <div class="card-body">
                                <p class="text-center">Pantaloni</p>
                            </div>
                        </div>
                        </a>
                    </div>

                    <div class="col">
                        <a href="assortment.php" style="text-decoration: none;">
                        <div class="card shadow-sm" style="max-width: 400px; margin-bottom: 2em; margin-left: 4em">
                            <img src="https://5.imimg.com/data5/RY/NH/QN/SELLER-7779436/men-cotton-pants-500x500.jpeg">
                            <div class="card-body">
                                <p class="text-center">Pantaloni</p>
                            </div>
                        </div>
                        </a>
                    </div> -->

                <?php endif ?>

            </div>



        </section>
        <?php require_once 'include/generalfooter.php' ?>
    </body>
</html>
