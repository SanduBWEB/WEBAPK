<?php

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


$table = $_POST['table'];
$data = $_POST['formData'];
$type = $_POST['type'];

$params = array();
parse_str($data, $params);

echo $table;
echo $data;
echo $params;
// cur-subcat-name=Telefoane fixe selected-cat=2


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

            case 'tesr':
                # code...
                
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

            case 'tst':
                # code...
        
            break;
        }

    break;

    
    case 'delete':

        $entryId = $_POST['entryId'];

        query("DELETE FROM `$table` WHERE `$table`.`id` = $entryId;");

        echo "deleted successfuly";

    break;



}




?>