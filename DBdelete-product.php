<?php
require_once('functions.php');
session_start();
include "header.php";
check_valid_user();

@ $db = DBconnect();
$coffeeID = $_POST['selectedCoffee'];
$deletequery  = "delete from coffee where coffeeID=".$coffeeID;
$result = $db->query($deletequery);

if ($result) {
    echo "<h3 style=\"text-align:center;\">".$db->affected_rows."  coffee product deleted from the database.</h3>";
} else {
    echo "<h3 style=\"text-align:center;\">An error has occurred.  The item was not deleted.</h3>";
}
?>

<div class="return" style="text-align:center;">
  <a href="editor-coffee.php">Return to product database</a>
</div>

<?php
$db->close();
page_footer();
?>
