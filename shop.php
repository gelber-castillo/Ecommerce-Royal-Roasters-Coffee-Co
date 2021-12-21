<?php
session_start();
require_once('functions.php');
include "header.php";
check_valid_user();

$searchtype=$_POST['searchtype'];
$searchterm = trim($_POST['searchterm']);
@ $db = DBconnect();
// if no results, display all products
if (!$searchterm || !$searchtype){
  $query = 'select * from coffee';
  $result = $db->query($query);
  $rows = $result->fetch_all(MYSQLI_ASSOC);
}
//else, display selected products
else{
  $query = "select * from coffee where ".$searchtype." like '%".$searchterm."%'";
  $result = $db->query($query);
  $rows = $result->fetch_all(MYSQLI_ASSOC);
}

?>
</br>

<div class="search-bar-div">
<form class="search-bar-form" action="shop.php" method="post" style="margin:auto; max-width:300px">
  <input type="text" placeholder="Search for..." name="searchterm">
  <select name="searchtype">
    <option value="coffeeID">Coffee ID
    <option value="coffeeName">Coffee name
    <option value="roast">Roast
    <option value="origin">Country
  </select>
</form>
</div>

</br></br>

<div class="coffee-prod-grid">
<?php
foreach($rows as $prod) {
  $coffeeID = $prod['coffeeID'];
  // image pathing creation. if nonexistant, use palceholder image
  $imgpath  = "images/".$coffeeID.".jpg";
  if (!(file_exists($imgpath))) {
      $imgpath = "images/comingsoon.png";
  }
?>
  <div class="product_card">
    <div class="coffee-image"> <img src=<?php echo $imgpath;?> style="width:250px; height:220px;"></div>
    <div class="product-info">
      <h4><?php echo $prod['coffeeName'];?></h4>
      <h5>$<?php echo $prod['price'];?></h5>

      <form method="get" action="viewProduct.php">
         <input type="hidden" name="selected_coffeeID" value="<?php echo $coffeeID; ?>">
         <button>View</button>
      </form>
    </div>
  </div>
<?php } ?>
</div>
<?php
if (($result->num_rows)==0){
  echo "No search results in ".$searchtype." containing '".$searchterm."'.";
}
$result->free();
$db->close(); ?>
