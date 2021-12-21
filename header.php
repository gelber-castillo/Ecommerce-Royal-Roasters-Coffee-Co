<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <link rel="stylesheet" href="style.css">
  <link rel="icon" href="images/RRicon.png">
  <meta charset="utf-8">
  <title>Royal Roasters Coffee Co.</title>
</head>
<body>

  <div class="banner_header">
    <img src="images/RRlogo.png" alt="An Artisanal Coffee Company"
         height="150" width="400" class="center">

  </div>
</body>
</html>
<?php
  require_once('functions.php');
  if(isset($_SESSION['valid_user'])){
    $db1 = DBconnect();
    $getposition = "select position from employee where e_username='".$_SESSION['valid_user']."'";
    $result = $db1->query($getposition);
    $result = mysqli_fetch_assoc($result);
    if(!$result){ ?>
      <div style="text-align:center;">
        <a href="member.php">Home</a> |
        <a href="cart.php">Cart</a> |
        <a href="logout.php">Logout</a>
        </br></br>
      </div>
    <?php } 
    else{
          ?>
          <div style="text-align:center;">
            <a href="employeeHome.php">Home</a> |
            <a href="logout.php">Logout</a>
            </br></br>
          </div> <?php
      }
    

  }
  ?>