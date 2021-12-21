<?php
session_start();
require_once('functions.php');
$old_user = $_SESSION['valid_user'];

// store  to test if they *were* logged in
unset($_SESSION['valid_user']);
unset($_SESSION['userID']);
$result_dest = session_destroy();

// start output html
include "header.php";
//page_header('Logging Out');

if (!empty($old_user)) {
  if ($result_dest)  {
    // if they were logged in and are now logged out
    ?>
  <div style="text-align: center;">
    <h4>Log out successful.<br /></h4>
    <a href="login.php">Click here to log in</a>
  </div>
    <?php
  } else {
   // they were logged in and could not be logged out
   ?>
   <p>Unable to log out</p>
   <?php
  }
} else {
  // if they weren't logged in but came to this page somehow
  ?>
  <div style="text-align: center;">
    <p>You were not logged in, and so have not been logged out.</p>
    <a href="login.php">Click here to log in</a>
  </div>

  <?php
}
page_footer();
