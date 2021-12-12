<?php

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


$table = $_POST['table'];
$data = $_POST['formData'];
$type = $_POST['type'];

$params = array();
parse_str($data, $params);

echo $table;
echo $data;
//echo $params;


// cur-subcat-name=Telefoane fixe selected-cat=2

// ALTER TABLE mytable AUTO_INCREMENT = 39  value= lastid + 1
// SELECT LAST_INSERT_ID();
// SELECT id FROM subcategories ORDER BY id DESC LIMIT 1; get last id from table

switch ($type) { // the type request: add / update / delete;

    case 'add':
        # code...

        switch ($table) { // the table name
            
            case 'subcategories':
                # code...
                //echo "add subcategory request";
                $subcatName = $params['subcat-name'];
                $catParentId = $params['selected-cat'];

                query("INSERT INTO `subcategories` VALUES (NULL, '$subcatName', $catParentId) ");

                echo "successfuly added";

            break;

            case 'market':
                # code...
                echo "add shop request";
                $shopOwner = $params['email-access'];
                $shopName = $params['name-shop'];
                $shopCategory = $params['selected-cat'];

                $foundUser = query("SELECT * FROM `users` WHERE `email` LIKE '$shopOwner'");

                if (mysqli_num_rows($foundUser) == 0) {
                    echo "Nu exista asa utilizator";
                }
                else
                {

                    $newUser = mysqli_fetch_assoc($foundUser);
                    $checkIfExistentOwner = query("SELECT * FROM `market_admins` WHERE 
                    `user_id` = ".$newUser['id']." ");

                    if(mysqli_num_rows($checkIfExistentOwner) > 0) 
                    {
                        echo "Utilizatorul dat deja este responsabil de magazinul dat sau de alt magazin";
                    }
                    else
                    {
                        //require $_SERVER['DOCUMENT_ROOT'] . "/generalConfig.php";

                        query("INSERT INTO `market_data` VALUES (NULL, $shopCategory, '$shopName', NOW())");
                        //$last_id = mysqli_insert_id($link);
                        $lastIdVal= mysqli_fetch_assoc( query("SELECT id FROM `market_data` ORDER BY id DESC LIMIT 1") );
                        $lastIdVal= intval($lastIdVal['id']);

                        query("INSERT INTO `market_admins` VALUES ($lastIdVal, ".$newUser['id']." ) ");

                        //SELECT LAST_INSERT_ID() as ;
                        //INSERT INTO `market_data` VALUES (NULL, 4, 'test', NOW());
                        //INSERT INTO `market_admins` VALUES (LAST_INSERT_ID(), 1 )
                        // DELETE FROM market_admins WHERE market_id = 7 AND user_id = 1
                        echo 'Magazinul a fost adaugat cu success!!!';
                    }
                     
                }


            break;
            
        }

    break;
        
    case 'update':
        # code...

        switch ($table) { // the table name

            case 'subcategories':
                # code...
                $subcatName = $params['cur-subcat-name'];
                $catParentId = $params['selected-cat'];
                $entryId = $_POST['entry_id'];
    
                query("UPDATE `subcategories` SET 
                `subcategory_name` = '$subcatName' , 
                `category_id` = $catParentId 
                WHERE `subcategories`.`id` = $entryId");

                echo "successfuly changed";

            break;

            case 'market':
                # code...
                //echo "edit shop request\n";
                $newShopOwner = $params['cur-email'];
                $entryId = $_POST['entry_id'];
                //echo $entryId;

                $foundUser = query("SELECT * FROM `users` WHERE `email` LIKE '$newShopOwner'");

                if (mysqli_num_rows($foundUser) == 0) {
                    echo "Nu exista asa utilizator";
                }
                else
                {

                    $newUser = mysqli_fetch_assoc($foundUser);
                    $checkIfExistentOwner = query("SELECT * FROM `market_admins` WHERE 
                    `user_id` = ".$newUser['id']." ");

                    if(mysqli_num_rows($checkIfExistentOwner) > 0) 
                    {
                        echo "Utilizatorul dat deja este responsabil de magazinul dat sau de alt magazin";
                    }
                    else
                    {
                        query("UPDATE `market_admins` SET 
                        `user_id` = ".$newUser['id']." 
                        WHERE market_id = $entryId");
                        echo '<span style="color:green;">Modificările au fost executate cu success!!!</span>';
                    }
                     
                }


            break;
        }

    break;

    
    case 'delete':

        $entryId = $_POST['entryId'];
        if ($table == 'market') { query("DELETE FROM `market_admins` WHERE `market_id` = $entryId;"); }
        query("DELETE FROM `$table` WHERE `$table`.`id` = $entryId;");
        $lastIdVal= mysqli_fetch_assoc( query("SELECT id FROM `$table` ORDER BY id DESC LIMIT 1") );
        $lastIdVal= intval($lastIdVal['id'] + 1);
        query("ALTER TABLE `$table` AUTO_INCREMENT = $lastIdVal");
        echo $lastIdVal;
        echo " deleted successfuly";
     
    break;



}




?>