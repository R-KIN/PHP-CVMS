<?php

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
  $sql = "INSERT INTO users (username, password) VALUES (?, ?);";
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