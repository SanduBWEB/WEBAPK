<?php
session_start();
require_once "generalConfig.php";

$data = $_POST['formData'];
$type = $_POST['type'];
$params = array();
parse_str($data, $params);



if ($type == "register" ) {

    //print_r($params);
    $email = $params['email'];
    $sql = "SELECT * FROM `users` WHERE\n"

    . "email = '$email' OR username = '".$params['name']."' ";
    //print_r($sql);
    $query = mysqli_query($link,$sql);
    if (!$query)
    {
        die('Error in cautare' . mysqli_error($link));
    } 
    else if ( mysqli_num_rows($query) === 0) {

        $sql = "INSERT INTO users VALUES (NULL,'".$params['name']."','".$params['pass']."','".$params['email']."', DEFAULT, NOW() )";
        //print_r($sql);

        $query = mysqli_query($link, $sql);
        if (!$query)
        {
            die('Error in procesul inregistrare' . mysqli_error($link));
        }
        else{ echo "Account-ul a fost creat cu success!";}

    }  
    else {echo "Exista deja user cu username-ul/email-ul introdus!";}


}
elseif ($type == "login") {

    //print_r($params);

    $username = $params['username'];
    $pass = $params['password'];

    $sql = "SELECT * FROM `users` WHERE username = '$username' AND password = '$pass' \n"
                                  . "OR email = '$username' AND password = '$pass'";
    $query = mysqli_query($link,$sql);
    
    
    if (!$query)
    {
        die('Error in cautare' . mysqli_error($link));
    } 
    else if ( mysqli_num_rows($query) === 0) {
        echo "E-mailul/username-ul sau parola incorectă!";
        die();
    }else {
        echo "Login cu success";
        $account = mysqli_fetch_assoc($query);

        $_SESSION['user_id'] = $account['id'];  //id
        $_SESSION['username'] = $account['username'];
        //$_SESSION['e_mail'] = $account[2];
        //$_SESSION['password'] = $pass;
        $_SESSION['data_reg'] = $account['registrare'];
        if ($account['role'] == 'admin') {
            $_SESSION['admin'] = true;
        } else{
            $_SESSION['admin'] = false;
        }
    // header('Location: index.html');
    }

}
elseif ($type == "logout") {


}


?>