<?php
session_start();

// Check personal form if empty, if empty redirects back to personal.
if (isset($_POST['name'])) {
  if (empty($_POST['name'])
  || empty($_POST['age'])
  || empty($_POST['sex'])
  || empty($_POST['email'])
  || empty($_POST['contactNumber'])
  || empty($_POST['facebookLink'])
  || empty($_POST['address'])
  || empty($_POST['region'])
  || empty($_POST['province'])
  || empty($_POST['city'])
  || empty($_POST['course'])
  || empty($_POST['yearSection'])){
    // error message
    $_SESSION['error'] = "Please enter the required information.";
    header("location: /PHP-CVMS/CVMS/personal.php");
  } else {
    // sanitize input fields
    $_POST['name'] = filter_input(INPUT_POST, $_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
    $_POST['age'] = filter_input(INPUT_POST, $_POST['age'], FILTER_SANITIZE_NUMBER_INT);
    $_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $_POST['contactNumber'] = filter_var($_POST['contactNumber'], FILTER_SANITIZE_SPECIAL_CHARS);
    $_POST['facebookLink'] = filter_var($_POST['facebookLink'], FILTER_SANITIZE_URL);
    $_POST['address'] = filter_input(INPUT_POST, $_POST['address'], FILTER_SANITIZE_SPECIAL_CHARS);
    $_POST['region'] = filter_input(INPUT_POST, $_POST['region'], FILTER_SANITIZE_SPECIAL_CHARS);
    $_POST['province'] = filter_input(INPUT_POST, $_POST['province'], FILTER_SANITIZE_SPECIAL_CHARS);
    $_POST['city'] = filter_input(INPUT_POST, $_POST['city'], FILTER_SANITIZE_SPECIAL_CHARS);

    // validate input fields
    // validate email
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      // validate contact number
      if (!preg_match("/^[0-9]{11}$/", $_POST['contactNumber'])) {
        $_SESSION['error'] = "Please enter a valid contact number.";
        header("location: /PHP-CVMS/CVMS/personal.php");
      } else {
        // validate facebook link
        if (!preg_match("/^[a-zA-Z0-9.]*$/", $_POST['facebookLink'])) {
          $_SESSION['error'] = "Please enter a valid facebook link.";
          header("location: /PHP-CVMS/CVMS/personal.php");
        } else {
          foreach ($_POST as $key => $value) {
            $_SESSION['post'][$key] = $value;
          }
        }
      }
    } else {
      $_SESSION['error'] = "Please enter a valid email address.";
      header("location: /PHP-CVMS/CVMS/personal.php");
    }
  }
} else {
  if (empty($_SESSION['errorVaccination'])) {
    header("location: /PHP-CVMS/CVMS/personal.php");
  }
}
?>
<?php include './inc/header.php'; ?>

    <img src="/PHP-CVMS/CVMS/img/logo.png" style="height:100px; width:100px;" class="mb-2" alt="PUP Taguig logo">
    <h3 style="font-family:Poppins; font-weight:700;">New Record | COVID Vaccination Profile</h3>
    <h5 style="font-family:DM Sans;">Please enter the following information</h5>
    <span id="error">
      <?php
      if (!empty($_SESSION['errorVaccination'])) {
        echo $_SESSION['errorVaccination'];
        unset($_SESSION['errorVaccination']);
      }
      ?>
    </span>
    <form style="font-family:DM Sans;" class="row g-3 mt-1 w-75" action="submit.php" method="POST">
      <div class="col-md-12">
        <label for="vaccineStatus" class="form-label">Have you been vaccinated? (If not applicable, leave blank)</label>
        <div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="vaccineStatus" id="Yes" value="Yes">
            <label class="form-check-label" for="Yes">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="vaccineStatus" id="No" value="No">
            <label class="form-check-label" for="No">No</label>
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
        <label for="boosterStatus" class="form-label">Have you had your booster? (If not applicable, leave blank)</label>
        <div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="boosterStatus" id="Yes" value="Yes">
            <label class="form-check-label" for="Yes">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="boosterStatus" id="No" value="No">
            <label class="form-check-label" for="No">No</label>
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
          <input class="form-check-input" type="checkbox" name="consent" id="consent">
          <label style="font-family:DM Sans;" class="form-check-label" for="consent">
            I hereby attest that the information that I will provide in this document are and true and correct to the best of my knowledge and understand that any dishonest answer may have serious legal and public health implications under RA 11332.
          </label>
        </div>
      </div>
      <div class="col-12">
        <button type="submit" style="background-color:#800000; color:white;" class="btn w-25">Submit</button>
      </div>
    </form>
    
<?php include './inc/footer.php'; ?>