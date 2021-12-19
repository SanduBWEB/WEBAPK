


<?php
// Include the database configuration file
$statusMsg = '';


// count nr of files in dir
//https://stackoverflow.com/questions/12801370/count-how-many-files-in-directory-php
// $fi = new FilesystemIterator(__DIR__, FilesystemIterator::SKIP_DOTS);
// printf("There were %d Files", iterator_count($fi));

// to remove all the files, and delete the directory, for refs:
// https://stackoverflow.com/questions/3338123/how-do-i-recursively-delete-a-directory-and-its-entire-contents-files-sub-dir
// function rrmdir($dir) { 
//     if (is_dir($dir)) { 
//       $objects = scandir($dir);
//       foreach ($objects as $object) { 
//         if ($object != "." && $object != "..") { 
//           if (is_dir($dir. DIRECTORY_SEPARATOR .$object) && !is_link($dir."/".$object))
//             rrmdir($dir. DIRECTORY_SEPARATOR .$object);
//           else
//             unlink($dir. DIRECTORY_SEPARATOR .$object); 
//         } 
//       }
//       rmdir($dir); 
//     } 
// }



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