<?php
require_once('functions.php');

//creating variables
$username   =$_POST['e_username'];
$fname      =$_POST['fname'];
$lname      =$_POST['lname'];
$address    =$_POST['address'];
$ssn        =$_POST['ssn'];
$password   =randomPassword();
$department =$_POST['department'];
$eposition  =$_POST['position_select'];
session_start();

if ($department == "1") {
  $manager=101;
}elseif ($department=="2") {
  $manager=102;
}elseif ($department=="3") {
  $manager=103;
} else{
  $manager=102;
}

try   {
  include "header.php";
  //page_header('Registration Successful');
  // check forms filled in
  if (!filled_out($_POST)) {
    throw new Exception('You have not filled the form out correctly - please go back and try again.');
  }
  // attempt to register
  // this function can also throw an exception
  e_register($username, $password ,$fname, $lname, $address, $department, $eposition, $manager,$ssn);
  // register session variable
  $_SESSION['valid_user'] = $username;
//   $_SESSION['position'] = $position;
  // provide link to members page
  ?>
  <div style="text-align: center;">
    <h2>Registration Successful</h2>
    <p>Your Registration was successful.</p>
    <p>Please save the following information:</p>
    <p>Your username: <?php echo $username; ?></p>
    <p>Your password: <?php echo $password; ?></p>
    <a href="employeeLogin.php">Click here to Log in</a>
  </div>
<?php
    }
    catch (Exception $e) {
       echo $e->getMessage();
       page_footer();
       exit;
    }
