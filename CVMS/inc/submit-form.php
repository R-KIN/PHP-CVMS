<?php 
session_start();
if (!isset($_SESSION['personal'])) {
  header("location: /PHP-CVMS/CVMS/personal.php");
  exit();
} 
else if (isset($_POST['submit'])) {
  $userForm = $_SESSION['personal'];
  $vaccineStatus = $_POST['vaccineStatus'];
  $vaccine = $_POST['vaccine'];
  $firstVaccine = $_POST['firstVaccine'];
  $secondVaccine = $_POST['secondVaccine'];
  $boosterStatus = $_POST['boosterStatus'];
  $booster = $_POST['booster'];
  $firstBooster = $_POST['firstBooster'];
  $secondBooster = $_POST['secondBooster'];

  require_once 'database.php';
  require_once 'handling.php';

  if (incompleteVaccine($vaccineStatus, $vaccine, $firstVaccine, $secondVaccine) !== false) {
    header("location: /PHP-CVMS/CVMS/vaccination.php.?error=incompleteVaccine");
    exit();
  }
  if (incompleteBooster($boosterStatus, $booster, $firstBooster, $secondBooster) !== false) {
    header("location: /PHP-CVMS/CVMS/vaccination.php.?error=incompleteBooster");
    exit();
  }
  if (boostNoVaccine($vaccineStatus, $boosterStatus) !== false) {
    header("location: /PHP-CVMS/CVMS/vaccination.php.?error=boostNoVaccine");
    exit();
  }

  // clean up erroneous entry
  if (empty($vaccineStatus)) {
    $vaccineStatus = null;
    $vaccine = null;
    $firstVaccine = null;
    $secondVaccine = null;
  }
  if (empty($boosterStatus)) {
    $boosterStatus = null;
    $booster = null;
    $firstBooster = null;
    $secondBooster = null;
  }
  submitForm($connection, $userForm, $vaccineStatus, $vaccine, $firstVaccine, $secondVaccine, $boosterStatus, $booster, $firstBooster, $secondBooster);
}
else {
  header("location: /PHP-CVMS/CVMS/vaccination.php");
  exit();
}

    