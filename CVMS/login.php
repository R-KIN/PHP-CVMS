<?php include './inc/header.php'; ?>

    <img src="/PHP-CVMS/CVMS/img/logo.png" style="height:100px; width:100px;" class="mb-2" alt="PUP Taguig logo">
    <h3 style="font-family:Poppins; font-weight:700;">Login</h3>
    <h5 style="font-family:DM Sans;">Log in to continue</h5>
    <form action="" class="mt-1 w-50">
      <div class="mb-3 w-50 mx-auto">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="">
      </div>
      <div class="mb-3 w-50 mx-auto">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="">
      </div>
      <div class="mb-3 w-50 mx-auto">
        <input type="submit" name="submit" value="login" style="background-color:#800000; color:white; font-family:Poppins; font-weight:700; margin-left: 12.5%;" class="btn w-75">
      </div>
    </form>

<?php include './inc/tos.php'; ?>


