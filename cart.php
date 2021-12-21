<?php
  session_start();
  require_once('functions.php');
  include "header.php";
  check_valid_user();
  
  $selected_coffeeID    = $_SESSION['selected_coffeeID'];
  $quantity             = $_POST['quantity'];

  @ $db = DBconnect();
  ?>
  <div class="cart-message">
  <?php
  //checking 'coffee' table to see if there is enough selected product quantity in inventory
  $invquery   = "select inventory from coffee where coffeeID=".$selected_coffeeID;
  $invresult  = $db->query($invquery);
  $invresult  = mysqli_fetch_assoc($invresult);

  $productsqu = "select quantity from cart where userID=".$_SESSION['userID']." and coffeeID=".$selected_coffeeID;
  $productsInCart = $db->query($productsqu);
  $productsInCart = mysqli_fetch_assoc($productsInCart);
  //if there is enough in inventory, continue
  if(!($invresult['inventory'] < ($quantity + $productsInCart['quantity']))){

    $askquery   = "select count(*) as total from cart where userID=".$_SESSION['userID']." and coffeeID=".$selected_coffeeID;
    $askresult  = $db->query($askquery);
    $askrows    = mysqli_fetch_assoc($askresult);
    //if no other entry of the same coffeeID and userID, make a new entry
    if($askrows['total'] < 1){
      $query    = "insert into cart values
                (".$_SESSION['userID'].", '".$selected_coffeeID."', '".$quantity."')";
      $result   = $db->query($query);

      if ($result) {
          echo "New order added to cart.</br></br>";
      } else {
          echo "An error has occurred.  The item was not added to cart.</br>";
      }
    } else{
      //Preventing 2 of the same entires in cart. Updates quantity of item instead
      $query        = "select * from cart where userID=".$_SESSION['userID']." and coffeeID=".$selected_coffeeID;
      $askresult    = $db->query($query);
      $askarray     = mysqli_fetch_assoc($askresult);
      $askquantity  = $askarray['quantity'];
      $totalquantity=$quantity+$askquantity;
      $query        = "update cart set quantity=".$totalquantity." where coffeeID=".$selected_coffeeID." and userID=".$_SESSION['userID'];
      $updateresult = $db->query($query);
      if ($updateresult) {
          echo "Order was updated.</br></br>";
      } else {
          $test=$quantity+$askquantity;
          echo "An error has occurred. The item was not updated.</br>".$test;
      }
    }
  }
  else{
    //if there is not enough product in inventory, we do not update cart.
    echo "<h2>Request denied: Not enough product in stock.</h2></br>";
  }
  //if cart is empty, let the user know with a display message
  $viewcart   = "select count(*) as cartrows from cart where userID=".$_SESSION['userID'];
  $vcartres   = $db->query($viewcart);
  $numberof   = mysqli_fetch_assoc($vcartres);
  if($numberof['cartrows']==0){
    echo "<h2>Your cart is empty.</h2>";
    echo "<a href=\"shop.php\">Start shopping</a></br></br>";
  }
  ?>
  </div>
  <?php

  //delete from cart where userID in ('1')

  $joinquery = "select cart.*, coffeeName, price
                from coffee
                join cart on coffee.coffeeID = cart.coffeeID
                where userID=".$_SESSION['userID'];

  $newresult = $db->query($joinquery);
  if (!$newresult){
    echo "An error has occurred.  The item was not added to cart.</br>";
  }
  $array = $newresult->fetch_all(MYSQLI_ASSOC);

  $grand_total = 0;
  $NJtax = 1.06625;
  ?>
  <h1 style="text-align:center;">Your Cart</h1>
  <div class="cart-table">
  <table border="0" style="width:60%; text-align: left;">
    <tr>
      <th>User ID</th>
      <th>Name</th>
      <th>Product ID</th>
      <th>Quantity</th>
      <th>Price</th>
      <th>Total</th>
    </tr>

    <?php
    foreach($array as $item){
      $userID     =$item['userID'];
      $coffeeName =$item['coffeeName'];
      $coffeeID   =$item['coffeeID'];
      $quantity   =$item['quantity'];
      $price      =$item['price'];
      $total      =$item['price'] * $quantity;
      ?>
    <tr border="1">
      <td><?php echo $userID;     ?></td>
      <td><?php echo $coffeeName; ?></td>
      <td><?php echo $coffeeID;   ?></td>
      <td><?php echo $quantity;   ?></td>
      <td>$<?php echo $price;     ?></td>
      <td>$<?php echo number_format($total, 2); ?></td>
      <td style="border:none;">
        <form method="post" action="DBcartDelete.php">
          <button name="cartCoffee" value=<?php echo $coffeeID;?> style="font-size:11px;">remove</button>
          <input name="cartUID" type="hidden" name="your_field_name[]" value=<?php echo $userID;?> />
        </form>
      </td>
      <?php $grand_total += $total;
    } ?>
    </tr>
  </table>
  </div>
  <div class="submit-cart">
    <h3>Grand Total (including tax): $<?php echo number_format(($grand_total*$NJtax), 2)." "; ?></h3>
    <form method="post" action="submitOrder.php">
      <!-- todo - remove button name? -->
       <button name="submitOrder">Submit Order</button>
    </form>
    <a href="shop.php">Return to shop</a>
  </div>

  <?php
  $db->close();
  ?>
</body>
</html>

