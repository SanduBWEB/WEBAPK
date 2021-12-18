<?php

require_once "generalConfig.php";

//echo "".$_GET['cat']."";
$pid = $_GET['pid']; // product id

$sql = "SELECT a.*, b.subcategory_name, c.market_name FROM `product_data` a
            JOIN subcategories b ON a.subcategory_id = b.id
            JOIN market_data c ON a.market_id = c.id
            WHERE a.id = $pid";

$product = mysqli_query($link,$sql);
$rows = mysqli_num_rows($product); //nr de inscrieri;

if (!$product)
{
    die('Error in cautare' . mysqli_error($link));
} 
else if ( $rows === 0 || $rows > 1) {
    echo "Error";
    die();
}
else $productData = mysqli_fetch_assoc($product);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php  require_once 'include/adds.php' ?>
    <style>
        .p-image {
            max-width: 500px;
            width:100%;
        }
        .product {
            margin-top: 4em;
        }
    </style>
</head>
<body>

<?php  require_once 'include/generaltopnav.php' ?>

<section class="product">
    <div class="container">

        <div class="row">
            <div class="col">
                <div id="product-image" class="carousel carousel-dark slide" data-bs-touch="false" data-bs-interval="false">
                    <div class="carousel-inner">
                        <?php 
                            // Directory
                            $directory = $_SERVER['DOCUMENT_ROOT'] . "/assets/products/".$_GET['pid']." ";

                            // Returns an array of files
                            if( is_dir($directory) ):

                                $files = scandir($directory);

                                // Count the number of files and store them inside the variable..
                                // Removing 2 because we do not count '.' and '..'.
                                $num_files = count($files) - 2;
                        ?>

                            <div class="carousel-item active">
                                <img src="<?php echo "../assets/products/".$_GET['pid']."/1.png"; ?> " class="p-image img-thumbnail rounded mx-auto d-block" alt="...">
                            </div>

                            <!-- if there more than 1 pic -->
                            <?php if($num_files > 1):?>

                                <?php for ($i=2; $i <= $num_files; $i++): ?>
                                    <div class="carousel-item">
                                        <img src="<?php echo "../assets/products/".$_GET['pid']."/$i.png"; ?> " class="p-image img-thumbnail rounded mx-auto d-block" alt="...">
                                    </div>

                                <?php endfor ?>
                            
                            <?php endif ?>
                            <!-- if there more than 1 pic -->

                        <?php else: ?>

                            <!-- default product icon -->
                            <div class="carousel-item active">
                                <img src="https://s13emagst.akamaized.net/products/22495/22494116/images/res_2617ed635c7737bf1b9215124dd4dd69.jpg" class="p-image img-thumbnail rounded mx-auto d-block" alt="...">
                            </div>
                            <!-- default product icon -->

                        <?php endif ?>

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#product-image" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#product-image" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
             </div>
            <div class="col">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2"> Magazin: <?php echo $productData['market_name'] ?></strong>
                    <h3 class="mb-0" id="name-product"> <?php echo $productData['product_name'] ?></h3>
                    <div class="mb-1 text-muted" id="add-date">Adaugat la data: <?php echo date("m.d.y H:i", strtotime( $productData['add_date'] ) ); //date("m.d.y")?></div>
                    <strong class="card-text mb-auto text-primary">Descriere scruta:</strong>
                    <p class="card-text mb-auto" id="shor-describe"><?php echo $productData['product_desc'] ?></p>
                </div>
                <div class="col p-4 d-flex flex-column position-static">
                    <div class="row">
                        <div class="col">
                            <strong>Pret: <?php echo $productData['product_price']?> lei</strong>
                        </div>
                        <div class="col">
                            <?php if($_SESSION['cart'] && in_array( $productData['id'], $_SESSION['cart']) ): ?>
                                <button id="request-to-cart" data-type="remove" data-pid="<?php echo $productData['id']; ?>" type="button" class="btn btn-warning">Sterge in cos</button>
                            <?php else: ?>
                                <button id="request-to-cart" data-type="add" data-pid="<?php echo $productData['id']; ?>" type="button" class="btn btn-warning">Adauga din cos</button>
                            <?php endif ?>
                            <p id="cart-helper" style="width: 100%;"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>

    $("#request-to-cart").click(function() {

        const ID = $(this).attr('data-pid');
        const TYPE = $(this).attr('data-type');
        console.log(`clicked add to cart, pid-${ID}, data-type-${TYPE}`);

        $.ajax({Z
            url: 'cartRequests.php',   //answ='+str+"q_a.php?an2="+str,
            dataType: 'text',
            type:'GET',
            data: {
                pid: ID, 
                type: TYPE
            },
            success: function (returndata) 
            {  // if the request was done with success
                
                console.log(returndata);
                location.reload();

            }
        });

    });
</script>
<?php  require_once 'include/generalfooter.php' ?>
</body>
</html>
