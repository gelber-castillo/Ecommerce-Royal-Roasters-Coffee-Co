<?php
require_once('functions.php');
session_start();
include "header.php";
check_valid_user();

$coffeeID = $_POST['selectedCoffee'];
$db       = DBconnect();
$getquery = "select * from coffee where coffeeID=".$coffeeID;
$result   = $db->query($getquery);
$prod     = $result->fetch_all(MYSQLI_ASSOC);
?>
<div class="cart-message">
  <h3>Displayed are the selected coffee's values.</h3>
  <h3>Enter the new values below.</h3>
  <h3>* = required</h3>
</div>
<div class="cart-table">
  <table border="1" style="width:70%; text-align: left;">
    <th>CoffeeID*</th>
    <th>Name*</th>
    <th>Origin*</th>
    <th>Roast*</th>
    <th>Description</th>
    <th>Inventory*</th>
    <th>Price*</th>
<?php
foreach ($prod as $item) {
  $coffeeName =$item['coffeeName'];
  $origin     =$item['origin'];
  $roast      =$item['roast'];
  $desc       =$item['description'];
  $inventory  =$item['inventory'];
  $price      =$item['price'];
 ?>
<tr>
  <td><?php echo $coffeeID;   ?></td>
  <td><?php echo $coffeeName; ?></td>
  <td><?php echo $origin;     ?></td>
  <td><?php echo $roast;      ?></td>
  <td><?php echo $desc;       ?></td>
  <td><?php echo $inventory;  ?></td>
  <td>$<?php echo $price;     ?></td>
</tr>
<tr>
  <form method="post" action="updateConfirmation-product.php">
  <input type="hidden" name="oldcoffeeID" value="<?php echo $coffeeID; ?>">
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
  </form>
</div>
<?php
}
$db->close();
page_footer();
?>
