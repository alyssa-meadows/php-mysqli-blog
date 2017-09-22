<?php
    include 'blog-connection.php';
    session_start();

    if(isset($_SESSION['username'])) {
        
        $username = ucfirst($_SESSION['username']);
        
        if ($_POST['submit']) {
            
            $title = mysqli_real_escape_string($dbCon, $_POST['title']);
            $subtitle = mysqli_real_escape_string($dbCon, $_POST['subtitle']);
            $content = mysqli_real_escape_string($dbCon, $_POST['content']);
            include_once("blog-connection.php");
            $sql = "INSERT INTO blog(title, subtitle, content) VALUE ('$title', '$subtitle', '$content')";
            if (mysqli_query($dbCon, $sql)) {
                echo "Blog Entry posted.";
            } else {
                echo 'you have a prob' . mysqli_error($dbCon);
            }
            
            
            error_reporting(E_ALL & ~E_NOTICE);
            session_start();
          
            if (isset($_SESSION['id'])) {
            
                $userId = $_SESSION['id'];
                $username = $_SESSION['username'];
            
            } else {
            
                header('Location: home.php');
                die();
            
            }
            
            
        } 
        
    } else {
        header('Location: blog-login.php');
        // die();
        echo 'no session';
    }
        
?>

<!DOCTYPE html>
<html>
    <head>
        <script src="tinymce/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea' });</script>
        <link rel="stylesheet" type="text/css" href="new.css">
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <title>Admin Page</title>
        <style>
            input {
                margin: 5px;
            }
            textarea {
                width: 50%;    
                min-height: 300px;
                margin: 5px;
            }
        </style>
        <div class="container-o">
        <h1 class="center">Welcome, <?php echo $username; ?>!</h1><br />
        
        <form method="post" action="admin.php">
            
            <input type="text" placeholder="Title" name="title" /><br />
            <input type="text" placeholder="Subtitle" name="subtitle" /><br /> <br />
            <textarea name="content"></textarea><br /><br />
            <input type="submit" name="submit" value="Post Blog Entry"/>
        </form>
        
        <br />
        <a href="blog-index.php">View Home Page</a> | <a href="blog-logout.php">Logout</a>
        </div>
    </body>
</html>