<?php 

include 'blog-connection.php';
session_start();

// if(isset($_SESSION['username'])) {
        
//         $username = ucfirst($_SESSION['username']);
        
//         if ($_POST['submit']) {
            
            // $username = mysqli_real_escape_string($dbCon, $_POST['username']);
            // $password = mysqli_real_escape_string($dbCon, $_POST['password']);
            // include_once("blog-connection.php");
            // $sql = "INSERT INTO members(username, password) VALUE ('$username', '$password')";
            // if (mysqli_query($dbCon, $sql)) {
            //     echo "";
            // } else {
            //     echo 'you have a prob' . mysqli_error($dbCon);
            // }
            
            
            // error_reporting(E_ALL & ~E_NOTICE);
            // session_start();
          
            // if (isset($_SESSION['id'])) {
            
            //     // $userId = $_SESSION['id'];
            //     // $username = $_SESSION['username'];
            //     header('Location: blog-login.php');
            
            // } else {
            
            //     header('Location: blog-index.php');
            //     die();
            
            // }
            
            if ($_POST['submit']) {
             
            $username = mysqli_real_escape_string($dbCon, $_POST['username']);
            $password = mysqli_real_escape_string($dbCon, $_POST['password']);
            // $activate = ($dbCon, $_POST['activate']);
            include_once("blog-connection.php");
            $sql = "INSERT INTO members(username, password) VALUE ('$username', '$password')";
            if (mysqli_query($dbCon, $sql)) {
                echo "";
            } else {
                echo 'you have a prob' . mysqli_error($dbCon);
            }
             header('Location: blog-login.php');
                
            }
            
            
        // } 
        
    // } else {
    //     header('Location: blog-login.php');
    //     // die();
    //     echo 'no session';
    // }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Blog Registration</title>
        <link rel="stylesheet" type="text/css" href="new.css">
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    </head>
    <body>
        <div class="container-o">
        <h1>Welcome! Make an account here</h1>
        <a href="blog-login.php">Already have an account? Click here to go to the login page.</a><br /><br />
        <form method="post" action="registration.php">
            
            <input type="text" placeholder="Create Username" name="username" /><br />
            <input type="text" placeholder="Create Password" name="password" /><br /> <br />
            <input type="submit" name="submit"  value="Register"/>
            
        </form>
        </div>
    </body>
</html>