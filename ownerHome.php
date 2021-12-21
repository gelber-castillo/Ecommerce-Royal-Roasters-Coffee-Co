<?php
require_once('functions.php');
session_start();
include "header.php";
//page_header('Manager Home');
check_valid_user();
?>

<div class="home" style="text-align:center;">
  <a href="editor-coffee.php">Product database</a></br>
  <a href="registerEmployee.php">New employee</a></br>
  <a href="editor-manager.php">Manager database</a></br>
  <a href="editor-dept.php">Department database</a></br>
  <a href="change_e_passwd_form.php">Change password</a></br>
  <a href="logout.php">Logout</a>
</div>

<?php
page_footer();
?>
