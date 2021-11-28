<html>
<head>
  <?php include "header.php" ?>
</head>
<body>
  <?php
  $selected_coffeeID = $_GET['selected_coffeeID'];
  $quantity = $_GET['quantity'];
  $price = $_GET['price'];

  @ $db = new mysqli('localhost', 'root', '', 'RoyalRoasters');
  if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
  }

  ?>
  <div class="cart-message">
  <?php
  $askquery = "select count(*) as total from cart where userID=1 and coffeeID=".$selected_coffeeID;
  $askresult = $db->query($askquery);
  $askrows = mysqli_fetch_assoc($askresult);
  if($askrows['total'] < 1){
    $query = "insert into cart values
              (1, '".$selected_coffeeID."', '".$quantity."', '".$price."')";

    $result = $db->query($query);

    if ($result) {
        echo "New order added to cart.</br></br>";
    } else {
        echo "An error has occurred.  The item was not added to cart.</br>";
    }
  } else{
    $query = "select * from cart where userID=1 and coffeeID=".$selected_coffeeID;
    $askresult = $db->query($query);
    $askarray = mysqli_fetch_assoc($askresult);
    $askquantity = $askarray['quantity'];
    $query = "update cart set quantity=".$quantity+$askquantity." where coffeeID=".$selected_coffeeID;
    $updateresult = $db->query($query);
    if ($updateresult) {
        echo "Order was updated.</br></br>";
    } else {
        echo "An error has occurred.  The item was not updated.</br>";
    }
  }
  ?>
  </div>
  <?php


  //delete from cart where userID in ('1')
  $newquery = "select * from cart where userID=1";
  $newresult = $db->query($newquery);
  $array = $newresult->fetch_all(MYSQLI_ASSOC);

  $grand_total = 0;
  $NJtax = 1.06625;
  ?>
  <div class="cart-table">
  <table border="1" style="width:40%">
    <tr>
      <th>User ID</th>
      <th>Coffee ID</th>
      <th>Quantity</th>
      <th>Cost Per Item</th>
      <th>Total</th>
    </tr>

    <?php
    foreach($array as $item){
      $userID=$item['userID'];
      $coffeeID=$item['coffeeID'];
      $quantity=$item['quantity'];
      $cost = $item['cost'];
      $total=$item['cost'] * $quantity;
      ?>
    <tr>
      <td><?php echo $userID;   ?></td>
      <td><?php echo $coffeeID; ?></td>
      <td><?php echo $quantity; ?></td>
      <td>$<?php echo $cost;    ?></td>
      <td>$<?php echo number_format($total, 2); ?></td>
      <?php $grand_total += $total;
    } ?>
    </tr>
  </table>
  </div>
  <div class="submit-cart">
    <h3>Grand Total (including tax): $<?php echo number_format(($grand_total*$NJtax), 2)." "; ?></h3>
    <form method="post" action="#">
       <!-- <input type="hidden" name="selected_coffeeID" value="<?php echo $coffeeID; ?>"> -->
       <button name="submitOrder">Submit Order</button>
    </form>
  </div>

  <?php
  $db->close();
  ?>
</body>
</html>
