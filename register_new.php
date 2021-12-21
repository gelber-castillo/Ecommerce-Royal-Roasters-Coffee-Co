<?php
require_once('functions.php');

//creating variables
$email=$_POST['email'];
$username=$_POST['username'];
$passwd=$_POST['passwd'];
$passwd2=$_POST['passwd2'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$address=$_POST['address'];

session_start();
include "header.php";
try   {
  // check forms filled in
  if (!filled_out($_POST)) {
    throw new Exception('You have not filled the form out correctly - please go back and try again.');
  }

  // email address not valid
  if (!valid_email($email)) {
    throw new Exception('That is not a valid email address.  Please go back and try again.');
  }

  // passwords not the same
  if ($passwd != $passwd2) {
    throw new Exception('The passwords you entered do not match - please go back and try again.');
  }

  // check password length is ok
  // ok if username truncates, but passwords will get
  // munged if they are too long.
  if ((strlen($passwd) < 6) || (strlen($passwd) > 16)) {
    throw new Exception('Your password must be between 6 and 16 characters Please go back and try again.');
  }


      // attempt to register
      // this function can also throw an exception
      register($username, $passwd ,$email,$fname, $lname, $address);
      // register session variable
      $_SESSION['valid_user'] = $username;

      // provide link to members page
      ?>
    <div class="success" style="text-align:center;">
      <h2>Registration Successful</h2>
      <p>Your Registration was successful. Go to members page to start checking our products</p>
      <!--do_html_url('member.php', 'Go to members page');-->
      <a href="member.php">Go to member page</a>
    </div>
<?php
    }
    catch (Exception $e) {
       //do_html_header('Problem:');
       echo $e->getMessage();
       //do_html_footer();
       exit;
    }
