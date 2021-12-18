<?php
session_start();
//print_r($_SESSION['cart']);

require_once "generalConfig.php";

//$query = $_GET['query']; // search
//$sql = "SELECT * FROM `product_data` WHERE `product_name` LIKE '%$query%' OR product_code LIKE '%$query%'";
//$products = mysqli_query($link,$sql);
//$cartList = array();
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
            <table class="table" id="ordered-products">
                <thead>
                <tr>
                    <th scope="col">Produs</th>
                    <th scope="col">Nume</th>
                    <th scope="col">Cod Produs</th>
                    <th scope="col">Magazin</th>
                    <th scope="col">Cantitate(buc)</th>
                    <th scope="col">Pret total, Lei</th>
                    <th scope="col">Actiuni</th>
                </tr>
                </thead>

                <tbody>
                    <?php
                        for ($i=0; $i < count($_SESSION['cart']); $i++):
                            $sql = "SELECT a.*, b.market_name FROM `product_data` a JOIN market_data b on a.market_id = b.id WHERE a.id = ".$_SESSION['cart'][$i]." ORDER BY a.market_id";
                            $product = mysqli_fetch_assoc( mysqli_query($link,$sql) ) ;
                            //echo $sql;


                    ?>
                        <tr data-pid="<?php echo $product['id']; ?>" data-current-market="<?php echo $product["market_id"]; ?>" >
                            <td>
                            <?php 
                                // Directory
                                $directory = $_SERVER['DOCUMENT_ROOT'] . "/assets/products/".$product['id']." ";

                                // Returns an array of files
                                if( is_dir($directory) ):

                                    $files = scandir($directory);

                                    // Count the number of files and store them inside the variable..
                                    // Removing 2 because we do not count '.' and '..'.
                                    $num_files = count($files) - 2;
                            ?>

                                <img src="<?php echo "../assets/products/".$product['id']."/1.png"; ?> " class="cart-image" alt="Produs Selectat">
                            <?php else: ?>
                                <img src="https://i.insider.com/60117b551d2df20018b71117?width=1136&format=jpeg" class="cart-image" alt="Produs Selectat">
                            <?php endif ?>
                            </td>
                            <td class="align-middle"><?php echo $product['product_name']; ?></td>
                            <td class="align-middle"><?php echo $product['product_code']; ?></td>
                            <td data-field="market" data-mid="<?php echo $product["market_id"]; ?>" class="align-middle"><?php echo $product['market_name']; ?></td>
                            <td data-field="total-quantity-product" class="align-middle" style="width: 20%;"><input class="product-quantity" type="number" value="1" min="1" max="99"> </td>
                            <td data-field="total-price-product" data-price="<?php echo $product['product_price']; ?>" class="align-middle"><?php echo $product['product_price']; ?></td>
                            <td class="align-middle"><button id="request-to-cart" data-type="remove" class="btn btn-danger" data-pid="<?php echo $product['id']; ?>">Sterge produs</button></td>
                        </tr>

                    <?php endfor ?>

                </tbody>

            </table>
            <div class="add-command-button">
                <button id="commit-checkout" data-type="checkout" class="btn btn-success c-generate">Trimite o comanda</button>
                <button id="order-total-price" class="btn c-generate" style="outline: none;box-shadow: none;font-size: 16px;padding: 0;margin-bottom: 24px;"></button>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        
        var orderSum = 0;
        $("input[type='number']").inputSpinner()
        $("table[id='ordered-products'] > tbody  > tr").each(function(index, tr) { 
            orderSum += parseInt( $(tr).find("td[data-field=total-price-product]").html() );
        });
        $("#order-total-price").html(`TOTAL: ${orderSum} lei`);

        $(".product-quantity").on("input", function () {
            const TR = $(this).closest("tr");
            const THE_PRICE = $(TR).find("td[data-field=total-price-product]").attr('data-price');
            //console.log(THE_PRICE);
            $(TR).find("td[data-field=total-price-product]").html( $(this).val() * THE_PRICE );

            orderSum = 0;
            $("table[id='ordered-products'] > tbody  > tr").each(function(index, tr) {
                orderSum += parseInt( $(tr).find("td[data-field=total-price-product]").html() );
                //console.log(tr);
                //console.log(orderSum);
            });
            $("#order-total-price").html(`TOTAL: ${orderSum} lei`);
            
            //$valueOnInput.html($(this).val())
            // or $valueOnInput.html(event.target.value) // in vanilla js
            // or $valueOnInput.html($changedInput.val())
        })

        $("#request-to-cart").click(function() {

            const ID = $(this).attr('data-pid');
            const TYPE = $(this).attr('data-type');
            console.log(`clicked add to cart, pid-${ID}, data-type-${TYPE}`);

            $.ajax({
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


        $("#commit-checkout").click(function(){

            //
            orderSum = 0;
            var pData = {};
            var cMid = 0; // current market id
            var fRequest = ""; // full request string
            const TYPE = $(this).attr('data-type');
            $("table[id='ordered-products'] > tbody  > tr").each(function(index, tr) {

                orderSum += parseInt( $(tr).find("td[data-field=total-price-product]").html() );
                //console.log(tr);
                //console.log(orderSum);
                var pid = $(tr).attr('data-pid');  // product id
                cmid = $(tr).attr('data-current-market'); // market id
                var pqty = $(tr).find("td[data-field=total-quantity-product]").children().val(); // quantity

                //console.log(`pid-${pid} ; cmid- ${cmid} ; pqty- ${pqty}`);
                fRequest += `pid=${pid}&cmid=${cmid}&pqty=${pqty}||`



            });
            fRequest = fRequest.substring(0, fRequest.length - 2);
            //console.log(fRequest);
            $("#order-total-price").html(`TOTAL: ${orderSum} lei`);

            $.ajax({
                url: 'cartRequests.php',   //answ='+str+"q_a.php?an2="+str,
                dataType: 'text',
                type:'GET',
                data: { 
                    data: fRequest,
                    type: TYPE,
                    sum_price: orderSum
                },
                success: function (returndata) 
                {  // if the request was done with success
                    
                    console.log(returndata);
                    //location.reload();
                    window.location.href = "../orders";

                }
            });

        });

    });

</script>
<?php  require_once 'include/generalfooter.php' ?>
</body>
</html>