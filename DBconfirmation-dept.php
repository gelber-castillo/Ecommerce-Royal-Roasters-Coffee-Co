<?php
require_once('functions.php');
session_start();
include "header.php";
check_valid_user();
if($_SESSION['position'] == "1"){
    $deptName     = $_POST['deptName'];
    $dept_address = $_POST['dept_address'];
    $managerID    = $_POST['managerID'];
    
    @ $db = DBconnect();
    //inserting manager to employee table. position is set at 2 to reflect manager position int
    $insertquery = "insert into department (deptName, dept_address, managerID) values
    ('".$deptName."','".$dept_address."',".$managerID.") ";
    $result = $db->query($insertquery);
    
    if ($result) {
        echo "<h3 style=\"text-align:center;\">".$db->affected_rows." new department inserted into database.</h3>";
    } else {
        echo "<h3 style=\"text-align:center;\">An error has occurred.  The department was not added.</h3>";
    }
    ?>
    <div class="return" style="text-align:center;">
      <a href="editor-dept.php">Return to department database</a>
    </div>
    <?php
    $db->close();
    page_footer();
    ?>
}else{
    ?>
    <p>You are not authorize to access the page</p>
    <?php
}
?>
