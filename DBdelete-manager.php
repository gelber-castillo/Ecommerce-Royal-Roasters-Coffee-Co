<?php
require_once('functions.php');
session_start();
include "header.php";
check_valid_user();
if($_SESSION['position'] == "1"){
    @ $db = DBconnect();
    $empID = $_POST['selectedManager'];
    
    $deletequery  = "delete from employee where empID=".$empID;
    $result = $db->query($deletequery);
    
    if ($result) {
        echo "<h3 style=\"text-align:center;\">".$db->affected_rows."  Manager moved onto greener pastures.</h3>";
    } else {
        echo "<h3 style=\"text-align:center;\">An error has occurred.  The manager was not deleted from the database.</h3>";
    }
    ?>
    
    <div class="return" style="text-align:center;">
      <a href="editor-manager.php">Return to manager database</a>
    </div>
    
    <?php
    $db->close();
    page_footer();
    
}else{
    ?>
    <p>You are not authorize to access the page</p>
    <?php
}
?>
