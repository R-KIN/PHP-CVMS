<?php include './inc/header.php'; ?>
<?php 

if (isset($_SESSION['username'])) {
  header("location: /PHP-CVMS/CVMS/dashboard.php");
  exit();
}
else if (!isset($_SESSION['personal'])) {
  header("location: /PHP-CVMS/CVMS/personal.php");
  exit();
}

?>

    <img src="/PHP-CVMS/CVMS/img/logo.png" style="height:100px; width:100px;" class="mb-2" alt="PUP Taguig logo">
    <h3 style="font-family:Poppins; font-weight:700;">New Record | COVID Vaccination Profile</h3>
    <h5 style="font-family:DM Sans;">Please enter the following information</h5>
    <span style="font-family:DM Sans;">
      <?php 
      if (isset($_GET['error'])) {
        if ($_GET['error'] == 'incompleteVaccine') {
          echo "<div class='alert alert-danger' role='alert'>Please select all the required information.</div>";
        }
        else if ($_GET['error'] == 'incompleteBooster') {
          echo "<div class='alert alert-danger' role='alert'>Please select all the required information.</div>";
        }
        else if ($_GET['error'] == 'boostNoVaccine') {
          echo "<div class='alert alert-danger' role='alert'>Cannot select booster without vaccine.</div>";
        }
      }
      ?>
    </span>
    <form style="font-family:DM Sans;" class="row g-3 mt-1 w-75" action="./inc/submit-form.php" method="POST">
      <div class="col-md-12">
        <label for="vaccineStatus" class="form-label">Have you been vaccinated? (If no, leave the following blank)</label>
        <div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="vaccineStatus" id="Yes" value="Yes" required>
            <label class="form-check-label" for="Yes">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="vaccineStatus" id="No" value="" required>
            <label class="form-check-label" for="">No</label>
          </div>
        </div>
      </div>
      <div class="col-md-4 border border-end-0 border-1 border-dark pt-2 pb-2">
        <label for="vaccine" class="form-label">Vaccine Name</label>
        <select class="form-select" name="vaccine" id="vaccine">
          <option selected disabled>Choose a vaccine...</option>
          <option value="Moderna">Moderna</option>
          <option value="Pfizer">Pfizer</option>
          <option value="Sinovac">Sinovac</option>
          <option value="AstraZeneca">AstraZeneca</option>
          <option value="Johnson&Johnson">Johnson & Johnson</option>
          <option value="Sputnik">Sputnik</option>
        </select>
      </div>
      <div class="col-md-4 border border-start-0 border-end-0 border-1 border-dark pt-2 pb-2">
        <label for="firstVaccine" class="form-label">First Dose</label>
        <input type="date" class="form-control" name="firstVaccine" id="firstVaccine">
      </div>
      <div class="col-md-4 border border-start-0 border-1 border-dark pt-2 pb-2">
        <label for="secondVaccine" class="form-label">Second Dose</label>
        <input type="date" class="form-control" name="secondVaccine" id="secondVaccine">
      </div>
      <div class="col-md-12">
        <label for="boosterStatus" class="form-label">Have you had your booster? (If no, leave the following blank)</label>
        <div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="boosterStatus" id="Yes" value="Yes" required>
            <label class="form-check-label" for="Yes">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="boosterStatus" id="No" value="" required>
            <label class="form-check-label" for="">No</label>
          </div>
        </div>
      </div>
      <div class="col-md-4 border border-end-0 border-1 border-dark pt-2 pb-2">
        <label for="booster" class="form-label">Booster Name</label>
        <select class="form-select" name="booster" id="booster">
          <option selected disabled>Choose a booster...</option>
          <option value="Moderna">Moderna</option>
          <option value="Pfizer">Pfizer</option>
          <option value="Sinovac">Sinovac</option>
          <option value="AstraZeneca">AstraZeneca</option>
          <option value="Johnson&Johnson">Johnson & Johnson</option>
          <option value="Sputnik">Sputnik</option>
        </select>
      </div>
      <div class="col-md-4 border border-start-0 border-end-0 border-1 border-dark pt-2 pb-2">
        <label for="firstBooster" class="form-label">First Dose</label>
        <input type="date" class="form-control" name="firstBooster" id="firstBooster">
      </div>
      <div class="col-md-4 border border-start-0 border-1 border-dark pt-2 pb-2">
        <label for="secondBooster" class="form-label">Second Dose</label>
        <input type="date" class="form-control" name="secondBooster" id="secondBooster">
      </div>
      <div class="col-12">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="consent" id="consent" required>
          <label style="font-family:DM Sans;" class="form-check-label" for="consent">
            I hereby attest that the information that I will provide in this document are and true and correct to the best of my knowledge and understand that any dishonest answer may have serious legal and public health implications under RA 11332.
          </label>
        </div>
      </div>
      <div class="col-12 w-75">
        <input type="submit" name="submit" style="background-color:#800000; color:white;" class="btn w-25" value="Submit">
      </div>
    </form>
    
<?php include './inc/footer.php'; ?>