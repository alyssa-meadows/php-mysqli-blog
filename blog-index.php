<?php
    session_start();
    error_reporting(E_ALL & ~E_NOTICE);
?>

<!DOCTYPE html>
<html>
    <head>
      <link rel="stylesheet" type="text/css" href="new.css">
      <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <title>Simple Blog</title>
    </head>
    <body>
       <h1 style="text-align: center;">My Awesome Functional Blog</h1>
       
       
       <?php
       
       include_once("blog-connection.php");
       
       $sql = "SELECT * FROM blog ORDER BY id DESC";
       $result = mysqli_query($dbCon, $sql);
       
       while ($row = mysqli_fetch_array($result)) {
           
           $title = $row['title'];
           $subtitle = $row['subtitle'];
           $content = $row['content'];
           
       
       ?>
       <div class="container">
         <div class="col half">
            <h2><?php echo $title; ?> - <small><?php echo $subtitle; ?></small></h2>
            <p><?php echo $content; ?></p>
          </div>
       </div>
       <?php 
       
       }
       
       ?>
      
        
        <?php
        
            
            
        ?>
        
       <br />
       <div class="con-bottom">
         <a href="admin.php">Admin</a>
       </div>
    </body>
</html>