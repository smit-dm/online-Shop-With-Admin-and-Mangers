<?php

session_start();

include('includes/login_check.php');

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
          <a href="homePage.html">Home</a>
          <a class="active" href="shop.php">Shop</a>
          <a href="#contact">Contact</a>
          <a href="#about">About</a>
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
        <tr>
          <td>1</td>
          <td>Crocs</td>
          <td>luscious@lizards.com</td>
          <td>$30</td>
        </tr>
      </tbody>
    </table>
    <footer>
        <p id="footer">© Smit Mehta & Iulia Danilov</p>
    </footer>
</body>
</html>