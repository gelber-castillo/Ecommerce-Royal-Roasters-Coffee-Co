<?php

require_once('functions.php');
session_start();
include "header.php";

// create short variable names
$old_passwd = $_POST['old_passwd'];
$old_passwd2 = $_POST['old_passwd2'];

try {
  check_valid_employee();
  if (!filled_out($_POST)) {
    throw new Exception('You have not filled out the form completely. Please try again.');
  }
  if ($old_passwd != $old_passwd2) {
     throw new Exception('Passwords entered were not the same.  Not changed.');
  }
  // attempt update
  e_change_password($_SESSION['valid_user']);
  ?>
  <h4>Password Changed</h4>
  <a href="employeeHome.php">Continue</a>
  <?php
}
catch (Exception $e) {
  echo $e->getMessage();
}
page_footer();
