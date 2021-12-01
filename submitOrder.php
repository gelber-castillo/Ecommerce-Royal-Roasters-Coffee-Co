<html>
<head>
  <?php
  session_start();
  require_once('functions.php');
  include "header.php";
  check_valid_user();
  ?>
</head>
<body>
  <?php
  $ordertime  = date('Y-m-d H:i:s');
  $error      = 0;

  @ $db = new mysqli('localhost', 'root', '', 'RoyalRoasters');
  if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
  }

  $getcartitems = "select * from cart where userID=".$_SESSION['userID'];
  $result = $db->query($getcartitems);
  $cartarray = $result->fetch_all(MYSQLI_ASSOC);
  $result->free();

  foreach ($cartarray as $item) {
    $userID   = $item["userID"];
    $coffeeID = $item["coffeeID"];
    $quantity = $item["quantity"];
    //query to add order to the order table
    $orderquery = "insert into orders (userID, ordertime, coffeeID, quantity) values
    (".$userID.", '".$ordertime."', ".$coffeeID.", ".$quantity.")";
    $result = $db->query($orderquery);
    if(!$result){
      $err+=1;
    }
    //query to update inventory on coffee table
    $invquery = "select * from coffee where coffeeID=".$coffeeID;
    $result = $db->query($invquery);
    if(!$result){
      $err+=1;
    }
    $invarray = mysqli_fetch_assoc($result);
    $invquantity = $invarray['inventory'];
    $updateinv = "update coffee set inventory=".$invquantity-$quantity." where coffeeID=".$coffeeID;
    $result = $db->query($updateinv);
    if(!$result){
      $err+=1;
    }
    //query to remove the item from the user's cart
    $deletecart = "delete from cart where userID in ('".$_SESSION['userID']."') and coffeeID=".$coffeeID;
    $result = $db->query($deletecart);
    if(!$result){
      $err+=1;
    }
  }
  ?>
  <h1 style="text-align:center;">
  <?php
  if($err==0){
    echo "Order successfully submitted.</br>Thank you for your business.</br>";
    ?>
    <a href="viewOrders.php">View your order history</a>
    <?php
  }
  else {
    echo "An error has occurred while submitting the order. error=".$err;
  }
  ?>
  </h1>
  <?php
  $db->close();
  ?>
</body>
</html>
