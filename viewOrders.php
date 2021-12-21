<?php
  session_start();
  require_once('functions.php');
  include "header.php";
  check_valid_user();
  
  @ $db = DBconnect();
  $viewordersquery =  "select ordertime, sum(quantity) totalquantity
                      from orders
                      where userID=".$_SESSION['userID']."
                      group by ordertime
                      order by ordertime desc";
  $result = $db->query($viewordersquery);
  $ordersarray = $result->fetch_all(MYSQLI_ASSOC);
  ?>
  <h3 style="text-align: center;">Your order history</h3>
  <?php
  foreach ($ordersarray as $order) {
    $ordertime  = $order['ordertime'];
    $quantity   = $order['totalquantity'];
    ?>
    <div class="cart-table">

    <table border="1" style="width:40%; text-align: center;  border-collapse: collapse;">
      <tr >
        <th>Time ordered</th>
        <th>Products ordered</th>
      </tr>
      <tr>
        <td><?php echo $ordertime; ?></td>
        <td><?php echo $quantity;  ?></td>
        <td><form method="post" action="ViewOrderDetails.php">
           <input type="hidden" name="ordertime" value="<?php echo $ordertime; ?>">
           <button>View Details</button>
        </form></td>
      </tr>
    </table>
  </div>
    </br>
    </br>
    <?php
  }
  $db->close();
  ?>
</body>
</html>
