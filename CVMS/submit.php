<?php include './inc/header.php'; ?>

    <img src="/PHP-CVMS/CVMS/img/logo.png" style="height:100px; width:100px;" class="mb-2" alt="PUP Taguig logo">
    <h3 style="font-family:Poppins; font-weight:700;">New Record | Personal Profile</h3>
    <h5 style="font-family:DM Sans;">Please enter the following information</h5>
    <div>
      <?php 
      $connection = mysqli_connect("localhost", "root", "", "php-cvms");
      if ($connection === false) {
        die("MySQL Server connection failed:  " . mysqli_connect_error());
      }

      $name = $_REQUEST['name'];
      $age = $_REQUEST['age'];
      $sex = $_REQUEST['sex'];
      $email = $_REQUEST['email'];
      $contactNumber = $_REQUEST['contactNumber'];
      $facebookLink = $_REQUEST['facebookLink'];
      $address = $_REQUEST['address'];
      $region = $_REQUEST['region'];
      $province = $_REQUEST['province'];
      $city = $_REQUEST['city'];
      $course = $_REQUEST['course'];
      $yearSection = $_REQUEST['yearSection'];

      $sql = "INSERT INTO students (name,age,sex,email,contact_number,facebook_link,address,region,province,city,course,year_section) VALUES ('$name', '$age', '$sex', '$email', '$contactNumber', '$facebookLink', '$address','$region','$province','$city','$course','$yearSection')";

      if (mysqli_query($connection, $sql)) {
        echo "Success";
      } else {
        echo mysqli_error($connection);
      }

      mysqli_close($connection);
      ?>
    </div>
    
<?php include './inc/footer.php'; ?>