<?php
$host = 'localhost'; 
$db = 'marketplace'; // numele BD;
$user = 'root'; //utilizator
$password = ''; //parola

$link = mysqli_connect($host,$user,$password,$db);
/*ver connectarii la server si bd */
if (mysqli_connect_errno())
{
	printf("Erroare la conectare: %s\n", mysqli_connect_error());
	exit();
}

// TO GENERATE HTML FILES
// $myFile = "filename.html"; // or .php   
// $fh = fopen($myFile, 'w'); // or die("error");  
// $stringData = "your html code php code goes here";   
// fwrite($fh, $stringData);
// fclose($fh);

//in fiecare fisier php: require_once 'config.php'; //conectapm scriptul de conectare la server si db;

?>  