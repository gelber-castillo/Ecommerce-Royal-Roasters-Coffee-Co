<html>
<head>
  <?php
  session_start();
  require_once('functions.php');
  include "header.php";
  check_valid_user();
  //get userID for use in the sessions
  @ $db = new mysqli('localhost', 'root', '', 'RoyalRoasters');
  if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
  }
  $IDquery = "select userID from customer where username='".$_SESSION['valid_user']."'";
  $IDresult = $db->query($IDquery);
  $IDresult = mysqli_fetch_assoc($IDresult);
  $ID = $IDresult['userID'];
  $_SESSION['userID'] = $ID;
  //ok done
?>
</head>
<body>
<?php
$searchtype=$_POST['searchtype'];
$searchterm = trim($_POST['searchterm']);
@ $db = new mysqli('localhost', 'root', '', 'RoyalRoasters');

if (mysqli_connect_errno()) {
   echo "Error: Could not connect to database.  Please try again later.";
   exit;
}
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
?>
  <div class="product_card">
    <div class="coffee-image"> <img src="images/comingsoon.png" style="width:250px; height:220px;"></div>
    <div class="product-info">
      <h4><?php echo $prod['coffeeName'];?></h4>
      <h5>$<?php echo $prod['price'];?></h5>

      <form method="get" action="viewProduct.php">
         <input type="hidden" name="selected_coffeeID" value="<?php echo $coffeeID; ?>">
         <button name="viewButton">View</button>
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

</body>
</html>
