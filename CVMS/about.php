<?php include './inc/header.php'; ?>
<?php 
if (isset($_SESSION['username'])) {
  header("location: /PHP-CVMS/CVMS/dashboard.php");
  exit();
}
?>

 <img src="/PHP-CVMS/CVMS/img/logo.png" style="height:100px; width:100px;" class="mb-2" alt="PUP Taguig logo">
 <h3 style="font-family:Poppins; font-weight:700;">About</h3>

    <p style="font-family:DM Sans;" class="text-center">The Polytechnic University of the Philippines Taguig COVID Vaccination Monitoring System or PUPT-CVMS is a web application designed to collect, compile, store, and present the COVID vaccination records of PUP Taguig students. Based on RA 10173 or the Data Privacy Act of 2012, all information collected here is to remain confidential and will only be used for educational and public health purposes.</p>
    <p style="font-family:DM Sans;" class="text-center">The data collected here will be used for monitoring the health and safety of PUP Taguig students by the PUP Taguig Nurse's Office and ERG organization. The collected information will also assist in deciding if face-to-face (F2F) classes can begin in a limited or full capacity of some or all of the students.</p>
    <p style="font-family:DM Sans;" class="text-center">We thank you for your continued participation.</p>

<?php include './inc/footer.php'; ?>