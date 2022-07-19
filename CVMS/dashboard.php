<?php include './inc/header.php'; ?>
<?php 
if (!isset($_SESSION['username'])) {
  header("location: /PHP-CVMS/CVMS/index.php");
  exit();
}
?>

    <img src="/PHP-CVMS/CVMS/img/logo.png" style="height:100px; width:100px;" class="mb-2" alt="PUP Taguig logo">
    <h3 style="font-family:Poppins; font-weight:700;">Hello <?= $_SESSION['username'] . "."; ?></h3>
    <p style="font-family:DM Sans;"><?= date("l j \ F Y h:i:s A"); ?></p>
    <span style="font-family:DM Sans;">
      <?php 
      if (isset($_GET['error'])) {
        if ($_GET['error'] == 'deleteFailed') {
          echo "<div class='alert alert-danger alert-dismissable fade show' role='alert'>";
          echo "Delete failed. Something went wrong. <button type='button' class='btn-close h-50' data-bs-dismiss='alert' aria-label='close'></button>";
          echo "</div>";
        }
        else if ($_GET['error'] == 'viewFailed') {
          echo "<div class='alert alert-danger alert-dismissable fade show' role='alert'>";
          echo "View Failed. Something went wrong. <button type='button' class='btn-close h-50' data-bs-dismiss='alert' aria-label='close'></button>";
          echo "</div>";
        }
        else if ($_GET['error'] == 'none') {
          echo "<div class='alert alert-warning alert-dismissable fade show' role='alert'>";
          echo "Record removed successfully. <button type='button' class='btn-close h-50' data-bs-dismiss='alert' aria-label='close'></button>";
          echo "</div>";
        }
      }
      ?>
    </span>
    <div class="mt-1 mb-3 d-grid gap-2">
      <table style="font-family:DM Sans;" class="table table-bordered table-striped table-hover">
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
            if (mysqli_num_rows($results) > 0) {
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
                    <a href="view.php?id=<?= $student['student_id']; ?>" class="btn btn-primary btn-sm">View</a>
                    <form action="./inc/delete-record.php" method="POST" class="d-inline">
                      <button type="submit" name="delete" value="<?= $student['student_id']; ?>" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                  </td>
                </tr>
                <?php
              }
            }
            else {
              echo "<tr style='text-align:center;'>";
              echo "<td>--</td>";
              echo "<td>--</td>";
              echo "<td>--</td>";
              echo "<td>--</td>";
              echo "<td>--</td>";
              echo "<td>--</td>";
              echo "<td>--</td>";
              echo "<td>--</td>";
              echo "</tr>";
            }
          ?>
        </tbody>
      </table>
      <?php if(mysqli_num_rows($results) <= 0) {
        echo "<div style='text-align:center; font-family:Poppins;' class='alert alert-warning' role='alert'>No records found.</div>";
      } 
      ?>
    </div>
    
<?php include './inc/footer.php'; ?>