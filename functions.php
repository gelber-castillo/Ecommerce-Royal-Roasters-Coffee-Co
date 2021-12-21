<?php

function DBconnect(){
  $link = mysqli_connect('localhost', 'root', '', 'RoyalRoasters');
  if($link === false){
    die("could not connect. " . mysqli_connect_error());
  }
  return $link;
}

//check if a member or employee is logged in
function check_valid_user() {
// see if somebody is logged in and notify them if not
  if (isset($_SESSION['valid_user']))  {
      $user= $_SESSION['valid_user'];
      //echo "<h4>Hello ".$_SESSION['valid_user']."</h4><br />";
  } else {
     // they are not logged in
     include "header.php";
     ?>
     <p>You are not logged in.</p>
     <a href="login.php">click here to log in</a>
     <?php
     page_footer();
     exit;
  }
}

//checked if an employee is logged in by checking user and position
function check_valid_employee(){
    if(isset($_SESSION['valid_user']) && isset($_SESSION['position'])){
        $user=$_SESSION['valid_user'];
        $postion=$_SESSION['position'];
    }else{
     include "header.php";
     ?>
     <div style="text-align:center;">
         <p>You are not logged in.</p>
         <a href="employeeLogin.php">click here to log in</a>
     </div>
     <?php
     page_footer();
     exit;
    }
}

function e_position($username){
    $conn=DBconnect();
    $sql="select * from employee where e_username='".$username."'";
    $result = $conn->query($sql);
    if(!result){
        throw new Exception('could not log you in');
    }
    $row=$result->fetch_array(MYSQLI_ASSOC);
    $position=$row['position'];
    return $position;
}

// validate if email is in the right format
function valid_email($address) {
  if(filter_var($address, FILTER_VALIDATE_EMAIL)){
    return true;
  }
  else{
    return false;
  }
}

function filled_out($form_vars) {
  // test that each variable has a value
  foreach ($form_vars as $key => $value) {
     if ((!isset($key)) || ($value == '')) {
        return false;
     }
  }
  return true;
}



