<?php
require_once('functions.php');
session_start();
include "header.php";
check_valid_user();
if($_SESSION['position'] == "1"){
    @ $db = DBconnect();
    $getallmanagers = "select * from employee where position=2";
    $result         = $db->query($getallmanagers);
    $managers       = $result->fetch_all(MYSQLI_ASSOC);
    ?>
    <h1 style="text-align:center;">Managers</h1>
    <div class="cart-table">
      <!--<form method="post" action="DBentry-manager.php">-->
      <form method="post" action="registerEmployee.php">
    
         <button>New Manager</button>
      </form>
    </div>
    <div class="cart-table">
    <table border="1" style="width:60%; text-align: left;">
      <tr>
        <th>Employee ID</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Address</th>
        <th>Position</th>
        <th>SSN</th>
        <th>managerID</th>
        <th>Department</th>
        <th>Actions</th>
      </tr>
    
      <?php
    foreach($managers as $manager){
      $empID 	    = $manager['empID'];
      $fname      = $manager['emp_fname'];
      $lname 	    = $manager['emp_lname'];
      $address 	  = $manager['emp_address'];
      $position 	= $manager['position'];
      $ssn 	      = $manager['ssn'];
      $managerID 	= $manager['managerID'];
      $deptID     = $manager['deptID'];
    ?>
    <tr>
      <td><?php echo $empID;      ?></td>
      <td><?php echo $fname;      ?></td>
      <td><?php echo $lname;      ?></td>
      <td><?php echo $address;    ?></td>
      <td><?php echo $position;   ?></td>
      <td><?php echo $ssn;        ?></td>
      <td><?php echo $managerID;  ?></td>
      <td><?php echo $deptID;     ?></td>
    
    <form method="post" action="DBdelete-manager.php">
      <td>
        <button name="selectedManager" value=<?php echo $empID;?>>Fire</button>
      </td>
    </form>
    </tr>
    <?php
    }
    $db->close();
    page_footer();
}else{
    ?> 
    <p>You are not authorize to access the page</p>
    <?php
}

?>

