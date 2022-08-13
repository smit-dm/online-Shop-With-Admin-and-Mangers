<?php
if(!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] == false){
  header('Location: login.php');
}
?>