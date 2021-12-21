<?php
require_once('functions.php');
session_start();
include "header.php";
check_valid_user();

if($_SESSION['position'] == "1"){
    $deptID     = $_POST['selectedDept'];
    $deptName   = $_POST['deptName'];
    $db         = DBconnect();
    $viewemps   = "select * from employee where deptID=".$deptID;
    $result     = $db->query($viewemps);
    $emps       = $result->fetch_all(MYSQLI_ASSOC);
    ?>
    
    <h1 style="text-align:center;"><?php echo $deptName; ?> Department Employees</h1>
    <div class="cart-table">
        <a href="editor-dept.php">Return to department editor</a></br>
    </div>
    <div class="cart-table">
    <table border="1" style="width:80%; text-align: left;">
      <tr>
        <th>Employee ID</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Address</th>
        <th>Position</th>
        <th>ssn</th>
        <th>Manager ID</th>
        <th>Username</th>
      </tr>
    
    <?php
    foreach($emps as $emp){
      $empID        = $emp['empID'];
      $fname 	    = $emp['emp_fname'];
      $lname        = $emp['emp_lname'];
      $address 	    = $emp['emp_address'];
      $position     = $emp['position'];
      $ssn          = $emp['ssn'];
      $managerID    = $emp['managerID'];
      $username     = $emp['e_username'];
    ?>

    <tr>
      <td><?php echo $empID;        ?></td>
      <td><?php echo $fname;        ?></td>
      <td><?php echo $lname;        ?></td>
      <td><?php echo $address;      ?></td>
      <td><?php echo $position;     ?></td>
      <td><?php echo $ssn;          ?></td>
      <td><?php echo $managerID;    ?></td>
      <td><?php echo $username;     ?></td>
    
    </tr>
    <?php
    }

    $db->close();
    page_footer();
}else{
    ?> 
    <p>you are not authorize to access the page</p>
    <?php
}



