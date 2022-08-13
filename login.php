<?php

session_start();
include_once('includes/db_connection.php');

if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true){
    header('Location: homePage.html');
    return;
}

if(isset($_POST['submit'])){
    $username = $_POST['userId'];
    $password = $_POST['pass'];
  
    $query = "SELECT * from userinfo where username = '".$username."' and pass = '".$password."'";

  $result = mysqli_query($conn, $query);
  
  if(mysqli_num_rows($result)){
    $_SESSION['isLoggedIn'] = true;
    $_SESSION['user'] = $row;
    header('Location: homePage.html');

  }
  else echo "i am sad";

}
//  } else echo "Wrong user/password!";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop for Crocs</title>
    <link rel="stylesheet" href="stylesheets/login.css">
</head>

<body>
    <div class="header">
        <a href="#default" id="logo"><img class="logo" src="https://1000logos.net/wp-content/uploads/2018/11/Crocs.jpg"
                alt="CompanyLogo"></a>
        <div class="header-right">
            <a href="homePage.html">Home</a>
            <a href="shop.php">Shop</a>
            <a href="orders.php">Orders</a>
            <a class="active" href="login.php">Login</a>
        </div>
    </div>
    <header>
        <h1 id="title">Crocs</h1>
        <p id="backHome"><b>Login page</b></p>
    </header>
    <form name="loginForm" method="Post">
        <label>Username</label>
        <input id="userId" type="text" name="userId"><br />

        <label>Password</label>
        <input id="pass" type="password" name="pass"><br />

        <br/><br />
        <input type="submit" value="Login" name="submit">
        <p id="errors"></p>
    </form>
    <footer>
        <p id="footer">© Smit Mehta & Iulia Danilov</p>
    </footer>

</body>

</html>