<?php
session_start();
require_once('functions.php');
include "header.php";
check_valid_user();

$coffeeID   = $_POST['coffeeID'];
$coffeeName = $_POST['coffeeName'];
$origin     = $_POST['origin'];
$roast      = $_POST['roast'];
$desc       = $_POST['desc'];
$inventory  = $_POST['inventory'];
$price      = $_POST['price'];

@ $db = DBconnect();
$insertquery = " insert into coffee (coffeeID, coffeeName, origin, roast, description, inventory, price) values
(".$coffeeID.",'".$coffeeName."','".$origin."','".$roast."','".$desc."',".$inventory.",".$price.") ";
$result = $db->query($insertquery);

if ($result) {
    echo "<h3 style=\"text-align:center;\">".$db->affected_rows." new coffee product inserted into database.</h3>";
} else {
    echo "<h3 style=\"text-align:center;\">An error has occurred.  The item was not added.</h3>";
}
?>
<div class="return" style="text-align:center;">
  <a href="editor-coffee.php">Return to product database</a>
</div>
<?php
$db->close();
page_footer();
?>
