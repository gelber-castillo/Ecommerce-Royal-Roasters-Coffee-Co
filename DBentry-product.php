<?php
session_start();
require_once('functions.php');
include "header.php";
check_valid_user();

?>
<div class="cart-message">
  <h3>Enter the new product's information</h3>
  <h3>* = required</h3>
</div>

<div class="cart-table">
  <form method="post" action="DBentryConfirmation.php">
  <table border="1" style="width:60%; text-align: left;">
    <th>CoffeeID*</th>
    <th>Name*</th>
    <th>Origin*</th>
    <th>Roast*</th>
    <th>Description</th>
    <th>Inventory*</th>
    <th>Price*</th>
    <tr>
      <td><input type="text" name="coffeeID" maxlength="4" size="13" style="border: 1px solid black;" required="required"></td>
      <td><input type="text" name="coffeeName" maxlength="50" size="13" style="border: 1px solid black;" required="required"></td>
      <td><input type="text" name="origin" maxlength="30" size="13"  style="border: 1px solid black;" required="required"></td>
      <td><select name="roast" required="required">
                  <option value="light">Light</option>
                  <option value="medium">Medium</option>
                  <option value="dark">Dark</option>
            </select></td>
      <td><input type="text" name="desc" maxlength="50" style="border: 1px solid black;" size="13"></td>
      <td><input type="text" name="inventory" maxlength="3" style="border: 1px solid black;" size="13" required="required"></td>
      <td><input type="text" name="price" maxlength="5" size="13" style="border: 1px solid black;" required="required"></td>
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
