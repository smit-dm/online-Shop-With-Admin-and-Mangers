<?php

session_start();
include_once('includes/login_check.php');
include_once('includes/db_connection.php');

$query = "SELECT * FROM `Orders`";
$orders = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop for Crocs</title>
    <link rel="stylesheet" href="stylesheets/orders.css">
</head>

<body>
<div class="header">
<a href="#default" id="logo" ><img class="logo" src="https://1000logos.net/wp-content/uploads/2018/11/Crocs.jpg" alt="CompanyLogo" ></a>
<div class="header-right">
    <a href="homePage.php">Home</a>
    <a href="shop.php">Shop</a>
    <a class="active" href="orders.php">Orders</a>
<?php include_once("header.php") ?>
</div>
</div>
    <header>
        <h1 id="title">Crocs</h1>
        <p id="backHome"><b>Main page</b></p>
    </header>
<table class="ordersTable">
      <thead>
        <tr>
          <th>Order Number</th>
          <th>Name</th>
          <th>Email</th>
          <th>Amount</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($orders as $order) { ?>
          <tr>
          <td><?= $order['name'] ?></td>
          <td><?= $order['email'] ?></td>
          <td><?= $order['clogs'] ?></td>
          <td><?= $order['phone'] ?></td>
        </tr>
       <?php } ?>
        
      </tbody>
    </table>
    <footer>
        <p id="footer">© Smit Mehta & Iulia Danilov</p>
    </footer>
</body>
</html>