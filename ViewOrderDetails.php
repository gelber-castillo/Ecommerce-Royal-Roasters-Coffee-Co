<?php
  session_start();
  require_once('functions.php');
  include "header.php";
  check_valid_user();

  $ordertime  = $_POST['ordertime'];
  $total      = 0;
  $grandtotal = 0;
  $NJtax      = 1.06625;

  @ $db = DBconnect();
  $orderquery =   "select orders.*, coffeeName, price
                  from coffee
                  join orders on coffee.coffeeID = orders.coffeeID
                  where ordertime='".$ordertime."' and userID=".$_SESSION['userID'];
  $result = $db->query($orderquery);
  $orderarray = $result->fetch_all(MYSQLI_ASSOC);

  ?>
  <h3 style="text-align: center;">
  <a href="viewOrders.php">Go back to order history</a>
  </h3>
  </br>
  <div class="cart-table">
    <table border="1" style="width:60%; text-align: center;  border-collapse: collapse;">
    <tr>
      <th>Time ordered</th>
      <th>Name</th>
      <th>Coffee ID</th>
      <th>Quantity</th>
      <th>Price</th>
      <th>Total</th>
    </tr>
    <?php
    foreach ($orderarray as $item) {
      $ordertime  = $item['ordertime'];
      $coffeeID   = $item['coffeeID'];
      $quantity   = $item['quantity'];
      $coffeeName = $item['coffeeName'];
      $total      = $item['total'];
      $price      = $total / $item['quantity'];
      $grand_total += $total;
    ?>
    <tr>
      <td><?php echo $ordertime;?></td>
      <td><?php echo $coffeeName; ?></td>
      <td><?php echo $coffeeID; ?></td>
      <td><?php echo $quantity; ?></td>
      <td><?php echo $price; ?></td>
      <td><?php echo $total; ?></td>
    </tr>
  <?php } ?>
  </table>
  </div>
  <h3 style="text-align: center;">Grand Total (including tax): $<?php echo number_format(($grand_total*$NJtax), 2)." "; ?></h3>
  <?php
  $db->close();
  ?>

</body>
</html>
