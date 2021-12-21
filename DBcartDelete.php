<?php
require_once('functions.php');
session_start();
include "header.php";
check_valid_user();

$cartcoffee = $_POST['cartCoffee'];
$cartuid = $_POST['cartUID'];

@ $db = DBconnect();
$deletequery  = "delete from cart where coffeeID=".$cartcoffee." and userID=".$cartuid;
$result = $db->query($deletequery);

if ($result) {
   echo "<h3 style=\"text-align:center;\">".$db->affected_rows."  coffee product deleted from your cart.</h3>";
} else {
   echo "<h3 style=\"text-align:center;\">An error has occurred.  The item was not removed.</h3>";
}
?>

<div class="return" style="text-align:center;">
 <a href="shop.php">Continue shopping</a>
</div>
<?php
$db->close();
page_footer();
?>
