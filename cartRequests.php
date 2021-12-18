<?php

session_start();
require $_SERVER['DOCUMENT_ROOT'] . "/generalConfig.php";

function query($queryString) {
    require $_SERVER['DOCUMENT_ROOT'] . "/generalConfig.php";

    echo $queryString . "\n";
    $query = mysqli_query($link,$queryString);
    if (!$query)
    {
        die('Database querry error( tableData.php:8 ): ' . mysqli_error($link));
    } 

    return $query;
}


switch ($_GET['type']) {

    case 'add':
        # code...
        if(!isset($_SESSION['cart']) ) // cart doesnt exist yet
        {
            $_SESSION['cart'] = array();
            $_SESSION['cart'][] = $_GET['pid'];
            echo 'added' . ' ' . $_GET['pid'];
            ///print_r($_SESSION['cart']);
        }
        else if( !in_array( $_GET['pid'], $_SESSION['cart']) ) // check that the value doesnt exist in array already
        {
            $_SESSION['cart'][] = $_GET['pid'];
            echo 'pushed' . ' ' . $_GET['pid'];
            //print_r($__SESSION['cart']);
        }

        print_r($_SESSION['cart']);
        //unset($_SESSION['cart'] );
    break;

    case 'remove':

        #
        if ( ($key = array_search($_GET['pid'], $_SESSION['cart'])) !== false) 
        {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']); // reindexation
            echo 'removed';
        }

        print_r($_SESSION['cart']);


    break;

    case 'checkout':
        #

        // if(!$_SESSION['currentCartId'])
            // {
            //     echo 'cart does not exist';
            //     $query = query("SELECT id FROM `order_requests` ORDER BY id DESC LIMIT 1");
            //     if(mysqli_num_rows($query) !== 0)
            //     {
            //         // there are orders
            //         $lastIdVal= mysqli_fetch_assoc( $query );
            //         $lastIdVal= intval($lastIdVal['id'] + 1);
            //     }
            //     else
            //     {
            //         //no orders at all
            //         $query = query("INSERT INTO `order_requests`(`user_id`, `request_date`, `total_price`) VALUES (".$_SESSION['user_id'].",NOW(), ".$_GET['sum_price'].") ");
            //         $lastId = mysqli_insert_id($link);
            //         echo "last id = " . $lastId . "\n total price= " . $_GET['sum_price'] . "\n";

            //     }
                
                
            // }
            // else
            // {
            //     echo 'cart exists';
        // }
        
        $query = mysqli_query($link,"INSERT INTO `order_requests`(`user_id`, `request_date`, `total_price`) VALUES (".$_SESSION['user_id'].",NOW(), ".$_GET['sum_price'].") ");
        $lastId = mysqli_insert_id($link);
        echo "last id = " . $lastId . "\n total price= " . $_GET['sum_price'] . "\n";

        $requests = explode("||", $_GET['data'] );
        //print_r($requests);
        $fields = array();
        foreach ($requests as $nr => $request) { // each request string
            # code... 
            //print_r($request);
            //print_r($request['pid'] . "\n");
            parse_str($request, $fields[]);
            //print_r( parse_str($request) );
            
        }
        //print_r($fields);

        foreach ($fields as $entry => $data) { // each entry
            # code...
            print_r($data['pqty'] . "\n");
            // sql requests   pid=${pid}&cmid=${cmid}&pqty=${pqty}
            $query = query(" INSERT INTO `order_data`(`order_id`, `market_id`, `product_id`, `product_quantity`, `state`) 
            VALUES ($lastId, ".$data['cmid'].", ".$data['pid'].", ".$data['pqty'].", DEFAULT) ");
        }
        $_SESSION['cart'] = array();

    break;
    

}



?>