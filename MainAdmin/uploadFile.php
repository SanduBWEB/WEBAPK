


<?php

// Include the database configuration file
$statusMsg = '';


if ( isset($_POST['contentType']) ) {

    // product
    if ( isset($_POST['productId']) )
    {
        $id = $_POST['productId'];
        $path = $_SERVER['DOCUMENT_ROOT'] . $_POST['filePath'];
        
        //products: create folder on addition
        // substr removes "/" from the initial filepath so that its declared as a directory
        if (!is_dir( substr( $path, 0, -1) ) ) {  // directory doesnt exist

            // product: create folder and die in case something goes wrong
            if ( !mkdir( substr( $path, 0, -1) ) ) {
                die('Couldnt create directory...');
            }
                

        }
        //else rmdir( substr( $path, 0, -1) ); // directory exists already-- DOESNT WORK FOR NOW (should delete all files inside first)

    } 

    
}


// File upload path
$targetDir = $_SERVER['DOCUMENT_ROOT'] . $_POST['filePath'];
$fileName = basename($_FILES["file"]["name"]);
//$fileName = $_SESSION("user_id");
//echo $fileName;
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
//print_r($fileType);

//print_r( $_FILES["file"] );

if(!empty($_FILES["file"]["name"])){

    // Upload
    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
        $statusMsg = "The file ".$fileName. " has been uploaded successfully. path: " . $_POST['filePath'];
        }   
        else
        {
        $statusMsg = "File upload failed, please try again.";
    }
}
else    
{
    $statusMsg = "Sorry, there was an error uploading your file.";        
}

//Display status message
echo $statusMsg;
//echo $targetDir;
?>