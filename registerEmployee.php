<!DOCTYPE html>
<?php
require_once('functions.php');
include "header.php";
?>
    <div style="position: relative;  display:flex; flex-direction: column; width:100%; text-align:center;">
      <form action="employee_new.php" method="post">
        <h2>Employee Sign up</h2>
        <p>Please fill out the form to create an account:</p>
        <hr>
        <div class="form-group">
          <div class="row">
            <div class="col">
              <input type="text" name="fname" class="form-control" placeholder="First Name" required="required">
            </div>
            <div class="col">
              <input type="text" name="lname" class="form-control" placeholder="Last Name">
            </div>
          </div>
        </div>
        <div class="form-group">
          <input type="text" name="address" class="form-control" placeholder="Address" required="required">
        </div>
        <div class="form-group">
          <input type="text" name="ssn" class="form-control" placeholder="SSN" maxlength="9" required="required">
        </div>
        <div class="form-group">
          <input type="text" name="e_username" class="form-control" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <select class="form-select form-select-sm" name="department">
                <option selected>Department</option>
                <option value="1">Administration</option>
                <option value="2">Roastery</option>
                <option value="3">Distribution</option>
            </select>
        </div>
        <div class="form-group">
            <select class="form-select form-select-sm" name="position_select">
                <option selected>Position</option>
                <option value="1">Owner</option>
                <option value="2">Manager</option>
                <option value="3">Employee</option>
            </select>
        </div>
        <div class="form-group">
          <button type="submit" value="Register" class="btn btn-primary btn-lg">Sign Up</button>
        </div>
      </form>
    </div>
<?php
page_footer();
