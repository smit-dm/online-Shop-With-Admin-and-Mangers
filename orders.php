<?php

session_start();

include('includes/login_check.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
</head>
<body>
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
</body>
</html>