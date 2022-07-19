<?php include './inc/header.php'; ?>
<?php 
if (isset($_SESSION['username'])) {
  header("location: /PHP-CVMS/CVMS/dashboard.php");
  exit();
}
else if (isset($_SESSION['personal'])) {
  header("location: /PHP-CVMS/CVMS/vaccination.php");
  exit();
}
?>

    <img src="/PHP-CVMS/CVMS/img/logo.png" style="height:100px; width:100px;" class="mb-2" alt="PUP Taguig logo">
    <h3 style="font-family:Poppins; font-weight:700;">New Record | Personal Profile</h3>
    <h5 style="font-family:DM Sans;">Please enter the following information</h5>
    <span style="font-family:DM Sans;">
      <?php 
      if (isset($_GET['error'])) {
        if ($_GET['error'] == 'invalidEmail') {
          echo "<div class='alert alert-danger' role='alert'>Please enter a valid email address.</div>";
        }
        else if ($_GET['error'] == 'invalidContact') {
          echo "<div class='alert alert-danger' role='alert'>Please enter a valid contact number.</div>";
        }
        else if ($_GET['error'] == 'invalidLink') {
          echo "<div class='alert alert-danger' role='alert'>Please enter a valid facebook link.</div>";
        }
        else if ($_GET['error'] == 'invalidAddress') {
          echo "<div class='alert alert-danger' role='alert'>Please enter a valid address.</div>";
        }
      }
      ?>
    </span>
    <form style="font-family:DM Sans;" class="row g-3 mt-1 w-75" action="./inc/next-page.php" method="POST">
      <div class="col-md-4">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Last Name, First Name M.I." required>
      </div>
      <div class="col-md-4">
        <label for="age" class="form-label">Age</label>
        <input type="number" class="form-control" name="age" id="age" required>
      </div>
      <div class="col-md-4">
        <label for="sex" class="form-label">Sex</label>
        <div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="sex" id="Male" value="Male" required>
            <label class="form-check-label" for="male">Male</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="sex" id="Female" value="Female" required>
            <label class="form-check-label" for="female">Female</label>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="user@email.com" required>
        <span style="font-family:DM Sans; font-size:smaller;" class="text-danger ps-3">
          <?php 
          if (isset($_GET['error'])) {
            if ($_GET['error'] == 'invalidEmail') {
              echo "Working and valid email address only.";
            }
          }
          ?>
        </span>
      </div>
      <div class="col-md-4">
        <label for="contactNumber" class="form-label">Contact Number</label>
        <input type="tel" class="form-control" name="contactNumber" id="contactNumber" placeholder="09123456789" pattern="[0-9]{11}" required>
        <span style="font-family:DM Sans; font-size:smaller;" class="text-danger ps-5">
          <?php 
          if (isset($_GET['error'])) {
            if ($_GET['error'] == 'invalidContact') {
              echo "11 numerical characters only.";
            }
          }
          ?>
        </span>
      </div>
      <div class="col-md-4">
        <label for="facebookLink" class="form-label">Facebook Link</label>
        <input type="text" class="form-control" name="facebookLink" id="facebookLink" placeholder="/user.123/" required>
        <span style="font-family:DM Sans; font-size:smaller;" class="text-danger ps-3">
          <?php 
          if (isset($_GET['error'])) {
            if ($_GET['error'] == 'invalidLink') {
              echo "Working and valid facebook link only.";
            }
          }
          ?>
        </span>
      </div>
      <div class="col-12 mt-1">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" name="address" id="address" placeholder="Home Number, Home Name, Street, Barangay" required>
        <span style="font-family:DM Sans; font-size:smaller;" class="text-danger ps-2">
          <?php 
          if (isset($_GET['error'])) {
            if ($_GET['error'] == 'invalidAddress') {
              echo "Alphanumeric characters + ',' only, max. 80.";
            }
          }
          ?>
        </span>
      </div>
      <div class="col-md-4 mt-1">
        <label for="region" class="form-label">Region</label>
        <input type="text" class="form-control" name="region" id="region" placeholder="Region" required>
        <span style="font-family:DM Sans; font-size:smaller;" class="text-danger ps-2">
          <?php 
          if (isset($_GET['error'])) {
            if ($_GET['error'] == 'invalidAddress') {
              echo "Full region name (no designation).";
            }
          }
          ?>
        </span>
      </div>
      <div class="col-md-4 mt-1">
        <label for="province" class="form-label">Province</label>
        <input type="text" class="form-control" name="province" id="province" placeholder="Province" required>
        <span style="font-family:DM Sans; font-size:smaller;" class="text-danger ps-2">
          <?php 
          if (isset($_GET['error'])) {
            if ($_GET['error'] == 'invalidAddress') {
              echo "Full province name with spaces.";
            }
          }
          ?>
        </span>
      </div>
      <div class="col-md-4 mt-1">
        <label for="city" class="form-label">City</label>
        <input type="text" class="form-control" name="city" id="city" placeholder="City" required>
        <span style="font-family:DM Sans; font-size:smaller;" class="text-danger ps-2">
          <?php 
          if (isset($_GET['error'])) {
            if ($_GET['error'] == 'invalidAddress') {
              echo "Full city name + 'City'.";
            }
          }
          ?>
        </span>
      </div>
      <div class="col-md-6 mt-1">
        <label for="course" class="form-label">Course</label>
        <select class="form-select" name="course" id="course" required>
          <option selected disabled>Choose a course...</option>
          <option value="BSA">BS Accountancy</option>
          <option value="BSECE">BS Electronics Engineering</option>
          <option value="BSME">BS Mechanical Engineering</option>
          <option value="BSBA-HRM">BSBA Human Resource Development Management</option>
          <option value="BSMM">BS Marketing Management</option>
          <option value="BSOA">BS Office Administration</option>
          <option value="BSED-ENG">BSED English</option>
          <option value="BSED-MATH">BSED Mathematics</option>
          <option value="BSIT">BS Information Technology</option>
          <option value="DOMT">Diploma in Office Management Technology</option>
          <option value="DICT">Diploma in Information Communication Technology</option>
        </select>
      </div>
      <div class="col-md-4 mt-1">
        <label for="yearSection" class="form-label">Year & Section</label>
        <select class="form-select" name="yearSection" id="yearSection" required>
          <option selected disabled>Choose a year and section...</option>
          <option value="1-1">1-1</option>
          <option value="2-1">2-1</option>
          <option value="3-1">3-1</option>
          <option value="4-1">4-1</option>
          <option value="5-1">5-1</option>
        </select>
      </div>
      <div class="col-12 w-75">
        <input type="submit" name="submit" style="background-color:#800000; color:white;" class="btn w-25" value="Next">
      </div>
    </form>
    
<?php include './inc/footer.php'; ?>