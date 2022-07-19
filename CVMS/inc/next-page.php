<?php 

if (isset($_POST['submit'])) {
  session_start();

  $name = filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
  $age = filter_var($_POST['age'], FILTER_SANITIZE_SPECIAL_CHARS);
  $sex = filter_var($_POST['sex'], FILTER_SANITIZE_SPECIAL_CHARS);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $contactNumber = filter_var($_POST['contactNumber'], FILTER_SANITIZE_SPECIAL_CHARS);
  $facebookLink = filter_var($_POST['facebookLink'], FILTER_SANITIZE_SPECIAL_CHARS);
  $address = filter_var($_POST['address'], FILTER_SANITIZE_SPECIAL_CHARS);
  $region = filter_var($_POST['region'], FILTER_SANITIZE_SPECIAL_CHARS);
  $province = filter_var($_POST['province'], FILTER_SANITIZE_SPECIAL_CHARS);
  $city = filter_var($_POST['city'], FILTER_SANITIZE_SPECIAL_CHARS);
  $course = filter_var($_POST['course'], FILTER_SANITIZE_SPECIAL_CHARS);
  $yearSection = filter_var($_POST['yearSection'], FILTER_SANITIZE_SPECIAL_CHARS);

  $personal = array($name,$age,$sex,$email,$contactNumber,$facebookLink,$address,$region,$province,$city,$course,$yearSection);

  require_once 'handling.php';

  if (invalidEmail($email) !== false) {
    header("location: /PHP-CVMS/CVMS/personal.php.?error=invalidEmail");
    exit();
  }
  if (invalidContact($contactNumber) !== false) {
    header("location: /PHP-CVMS/CVMS/personal.php.?error=invalidContact");
    exit();
  }
  if (invalidLink($facebookLink) !== false) {
    header("location: /PHP-CVMS/CVMS/personal.php.?error=invalidLink");
    exit();
  }
  if (invalidAddress($address, $region, $province, $city) !== false) {
    header("location: /PHP-CVMS/CVMS/personal.php.?error=invalidAddress");
    exit();
  }

  $_SESSION['personal'] = array();
  nextPage($personal);
}
else {
  header("location: /PHP-CVMS/CVMS/personal.php");
  exit();
}