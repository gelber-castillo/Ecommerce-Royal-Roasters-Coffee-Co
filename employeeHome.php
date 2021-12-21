<?php
require_once('functions.php');
session_start();

$username = $_POST['username'];
$passwd = $_POST['passwd'];

if ($username && $passwd) {
// they have just tried logging in
  try  {
    e_login($username, $passwd);
    // if they are in the database register the user id
    $_SESSION['valid_user'] = $username;
    $_SESSION['position'] = e_position($username);
    //page_header('Employee Home');
  }
  catch(Exception $e)  {
    // unsuccessful login
    include "header.php";
    ?>
    <p>You could not be logged in. You must be logged in to view this Page</p>
    <a href="employeeLogin.php">Click here to login</a>
    <?php
    page_footer();
    exit;
  }
}
check_valid_employee();
if(isset($_SESSION['valid_user'])){
    include "header.php";
}
?>
<div class="home" style="text-align:center;">
<?php
    // making headers corresponding to their position
    if($_SESSION['position'] == "1"){
        ?>
        <a href="registerEmployee.php">New employee</a></br>
        <a href="editor-manager.php">Manager database</a></br>
        <a href="editor-dept.php">Department database</a></br>
        <?php
    }
    else if($_SESSION['position'] == "2"){
        ?>
        <a href="registerEmployee.php">New employee</a></br>
        <?php
    }
?>
<a href="editor-coffee.php">Product database</a></br>
<a href="change_e_passwd_form.php">Change password</a></br>
<a href="e_logout.php">Logout</a>
</div>
<?php
page_footer();
?>
