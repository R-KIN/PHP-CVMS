
<?php include './inc/header.php'; ?>

    <img src="/PHP-CVMS/CVMS/img/logo.png" style="height:100px; width:100px;" class="mb-2" alt="PUP Taguig logo">
    <h3 style="font-family:Poppins; font-weight:700;">New Record | COVID Vaccination Profile</h3>
    <h5 style="font-family:DM Sans;">Please enter the following information</h5>
    <span id="error">
      <?php
      // if (!empty($_SESSION['error2'])) {
      // echo $_SESSION['error2'];
      // unset($_SESSION['error2']);
      // }
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
        <select class="form-select" aria-label="Vaccine Name" name="vaccine" id="vaccine">
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
        <select class="form-select" aria-label="Booster Name" name="booster" id="booster">
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
          <input class="form-check-input" type="checkbox" id="consent">
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