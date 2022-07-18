<?php 

session_start();
session_unset();
session_destroy();
header("location: /PHP-CVMS/CVMS/index.php");
exit();

