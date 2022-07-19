<?php 

if (isset($_POST['submit'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirm = $_POST['confirm'];

  require_once 'database.php';
  require_once 'handling.php';

  if (emptyInput($username, $password, $confirm) !== false) {
    header("location: /PHP-CVMS/CVMS/register.php.?error=emptyInput");
    exit();
  }
  if (invalidUsername($username) !== false) {
    header("location: /PHP-CVMS/CVMS/register.php.?error=invalidUser");
    exit();
  }
  if (invalidMatch($password, $confirm) !== false) {
    header("location: /PHP-CVMS/CVMS/register.php.?error=invalidMatch");
    exit();
  }
  if (alreadyTaken($connection, $username) !== false) {
    header("location: /PHP-CVMS/CVMS/register.php.?error=userExists");
    exit();
  }
  createUser($connection, $username, $password);
} 
else {
  header("location: /PHP-CVMS/CVMS/register.php");
  exit();
}