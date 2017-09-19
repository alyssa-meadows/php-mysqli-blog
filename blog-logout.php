<?php
    session_start();
    session_destroy();
?>

<!DOCTYPT html>
<html>
    <head>
      <link rel="stylesheet" type="text/css" href="new.css">
      <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    </head>
    <body>
        <div class="container-o center">
            <h2>You are logged out. </ br></h2>
            <a href="blog-index.php">Home Page</a> | <a href="blog-login.php">Login</a>
        </div>
    </body>
</html>