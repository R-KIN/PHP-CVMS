<?php include './inc/header.php'; ?>
<?php 

if (!isset($_SESSION['username'])) {
  header("location: /PHP-CVMS/CVMS/index.php");
  exit();
}

?>

    <img src="/PHP-CVMS/CVMS/img/logo.png" style="height:100px; width:100px;" class="mb-2" alt="PUP Taguig logo">
    <h3 style="font-family:Poppins; font-weight:700;">COVID Vaccination Monitoring System</h3>
    <h5 style="font-family:DM Sans;">Polytechnic University of the Philippines Taguig</h5>
    <div class="mt-4 mb-3 d-grid gap-2">
      <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Sex</th>
            <th>Course</th>
            <th>Year & Section</th>
            <th>Date Created</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            require_once './inc/database.php';
            $sql = "SELECT * FROM students;";
            $results = mysqli_query($connection, $sql);
            if(mysqli_num_rows($results) > 0) {
              foreach($results as $student) {
                ?>
                <tr>
                  <td><?= $student['student_id']; ?></td>
                  <td><?= $student['name']; ?></td>
                  <td><?= $student['age']; ?></td>
                  <td><?= $student['sex']; ?></td>
                  <td><?= $student['course']; ?></td>
                  <td><?= $student['year_section']; ?></td>
                  <td><?= $student['date_created']; ?></td>
                  <td>
                    <a href="#" class="btn btn-primary btn-sm">Info</a>
                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                  </td>
                </tr>
                <?php
              }
            }
            else {
              echo "No records found.";
            }
          ?>
        </tbody>
      </table>
    </div>
    
<?php include './inc/tos.php'; ?>