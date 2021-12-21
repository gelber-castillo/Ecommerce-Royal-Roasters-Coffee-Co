<?php
require_once('functions.php');
session_start();
include "header.php";
check_valid_user();
if($_SESSION['position']){
    ?>
    <div class="cart-message">
      <h3>Enter the new department's information</h3>
      <h3>* = required</h3>
    </div>
    
    <div class="cart-table">
      <form method="post" action="DBconfirmation-dept.php">
      <table border="1" style="width:60%; text-align: left;">
        <th>Department name*</th>
        <th>Address*</th>
        <th>Manager ID*</th>
        <tr>
          <td><input type="text" name="deptName" maxlength="20" size="13" style="border: 1px solid black;" required="required"></td>
          <td><input type="text" name="dept_address" maxlength="100" size="13"  style="border: 1px solid black;" required="required"></td>
          <td><input type="text" name="managerID" maxlength="3" style="border: 1px solid black;" size="13" required="required"></td>
        </tr>
      </table>
    </div>
    <div class="submit-cart">
         <button>Submit</button>
    </div>
    </form>
    <?php
    page_footer();
    ?>
}else{
    ?>
    <p>You are not authorize to access the page</p>
    <?php
}
?>