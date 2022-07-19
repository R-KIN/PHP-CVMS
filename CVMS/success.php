<?php include './inc/header.php'; ?>
<?php 

if (isset($_SESSION['username'])) {
  header("location: /PHP-CVMS/CVMS/dashboard.php");
  exit();
}
else if (!isset($_SESSION['personal'])) {
  header("location: /PHP-CVMS/CVMS/index.php.?error=submitFailed");
  exit();
} 
else {
  echo "<img src='/PHP-CVMS/CVMS/img/logo.png' style='height:100px; width:100px;' class='mb-2' alt='PUP Taguig logo'>";
  echo "<h3 style='font-family:Poppins; font-weight:700;'>Success</h3>";
  echo "<h5 style='font-family:DM Sans;'>Your form has been successfully submitted.</h5>";
  echo "<div class='mt-1 mb-3 d-grid gap-2'>";
  echo "<table style='font-family:DM Sans; text-align:center;' class='table table-bordered table-striped table-hover'>";
  echo "<thead>";
  echo "<tr>";
  echo "<th>Name</th>";
  echo "<th>Age</th>";
  echo "<th>Sex</th>";
  echo "<th>Email</th>";
  echo "<th>Contact Number</th>";
  echo "<th>Facebook Link</th>";
  echo "<th>Address</th>";
  echo "<th>Region</th>";
  echo "<th>Province</th>";
  echo "<th>City</th>";
  echo "<th>Course</th>";
  echo "<th>Year & Section</th>";
  echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
  $results = $_SESSION['personal'];
  $i = 0;
  $ii = 12;
  echo "<tr>";
  while ($i <= 11) {
    echo "<td>" . $results[$i] . "</td>";
    $i++;
  }
  echo "</tr>";
  echo "</tbody>";
  echo "</table>";
  echo "<table style='font-family:DM Sans; text-align:center;' class='table table-bordered table-striped table-hover'>";
  echo "<thead>";
  echo "<tr>";
  echo "<th>Vaccinated?</th>";
  echo "<th>Vaccine Name</th>";
  echo "<th>First Dose</th>";
  echo "<th>Second Dose</th>";
  echo "<th>Boosted?</th>";
  echo "<th>Booster Name</th>";
  echo "<th>First Dose</th>";
  echo "<th>Second Dose</th>";
  echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
  echo "<tr>";
  while ($ii <= 19) {
    echo "<td>" . $results[$ii] . "</td>";
    $ii++;
  }
  echo "</tr>";
  echo "</tbody>";
  echo "</table>";
  echo "</div>";
  session_unset();
  session_destroy();
}

?>
    
<?php include './inc/footer.php'; ?>