<?php
require_once('functions.php');
session_start();
include "header.php";
check_valid_user();

$oldcoffeeID=$_POST['oldcoffeeID'];
$coffeeID   =$_POST['coffeeID'];
$coffeeName =$_POST['coffeeName'];
$origin     =$_POST['origin'];
$roast      =$_POST['roast'];
$desc       =$_POST['desc'];
$inventory  =$_POST['inventory'];
$price      =$_POST['price'];

$db          = DBconnect();
$updatequery = "update coffee
                set coffeeID=".$coffeeID.", coffeeName='".$coffeeName."', origin='".$origin."',
                roast='".$roast."', description='".$desc."', inventory=".$inventory.", price=".$price."
                where coffeeID=".$oldcoffeeID;
$result      = $db->query($updatequery);
if ($result) {
    echo "<h3 style=\"text-align:center;\">".$db->affected_rows." coffee product info updated in database.</h3>";
} else {
    echo "<h3 style=\"text-align:center;\">An error has occurred. The item was not updated.</h3>";
}
?>
<div class="return" style="text-align:center;">
  <a href="editor-coffee.php">Return to product database</a>
</div>
<?php
$db->close();
page_footer();
?>
