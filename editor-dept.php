<?php
require_once('functions.php');
session_start();
include "header.php";
check_valid_user();
if($_SESSION['position'] == "1"){
    @ $db           = DBconnect();
    $getalldepts    = "select * from department";
    $result         = $db->query($getalldepts);
    $depts          = $result->fetch_all(MYSQLI_ASSOC);
    ?>
    <h1 style="text-align:center;">Departments</h1>
    <div class="cart-table">
      <form method="post" action="DBentry-dept.php">
         <button>New Department</button>
      </form>
    </div>
    <div class="cart-table">
    <table border="1" style="width:80%; text-align: left;">
      <tr>
        <th>Department ID</th>
        <th>Department name</th>
        <th>Address</th>
        <th>Number of Employees</th>
        <th>managerID</th>
        <th>Action</th>
      </tr>
    
      <?php
    foreach($depts as $dept){
      $deptID 	  = $dept['deptID'];
      $deptName   = $dept['deptName'];
      $address 	  = $dept['dept_address'];
      $managerID  = $dept['managerID'];
      
      //query to get number of employees in each department
      $empnumquery    = "select count(*) as total from employee where deptID=".$deptID;
      $result         = $db->query($empnumquery);
      $numberof       = mysqli_fetch_assoc($result);
      $emps           = $numberof['total'];
    
    ?>
    <tr>
      <td><?php echo $deptID;     ?></td>
      <td><?php echo $deptName;   ?></td>
      <td><?php echo $address;    ?></td>
      <td><?php echo $emps;       ?></td>
      <td><?php echo $managerID;  ?></td>
        <form method="post" action="viewDeptEmps.php">
          <td>
            <button name="selectedDept" value=<?php echo $deptID;?>>View employees</button>
            <input type="hidden" name="deptName" value="<?php echo $deptName; ?>">
          </td>
        </form>
    </tr>
    <?php
    }
    $db->close();
    page_footer();
    
}else{
    ?>
    <p>You are not authorized to access the page</p>
    <?php
}
?>