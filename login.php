<?php
  require_once('functions.php');
  include "header.php";
 ?>

  <div style="position: relative;  display:flex; flex-direction: column; width:100%; text-align:center;">
  <form action="member.php" method="post">
    <h2>Log in</h2>
    <p>Please login to continue</p>
    <p><a href="registerPage.php">Not a member?</a> </p>
    <p><a href="employeeLogin.php">Employee login</a></p>
    <hr>
    <div class="form-group">
      <div class="row">
        <div class="col">
          <input type="text" name="username" class="form-control" placeholder="Username" required="required">
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col">
          <input type="password" name="passwd" class="form-control" placeholder="Password" required="required">
        </div>
      </div>
    </div>
    <div class="form-group">
      <button type="submit" value="Log In" class="btn btn-primary btn.lg">Log In</button>
    </div>
  </form>

<?php
page_footer();
