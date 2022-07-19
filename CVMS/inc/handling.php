<?php

// form handling for user registration
function emptyInput($username, $password, $confirm) {
  $check = null;
  if (empty($username) || empty($password) || empty($confirm)) {
    $check = true;
  }
  else {
    $check = false;
  }
  return $check;
}

function invalidUsername($username) {
  $check = null;
  if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    $check = true;
  }
  else {
    $check = false;
  }
  return $check;
}

function invalidMatch($password, $confirm) {
  $check = null;
  if ($password !== $confirm) {
    $check = true;
  }
  else {
    $check = false;
  }
  return $check;
}

function alreadyTaken($connection, $username) {
  $sql = "SELECT * FROM users WHERE username = ?;";
  $stmt = mysqli_stmt_init($connection);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: /PHP-CVMS/CVMS/register.php.?error=userExists");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "s", $username);
  mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($result)) {
    return $row;
  } 
  else {
    $check = false;
    return $check;
  }

  mysqli_stmt_close($stmt);
}

function createUser($connection, $username, $password) {
  $sql = "INSERT INTO users (username, password) VALUES (?,?);";
  $stmt = mysqli_stmt_init($connection);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: /PHP-CVMS/CVMS/register.php.?error=registerFailed");
    exit();
  }

  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPassword);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  header("location: /PHP-CVMS/CVMS/register.php.?error=none");
  exit();
}

// form handling for user login
function emptyLogin($username, $password) {
  $check = null;
  if (empty($username) || empty($password)) {
    $check = true;
  }
  else {
    $check = false;
  }
  return $check;
}

function loginUser($connection, $username, $password) {
  $alreadyTaken = alreadyTaken($connection, $username);

  if ($alreadyTaken === false) {
    header("location: /PHP-CVMS/CVMS/login.php.?error=invalidLogin");
    exit();
  }

  $storedHash = $alreadyTaken["password"];
  $checkPassword = password_verify($password, $storedHash); 

  if ($checkPassword === false) {
    header("location: /PHP-CVMS/CVMS/login.php.?error=invalidLogin");
    exit();
  }
  else if ($checkPassword === true) {
    session_start();
    $_SESSION['user_id'] = $alreadyTaken['user_id'];
    $_SESSION['username'] = $alreadyTaken['username'];
    header("location: /PHP-CVMS/CVMS/dashboard.php");
    exit();
  }
}

// form handling for COVID vaccine record submission
function invalidEmail($email) {
  $check = null;
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $check = true;
  }
  else {
    $check = false;
  }
  return $check;
}

function invalidContact($contactNumber) {
  $check = null;
  if (!preg_match("/^[0-9]{11}+$/", $contactNumber)) {
    $check = true;
  }
  else {
    $check = false;
  }
  return $check;
}

function invalidLink($facebookLink) {
  $check = null;
  if (!preg_match("/^[a-zA-Z0-9.]*$/", $facebookLink)) {
    $check = true;
  }
  else {
    $check = false;
  }
  return $check;
}

function invalidAddress($address, $region, $province, $city) {
  $check = null;
  if (!preg_match("/^[a-zA-Z0-9,.\s]*$/", $address) || !preg_match("/^[a-zA-Z0-9,.]*$/", $region) || !preg_match("/^[a-zA-Z0-9,.]*$/", $province) || !preg_match("/^[a-zA-Z0-9,.]*$/", $city)) {
    $check = true;
  }
  else {
    $check = false;
  }
  return $check;
}

function nextPage($personal) {
  if ($personal === null) {
    header("location: /PHP-CVMS/CVMS/personal.php.?error=formFailed");
    exit();
  }
  session_start();
  $_SESSION['personal'] = $personal;
  header("location: /PHP-CVMS/CVMS/vaccination.php");
  exit();
}

function incompleteVaccine($vaccineStatus, $vaccine, $firstVaccine, $secondVaccine) {
  $check = null;
  if ((!empty($vaccineStatus) && empty($vaccine)) || (!empty($vaccineStatus) && empty($firstVaccine)) || (!empty($vaccineStatus) && empty($secondVaccine))) {
    $check = true;
  }
  else {
    $check = false;
  }
  return $check;
}

function incompleteBooster($boosterStatus, $booster, $firstBooster, $secondBooster) {
  $check = null;
  if ((!empty($boosterStatus) && empty($booster)) || (!empty($boosterStatus) && empty($firstBooster)) || (!empty($boosterStatus) && empty($secondBooster))) {
    $check = true;
  }
  else {
    $check = false;
  }
  return $check;
}

function boostNoVaccine($vaccineStatus, $boosterStatus) {
  $check = null;
  if (empty($vaccineStatus) && !empty($boosterStatus)) {
    $check = true;
  }
  else {
    $check = false;
  }
  return $check;
}

function submitForm($connection, $userForm, $vaccineStatus, $vaccine, $firstVaccine, $secondVaccine, $boosterStatus, $booster, $firstBooster, $secondBooster) {
  array_push($userForm, $vaccineStatus, $vaccine, $firstVaccine, $secondVaccine, $boosterStatus, $booster, $firstBooster, $secondBooster);
  $_SESSION['personal'] = $userForm;
  $sql = "INSERT INTO students (name, age, sex, email, contact_number, facebook_link, address, region, province, city, course, year_section, vaccinated, vaccine_name, first_vaccine, second_vaccine, boosted, booster_name, first_booster, second_booster) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
  $stmt = mysqli_stmt_init($connection);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    session_unset();
    session_destroy();
  }
  mysqli_stmt_bind_param($stmt, "ssssssssssssssssssss", ...$_SESSION['personal']);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: /PHP-CVMS/CVMS/success.php");
  exit();
}