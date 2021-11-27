


<?php

// Include the database configuration file
$statusMsg = '';

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