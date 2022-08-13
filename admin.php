<?php

session_start();
include_once('includes/login_check.php');
include('includes/db_connection.php');

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1){
    header('Location: homePage.php');
    return;
}
if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] != 1){
    header('Location: homePage.php');
    return;
}

$name = $pass = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$name = test_input($_POST["fname"]);
$pass = test_input($_POST["lname"]);
}
if($name =  "" && $pass = "") {
    header('Location: admin.php');
       
    }  

else {
    $sql = "INSERT INTO userinfo (username, pass) VALUES ('".$name."','".$pass."')";
    
   if (mysqli_query($conn, $sql)) {
        } else {
         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    
$query = "SELECT * FROM userInfo";
$users = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop for Crocs</title>
    <link rel="stylesheet" href="stylesheets/shop.css?v=<?php echo time(); ?>">
</head>

<body>
<div class="header">
<a href="#default" id="logo" ><img class="logo" src="https://1000logos.net/wp-content/uploads/2018/11/Crocs.jpg" alt="CompanyLogo" ></a>
<div class="header-right">
    <a href="homePage.php">Home</a>
    <a href="shop.php">Shop</a>
    <a href="orders.php">Orders</a>
<?php include_once("header.php") ?>
</div>
</div>
    <header>
        <h1 id="title">Crocs</h1>
        <p id="backHome"><b>Main page</b></p>
    </header>
<form id="mainForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <h1> Create manager</h1>
  <label for="fname">Managers Username:</label><br>
  <input type="text" id="name" name="fname"><br>
  <label for="lname">pass:word</label><br>
  <input type="password" id="pass" name="lname">
  <input type="submit">
</form>
<table>
<th></th>
          <th></th>
          <th>Name</th>
          <th>Password</th>
          <th>IS ADMIN?</th>
<?php foreach ($users as $order) { ?>
          <tr>
              <td></td>
              <td></td>
          <td><?= $order['username'] ?></td>
          <td><?= $order['pass'] ?></td>
          <td><?= $order['is_admin'] ?></td>
        </tr>
       <?php } ?>
</table>
</body>
</html>