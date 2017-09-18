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
        <link rel="stylesheet" type="text/css" href="new.css">
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <title>Admin Page</title>
    </head>
    <body>
        <h1>Welcome, <?php echo $username; ?>!</h1>
        
        <form method="post" action="admin.php">
            Title: <input type="text" name="title" /><br />
            Subtitle: <input type="text" name="subtitle" /><br /> 
            Content: <textarea name="content"></textarea><br />
            <input type="submit" name="submit" value="Post Blog Entry"/>
        </form>
        
        <br />
        <a href="blog-index.php">View Home Page</a> | <a href="blog-logout.php">Logout</a>
    </body>
</html>