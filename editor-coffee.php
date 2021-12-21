<?php
require_once('functions.php');
session_start();
include "header.php";
check_valid_user();

@ $db = DBconnect();
$getDB = "select * from coffee";
$result  = $db->query($getDB);
$productTable  = $result->fetch_all(MYSQLI_ASSOC);
?>

<div class="cart-table">
  <form method="post" action="DBentry-product.php">
     <button>New Product Entry</button>
  </form>
</div>

<div class="cart-table">
  <table border="1" style="width:70%; text-align: left;">
    <th>CoffeeID</th>
    <th>Name</th>
    <th>Origin</th>
    <th>Roast</th>
    <th>Description</th>
    <th>Inventory</th>
    <th>Price</th>
    <th>Delete</th>
    <th>Edit</th>

    <?php
    foreach($productTable as $item){
      $coffeeID   =$item['coffeeID'];
      $coffeeName =$item['coffeeName'];
      $origin     =$item['origin'];
      $roast      =$item['roast'];
      $desc       =$item['description'];
      $inventory  =$item['inventory'];
      $price      =$item['price'];
    ?>
    <tr>
      <td><?php echo $coffeeID;   ?></td>
      <td><?php echo $coffeeName; ?></td>
      <td><?php echo $origin;     ?></td>
      <td><?php echo $roast;      ?></td>
      <td><?php echo $desc;       ?></td>
      <td><?php echo $inventory;  ?></td>
      <td>$<?php echo $price;     ?></td>
    <form method="post" action="DBdelete-product.php">
      <td>
        <button name="selectedCoffee" value=<?php echo $coffeeID;?>>Delete</button>
      </td>
    </form>
    <form method="post" action="DBupdate-product.php">
      <td>
        <button name="selectedCoffee" value=<?php echo $coffeeID;?>>Edit</button>
      </td>
    </form>
    </tr>
    <?php
    }
    ?>
  </table>
</div>
