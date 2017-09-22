<?php

error_reporting(E_ALL & ~E_NOTICE);
session_start();

// if($_POST['submit']) {
//     $dbUserName = "admin";
//     $dbPassword = "password";
    
//     $username = strip_tags($_POST["username"]);
//     $username = strtolower($username);
//     $password = strip_tags($_POST["password"]);
//     // echo $username . ' - ' . $password . '<br>';
//     // echo $dbUserName . ' - ' . $dbPassword;
//     if ($username == $dbUserName && $password == $dbPassword) {
//         //set session variables
//         $_SESSION['username'] = 'test';
//         //direct to users feed

//         header('Location: admin.php');
//         //echo 'logged in';
//     } else {
//         echo "You entered the incorrect username or password.";
//     }
// }

if ($_POST['submit']) {
  
  include_once("blog-connection.php");
  $username = strip_tags (strtolower($_POST['username']));
  $password = strip_tags($_POST['password']);
  
  $sql = "SELECT id, username, password FROM members
  WHERE username = '$username' AND activated = '1' LIMIT 1";
  $query = mysqli_query($dbCon, $sql);
  
  if ($query) {
    
    $row = mysqli_fetch_assoc($query);
    $userId = $row['id']; 
    $dbUsername = $row['username'];
    $dbPassword = $row['password'];
    
  } else {
    
    echo "no success.";
    
  }
  
  if ($username == $dbUsername && $password == $dbPassword) {
    
    $_SESSION['username'] = $username;
    $_SESSION['id'] = $userId;
    header('Location: admin.php');
    
  } else {
    
    echo "Incorrect username or password, bruh.";
    
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
        <div class="container-o">
            
        <h2 class="center">Blog Admin Login</h2>
        <form action='blog-login.php' method='post'>
            
            <input type="text" placeholder="Username" name="username"/> <br />
        <input type="password" placeholder="Password" name="password" /> <br /><br />
        <input type="submit" name="submit" value="Log In" /> <br />
            
            <!--Username: <input type='text' name='username' /><br />-->
            <!--Password: <input type='password' name='password' /><br /><br />-->
            <!--<input type='submit' name='submit' value='Login' /> -->
        </form>
        <br /><br /><br /><a href="blog-index.php">Back to Home Page</a>
        </div>
    </body>
</html>