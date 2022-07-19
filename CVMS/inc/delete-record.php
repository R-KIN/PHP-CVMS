<?php 
session_start();

require_once 'database.php';
if (isset($_POST['delete'])) {
  $student_id = mysqli_real_escape_string($connection, $_POST['delete']);
  $sql = "DELETE FROM students WHERE student_id = ?;";
  $stmt = mysqli_stmt_init($connection);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: /PHP-CVMS/CVMS/dashboard.php.?error=deleteFailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "s", $student_id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  header("location: /PHP-CVMS/CVMS/dashboard.php.?error=none");
  exit();
}
else {
  header("location: /PHP-CVMS/CVMS/dashboard.php.?error=deleteFailed");
  exit();
}