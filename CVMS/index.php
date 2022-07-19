<?php include './inc/header.php'; ?>
<?php 
if (isset($_SESSION['username'])) {
  header("location: /PHP-CVMS/CVMS/dashboard.php");
  exit();
}
?>
    <img src="/PHP-CVMS/CVMS/img/logo.png" style="height:100px; width:100px;" class="mb-2" alt="PUP Taguig logo">
    <h3 style="font-family:Poppins; font-weight:700;">COVID Vaccination Monitoring System</h3>
    <h5 style="font-family:DM Sans;">Polytechnic University of the Philippines Taguig</h5>
    <div class="mt-4 mb-3 d-grid gap-2">
      <a style="background-color:#800000; color:white; font-family:Poppins; font-weight:700;" class="btn btn-lg" href="/PHP-CVMS/CVMS/personal.php" role="button">Answer New Form</a>
      <a style="background-color:#800000; color:white; font-family:Poppins; font-weight:700;" class="btn btn-lg" href="/PHP-CVMS/CVMS/login.php" role="button">Login as Admin</a>
    </div>
    
<?php include './inc/tos.php'; ?>
