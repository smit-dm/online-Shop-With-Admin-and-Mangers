<?php

session_start();

session_destroy();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged out</title>
</head>
<body>
  <main>
    <div class="status">
        <?php 
            echo 'Successfully logged out!';
            sleep(1);
            header('Location: homePage.php');
        ?>
    </div>
  </main>
    
</body>
</html>




