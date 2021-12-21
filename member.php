<?php

require_once('functions.php');
session_start();

$username = $_POST['username'];
$passwd = $_POST['passwd'];

if ($username && $passwd) {
// they have just tried logging in
  try  {
    login($username, $passwd);
    // if they are in the database register the user id
    $_SESSION['valid_user'] = $username;
  }
  catch(Exception $e)  {
    // unsuccessful login
    include "header.php";
    //page_header('Problem:');
    ?>
    <div class="problem" style="text-align:center;">
      <p>You could not be logged in. You must be logged in to view this Page</p>
      <a href="login.php">Click here to login</a>
    </div>
    <?php
    page_footer();
    exit;
  }
    
    //getting userID for use in sessions
    @ $db = DBconnect();
    $IDquery = "select userID from customer where username='".$_SESSION['valid_user']."'";
    $IDresult = $db->query($IDquery);
    $row = $IDresult->fetch_array(MYSQLI_ASSOC);
    $ID = $row['userID'];
    $_SESSION['userID'] = $ID;
    /*
    $IDresult = mysqli_fetch_assoc($IDresult);
    $ID = $IDresult['userID'];
    $_SESSION['userID'] = $ID;
    */
    //ok done
    
}
include "header.php";
check_valid_user();
//page_header('member page');
?>
<div class="home" style="text-align:center;">
    <a href="shop.php">Start shopping</a></br>
    <a href="viewOrders.php">View order history</a></br>
    <a href="change_passwd_form.php">Change password</a></br>
    <a href="logout.php">Logout</a>
</div>

<?php
 page_footer();