function change_password($username, $old_password, $new_password) {
// change password for username/old_password to new_password
// return true or false

  // if the old password is right
  // change their password to new_password and return true
  // else throw an exception
  login($username, $old_password);
  $conn = DBconnect();
  $result = $conn->query("update customer
                          set passwd = sha1('".$new_password."')
                          where username = '".$username."'");
  if (!$result) {
    throw new Exception('Password could not be changed.');
  } else {
    return true;  // changed successfully
  }
}

function e_change_password($username){
    //change employee password
    $new_passwd = randomPassword();
    $conn = DBconnect();
    $new_passwd1 = $new_passwd;
    $new_passwd = password_hash($new_passwd, PASSWORD_DEFAULT);
    $sql = "update employee set e_passwd = '".$new_passwd."'  where e_username = '".$username."'";
    $result = $conn->query($sql);
    if(!result){
        throw new Exception('Password could not be changed.');
    }else{
        ?>
        <p>Your new Password: <?php echo $new_passwd1;?> </p>
        <?php
        return true;
    }
}

function login($username, $password) {
// check username and password with db
// if yes, return true
// else throw exception

  // connect to db
  $conn = DBconnect();
  // check if username is unique
  $result = $conn->query("select * from customer
                         where username='".$username."'
                         and passwd = sha1('".$password."')");
  if (!$result) {
     throw new Exception('Could not log you in.');
  }

  if ($result->num_rows>0) {
     return true;
  } else {
     throw new Exception('Could not log you in.');
  }
}

//login check for employees

function e_login($username, $password){
    $conn = DBconnect();
     // check if username is unique
    //$password = sha1($password);
    $sql = "select * from employee where e_username='".$username."'";
    $result = $conn->query($sql);
    if(!result){
        throw new Exception('could not log you in');
    }
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $hashed = $row['e_passwd'];

    if(password_verify($password, $hashed)){
        return true;
    }else{
        throw new Exception('could not log in');
    }
}


function register($username, $password, $email, $fname, $lname, $address) {
// register new person with db
// return true or error message

  // connect to db
  $conn = mysqli_connect('localhost', 'root', '', 'RoyalRoasters');

  // check if username is unique
  $result = $conn->query("select * from customer where username='".$username."'");
  if (!$result) {
    throw new Exception('Could not execute query');
  }

  if ($result->num_rows>0) {
    throw new Exception('That username is taken - go back and choose another one.');
  }

  // if ok, put in db
  $result = $conn->query("insert into customer values
                         (NULL, '".$username."', sha1('".$password."'), '".$email."', '".$fname."','".$lname."', '".$address."')");
  if (!$result) {
    throw new Exception('Could not register you in database - please try again later.');
  }

  return true;
}

function e_register($username, $password, $fname, $lname, $address, $department, $eposition,  $manager, $ssn) {
    // register new employee to db
    // return true or error message

    // connect to db
    $conn = DBconnect();

    // check if username is unique
    $result = $conn->query("select * from employee where e_username='".$username."'");
    if (!$result) {
        throw new Exception('Could not execute query');
    }

    if ($result->num_rows>0) {
        throw new Exception('That username is taken - go back and choose another one.');
    }
    // if ok, put in db
    $password = password_hash($password, PASSWORD_DEFAULT);
    $result = $conn->query("insert into employee values(null, '".$fname."', '".$lname."', '".$address."', '".$eposition."', '".$ssn."', '".$manager."', '".$department."', '".$username."', '".$password."')");
    if (!$result) {
        throw new Exception('Could not register you in database - please try again later.');
    }

    return true;
}

//creates a randomly generated password for employees
function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 6; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

//footer
function page_footer(){
  ?>
    </body>
  </html>
  <?php
}
// old functions

/*
function change_e_password($username, $old_password, $new_password) {
// change password for username/old_password to new_password
// return true or false

  // if the old password is right
  // change their password to new_password and return true
  // else throw an exception
  e_login($username, $old_password);
  $conn = DBconnect();
  $result = $conn->query("update employee
                          set e_passwd = sha1('".$new_password."')
                          where e_username = '".$username."'");
  if (!$result) {
    throw new Exception('Password could not be changed.');
  } else {
    return true;  // changed successfully
  }
}

//login check for employees
function e_login($username, $password){
    $conn = DBconnect();
      // check if username is unique
      $result = $conn->query("select * from employee
                             where e_username='".$username."'
                             and e_passwd = sha1('".$password."')");
      if (!$result) {
         throw new Exception('Could not log you in.');
    }

    if ($result->num_rows>0) {
        return true;
    } else {
        throw new Exception('Could not log you in.');
    }

}

function e_register($username, $password, $fname, $lname, $address, $department, $position,  $manager, $ssn) {
    // register new person with db
    // return true or error message

    // connect to db
    $conn = DBconnect();

    // check if username is unique
    $result = $conn->query("select * from employee where e_username='".$username."'");
    if (!$result) {
        throw new Exception('Could not execute query');
    }

    if ($result->num_rows>0) {
        throw new Exception('That username is taken - go back and choose another one.');
    }
    // if ok, put in db
    $result = $conn->query("insert into employee values(null, '".$fname."', '".$lname."', '".$address."', '".$position."', '".$ssn."', '".$manager."', ".$department.", '".$username."', sha1('".$password."'))");
    if (!$result) {
        throw new Exception('Could not register you in database - please try again later.');
    }

    return true;
}

function page_header($titlePage){
  ?>
  <!DOCTYPE html>
  <html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/RRicon.png">
    <meta charset="utf-8">
    <title><?php echo $titlePage; ?></title>
  </head>
  <body>

    <div class="banner_header">
      <img src="images/RRlogo.png" alt="An Artisanal Coffee Company"
           height="150" width="400" class="center">

    </div>
  <?php
}

//footer
function page_footer(){
  ?>
    </body>
  </html>
  <?php
}

*/
