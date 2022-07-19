<?php include './inc/header.php'; ?>
<?php 
if (!isset($_SESSION['username'])) {
  header("location: /PHP-CVMS/CVMS/index.php");
  exit();
}
?>

  <img src="/PHP-CVMS/CVMS/img/logo.png" style="height:100px; width:100px;" class="mb-2" alt="PUP Taguig logo">
  <h3 style="font-family:Poppins; font-weight:700;">Viewing ID <?= $_GET['id']; ?></h3>
  <p style="font-family:DM Sans;"><?= date("l j \ F Y h:i:s A"); ?></p>
  <div class="mt-1 mb-3 d-grid gap-2">
    <table style="font-family:DM Sans;" class="table table-bordered table-striped table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Age</th>
          <th>Sex</th>
          <th>Email</th>
          <th>Contact Number</th>
          <th>Facebook Link</th>
          <th>Course</th>
          <th>Year & Section</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          require_once './inc/database.php';
          if (isset($_GET['id'])) {
            $id = mysqli_real_escape_string($connection, $_GET['id']);
            $sql = "SELECT * FROM students WHERE student_id = '$id';";
            $results = mysqli_query($connection, $sql);
            if (mysqli_num_rows($results) > 0) {
              foreach($results as $student) {
                echo "<td>" . $student['student_id'] . "</td>";
                echo "<td>" . $student['name'] . "</td>";
                echo "<td>" . $student['age'] . "</td>";
                echo "<td>" . $student['sex'] . "</td>";
                echo "<td>" . $student['email'] . "</td>";
                echo "<td>" . $student['contact_number'] . "</td>";
                echo "<td>" . $student['facebook_link'] . "</td>";
                echo "<td>" . $student['course'] . "</td>";
                echo "<td>" . $student['year_section'] . "</td>";
              }
            }
            else {
              header("location: /PHP-CVMS/CVMS/dashboard.php.?error=viewFailed");
              exit();
            }
          }
          else {
            header("location: /PHP-CVMS/CVMS/dashboard.php.?error=viewFailed");
            exit();
          }
        ?>
      </tbody>
    </table>
    <table style="font-family:DM Sans;" class="table table-bordered table-striped table-hover">
      <thead>
        <tr>
          <th>Address</th>
          <th>Region</th>
          <th>Province</th>
          <th>City</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          echo "<td>" . $student['address'] . "</td>";
          echo "<td>" . $student['region'] . "</td>";
          echo "<td>" . $student['province'] . "</td>";
          echo "<td>" . $student['city'] . "</td>";
        ?>
      </tbody>
    </table>
    <table style="font-family:DM Sans;" class="table table-bordered table-striped table-hover">
      <thead>
        <tr>
          <th>Vaccinated?</th>
          <th>Vaccine Name</th>
          <th>First Dose</th>
          <th>Second Dose</th>
          <th>Boosted?</th>
          <th>Booster Name</th>
          <th>First Dose</th>
          <th>Second Dose</th>
          <th>Date Created</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          if (empty($student['vaccinated'])) {
            echo "<td>--</td>";
          }
          else {
            echo "<td>" . $student['vaccinated'] . "</td>";
          }
          if (empty($student['vaccine_name'])) {
            echo "<td>--</td>";
          }
          else {
            echo "<td>" . $student['vaccine_name'] . "</td>";
          }
          if (empty($student['first_vaccine'])) {
            echo "<td>--</td>";
          }
          else {
            echo "<td>" . $student['first_vaccine'] . "</td>";
          }
          if (empty($student['second_vaccine'])) {
            echo "<td>--</td>";
          }
          else {
            echo "<td>" . $student['second_vaccine'] . "</td>";
          }
          if (empty($student['boosted'])) {
            echo "<td>--</td>";
          }
          else {
            echo "<td>" . $student['boosted'] . "</td>";
          }
          if (empty($student['booster_name'])) {
            echo "<td>--</td>";
          }
          else {
            echo "<td>" . $student['booster_name'] . "</td>";
          }
          if (empty($student['first_booster'])) {
            echo "<td>--</td>";
          }
          else {
            echo "<td>" . $student['first_booster'] . "</td>";
          }
          if (empty($student['second_booster'])) {
            echo "<td>--</td>";
          }
          else {
            echo "<td>" . $student['second_booster'] . "</td>";
          }
          echo "<td>" . $student['date_created'] . "</td>";
        ?>
      </tbody>
    </table>
    </div>
    
<?php include './inc/footer.php'; ?>