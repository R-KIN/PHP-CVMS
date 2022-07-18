<?php 

if (isset($_POST['submit'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];

  require_once 'database.php';
  require_once 'handling.php';

  if (emptyLogin($username, $password) !== false) {
    header("location: /PHP-CVMS/CVMS/login.php.?error=emptyLogin");
    exit();
  }

  loginUser($connection, $username, $password);
}
else {
  header("location: /PHP-CVMS/CVMS/login.php");
  exit();
}