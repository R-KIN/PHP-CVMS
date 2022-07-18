<?php // session_start() ?>
<?php include './inc/header.php'; ?>

    <img src="/PHP-CVMS/CVMS/img/logo.png" style="height:100px; width:100px;" class="mb-2" alt="PUP Taguig logo">
    <h3 style="font-family:Poppins; font-weight:700;">New Record | Personal Profile</h3>
    <h5 style="font-family:DM Sans;">Please enter the following information</h5>
    <span id="error">
      <?php 
       //if (!empty($_SESSION['error'])) {
        //echo $_SESSION['error'];
        //unset($_SESSION['error']);
       //}
      ?>
    </span>
    <form style="font-family:DM Sans;" class="row g-3 mt-1 w-75" action="submit.php" method="POST">
      <div class="col-md-4">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Last Name, First Name M.I.">
      </div>
      <div class="col-md-4">
        <label for="age" class="form-label">Age</label>
        <input type="number" class="form-control" name="age" id="age">
      </div>
      <div class="col-md-4">
        <label for="sex" class="form-label">Sex</label>
        <div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="sex" id="Male" value="Male">
            <label class="form-check-label" for="male">Male</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="sex" id="Female" value="Female">
            <label class="form-check-label" for="female">Female</label>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="user@email.com">
      </div>
      <div class="col-md-4">
        <label for="contactNumber" class="form-label">Contact Number</label>
        <input type="tel" class="form-control" name="contactNumber" id="contactNumber" placeholder="09123456789" pattern="[0-9]{11}">
      </div>
      <div class="col-md-4">
        <label for="facebookLink" class="form-label">Facebook Link</label>
        <input type="text" class="form-control" name="facebookLink" id="facebookLink" placeholder="http://facebook.com/user/">
      </div>
      <div class="col-12">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" name="address" id="address" placeholder="Home Number, Home Name, Street, Barangay">
      </div>
      <div class="col-md-4">
        <label for="region" class="form-label">Region</label>
        <input type="text" class="form-control" name="region" id="region">
      </div>
      <div class="col-md-4">
        <label for="province" class="form-label">Province</label>
        <input type="text" class="form-control" name="province" id="province">
      </div>
      <div class="col-md-4">
        <label for="city" class="form-label">City</label>
        <input type="text" class="form-control" name="city" id="city">
      </div>
      <div class="col-md-6">
        <label for="course" class="form-label">Course</label>
        <select class="form-select" name="course" id="course">
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
      <div class="col-md-4">
        <label for="yearSection" class="form-label">Year & Section</label>
        <select class="form-select" name="yearSection" id="yearSection">
          <option selected disabled>Choose a year and section...</option>
          <option value="1-1">1-1</option>
          <option value="2-1">2-1</option>
          <option value="3-1">3-1</option>
          <option value="4-1">4-1</option>
          <option value="5-1">5-1</option>
        </select>
      </div>
      <div class="col-12">
        <input type="submit" value="Submit">
      </div>
    </form>
    
<?php include './inc/footer.php'; ?>