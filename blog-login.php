<?php

error_reporting(E_ALL & ~E_NOTICE);
session_start();

if($_POST['submit']) {
    $dbUserName = "admin";
    $dbPassword = "password";
    
    $username = strip_tags($_POST["username"]);
    $username = strtolower($username);
    $password = strip_tags($_POST["password"]);
    // echo $username . ' - ' . $password . '<br>';
    // echo $dbUserName . ' - ' . $dbPassword;
    if ($username == $dbUserName && $password == $dbPassword) {
        //set session variables
        $_SESSION['username'] = 'test';
        //direct to users feed

        header('Location: admin.php');
        //echo 'logged in';
    } else {
        echo "You entered the incorrect username or password.";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="new.css">
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <title>Login</title>
    </head>
    <body>
        
        <form action='blog-login.php' method='post'>
            Username: <input type='text' name='username' /><br />
            Password: <input type='password' name='password' /><br />
            <input type='submit' name='submit' value='Login' /> 
        </form>
        
    </body>
</html>