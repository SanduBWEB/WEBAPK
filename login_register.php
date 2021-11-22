<?php
session_start();
require_once "generalConfig.php";

if( $_POST['type'] && $_POST['type'] == 'logout'  ) {
    
    session_start();

    if (isset($_SESSION['username'])) {
        session_unset();
        setcookie(session_name(), session_id(), 1); // to expire the session
        $_SESSION = [];
        session_destroy();
        echo "destroyed";
    }
    $_SESSION['logged'] = 0 ;
    return;
}
$data = $_POST['formData'];
$type = $_POST['type'];
$params = array();
parse_str($data, $params);


if ($type == "register" ) {

    //print_r($params);
    $email = $params['email'];
    $sql = "SELECT * FROM `users` WHERE "
    . "email = '$email' OR username = '".$params['name']."' ";
    //print_r($sql);
    $query = mysqli_query($link,$sql);
    if (!$query)
    {
        die('Error in cautare' . mysqli_error($link));
    } 
    else if ( mysqli_num_rows($query) === 0) {

        $sql = "INSERT INTO users VALUES (NULL,'".$params['username']."','$email','".$params['password']."','".$params['name']."','".$params['surname']."','".$params['phone']."', NOW(), DEFAULT)";
        //print_r($sql);

        $query = mysqli_query($link, $sql);
        if (!$query)
        {
            die('Error in procesul inregistrare' . mysqli_error($link));
        }
        else{ echo "Operatie cu success";}

    }  
    else {echo "Exista deja user cu username-ul/email-ul introdus!";}


}
elseif ($type == "login") {

    //print_r($params);

    $username = $params['username'];
    $pass = $params['password'];

    $sql = "SELECT * FROM `users` WHERE username = '$username' AND pass = '$pass' \n"
                                  . "OR email = '$username' AND pass = '$pass'";
    $query = mysqli_query($link,$sql);
    //print_r($data);
    
    if (!$query)
    {
        die('Error in cautare' . mysqli_error($link));
    } 
    else if ( mysqli_num_rows($query) === 0) {
        echo "E-mailul/username-ul sau parola incorectă!";
        die();
    }else {
        echo "Operatie cu success";
        $account = mysqli_fetch_assoc($query);
        $_SESSION['logged'] = 1;
        $_SESSION['user_id'] = $account['id'];  //id
        $_SESSION['username'] = $account['username'];
        $_SESSION['e_mail'] = $account['email'];
        //$_SESSION['password'] = $pass;
        $_SESSION['data_reg'] = $account['registrare'];
        $_SESSION['role'] = $account['role'];
        if ($account['role'] == 'superadmin') {
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