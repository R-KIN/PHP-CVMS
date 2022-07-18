<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans&family=Poppins:wght@500;700&display=swap" rel="stylesheet"> 
  <link rel="apple-touch-icon" sizes="180x180" href="/PHP-CVMS/CVMS/img/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/PHP-CVMS/CVMS/img/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/PHP-CVMS/CVMS/img/favicon-16x16.png">
  <link rel="manifest" href="/PHP-CVMS/CVMS/img/site.webmanifest">
  <title>PUP Taguig - CVMS</title>
</head>
<body>
  <nav style="background-color:#800000;" class="navbar navbar-expand-sm sticky-top navbar-dark mb-4">
    <div class="container">
      <a style="font-family:DM Sans;" class="navbar-brand" href="#">
        <?php 
        if (isset($_SESSION['username'])) {
          echo $_SESSION['username'];
        }
        ?>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul style="font-family:DM Sans;" class="navbar-nav ms-auto">
          <?php 
          if (isset($_SESSION['username'])) {
            echo "<li class='nav-item'><a class='nav-link' href='/PHP-CVMS/CVMS/dashboard.php'>Home</a></li>";
            echo "<li class='nav-item'><a class='nav-link' href='/PHP-CVMS/CVMS/inc/log-out.php'>Logout</a></li>";
          } 
          else {
            echo "<li class='nav-item'><a class='nav-link' href='/PHP-CVMS/CVMS/index.php'>Home</a></li>";
            echo "<li class='nav-item'><a class='nav-link' href='/PHP-CVMS/CVMS/about.php'>About</a></li>";
            echo "<li class='nav-item'><a class='nav-link' href='/PHP-CVMS/CVMS/login.php'>Login</a></li>";
          }
          ?>
        </ul>
      </div>
  </div>
</nav>

<main>
  <div class="container d-flex flex-column align-items-center">