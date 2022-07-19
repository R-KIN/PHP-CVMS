<?php include './inc/header.php'; ?>
<?php 
if (isset($_SESSION['username'])) {
  header("location: /PHP-CVMS/CVMS/dashboard.php");
  exit();
}
?>

    <img src="/PHP-CVMS/CVMS/img/logo.png" style="height:100px; width:100px;" class="mb-2" alt="PUP Taguig logo">
    <h3 style="font-family:Poppins; font-weight:700;">Register</h3>
    <h5 style="font-family:DM Sans;">Please enter the following information.</h5>
    <span style="font-family:DM Sans;">
      <?php 
      if (isset($_GET['error'])) {
        if ($_GET['error'] == 'emptyInput') {
          echo "<div class='alert alert-danger' role='alert'>Please enter the required information.</div>";
        }
        else if ($_GET['error'] == 'invalidUser') {
          echo "<div class='alert alert-danger' role='alert'>Please enter a valid username.</div>";
        }
        else if ($_GET['error'] == 'invalidMatch') {
          echo "<div class='alert alert-danger' role='alert'>The passwords do not match.</div>";
        }
        else if ($_GET['error'] == 'userExists') {
          echo "<div class='alert alert-danger' role='alert'>The username already exists.</div>";
        }
        else if ($_GET['error'] == 'registerFailed') {
          echo "<div class='alert alert-danger' role='alert'>Something went wrong.</div>";
        }
        else if ($_GET['error'] == 'none') {
          echo "<div class='alert alert-success' role='alert'>User registered.</div>";
        }
      }
      ?>
    </span>
    <form style="font-family:DM Sans;" class="mt-1 w-50" action="./inc/register-user.php" method="POST">
      <div class="mb-3 w-50 mx-auto">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="">
      </div>
      <div class="mb-3 w-50 mx-auto">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="">
      </div>
      <div class="mb-3 w-50 mx-auto">
        <label for="confirm" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="confirm" name="confirm" placeholder="">
      </div>
      <div class="mb-3 w-50 mx-auto">
        <input type="submit" name="submit" value="login" style="background-color:#800000; color:white; font-family:Poppins; font-weight:700; margin-left: 12.5%;" class="btn w-75">
      </div>
    </form>

<?php include './inc/tos.php'; ?>

