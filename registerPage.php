<!DOCTYPE html>
<?php
require_once('functions.php');
include "header.php";
if(($_SESSION['position'] == "1") || ($_SESSION['position'] == "2")){
    ?>
        <div style="position: relative;  display:flex; flex-direction: column; width:100%; text-align:center;">
          <form action="register_new.php" method="post">
            <h2>Sign Up</h2>
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
              <input type="text" name="email" class="form-control" placeholder="Email" required="required">
            </div>
            <div class="form-group">
              <input type="text" name="username" class="form-control" placeholder="Username" required="required">
            </div>
            <div class="form-group">
              <input type="password" name="passwd" class="form-control" placeholder="Password min 6 characters" required="required">
            </div>
            <div class="form-group">
              <input type="password" name="passwd2" class="form-control" placeholder="Confirm Password" required="required">
            </div>
            <div class="form-group">
              <button type="submit" value="Register" class="btn btn-primary btn-lg">Sign Up</button>
            </div>
          </form>
          <div class="hint-text">
            <p>Already have an account? </p>
            <a href="login.php">Log in Here</a>
          </div>
        </div>
    <?php
    page_footer();
}else{
    ?>
    <a>you are not authorized to access the page</a>
    <?php
}