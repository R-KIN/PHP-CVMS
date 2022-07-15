<?php
session_start();
// Check first page if empty, If any empty redirects back to first page.
if (isset($_POST['name'])){
 if (empty($_POST['name'])
 || empty($_POST['age'])
 || empty($_POST['sex'])
 || empty($_POST['email'])
 || empty($_POST['contactNumber'])
 || empty($_POST['facebookLink'])
 || empty($_POST['address'])
 || empty($_POST['region'])
 || empty($_POST['province'])
 || empty($_POST['city'])
 || empty($_POST['consent'])){ 
 // error message
 $_SESSION['error'] = "Please enter the required information.";
 header("location: /PHP-CVMS/CVMS/personal.php"); // Redirecting to first page 
 } else {
 // Sanitizing email field to remove unwanted characters.
 $_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); 
 // After sanitization Validation is performed.
 if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){ 
 // Validating Contact Field using regex.
 if (!preg_match("/^[0-9]{11}$/", $_POST['contactNumber'])){ 
 $_SESSION['error'] = "11 digit contact number is required.";
 header("location: /PHP-CVMS/CVMS/personal.php");
 } else {
 if (($_POST['password']) === ($_POST['confirm'])) {
 foreach ($_POST as $key => $value) {
 $_SESSION['post'][$key] = $value;
 }
 } else {
 $_SESSION['error'] = "Password does not match with Confirm Password.";
 header("location: page1_form.php"); //redirecting to first page
 }
 }
 } else {
 $_SESSION['error'] = "Invalid Email Address";
 header("location: page1_form.php");//redirecting to first page
 }
 }
} else {
 if (empty($_SESSION['error_page2'])) {
 header("location: page1_form.php");//redirecting to first page
 }
}
?>
