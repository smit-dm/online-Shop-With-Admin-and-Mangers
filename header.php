

    <?php if(isset($_SESSION['isLoggedIn'])){ ?>
        <a href="logout.php">Logout</a>
    <?php }else{?>
    <a href="login.php">Login</a>
    <?php } ?>
