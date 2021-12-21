<?php
require_once('functions.php');
session_start();
include "header.php";
check_valid_employee();
?>
  <div style="position: relative;  display:flex; flex-direction: column; width:100%; text-align:center;">
  <form action="change_e_passwd.php" method="post">
    <h2>Change password</h2>
    <p>Please enter a new password</p>
    <hr>
    <div class="form-group">
      <div class="row">
        <div class="col">
          <input type="password" name="old_passwd" class="form-control" placeholder="Old Password" required="required">
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col">
          <input type="password" name="old_passwd2" class="form-control" placeholder="Confirm Password" required="required">
        </div>
      </div>
    </div>
    <div class="form-group">
      <a href="employeeHome.php" class="btn btn-secondary btn-lg" role="button" aria-pressed="true">Go Back</a>
      <button type="submit" value="change password" class="btn btn-primary btn-lg">Change Password</button>
    </div>
  </form>
<?php
page_footer();
